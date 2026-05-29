<?php
$app = require __DIR__ . '/../../config/app.php';
?>

<!-- Video Hero Section (Sadece üstte) -->
<section id="video-hero-section" style="position: relative; width: 100%; height: 100vh; overflow: hidden; background: #0a0a0f; margin-top: 80px; box-sizing: border-box;">
    <!-- Video Background -->
    <video id="scroll-video" 
           muted 
           playsinline 
           preload="auto"
           style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; object-position: center; z-index: 1; opacity: 1; display: block; visibility: visible; background: transparent;">
        <source src="/atatech/animasyon.mp4" type="video/mp4">
    </video>
    
    <!-- Video Overlay (Daha hafif gradient - sadece altta) -->
    <div style="position: absolute; bottom: 0; left: 0; width: 100%; height: 40%; background: linear-gradient(0deg, rgba(10, 10, 15, 1) 0%, rgba(10, 10, 15, 0.5) 50%, transparent 100%); z-index: 2; pointer-events: none;"></div>
    
    <!-- Dynamic Text Overlays -->
    <div id="video-text-1" class="video-text video-text-top-left" style="position: absolute; top: 20%; left: 10%; z-index: 10; opacity: 1; transform: translate(0, 0); transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1); pointer-events: none; visibility: visible;">
        <h2 style="font-size: clamp(2rem, 5vw, 4rem); font-weight: 900; margin: 0; background: linear-gradient(135deg, var(--primary), var(--secondary)); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; text-shadow: 0 0 30px rgba(0, 212, 255, 0.5);">
            Geleceği Kodluyoruz
        </h2>
    </div>
    
    <div id="video-text-2" class="video-text video-text-bottom-right" style="position: absolute; bottom: 20%; right: 10%; z-index: 10; opacity: 0; transform: translate(30px, 30px); transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1); pointer-events: none; visibility: hidden;">
        <h2 style="font-size: clamp(2rem, 5vw, 4rem); font-weight: 900; margin: 0; background: linear-gradient(135deg, var(--secondary), var(--accent)); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; text-shadow: 0 0 30px rgba(147, 51, 234, 0.5);">
            Teknoloji Tutkunları
        </h2>
    </div>
    
    <div id="video-text-3" class="video-text video-text-top-left" style="position: absolute; top: 20%; left: 10%; z-index: 10; opacity: 0; transform: translate(-30px, -30px); transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1); pointer-events: none; visibility: hidden;">
        <h2 style="font-size: clamp(2rem, 5vw, 4rem); font-weight: 900; margin: 0; background: linear-gradient(135deg, var(--accent), var(--primary)); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; text-shadow: 0 0 30px rgba(16, 185, 129, 0.5);">
            İnovasyon Merkezi
        </h2>
    </div>
    
    <div id="video-text-4" class="video-text video-text-bottom-right" style="position: absolute; bottom: 20%; right: 10%; z-index: 10; opacity: 0; transform: translate(30px, 30px); transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1); pointer-events: none; visibility: hidden;">
        <h2 style="font-size: clamp(2rem, 5vw, 4rem); font-weight: 900; margin: 0; background: linear-gradient(135deg, var(--primary), var(--accent)); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; text-shadow: 0 0 30px rgba(0, 212, 255, 0.5);">
            ATATech Club
        </h2>
    </div>
</section>

