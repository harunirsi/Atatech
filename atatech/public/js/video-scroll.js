// Video Scroll Kontrolü - Basit ve Etkili Versiyon

let video;
let scrollProgress = 0;
let isVideoLoaded = false;
let videoScrollMode = true;
let videoScrollProgress = 0;
let maxVideoScroll = 0;
let currentScrollY = 0;
let targetScrollY = 0;

// Video text'leri için section'lar (artık kullanılmıyor, video üzerinde direkt gösteriliyor)
const sections = [
    { text: "Geleceği Kodluyoruz", color: "#00d4ff" },
    { text: "Teknoloji Tutkunları", color: "#9333ea" },
    { text: "İnovasyon Merkezi", color: "#10b981" },
    { text: "ATATech Club", color: "#00d4ff" }
];
let currentSection = 0;

// Video'yu yükle ve başlat
function loadVideo() {
    video = document.getElementById('scroll-video');
    if (!video) {
        console.error('❌ Video elementi bulunamadı!');
        return false;
    }

    console.log('✅ Video elementi bulundu');

    // Video'yu kesinlikle görünür yap
    video.style.cssText = 'position: absolute !important; top: 0 !important; left: 0 !important; width: 100% !important; height: 100% !important; object-fit: cover !important; z-index: 2 !important; opacity: 1 !important; display: block !important; visibility: visible !important; background: #0a0a0f !important;';
    
    // Video src kontrolü
    const existingSource = video.querySelector('source');
    if (!existingSource || !existingSource.src) {
        // Source yoksa ekle
        const source = document.createElement('source');
        source.src = '/atatech/animasyon.mp4';
        source.type = 'video/mp4';
        video.appendChild(source);
        console.log('📹 Video source elementi eklendi:', source.src);
    } else {
        console.log('📹 Video source mevcut:', existingSource.src);
    }
    
    // Video src'yi de kontrol et
    if (!video.src && !video.currentSrc) {
        video.src = '/atatech/animasyon.mp4';
        console.log('📹 Video src direkt ayarlandı:', video.src);
    }
    
    console.log('🔄 Video yükleniyor...');
    console.log('Video src:', video.src);
    console.log('Video currentSrc:', video.currentSrc);
    video.load();

    // Video event listener'ları
    video.addEventListener('loadedmetadata', () => {
        isVideoLoaded = true;
        video.style.cssText = 'position: absolute !important; top: 0 !important; left: 0 !important; width: 100% !important; height: 100% !important; object-fit: cover !important; z-index: 2 !important; opacity: 1 !important; display: block !important; visibility: visible !important;';
        video.currentTime = 0;
        video.pause();
        
        const videoDuration = video.duration;
        if (videoDuration && !isNaN(videoDuration) && videoDuration > 0) {
            // Video section yüksekliğine göre scroll hesapla
            const videoSection = document.getElementById('video-hero-section');
            const sectionHeight = videoSection ? videoSection.offsetHeight : window.innerHeight;
            maxVideoScroll = sectionHeight; // Video section yüksekliği kadar scroll
            console.log('✅ Video metadata yüklendi. Süre:', videoDuration, 'saniye');
            console.log('✅ Video section yüksekliği:', sectionHeight);
            console.log('✅ Max video scroll:', maxVideoScroll);
        } else {
            const videoSection = document.getElementById('video-hero-section');
            maxVideoScroll = videoSection ? videoSection.offsetHeight : window.innerHeight;
            console.warn('⚠️ Video süresi alınamadı, section yüksekliği kullanılıyor:', maxVideoScroll);
        }
    });

    video.addEventListener('canplay', () => {
        video.style.cssText = 'position: absolute !important; top: 0 !important; left: 0 !important; width: 100% !important; height: 100% !important; object-fit: cover !important; z-index: 2 !important; opacity: 1 !important; display: block !important; visibility: visible !important;';
        video.currentTime = 0;
        console.log('✅ Video oynatılmaya hazır');
    });
    
    video.addEventListener('loadeddata', () => {
        video.style.cssText = 'position: absolute !important; top: 0 !important; left: 0 !important; width: 100% !important; height: 100% !important; object-fit: cover !important; z-index: 2 !important; opacity: 1 !important; display: block !important; visibility: visible !important;';
        console.log('✅ Video verisi yüklendi');
    });

    video.addEventListener('error', (e) => {
        console.error('❌ Video hatası:', e);
        console.error('Video src:', video.src);
        console.error('Video currentSrc:', video.currentSrc);
        console.error('Video networkState:', video.networkState);
        if (video.error) {
            console.error('Video error code:', video.error.code);
            console.error('Video error message:', video.error.message);
        }
    });

    // Video'yu görünür yap (tekrar)
    setTimeout(() => {
        video.style.cssText = 'position: absolute !important; top: 0 !important; left: 0 !important; width: 100% !important; height: 100% !important; object-fit: cover !important; z-index: 2 !important; opacity: 1 !important; display: block !important; visibility: visible !important;';
        console.log('🎥 Video görünürlüğü zorlandı');
    }, 100);
    
    return true;
}

