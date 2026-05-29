// Video Oyunu Tarzı Scroll Deneyimi - Temiz ve Performanslı Versiyon

let scene, camera, renderer, road;
let scrollProgress = 0;
let currentSection = 0;

const sections = [
    { text: "Geleceği Kodluyoruz", color: "#00d4ff" },
    { text: "Teknoloji Tutkunları", color: "#9333ea" },
    { text: "İnovasyon Merkezi", color: "#10b981" },
    { text: "ATATech Club", color: "#00d4ff" }
];

function initGameScroll() {
    const container = document.getElementById('game-scroll-container');
    if (!container) return;

    // Scene
    scene = new THREE.Scene();
    scene.fog = new THREE.Fog(0x0a0a0f, 20, 80);

    // Camera
    camera = new THREE.PerspectiveCamera(60, window.innerWidth / window.innerHeight, 0.1, 1000);
    camera.position.set(0, 3, 8);

    // Renderer
    renderer = new THREE.WebGLRenderer({ 
        canvas: document.getElementById('game-canvas'),
        alpha: true,
        antialias: true,
        powerPreference: "high-performance"
    });
    renderer.setSize(window.innerWidth, window.innerHeight);
    renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
    renderer.setClearColor(0x0a0a0f, 1);

    // Yol oluştur
    createRoad();

    // Işıklandırma
    const ambientLight = new THREE.AmbientLight(0xffffff, 0.4);
    scene.add(ambientLight);

    const directionalLight = new THREE.DirectionalLight(0x00d4ff, 0.8);
    directionalLight.position.set(0, 10, 5);
    scene.add(directionalLight);

    // Smooth scroll kontrolü
    let currentScrollY = window.pageYOffset || 0;
    let targetScrollY = currentScrollY;
    let ease = 0.08;

    // Wheel event
    window.addEventListener('wheel', (e) => {
        e.preventDefault();
        
        const scrollAmount = e.deltaY * 0.6;
        targetScrollY += scrollAmount;
        
        const maxScroll = document.documentElement.scrollHeight - window.innerHeight;
        targetScrollY = Math.max(0, Math.min(maxScroll, targetScrollY));
        
        const indicator = document.getElementById('scroll-indicator');
        if (indicator && targetScrollY > 50) {
            indicator.style.opacity = '0';
        }
    }, { passive: false });

    // Smooth scroll animasyonu
    function smoothScroll() {
        const diff = targetScrollY - currentScrollY;
        if (Math.abs(diff) > 0.1) {
            currentScrollY += diff * ease;
            window.scrollTo({ top: currentScrollY, behavior: 'auto' });
        } else {
            currentScrollY = targetScrollY;
        }
        
        const maxScroll = Math.max(1, document.documentElement.scrollHeight - window.innerHeight);
        scrollProgress = Math.max(0, Math.min(1, currentScrollY / maxScroll));
        
        updateRoadPosition();
        updateSection();
        updateCamera();
        
        requestAnimationFrame(smoothScroll);
    }
    smoothScroll();

    // Animasyon loop
    let lastTime = 0;
    function animate(currentTime) {
        requestAnimationFrame(animate);
        
        const deltaTime = (currentTime - lastTime) * 0.001;
        lastTime = currentTime;
        
        // Yol çizgileri animasyonu
        if (road && road.children) {
            road.children.forEach((line, index) => {
                if (line.material && line.material.emissive) {
                    const time = currentTime * 0.001;
                    const intensity = Math.sin(time * 2 + index * 0.5) * 0.3 + 0.7;
                    line.material.emissiveIntensity = intensity;
                }
            });
        }
        
        renderer.render(scene, camera);
    }
    
    animate(0);

    // Resize
    window.addEventListener('resize', () => {
        camera.aspect = window.innerWidth / window.innerHeight;
        camera.updateProjectionMatrix();
        renderer.setSize(window.innerWidth, window.innerHeight);
    });
}

function createRoad() {
    // Ana yol
    const roadGeometry = new THREE.PlaneGeometry(5, 200, 1, 100);
    const roadMaterial = new THREE.MeshStandardMaterial({
        color: 0x0f0f1a,
        emissive: 0x0a0a15,
        emissiveIntensity: 0.1,
        metalness: 0.3,
        roughness: 0.7
    });
    
    road = new THREE.Mesh(roadGeometry, roadMaterial);
    road.rotation.x = -Math.PI / 2;
    road.position.y = 0;
    road.position.z = -50;
    scene.add(road);

    // Orta çizgi
    for (let i = 0; i < 50; i++) {
        const lineGeometry = new THREE.PlaneGeometry(0.15, 1.5);
        const lineMaterial = new THREE.MeshStandardMaterial({
            color: 0x00d4ff,
            emissive: 0x00d4ff,
            emissiveIntensity: 0.8
        });
        const line = new THREE.Mesh(lineGeometry, lineMaterial);
        line.rotation.x = -Math.PI / 2;
        line.position.set(0, 0.02, -50 + i * 4);
        road.add(line);
    }

    // Yan çizgiler
    for (let i = 0; i < 50; i++) {
        [-2.5, 2.5].forEach(side => {
            const lineGeometry = new THREE.PlaneGeometry(0.1, 1);
            const lineMaterial = new THREE.MeshStandardMaterial({
                color: 0x9333ea,
                emissive: 0x9333ea,
                emissiveIntensity: 0.6
            });
            const line = new THREE.Mesh(lineGeometry, lineMaterial);
            line.rotation.x = -Math.PI / 2;
            line.position.set(side, 0.02, -50 + i * 4);
            road.add(line);
        });
    }
}

function updateRoadPosition() {
    if (!road) return;
    
    const zPosition = -50 + (scrollProgress * 150);
    road.position.z = zPosition;
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
        textElement.style.textShadow = `0 0 50px ${section.color}, 0 0 100px ${section.color}`;
        
        setTimeout(() => {
            textElement.style.opacity = '1';
            textElement.style.transform = 'translateY(0) scale(1)';
        }, 100);
    }, 600);
}

function updateCamera() {
    if (!camera) return;
    
    if (scrollProgress < 0.3) {
        const progress = scrollProgress / 0.3;
        camera.position.z = 8 - (progress * 12);
        camera.position.y = 3 + (progress * 1.5);
        camera.rotation.x = progress * 0.08;
    } else {
        const progress = (scrollProgress - 0.3) / 0.7;
        camera.position.z = -4 - (progress * 4);
        camera.position.y = 4.5 + (progress * 6);
        camera.rotation.x = 0.08 + (progress * 0.3);
    }
}

// Three.js yüklendiğinde başlat
if (typeof THREE !== 'undefined') {
    document.addEventListener('DOMContentLoaded', () => {
        setTimeout(initGameScroll, 100);
    });
} else {
    const script = document.createElement('script');
    script.src = 'https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js';
    script.onload = () => {
        document.addEventListener('DOMContentLoaded', () => {
            setTimeout(initGameScroll, 100);
        });
    };
    document.head.appendChild(script);
}