<!-- Content Sections (Scroll ile görünecek) -->
<div id="scroll-content" style="position: relative; z-index: 2; background: var(--bg-dark); margin-top: 0;">

    <!-- Hero Section (Video sonrası) - Dynamic -->
    <section class="hero-dynamic" style="min-height: 70vh; display: flex; align-items: center; justify-content: center; padding: 4rem 2rem; position: relative; overflow: hidden;">
        <!-- Animated Background -->
        <div class="hero-bg-animated"></div>
        
        <div class="container" style="max-width: 1200px; text-align: center; position: relative; z-index: 2;">
            <div class="hero-badge reveal" style="display: inline-block; padding: 0.5rem 1.5rem; background: rgba(0, 212, 255, 0.1); border: 1px solid rgba(0, 212, 255, 0.3); border-radius: 50px; margin-bottom: 2rem; font-size: 0.9rem; color: var(--primary); animation: pulse-glow 2s ease-in-out infinite;">
                ✨ Teknoloji Topluluğu
            </div>
            <h2 class="section-title reveal hero-title-dynamic" style="font-size: clamp(2.5rem, 7vw, 5rem); margin-bottom: 2rem; font-weight: 900; letter-spacing: -1px; line-height: 1.1;">
                <span class="gradient-text">Teknoloji Tutkunlarının</span><br>
                <span class="gradient-text-secondary">Buluşma Noktası</span>
            </h2>
            <p class="section-subtitle reveal" style="font-size: 1.3rem; color: var(--text-secondary); margin-bottom: 3rem; max-width: 700px; margin-left: auto; margin-right: auto; line-height: 1.8;">
                İnovasyon, yaratıcılık ve gelecek burada. <strong style="color: var(--primary);">ATATech Club</strong> ile teknoloji dünyasında fark yarat.
            </p>
            <div class="hero-cta reveal" style="display: flex; gap: 1.5rem; justify-content: center; flex-wrap: wrap;">
                <a href="/atatech/basvuru" class="btn btn-primary btn-glow" style="font-size: 1.2rem; padding: 1.2rem 3rem; position: relative; overflow: hidden;">
                    <span style="position: relative; z-index: 2;">Kulübe Katıl</span>
                </a>
                <a href="/atatech/etkinlikler" class="btn btn-outline btn-hover-glow" style="font-size: 1.2rem; padding: 1.2rem 3rem;">
                    Etkinlikleri Keşfet
                </a>
            </div>
        </div>
    </section>

    <!-- Stats Section - Dynamic -->
    <section class="stats-dynamic" style="padding: 6rem 2rem; background: linear-gradient(180deg, var(--bg-dark) 0%, var(--bg-darker) 100%); position: relative; overflow: hidden;">
        <!-- Background Pattern -->
        <div class="stats-bg-pattern"></div>
        
        <div class="stats-container" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 2rem; max-width: 1200px; margin: 0 auto; position: relative; z-index: 2;">
            <div class="stat-card-dynamic reveal" style="background: linear-gradient(135deg, rgba(0, 212, 255, 0.1) 0%, rgba(147, 51, 234, 0.1) 100%); border: 1px solid rgba(0, 212, 255, 0.2); border-radius: 20px; padding: 2.5rem; text-align: center; transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1); position: relative; overflow: hidden;">
                <div class="stat-card-glow" style="position: absolute; top: -50%; left: -50%; width: 200%; height: 200%; background: radial-gradient(circle, rgba(0, 212, 255, 0.1) 0%, transparent 70%); opacity: 0; transition: opacity 0.4s;"></div>
                <div class="stat-icon" style="font-size: 3rem; margin-bottom: 1rem; filter: drop-shadow(0 0 10px rgba(0, 212, 255, 0.5));">👥</div>
                <div class="stat-number" data-target="<?= $stats['members'] ?>" style="font-size: 3.5rem; font-weight: 900; background: linear-gradient(135deg, var(--primary), var(--secondary)); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; margin-bottom: 0.5rem;">0</div>
                <div class="stat-label" style="font-size: 1.1rem; color: var(--text-secondary); font-weight: 500;">Aktif Üye</div>
            </div>
            <div class="stat-card-dynamic reveal" style="background: linear-gradient(135deg, rgba(147, 51, 234, 0.1) 0%, rgba(16, 185, 129, 0.1) 100%); border: 1px solid rgba(147, 51, 234, 0.2); border-radius: 20px; padding: 2.5rem; text-align: center; transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1); position: relative; overflow: hidden;">
                <div class="stat-card-glow" style="position: absolute; top: -50%; left: -50%; width: 200%; height: 200%; background: radial-gradient(circle, rgba(147, 51, 234, 0.1) 0%, transparent 70%); opacity: 0; transition: opacity 0.4s;"></div>
                <div class="stat-icon" style="font-size: 3rem; margin-bottom: 1rem; filter: drop-shadow(0 0 10px rgba(147, 51, 234, 0.5));">🎉</div>
                <div class="stat-number" data-target="<?= $stats['events'] ?>" style="font-size: 3.5rem; font-weight: 900; background: linear-gradient(135deg, var(--secondary), var(--accent)); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; margin-bottom: 0.5rem;">0</div>
                <div class="stat-label" style="font-size: 1.1rem; color: var(--text-secondary); font-weight: 500;">Yapılan Etkinlik</div>
            </div>
            <div class="stat-card-dynamic reveal" style="background: linear-gradient(135deg, rgba(16, 185, 129, 0.1) 0%, rgba(0, 212, 255, 0.1) 100%); border: 1px solid rgba(16, 185, 129, 0.2); border-radius: 20px; padding: 2.5rem; text-align: center; transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1); position: relative; overflow: hidden;">
                <div class="stat-card-glow" style="position: absolute; top: -50%; left: -50%; width: 200%; height: 200%; background: radial-gradient(circle, rgba(16, 185, 129, 0.1) 0%, transparent 70%); opacity: 0; transition: opacity 0.4s;"></div>
                <div class="stat-icon" style="font-size: 3rem; margin-bottom: 1rem; filter: drop-shadow(0 0 10px rgba(16, 185, 129, 0.5));">🚀</div>
                <div class="stat-number" data-target="<?= $stats['projects'] ?>" style="font-size: 3.5rem; font-weight: 900; background: linear-gradient(135deg, var(--accent), var(--primary)); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; margin-bottom: 0.5rem;">0</div>
                <div class="stat-label" style="font-size: 1.1rem; color: var(--text-secondary); font-weight: 500;">Devam Eden Proje</div>
            </div>
        </div>
    </section>

    <!-- Featured Events -->
    <?php if (!empty($featuredEvents)): ?>
    <section class="section section-events-dynamic" style="padding: 6rem 2rem; position: relative; overflow: hidden;">
        <div class="container">
            <div class="section-header reveal" style="text-align: center; margin-bottom: 4rem;">
                <h2 class="section-title" style="font-size: clamp(2.5rem, 6vw, 4rem); font-weight: 900; margin-bottom: 1rem; background: linear-gradient(135deg, var(--primary), var(--secondary)); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
                    Öne Çıkan Etkinlikler
                </h2>
                <div class="title-underline" style="width: 100px; height: 4px; background: linear-gradient(90deg, var(--primary), var(--secondary)); margin: 0 auto 1rem; border-radius: 2px;"></div>
                <p class="section-subtitle" style="font-size: 1.2rem; color: var(--text-secondary);">Yaklaşan etkinliklerimizi kaçırma! 🚀</p>
            </div>
            
            <div class="events-grid">
                <?php foreach ($featuredEvents as $event): ?>
                <div class="event-card reveal" style="background: linear-gradient(135deg, rgba(0, 212, 255, 0.05) 0%, rgba(147, 51, 234, 0.05) 100%); border: 1px solid rgba(0, 212, 255, 0.2);">
                    <?php if ($event['poster']): ?>
                        <div style="position: relative; overflow: hidden;">
                            <img src="<?= htmlspecialchars($event['poster']) ?>" alt="<?= htmlspecialchars($event['title']) ?>" class="event-poster">
                            <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(0deg, rgba(10, 10, 15, 0.3) 0%, transparent 50%); pointer-events: none;"></div>
                        </div>
                    <?php endif; ?>
                    <div class="event-content">
                        <div class="event-date" style="display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.5rem 1rem; background: rgba(0, 212, 255, 0.1); border-radius: 20px; margin-bottom: 1rem;">
                            📅 <?= date('d.m.Y H:i', strtotime($event['date'])) ?>
                        </div>
                        <h3 class="event-title" style="font-size: 1.6rem; margin-bottom: 1rem; background: linear-gradient(135deg, var(--primary), var(--text-primary)); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;"><?= htmlspecialchars($event['title']) ?></h3>
                        <p class="event-description" style="line-height: 1.7; margin-bottom: 1.5rem;">
                            <?= htmlspecialchars($event['short_description'] ?? substr($event['description'], 0, 120) . '...') ?>
                        </p>
                        <?php if ($event['location']): ?>
                            <div class="event-location" style="margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.5rem; color: var(--text-secondary);">
                                <span style="font-size: 1.2rem;">📍</span>
                                <span><?= htmlspecialchars($event['location']) ?></span>
                            </div>
                        <?php endif; ?>
                        <a href="/atatech/etkinlikler/<?= $event['id'] ?>" class="btn btn-primary btn-glow" style="width: 100%; text-align: center; position: relative; overflow: hidden;">
                            <span style="position: relative; z-index: 2;">Detaylar →</span>
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- Recent Events -->
    <?php if (!empty($events)): ?>
    <section class="section section-events-dynamic" style="background: linear-gradient(180deg, var(--bg-darker) 0%, var(--bg-dark) 100%); padding: 6rem 2rem; position: relative; overflow: hidden;">
        <div class="container">
            <div class="section-header reveal" style="text-align: center; margin-bottom: 4rem;">
                <h2 class="section-title" style="font-size: clamp(2.5rem, 6vw, 4rem); font-weight: 900; margin-bottom: 1rem; background: linear-gradient(135deg, var(--secondary), var(--accent)); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
                    Son Etkinlikler
                </h2>
                <div class="title-underline" style="width: 100px; height: 4px; background: linear-gradient(90deg, var(--secondary), var(--accent)); margin: 0 auto 1rem; border-radius: 2px;"></div>
                <p class="section-subtitle" style="font-size: 1.2rem; color: var(--text-secondary);">Yakında gerçekleşecek etkinlikler ✨</p>
            </div>
            
            <div class="events-grid">
                <?php foreach (array_slice($events, 0, 6) as $event): ?>
                <div class="event-card reveal" style="background: linear-gradient(135deg, rgba(147, 51, 234, 0.05) 0%, rgba(16, 185, 129, 0.05) 100%); border: 1px solid rgba(147, 51, 234, 0.2);">
                    <?php if ($event['poster']): ?>
                        <div style="position: relative; overflow: hidden;">
                            <img src="<?= htmlspecialchars($event['poster']) ?>" alt="<?= htmlspecialchars($event['title']) ?>" class="event-poster">
                            <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(0deg, rgba(10, 10, 15, 0.3) 0%, transparent 50%); pointer-events: none;"></div>
                        </div>
                    <?php endif; ?>
                    <div class="event-content">
                        <?php if ($event['is_featured']): ?>
                            <span class="event-featured" style="position: absolute; top: 1rem; right: 1rem; background: linear-gradient(135deg, var(--accent), var(--primary)); color: white; padding: 0.5rem 1rem; border-radius: 20px; font-size: 0.85rem; font-weight: 600; z-index: 3; box-shadow: 0 4px 15px rgba(16, 185, 129, 0.3);">⭐ Öne Çıkan</span>
                        <?php endif; ?>
                        <div class="event-date" style="display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.5rem 1rem; background: rgba(147, 51, 234, 0.1); border-radius: 20px; margin-bottom: 1rem;">
                            📅 <?= date('d.m.Y H:i', strtotime($event['date'])) ?>
                        </div>
                        <h3 class="event-title" style="font-size: 1.6rem; margin-bottom: 1rem; background: linear-gradient(135deg, var(--secondary), var(--text-primary)); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;"><?= htmlspecialchars($event['title']) ?></h3>
                        <p class="event-description" style="line-height: 1.7; margin-bottom: 1.5rem;">
                            <?= htmlspecialchars($event['short_description'] ?? substr($event['description'], 0, 120) . '...') ?>
                        </p>
                        <?php if ($event['location']): ?>
                            <div class="event-location" style="margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.5rem; color: var(--text-secondary);">
                                <span style="font-size: 1.2rem;">📍</span>
                                <span><?= htmlspecialchars($event['location']) ?></span>
                            </div>
                        <?php endif; ?>
                        <a href="/atatech/etkinlikler/<?= $event['id'] ?>" class="btn btn-outline btn-hover-glow" style="width: 100%; text-align: center;">Detaylar →</a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            
            <div class="text-center mt-2">
                <a href="/atatech/etkinlikler" class="btn btn-primary">Tüm Etkinlikleri Gör</a>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- About Section - Dynamic -->
    <section class="section-about-dynamic" style="padding: 6rem 2rem; position: relative; overflow: hidden;">
        <div class="container" style="max-width: 1200px; margin: 0 auto;">
            <div class="section-header reveal" style="text-align: center; margin-bottom: 4rem;">
                <h2 class="section-title" style="font-size: clamp(2.5rem, 6vw, 4rem); font-weight: 900; margin-bottom: 1rem; background: linear-gradient(135deg, var(--primary), var(--secondary)); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
                    Biz Kimiz?
                </h2>
                <div class="title-underline" style="width: 100px; height: 4px; background: linear-gradient(90deg, var(--primary), var(--secondary)); margin: 0 auto; border-radius: 2px;"></div>
            </div>
            
            <div class="reveal" style="max-width: 900px; margin: 0 auto;">
                <p style="font-size: 1.3rem; color: var(--text-secondary); line-height: 1.9; margin-bottom: 4rem; text-align: center;">
                    <strong style="color: var(--primary);">ATATech Club</strong>, teknolojiye tutkulu öğrencilerin bir araya geldiği, projeler geliştirdiği, 
                    etkinlikler düzenlediği ve birlikte büyüdüğü bir topluluktur. Amacımız, teknoloji dünyasında 
                    fark yaratmak ve geleceği şekillendirmektir.
                </p>
                
                <div class="values-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 2rem; margin-top: 3rem;">
                    <div class="value-card" style="background: linear-gradient(135deg, rgba(0, 212, 255, 0.1) 0%, rgba(0, 212, 255, 0.05) 100%); border: 1px solid rgba(0, 212, 255, 0.2); border-radius: 20px; padding: 2.5rem; text-align: center; transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1); position: relative; overflow: hidden;">
                        <div class="value-icon" style="font-size: 4rem; margin-bottom: 1.5rem; filter: drop-shadow(0 0 20px rgba(0, 212, 255, 0.5));">🎯</div>
                        <h3 style="color: var(--primary); margin-bottom: 1rem; font-size: 1.5rem; font-weight: 700;">Vizyon</h3>
                        <p style="color: var(--text-secondary); line-height: 1.7; font-size: 1.05rem;">Teknoloji alanında öncü bir topluluk olmak</p>
                    </div>
                    <div class="value-card" style="background: linear-gradient(135deg, rgba(147, 51, 234, 0.1) 0%, rgba(147, 51, 234, 0.05) 100%); border: 1px solid rgba(147, 51, 234, 0.2); border-radius: 20px; padding: 2.5rem; text-align: center; transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1); position: relative; overflow: hidden;">
                        <div class="value-icon" style="font-size: 4rem; margin-bottom: 1.5rem; filter: drop-shadow(0 0 20px rgba(147, 51, 234, 0.5));">💡</div>
                        <h3 style="color: var(--secondary); margin-bottom: 1rem; font-size: 1.5rem; font-weight: 700;">Misyon</h3>
                        <p style="color: var(--text-secondary); line-height: 1.7; font-size: 1.05rem;">Öğrencilere teknoloji dünyasında fırsatlar sunmak</p>
                    </div>
                    <div class="value-card" style="background: linear-gradient(135deg, rgba(16, 185, 129, 0.1) 0%, rgba(16, 185, 129, 0.05) 100%); border: 1px solid rgba(16, 185, 129, 0.2); border-radius: 20px; padding: 2.5rem; text-align: center; transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1); position: relative; overflow: hidden;">
                        <div class="value-icon" style="font-size: 4rem; margin-bottom: 1.5rem; filter: drop-shadow(0 0 20px rgba(16, 185, 129, 0.5));">🚀</div>
                        <h3 style="color: var(--accent); margin-bottom: 1rem; font-size: 1.5rem; font-weight: 700;">Değerler</h3>
                        <p style="color: var(--text-secondary); line-height: 1.7; font-size: 1.05rem;">İnovasyon, işbirliği ve sürekli öğrenme</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<style>