function initVideoScroll() {
    if (!video || !isVideoLoaded) {
        console.warn('⚠️ Video henüz yüklenmedi, bekleniyor...');
        return;
    }

    console.log('🚀 Video scroll başlatılıyor...');

    // Scroll event - Mouse tekerleği kontrolü
    const ease = 0.1;

    window.addEventListener('wheel', (e) => {
        const videoDuration = video ? video.duration : 0;
        const isVideoFinished = videoDuration && videoScrollProgress >= 0.99;
        
        if (videoScrollMode && isVideoLoaded && !isVideoFinished) {
            // Video scroll modunda - sayfa scroll'u sabit, sadece video ilerlesin
            e.preventDefault();
            
            const scrollAmount = e.deltaY * 0.5;
            
            // Video progress'i güncelle (sadece ileri)
            const progressChange = scrollAmount / maxVideoScroll;
            videoScrollProgress += progressChange;
            videoScrollProgress = Math.max(0, Math.min(1, videoScrollProgress));
            
            // Video zamanını güncelle
            if (videoDuration && !isNaN(videoDuration)) {
                const targetTime = videoScrollProgress * videoDuration;
                
                if (Math.abs(video.currentTime - targetTime) > 0.1) {
                    video.currentTime = targetTime;
                }
                
                // Video bitince normal scroll'a geç
                if (targetTime >= videoDuration - 0.05 || videoScrollProgress >= 0.99) {
                    videoScrollMode = false;
                    video.currentTime = videoDuration - 0.05;
                    videoScrollProgress = 1;
                }
            }
        } else if (videoScrollMode && isVideoLoaded && isVideoFinished) {
            // Video bitti, normal scroll'a geç
            videoScrollMode = false;
        } else {
            // Normal scroll modunda
            const scrollAmount = e.deltaY * 0.6;
            targetScrollY += scrollAmount;
            const maxScroll = document.documentElement.scrollHeight - window.innerHeight;
            targetScrollY = Math.max(0, Math.min(maxScroll, targetScrollY));
        }
    }, { passive: false });

    // Smooth scroll animasyonu
    function smoothScroll() {
        if (videoScrollMode && isVideoLoaded) {
            // Video scroll modunda - sayfa scroll'u tamamen sabit (0'da)
            window.scrollTo({ top: 0, behavior: 'auto' });
            currentScrollY = 0;
            targetScrollY = 0;
            
            // Video zamanını güncelle
            updateVideoInScrollMode();
        } else {
            // Normal scroll modunda
            const diff = targetScrollY - currentScrollY;
            if (Math.abs(diff) > 0.1) {
                currentScrollY += diff * ease;
                window.scrollTo({ top: currentScrollY, behavior: 'auto' });
            } else {
                currentScrollY = targetScrollY;
            }
            
            const maxScroll = Math.max(1, document.documentElement.scrollHeight - window.innerHeight);
            scrollProgress = maxScroll > maxVideoScroll ? 
                Math.max(0, Math.min(1, (currentScrollY - maxVideoScroll) / (maxScroll - maxVideoScroll))) : 0;
            
            updateSection();
            updateTextPosition();
        }
        
        requestAnimationFrame(smoothScroll);
    }
    smoothScroll();
}

