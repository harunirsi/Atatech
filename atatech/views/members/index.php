<!-- Video Hero Section (Kurul Sayfası) -->
<section id="video-hero-section-members" style="position: relative; width: 100%; height: 100vh; overflow: hidden; background: #0a0a0f; margin-top: 0; box-sizing: border-box;">
    <!-- Video Background -->
    <video id="scroll-video-members" 
           muted 
           playsinline 
           preload="auto"
           src="/atatech/kurul.mp4"
           style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; object-position: center; z-index: 1; opacity: 1; display: block; visibility: visible; background: transparent;">
        <source src="/atatech/kurul.mp4" type="video/mp4">
    </video>
    
    <!-- Video Overlay (Daha hafif gradient - sadece altta) -->
    <div style="position: absolute; bottom: 0; left: 0; width: 100%; height: 40%; background: linear-gradient(0deg, rgba(10, 10, 15, 1) 0%, rgba(10, 10, 15, 0.5) 50%, transparent 100%); z-index: 2; pointer-events: none;"></div>
</section>

<!-- Content Sections (Scroll ile görünecek) -->
<div id="scroll-content-members" style="position: relative; z-index: 2; background: var(--bg-dark); margin-top: 0;">

<section class="section" style="padding-top: 2rem; padding-bottom: 2rem;">
    <div class="container">
        <div class="section-header reveal" style="text-align: center; margin-bottom: 2rem;">
            <h1 class="section-title" style="font-size: clamp(1.8rem, 8vw, 2.5rem); font-weight: 900; margin-bottom: 0.8rem; background: linear-gradient(135deg, var(--primary), var(--secondary)); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
                Kurul Üyeleri
            </h1>
            <div class="title-underline" style="width: 60px; height: 3px; background: linear-gradient(90deg, var(--primary), var(--secondary)); margin: 0 auto 0.8rem; border-radius: 2px;"></div>
            <p class="section-subtitle" style="font-size: 1rem; color: var(--text-secondary);">Kulübümüzü yöneten ekibimizle tanışın 👥</p>
        </div>
        
        <?php if (empty($members)): ?>
            <div class="text-center" style="padding: 4rem 2rem;">
                <p style="color: var(--text-secondary); font-size: 1.2rem;">Henüz kurul üyesi eklenmemiş.</p>
            </div>
        <?php else: ?>
            <div class="members-grid">
                <?php foreach ($members as $member): ?>
                <div class="member-card reveal">
                    <?php if ($member['photo']): ?>
                        <img src="<?= htmlspecialchars($member['photo']) ?>" alt="<?= htmlspecialchars($member['name']) ?>" class="member-photo">
                    <?php else: ?>
                        <div class="member-photo" style="background: linear-gradient(135deg, var(--primary), var(--secondary)); display: flex; align-items: center; justify-content: center; font-size: 3rem; color: white;">
                            <?= strtoupper(substr($member['name'], 0, 1)) ?>
                        </div>
                    <?php endif; ?>
                    
                    <h3 class="member-name"><?= htmlspecialchars($member['name']) ?></h3>
                    <p class="member-position"><?= htmlspecialchars($member['position']) ?></p>
                    
                    <?php if ($member['vision']): ?>
                        <p class="member-vision"><?= htmlspecialchars($member['vision']) ?></p>
                    <?php endif; ?>
                    
                    <div class="member-social">
                        <?php if ($member['linkedin']): ?>
                            <a href="<?= htmlspecialchars($member['linkedin']) ?>" target="_blank" rel="noopener" title="LinkedIn">
                                <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                                </svg>
                            </a>
                        <?php endif; ?>
                        
                        <?php if ($member['github']): ?>
                            <a href="<?= htmlspecialchars($member['github']) ?>" target="_blank" rel="noopener" title="GitHub">
                                <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                                </svg>
                            </a>
                        <?php endif; ?>
                        
                        <?php if ($member['email']): ?>
                            <a href="mailto:<?= htmlspecialchars($member['email']) ?>" title="E-posta">
                                <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 5.457v13.909c0 .904-.732 1.636-1.636 1.636h-3.819V11.73L12 16.64l-6.545-4.91v9.273H1.636A1.636 1.636 0 0 1 0 19.366V5.457c0-2.023 2.309-3.178 3.927-1.964L5.455 4.64 12 9.548l6.545-4.91 1.528-1.145C21.69 2.28 24 3.434 24 5.457z"/>
                                </svg>
                            </a>
                        <?php endif; ?>
                    </div>
                    
                    <a href="/atatech/kurul/<?= $member['id'] ?>" class="btn btn-outline" style="width: 100%; margin-top: 1rem; text-align: center; opacity: 1; transform: translateY(0); transition: all 0.3s ease;">
                        Profili Gör
                    </a>
                </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
</div>

<!-- Video Scroll Script for Members Page -->
<script src="/atatech/public/js/video-scroll-members.js"></script>
<script>
// Member card hover'da butonu göster
document.querySelectorAll('.member-card').forEach(card => {
    card.addEventListener('mouseenter', function() {
        const btn = this.querySelector('.btn');
        if (btn) {
            btn.style.opacity = '1';
            btn.style.transform = 'translateY(0)';
        }
    });
    card.addEventListener('mouseleave', function() {
        const btn = this.querySelector('.btn');
        if (btn) {
            btn.style.opacity = '0';
            btn.style.transform = 'translateY(10px)';
        }
    });
});
</script>
