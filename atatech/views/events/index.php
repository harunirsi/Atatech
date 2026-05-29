<section class="section" style="padding-top: 8rem;">
    <div class="container">
        <h1 class="section-title reveal">Etkinlikler</h1>
        <p class="section-subtitle reveal">Geçmiş ve yaklaşan tüm etkinliklerimiz</p>
        
        <!-- Filter Buttons -->
        <div class="text-center mb-2" style="display: flex; justify-content: center; gap: 1rem; flex-wrap: wrap;">
            <a href="/atatech/etkinlikler?filter=all" 
               class="btn <?= $filter === 'all' ? 'btn-primary' : 'btn-outline' ?>">
                Tümü
            </a>
            <a href="/atatech/etkinlikler?filter=upcoming" 
               class="btn <?= $filter === 'upcoming' ? 'btn-primary' : 'btn-outline' ?>">
                Yaklaşan
            </a>
            <a href="/atatech/etkinlikler?filter=past" 
               class="btn <?= $filter === 'past' ? 'btn-primary' : 'btn-outline' ?>">
                Geçmiş
            </a>
        </div>
        
        <?php if (empty($events)): ?>
            <div class="text-center" style="padding: 4rem 2rem;">
                <p style="color: var(--text-secondary); font-size: 1.2rem;">Henüz etkinlik eklenmemiş.</p>
            </div>
        <?php else: ?>
            <div class="events-grid">
                <?php foreach ($events as $event): 
                    $isUpcoming = strtotime($event['date']) > time();
                    $isPast = strtotime($event['date']) < time();
                ?>
                <div class="event-card reveal">
                    <?php if ($event['poster']): ?>
                        <img src="<?= htmlspecialchars($event['poster']) ?>" alt="<?= htmlspecialchars($event['title']) ?>" class="event-poster">
                    <?php else: ?>
                        <div class="event-poster" style="background: linear-gradient(135deg, var(--primary), var(--secondary)); display: flex; align-items: center; justify-content: center; color: white; font-size: 3rem;">
                            🎉
                        </div>
                    <?php endif; ?>
                    
                    <div class="event-content">
                        <?php if ($event['is_featured']): ?>
                            <span class="event-featured">⭐ Öne Çıkan</span>
                        <?php endif; ?>
                        
                        <div class="event-date">
                            📅 <?= date('d.m.Y H:i', strtotime($event['date'])) ?>
                            <?php if ($isUpcoming): ?>
                                <span style="color: var(--accent); margin-left: 1rem;">● Yaklaşan</span>
                            <?php elseif ($isPast): ?>
                                <span style="color: var(--text-secondary); margin-left: 1rem;">● Geçmiş</span>
                            <?php endif; ?>
                        </div>
                        
                        <h3 class="event-title"><?= htmlspecialchars($event['title']) ?></h3>
                        
                        <p class="event-description">
                            <?= htmlspecialchars($event['short_description'] ?? substr($event['description'], 0, 150) . '...') ?>
                        </p>
                        
                        <?php if ($event['location']): ?>
                            <div class="event-location">📍 <?= htmlspecialchars($event['location']) ?></div>
                        <?php endif; ?>
                        
                        <?php if ($event['capacity']): ?>
                            <div style="color: var(--text-secondary); font-size: 0.9rem; margin-bottom: 1rem;">
                                👥 Kapasite: <?= $event['capacity'] ?> kişi
                                <?php if ($event['registered_count']): ?>
                                    (<?= $event['registered_count'] ?> kayıtlı)
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                        
                        <a href="/atatech/etkinlikler/<?= $event['id'] ?>" class="btn btn-primary" style="width: 100%; text-align: center;">
                            Detayları Gör
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