function updateVideoInScrollMode() {
    if (!video || !isVideoLoaded) return;
    
    const videoDuration = video.duration;
    if (!videoDuration || isNaN(videoDuration)) return;
    
    const targetTime = videoScrollProgress * videoDuration;
    
    // Video zamanını güncelle
    if (Math.abs(video.currentTime - targetTime) > 0.1) {
        video.currentTime = targetTime;
    }
    
    // Video bitince normal scroll'a geç
    if (targetTime >= videoDuration - 0.05 || videoScrollProgress >= 0.99) {
        if (videoScrollMode) {
            videoScrollMode = false;
            // Normal scroll'a geç - sayfa aşağı insin
            targetScrollY = maxVideoScroll;
            currentScrollY = maxVideoScroll;
        }
    }
    
    video.style.opacity = '1';
    video.style.display = 'block';
    video.style.visibility = 'visible';
    
    // Video text'leri güncelle
    updateVideoTexts();
}

let lastActiveText = 0;

function updateVideoTexts() {
    // 4 yazı: 0-25%, 25-50%, 50-75%, 75-100%
    const progress = videoScrollProgress;
    
    // Aktif yazıyı belirle
    let activeText = 0;
    if (progress < 0.25) {
        activeText = 1; // Sol üst - "Geleceği Kodluyoruz"
    } else if (progress < 0.5) {
        activeText = 2; // Sağ alt - "Teknoloji Tutkunları"
    } else if (progress < 0.75) {
        activeText = 3; // Sol üst - "İnovasyon Merkezi"
    } else {
        activeText = 4; // Sağ alt - "ATATech Club"
    }
    
    // Sadece yazı değiştiğinde güncelle
    if (activeText === lastActiveText) {
        return;
    }
    
    lastActiveText = activeText;
    
    // Tüm yazıları güncelle
    for (let i = 1; i <= 4; i++) {
        const textEl = document.getElementById(`video-text-${i}`);
        if (textEl) {
            if (i === activeText) {
                // Aktif yazıyı göster
                textEl.style.opacity = '1';
                textEl.style.visibility = 'visible';
                textEl.style.transform = 'translate(0, 0)';
                textEl.style.transition = 'all 0.8s cubic-bezier(0.4, 0, 0.2, 1)';
            } else {
                // Diğer yazıları gizle
                textEl.style.opacity = '0';
                textEl.style.visibility = 'hidden';
                textEl.style.transition = 'all 0.8s cubic-bezier(0.4, 0, 0.2, 1)';
                if (i === 1 || i === 3) {
                    // Sol üst yazılar - sol üstten kaybol
                    textEl.style.transform = 'translate(-30px, -30px)';
                } else {
                    // Sağ alt yazılar - sağ alttan kaybol
                    textEl.style.transform = 'translate(30px, 30px)';
                }
            }
        }
    }
}

function updateSectionInVideoMode() {
    // Text container kaldırıldı - artık section update yok
    // Bu fonksiyon boş bırakıldı
}

function updateSection() {
    let sectionIndex;
    
    if (scrollProgress < 0.25) {
        sectionIndex = 0;
    } else if (scrollProgress < 0.5) {
        sectionIndex = 1;
    } else if (scrollProgress < 0.75) {
        sectionIndex = 2;
    } else {
        sectionIndex = 3;
    }
    
    if (sectionIndex !== currentSection && sectionIndex < sections.length) {
        currentSection = sectionIndex;
        updateText(sections[sectionIndex]);
    }
}