/* Video Text Animations */
.video-text {
    will-change: opacity, transform;
}

.video-text-top-left {
    animation: textFadeInTopLeft 0.8s cubic-bezier(0.4, 0, 0.2, 1);
}

.video-text-bottom-right {
    animation: textFadeInBottomRight 0.8s cubic-bezier(0.4, 0, 0.2, 1);
}

@keyframes textFadeInTopLeft {
    from {
        opacity: 0;
        transform: translate(-30px, -30px);
    }
    to {
        opacity: 1;
        transform: translate(0, 0);
    }
}

@keyframes textFadeInBottomRight {
    from {
        opacity: 0;
        transform: translate(30px, 30px);
    }
    to {
        opacity: 1;
        transform: translate(0, 0);
    }
}

/* Dynamic Hero Section */
.hero-dynamic {
    background: linear-gradient(180deg, rgba(10, 10, 15, 0) 0%, rgba(10, 10, 15, 0.3) 50%, rgba(10, 10, 15, 1) 100%);
    position: relative;
}

.hero-bg-animated {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: 
        radial-gradient(circle at 20% 50%, rgba(0, 212, 255, 0.1) 0%, transparent 50%),
        radial-gradient(circle at 80% 80%, rgba(147, 51, 234, 0.1) 0%, transparent 50%);
    animation: float-bg 20s ease-in-out infinite;
    z-index: 1;
}

