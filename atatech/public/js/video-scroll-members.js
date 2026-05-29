// Video Scroll Kontrolü - Members Sayfası

let videoMembers;
let scrollProgressMembers = 0;
let isVideoLoadedMembers = false;
let videoScrollModeMembers = true;
let videoScrollProgressMembers = 0;
let maxVideoScrollMembers = 0;
let currentScrollYMembers = 0;
let targetScrollYMembers = 0;

// Video'yu yükle ve başlat
function loadVideoMembers() {
    videoMembers = document.getElementById('scroll-video-members');
    if (!videoMembers) {
        console.error('❌ Video elementi bulunamadı! (Members)');
        return false;
    }

    console.log('✅ Video elementi bulundu (Members)');

    // Video'yu kesinlikle görünür yap
    videoMembers.style.cssText = 'position: absolute !important; top: 0 !important; left: 0 !important; width: 100% !important; height: 100% !important; object-fit: cover !important; z-index: 1 !important; opacity: 1 !important; display: block !important; visibility: visible !important; background: transparent !important;';
    
    // Video src kontrolü - kurul.mp4'ü zorla
    const existingSource = videoMembers.querySelector('source');
    if (existingSource) {
        // Mevcut source'u kurul.mp4 ile değiştir
        existingSource.src = '/atatech/kurul.mp4';
        existingSource.type = 'video/mp4';
        console.log('📹 Mevcut video source güncellendi (Members):', existingSource.src);
    } else {
        // Source yoksa ekle
        const source = document.createElement('source');
        source.src = '/atatech/kurul.mp4';
        source.type = 'video/mp4';
        videoMembers.appendChild(source);
        console.log('📹 Video source elementi eklendi (Members):', source.src);
    }
    
    // Video src'yi direkt kurul.mp4 olarak ayarla
    videoMembers.src = '/atatech/kurul.mp4';
    console.log('📹 Video src direkt ayarlandı (Members):', videoMembers.src);
    
    videoMembers.load();

    // Video event listener'ları
    videoMembers.addEventListener('loadedmetadata', () => {
        isVideoLoadedMembers = true;
        videoMembers.style.cssText = 'position: absolute !important; top: 0 !important; left: 0 !important; width: 100% !important; height: 100% !important; object-fit: cover !important; z-index: 1 !important; opacity: 1 !important; display: block !important; visibility: visible !important;';
        videoMembers.currentTime = 0;
        videoMembers.pause();
        
        const videoDuration = videoMembers.duration;
        if (videoDuration && !isNaN(videoDuration) && videoDuration > 0) {
            // Video section yüksekliğine göre scroll hesapla
            const videoSection = document.getElementById('video-hero-section-members');
            const sectionHeight = videoSection ? videoSection.offsetHeight : window.innerHeight;
            maxVideoScrollMembers = sectionHeight;
            console.log('✅ Video metadata yüklendi (Members). Süre:', videoDuration, 'saniye');
            console.log('✅ Video section yüksekliği:', sectionHeight);
            console.log('✅ Max video scroll (Members):', maxVideoScrollMembers);
        } else {
            const videoSection = document.getElementById('video-hero-section-members');
            maxVideoScrollMembers = videoSection ? videoSection.offsetHeight : window.innerHeight;
            console.warn('⚠️ Video süresi alınamadı (Members), section yüksekliği kullanılıyor:', maxVideoScrollMembers);
        }
    });

    videoMembers.addEventListener('canplay', () => {
        videoMembers.style.cssText = 'position: absolute !important; top: 0 !important; left: 0 !important; width: 100% !important; height: 100% !important; object-fit: cover !important; z-index: 1 !important; opacity: 1 !important; display: block !important; visibility: visible !important;';
        videoMembers.currentTime = 0;
        console.log('✅ Video oynatılmaya hazır (Members)');
    });
    
    videoMembers.addEventListener('loadeddata', () => {
        videoMembers.style.cssText = 'position: absolute !important; top: 0 !important; left: 0 !important; width: 100% !important; height: 100% !important; object-fit: cover !important; z-index: 1 !important; opacity: 1 !important; display: block !important; visibility: visible !important;';
        console.log('✅ Video verisi yüklendi (Members)');
    });

    videoMembers.addEventListener('error', (e) => {
        console.error('❌ Video hatası (Members):', e);
    });

    setTimeout(() => {
        videoMembers.style.cssText = 'position: absolute !important; top: 0 !important; left: 0 !important; width: 100% !important; height: 100% !important; object-fit: cover !important; z-index: 1 !important; opacity: 1 !important; display: block !important; visibility: visible !important;';
        console.log('🎥 Video görünürlüğü zorlandı (Members)');
    }, 100);
    
    return true;
}