function updateTextPosition() {
    const textContainer = document.getElementById('dynamic-text-container');
    if (textContainer) {
        const translateY = scrollProgress * 40;
        const opacity = Math.max(0, 1 - (scrollProgress * 1.5));
        textContainer.style.transform = `translate(-50%, calc(-50% + ${translateY}px))`;
        textContainer.style.opacity = opacity;
    }
}

function updateText(section) {
    const textElement = document.getElementById('dynamic-text');
    if (!textElement) return;
    
    textElement.style.transition = 'all 0.6s cubic-bezier(0.4, 0, 0.2, 1)';
    textElement.style.opacity = '0';
    textElement.style.transform = 'translateY(40px) scale(0.95)';
    
    setTimeout(() => {
        textElement.textContent = section.text;
        textElement.style.color = section.color;
        textElement.style.textShadow = `0 0 50px ${section.color}, 0 0 100px ${section.color}, 0 0 20px rgba(0, 0, 0, 0.8)`;
        
        setTimeout(() => {
            textElement.style.opacity = '1';
            textElement.style.transform = 'translateY(0) scale(1)';
        }, 100);
    }, 600);
}

// Sayfa yüklendiğinde başlat
document.addEventListener('DOMContentLoaded', () => {
    console.log('📄 DOM yüklendi');
    
    // İlk yazıyı görünür yap, diğerlerini gizle
    lastActiveText = 1;
    
    // Tüm yazıları başlangıç durumuna getir
    for (let i = 1; i <= 4; i++) {
        const textEl = document.getElementById(`video-text-${i}`);
        if (textEl) {
            if (i === 1) {
                // İlk yazı görünür
                textEl.style.opacity = '1';
                textEl.style.visibility = 'visible';
                textEl.style.transform = 'translate(0, 0)';
            } else {
                // Diğer yazılar gizli
                textEl.style.opacity = '0';
                textEl.style.visibility = 'hidden';
                if (i === 1 || i === 3) {
                    textEl.style.transform = 'translate(-30px, -30px)';
                } else {
                    textEl.style.transform = 'translate(30px, 30px)';
                }
            }
        }
    }
    
    // Video'yu yükle
    if (loadVideo()) {
        // Video yüklendikten sonra scroll'u başlat
        const checkAndStart = setInterval(() => {
            if (isVideoLoaded) {
                clearInterval(checkAndStart);
                console.log('🚀 Video yüklendi, scroll başlatılıyor...');
                initVideoScroll();
            }
        }, 100);
        
        // Timeout fallback
        setTimeout(() => {
            clearInterval(checkAndStart);
            if (!isVideoLoaded) {
                console.warn('⚠️ Video yüklenmedi ama scroll başlatılıyor...');
                // Yine de scroll'u başlat
                const videoSection = document.getElementById('video-hero-section');
                maxVideoScroll = videoSection ? videoSection.offsetHeight : window.innerHeight;
                isVideoLoaded = true;
                initVideoScroll();
            }
        }, 5000);
    }
});

// Window load event'i de dene
window.addEventListener('load', () => {
    console.log('🌐 Window yüklendi');
    const video = document.getElementById('scroll-video');
    if (video) {
        // Video'yu tekrar görünür yap
        video.style.cssText = 'position: absolute !important; top: 0 !important; left: 0 !important; width: 100% !important; height: 100% !important; object-fit: cover !important; z-index: 2 !important; opacity: 1 !important; display: block !important; visibility: visible !important;';
        
        if (!video.src) {
            video.src = '/atatech/animasyon.mp4';
        }
        
        if (!isVideoLoaded) {
            video.load();
        }
        
        console.log('🎥 Video window load sonrası kontrol edildi');
        console.log('Video src:', video.src);
        console.log('Video currentSrc:', video.currentSrc);
        console.log('Video readyState:', video.readyState);
    }
});