@keyframes float-bg {
    0%, 100% { transform: translate(0, 0) scale(1); }
    50% { transform: translate(20px, -20px) scale(1.1); }
}

@keyframes pulse-glow {
    0%, 100% { 
        box-shadow: 0 0 20px rgba(0, 212, 255, 0.3);
    }
    50% { 
        box-shadow: 0 0 30px rgba(0, 212, 255, 0.6);
    }
}

.gradient-text {
    background: linear-gradient(135deg, var(--primary), var(--secondary));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    display: inline-block;
}

.gradient-text-secondary {
    background: linear-gradient(135deg, var(--secondary), var(--accent));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    display: inline-block;
}

.btn-glow {
    position: relative;
    overflow: hidden;
}

.btn-glow::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 0;
    height: 0;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.3);
    transform: translate(-50%, -50%);
    transition: width 0.6s, height 0.6s;
}

.btn-glow:hover::before {
    width: 300px;
    height: 300px;
}

.btn-hover-glow:hover {
    box-shadow: 0 0 30px rgba(0, 212, 255, 0.5);
    transform: translateY(-2px);
}

/* Stats Dynamic */
.stats-bg-pattern {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: 
        linear-gradient(rgba(0, 212, 255, 0.03) 1px, transparent 1px),
        linear-gradient(90deg, rgba(0, 212, 255, 0.03) 1px, transparent 1px);
    background-size: 50px 50px;
    animation: pattern-move 20s linear infinite;
    z-index: 1;
}

