// ATATech Club - Main JavaScript

document.addEventListener('DOMContentLoaded', function() {
    initLoader();
    initScrollProgress();
    initRevealOnScroll();
    initNavScroll();
    initCommandPalette();
    initCounters();
    initMemberCards();
    initSmoothScroll();
});

// Custom Loader
function initLoader() {
    const loader = document.querySelector('.loader');
    if (loader) {
        window.addEventListener('load', () => {
            setTimeout(() => {
                loader.classList.add('hidden');
                setTimeout(() => loader.remove(), 500);
            }, 500);
        });
    }
}

// Scroll Progress Bar
function initScrollProgress() {
    const progressBar = document.querySelector('.scroll-progress');
    if (!progressBar) return;
    
    window.addEventListener('scroll', () => {
        const windowHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        const scrolled = (window.scrollY / windowHeight) * 100;
        progressBar.style.width = scrolled + '%';
    });
}

// Reveal on Scroll
function initRevealOnScroll() {
    const reveals = document.querySelectorAll('.reveal');
    if (reveals.length === 0) return;
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('active');
            }
        });
    }, { threshold: 0.1 });
    
    reveals.forEach(reveal => observer.observe(reveal));
}

// Nav Scroll Effect
function initNavScroll() {
    const nav = document.querySelector('.nav');
    if (!nav) return;
    
    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            nav.classList.add('scrolled');
        } else {
            nav.classList.remove('scrolled');
        }
    });
}

// Command Palette (K tuşu)
function initCommandPalette() {
    const palette = document.getElementById('command-palette');
    if (!palette) return;
    
    const commands = [
        { key: 'Ana Sayfa', action: () => window.location.href = '/atatech/' },
        { key: 'Kurul', action: () => window.location.href = '/atatech/kurul' },
        { key: 'Etkinlikler', action: () => window.location.href = '/atatech/etkinlikler' },
        { key: 'Başvuru', action: () => window.location.href = '/atatech/basvuru' },
        { key: 'Üye Ol', action: () => window.location.href = '/atatech/uye-ol' },
        { key: 'Formlar', action: () => window.location.href = '/atatech/formlar' },
        { key: 'Giriş Yap', action: () => window.location.href = '/atatech/giris' },
        { key: 'İletişim', action: () => window.location.href = '/atatech/iletisim' },
    ];
    
    let isOpen = false;
    
    document.addEventListener('keydown', (e) => {
        if (e.key === 'k' && (e.metaKey || e.ctrlKey)) {
            e.preventDefault();
            togglePalette();
        }
        if (e.key === 'Escape' && isOpen) {
            closePalette();
        }
    });
    
    function togglePalette() {
        isOpen = !isOpen;
        palette.classList.toggle('active', isOpen);
        if (isOpen) {
            const input = palette.querySelector('input');
            if (input) {
                input.focus();
                input.value = '';
            }
        }
    }
    
    function closePalette() {
        isOpen = false;
        palette.classList.remove('active');
    }
    
    const input = palette.querySelector('input');
    if (input) {
        input.addEventListener('input', (e) => {
            const query = e.target.value.toLowerCase();
            const list = palette.querySelector('.command-list');
            list.innerHTML = '';
            
            commands.filter(cmd => cmd.key.toLowerCase().includes(query)).forEach(cmd => {
                const item = document.createElement('li');
                item.className = 'command-item';
                item.textContent = cmd.key;
                item.addEventListener('click', () => {
                    cmd.action();
                    closePalette();
                });
                list.appendChild(item);
            });
        });
    }
}

// Animated Counters
function initCounters() {
    const counters = document.querySelectorAll('.stat-number');
    counters.forEach(counter => {
        const target = parseInt(counter.getAttribute('data-target')) || parseInt(counter.textContent);
        const duration = 2000;
        const increment = target / (duration / 16);
        let current = 0;
        
        const updateCounter = () => {
            current += increment;
            if (current < target) {
                counter.textContent = Math.floor(current);
                requestAnimationFrame(updateCounter);
            } else {
                counter.textContent = target;
            }
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    updateCounter();
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });
        
        observer.observe(counter);
    });
}

// Member Card 3D Tilt
function initMemberCards() {
    const cards = document.querySelectorAll('.member-card');
    cards.forEach(card => {
        card.addEventListener('mousemove', (e) => {
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            
            const centerX = rect.width / 2;
            const centerY = rect.height / 2;
            
            const rotateX = (y - centerY) / 10;
            const rotateY = (centerX - x) / 10;
            
            card.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateY(-10px)`;
        });
        
        card.addEventListener('mouseleave', () => {
            card.style.transform = '';
        });
    });
}

// Smooth Scroll
function initSmoothScroll() {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });
}

// Typing Effect
function typeWriter(element, text, speed = 100) {
    let i = 0;
    element.textContent = '';
    
    function type() {
        if (i < text.length) {
            element.textContent += text.charAt(i);
            i++;
            setTimeout(type, speed);
        }
    }
    
    type();
}

// Glitch Effect
function glitchEffect(element) {
    const text = element.textContent;
    const glitchChars = '!@#$%^&*()_+-=[]{}|;:,.<>?';
    
    setInterval(() => {
        let glitched = text.split('').map((char, i) => {
            if (Math.random() < 0.1) {
                return glitchChars[Math.floor(Math.random() * glitchChars.length)];
            }
            return char;
        }).join('');
        
        element.textContent = glitched;
        
        setTimeout(() => {
            element.textContent = text;
        }, 100);
    }, 2000);
}