function initVideoScrollMembers() {
    if (!videoMembers || !isVideoLoadedMembers) {
        console.warn('⚠️ Video henüz yüklenmedi (Members), bekleniyor...');
        return;
    }

    console.log('🚀 Video scroll başlatılıyor (Members)...');

    const ease = 0.1;

    window.addEventListener('wheel', (e) => {
        const videoDuration = videoMembers ? videoMembers.duration : 0;
        const isVideoFinished = videoDuration && videoScrollProgressMembers >= 0.99;
        
        if (videoScrollModeMembers && isVideoLoadedMembers && !isVideoFinished) {
            // Video scroll modunda - sayfa scroll'u sabit, sadece video ilerlesin
            e.preventDefault();
            
            const scrollAmount = e.deltaY * 0.5;
            
            // Video progress'i güncelle (sadece ileri)
            const progressChange = scrollAmount / maxVideoScrollMembers;
            videoScrollProgressMembers += progressChange;
            videoScrollProgressMembers = Math.max(0, Math.min(1, videoScrollProgressMembers));
            
            // Video zamanını güncelle
            if (videoDuration && !isNaN(videoDuration)) {
                const targetTime = videoScrollProgressMembers * videoDuration;
                
                if (Math.abs(videoMembers.currentTime - targetTime) > 0.1) {
                    videoMembers.currentTime = targetTime;
                }
                
                // Video bitince normal scroll'a geç
                if (targetTime >= videoDuration - 0.05 || videoScrollProgressMembers >= 0.99) {
                    videoScrollModeMembers = false;
                    videoMembers.currentTime = videoDuration - 0.05;
                    videoScrollProgressMembers = 1;
                }
            }
        } else if (videoScrollModeMembers && isVideoLoadedMembers && isVideoFinished) {
            // Video bitti, normal scroll'a geç
            videoScrollModeMembers = false;
        } else {
            // Normal scroll modunda
            const scrollAmount = e.deltaY * 0.6;
            targetScrollYMembers += scrollAmount;
            const maxScroll = document.documentElement.scrollHeight - window.innerHeight;
            targetScrollYMembers = Math.max(0, Math.min(maxScroll, targetScrollYMembers));
        }
    }, { passive: false });

    // Smooth scroll animasyonu
    function smoothScroll() {
        if (videoScrollModeMembers && isVideoLoadedMembers) {
            // Video scroll modunda - sayfa scroll'u tamamen sabit (0'da)
            window.scrollTo({ top: 0, behavior: 'auto' });
            currentScrollYMembers = 0;
            targetScrollYMembers = 0;
            
            // Video zamanını güncelle
            updateVideoInScrollModeMembers();
        } else {
            // Normal scroll modunda
            const diff = targetScrollYMembers - currentScrollYMembers;
            if (Math.abs(diff) > 0.1) {
                currentScrollYMembers += diff * ease;
                window.scrollTo({ top: currentScrollYMembers, behavior: 'auto' });
            } else {
                currentScrollYMembers = targetScrollYMembers;
            }
        }
        
        requestAnimationFrame(smoothScroll);
    }
    smoothScroll();
}

function updateVideoInScrollModeMembers() {
    if (!videoMembers || !isVideoLoadedMembers) return;
    
    const videoDuration = videoMembers.duration;
    if (!videoDuration || isNaN(videoDuration)) return;
    
    const targetTime = videoScrollProgressMembers * videoDuration;
    
    // Video zamanını güncelle
    if (Math.abs(videoMembers.currentTime - targetTime) > 0.1) {
        videoMembers.currentTime = targetTime;
    }
    
    // Video bitince normal scroll'a geç
    if (targetTime >= videoDuration - 0.05 || videoScrollProgressMembers >= 0.99) {
        if (videoScrollModeMembers) {
            videoScrollModeMembers = false;
            // Normal scroll'a geç - sayfa aşağı insin
            targetScrollYMembers = maxVideoScrollMembers;
            currentScrollYMembers = maxVideoScrollMembers;
        }
    }
    
    videoMembers.style.opacity = '1';
    videoMembers.style.display = 'block';
    videoMembers.style.visibility = 'visible';
}

// Sayfa yüklendiğinde başlat
document.addEventListener('DOMContentLoaded', () => {
    console.log('📄 DOM yüklendi (Members)');
    
    if (loadVideoMembers()) {
        const checkAndStart = setInterval(() => {
            if (isVideoLoadedMembers) {
                clearInterval(checkAndStart);
                console.log('🚀 Video yüklendi, scroll başlatılıyor (Members)...');
                initVideoScrollMembers();
            }
        }, 100);
        
        setTimeout(() => {
            clearInterval(checkAndStart);
            if (!isVideoLoadedMembers) {
                console.warn('⚠️ Video yüklenmedi ama scroll başlatılıyor (Members)...');
                const videoSection = document.getElementById('video-hero-section-members');
                maxVideoScrollMembers = videoSection ? videoSection.offsetHeight : window.innerHeight;
                isVideoLoadedMembers = true;
                initVideoScrollMembers();
            }
        }, 5000);
    }
});

window.addEventListener('load', () => {
    console.log('🌐 Window yüklendi (Members)');
    const video = document.getElementById('scroll-video-members');
    if (video) {
        video.style.cssText = 'position: absolute !important; top: 0 !important; left: 0 !important; width: 100% !important; height: 100% !important; object-fit: cover !important; z-index: 1 !important; opacity: 1 !important; display: block !important; visibility: visible !important;';
        
        // Video src'yi kurul.mp4 olarak zorla
        const source = video.querySelector('source');
        if (source) {
            source.src = '/atatech/kurul.mp4';
        }
        video.src = '/atatech/kurul.mp4';
        console.log('📹 Video src window load sonrası ayarlandı (Members):', video.src);
        
        if (!isVideoLoadedMembers) {
            video.load();
        }
    }
});