@keyframes pattern-move {
    0% { transform: translate(0, 0); }
    100% { transform: translate(50px, 50px); }
}

.stat-card-dynamic:hover {
    transform: translateY(-10px) scale(1.02);
    border-color: rgba(0, 212, 255, 0.5) !important;
    box-shadow: 0 20px 40px rgba(0, 212, 255, 0.2);
}

.stat-card-dynamic:hover .stat-card-glow {
    opacity: 1;
}

.stat-card-dynamic:hover .stat-icon {
    transform: scale(1.1) rotate(5deg);
    transition: transform 0.4s;
}

/* Value Cards */
.value-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 15px 35px rgba(0, 212, 255, 0.15);
    border-color: rgba(0, 212, 255, 0.4) !important;
}

.value-card:hover .value-icon {
    transform: scale(1.15) rotate(-5deg);
    transition: transform 0.4s;
}

/* Reveal Animation */
.reveal {
    opacity: 0;
    transform: translateY(30px);
    transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
}

.reveal.active {
    opacity: 1;
    transform: translateY(0);
}

/* Event Cards Enhancement */
.event-card {
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
}

.event-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(0, 212, 255, 0.1), transparent);
    transition: left 0.5s;
    z-index: 1;
}

.event-card:hover::before {
    left: 100%;
}

.event-card:hover {
    transform: translateY(-10px) scale(1.02);
    box-shadow: 0 20px 40px rgba(0, 212, 255, 0.3);
    border-color: var(--primary) !important;
}

.event-poster {
    transition: transform 0.4s;
    position: relative;
    z-index: 0;
}

.event-card:hover .event-poster {
    transform: scale(1.08);
    filter: brightness(1.1);
}

.event-content {
    position: relative;
    z-index: 2;
}

/* Section Headers */
.section-header {
    position: relative;
}

.title-underline {
    animation: underline-grow 1s ease-out;
}

@keyframes underline-grow {
    from {
        width: 0;
        opacity: 0;
    }
    to {
        width: 100px;
        opacity: 1;
    }
}
</style>

<!-- Video Scroll Script -->
<script src="/atatech/public/js/video-scroll.js"></script>
<script>
// Video'yu kesinlikle görünür yap ve yükle
(function() {
    function initVideo() {
        const video = document.getElementById('scroll-video');
        if (!video) {
            console.error('❌ Video elementi bulunamadı!');
            return;
        }
        
        console.log('🎥 Video elementi bulundu');
        
        // Video'yu görünür yap - kaliteyi koru
        video.style.cssText = 'position: absolute !important; top: 0 !important; left: 0 !important; width: 100% !important; height: 100% !important; object-fit: cover !important; object-position: center !important; z-index: 1 !important; opacity: 1 !important; display: block !important; visibility: visible !important; background: #0a0a0f !important;';
        
        // Video kalitesi için ek CSS
        video.style.setProperty('image-rendering', '-webkit-optimize-contrast', 'important');
        video.style.setProperty('-webkit-backface-visibility', 'hidden', 'important');
        video.style.setProperty('backface-visibility', 'hidden', 'important');
        video.style.setProperty('transform', 'translateZ(0)', 'important');
        video.style.setProperty('will-change', 'transform', 'important');
        
        // Video src kontrolü - source element ekle
        const sources = video.querySelectorAll('source');
        if (sources.length === 0) {
            const source = document.createElement('source');
            source.src = '/atatech/animasyon.mp4';
            source.type = 'video/mp4';
            video.appendChild(source);
            console.log('📹 Video source elementi eklendi');
        }
        
        // Video src kontrolü
        if (!video.currentSrc && !video.src) {
            video.src = '/atatech/animasyon.mp4';
            console.log('📹 Video src direkt ayarlandı:', video.src);
        }
        
        // Video kalitesini artır
        video.setAttribute('playsinline', '');
        video.setAttribute('webkit-playsinline', '');
        
        // Video'yu yükle
        video.load();
        console.log('📹 Video load() çağrıldı');
        
        // Video event'leri
        video.addEventListener('loadedmetadata', () => {
            console.log('✅ Video metadata yüklendi');
            console.log('Video süresi:', video.duration);
            video.style.opacity = '1';
            video.style.display = 'block';
        });
        
        video.addEventListener('canplay', () => {
            console.log('✅ Video oynatılmaya hazır');
            video.style.opacity = '1';
            video.style.display = 'block';
        });
        
        video.addEventListener('error', (e) => {
            console.error('❌ Video hatası:', e);
            console.error('Video src:', video.src);
            console.error('Video currentSrc:', video.currentSrc);
            if (video.error) {
                console.error('Error code:', video.error.code);
                console.error('Error message:', video.error.message);
            }
        });
        
        console.log('Video src:', video.src);
        console.log('Video currentSrc:', video.currentSrc);
        console.log('Video readyState:', video.readyState);
    }
    
    // Hemen çalıştır
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initVideo);
    } else {
        initVideo();
    }
    
    // Window load'da da çalıştır
    window.addEventListener('load', initVideo);
    
    // Birkaç kez daha dene
    setTimeout(initVideo, 100);
    setTimeout(initVideo, 500);
    setTimeout(initVideo, 1000);
})();
</script>
