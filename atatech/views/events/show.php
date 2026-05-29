<?php
$isUpcoming = strtotime($event['date']) > time();
$isPast = strtotime($event['date']) < time();
$timeRemaining = $isUpcoming ? strtotime($event['date']) - time() : 0;
?>

<section class="section" style="padding-top: 8rem;">
    <div class="container" style="max-width: 900px;">
        <a href="/atatech/etkinlikler" class="btn btn-outline" style="margin-bottom: 2rem;">← Tüm Etkinliklere Dön</a>
        
        <div class="reveal">
            <?php if ($event['poster']): ?>
                <img src="<?= htmlspecialchars($event['poster']) ?>" alt="<?= htmlspecialchars($event['title']) ?>" 
                     style="width: 100%; border-radius: 20px; margin-bottom: 2rem; border: 1px solid var(--border);">
            <?php endif; ?>
            
            <div style="display: flex; gap: 1rem; margin-bottom: 2rem; flex-wrap: wrap;">
                <?php if ($event['is_featured']): ?>
                    <span class="event-featured">⭐ Öne Çıkan Etkinlik</span>
                <?php endif; ?>
                <?php if ($isUpcoming): ?>
                    <span style="background: rgba(16, 185, 129, 0.2); color: var(--accent); padding: 0.5rem 1rem; border-radius: 20px; font-size: 0.9rem; font-weight: 600;">
                        🕐 Yaklaşan
                    </span>
                <?php elseif ($isPast): ?>
                    <span style="background: rgba(107, 114, 128, 0.2); color: var(--text-secondary); padding: 0.5rem 1rem; border-radius: 20px; font-size: 0.9rem; font-weight: 600;">
                        ✅ Tamamlandı
                    </span>
                <?php endif; ?>
            </div>
            
            <h1 style="font-size: 2.5rem; margin-bottom: 1rem; background: linear-gradient(135deg, var(--primary), var(--secondary)); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
                <?= htmlspecialchars($event['title']) ?>
            </h1>
            
            <div style="background: var(--bg-card); padding: 2rem; border-radius: 20px; margin-bottom: 2rem; border: 1px solid var(--border);">
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1.5rem;">
                    <div>
                        <div style="color: var(--primary); font-weight: 600; margin-bottom: 0.5rem;">📅 Tarih</div>
                        <div style="color: var(--text-primary);"><?= date('d.m.Y', strtotime($event['date'])) ?></div>
                        <div style="color: var(--text-secondary); font-size: 0.9rem;"><?= date('H:i', strtotime($event['date'])) ?></div>
                    </div>
                    
                    <?php if ($event['location']): ?>
                    <div>
                        <div style="color: var(--primary); font-weight: 600; margin-bottom: 0.5rem;">📍 Konum</div>
                        <div style="color: var(--text-primary);"><?= htmlspecialchars($event['location']) ?></div>
                    </div>
                    <?php endif; ?>
                    
                    <?php if ($event['capacity']): ?>
                    <div>
                        <div style="color: var(--primary); font-weight: 600; margin-bottom: 0.5rem;">👥 Kapasite</div>
                        <div style="color: var(--text-primary);">
                            <?= $event['capacity'] ?> kişi
                            <?php if ($event['registered_count']): ?>
                                <span style="color: var(--text-secondary);">(<?= $event['registered_count'] ?> kayıtlı)</span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            
            <?php if ($isUpcoming && $timeRemaining > 0): ?>
            <div id="countdown" style="background: var(--bg-card); padding: 2rem; border-radius: 20px; margin-bottom: 2rem; border: 1px solid var(--border); text-align: center;">
                <div style="color: var(--primary); font-weight: 600; margin-bottom: 1rem;">⏰ Kalan Süre</div>
                <div id="countdown-timer" style="font-size: 2rem; font-weight: 700; color: var(--accent);"></div>
            </div>
            <?php endif; ?>
            
            <div style="background: var(--bg-card); padding: 2rem; border-radius: 20px; margin-bottom: 2rem; border: 1px solid var(--border);">
                <h2 style="color: var(--primary); margin-bottom: 1rem;">Etkinlik Hakkında</h2>
                <div style="color: var(--text-secondary); line-height: 1.8; white-space: pre-wrap;">
                    <?= nl2br(htmlspecialchars($event['description'])) ?>
                </div>
            </div>
            
            <?php if ($event['location_lat'] && $event['location_lng']): ?>
            <div style="background: var(--bg-card); padding: 2rem; border-radius: 20px; margin-bottom: 2rem; border: 1px solid var(--border);">
                <h2 style="color: var(--primary); margin-bottom: 1rem;">📍 Harita</h2>
                <div id="map" style="width: 100%; height: 400px; border-radius: 10px; overflow: hidden;"></div>
            </div>
            <?php endif; ?>
            
            <?php if (!empty($event['gallery'])): ?>
            <div style="background: var(--bg-card); padding: 2rem; border-radius: 20px; margin-bottom: 2rem; border: 1px solid var(--border);">
                <h2 style="color: var(--primary); margin-bottom: 1rem;">📸 Galeri</h2>
                <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 1rem;">
                    <?php foreach ($event['gallery'] as $image): ?>
                        <img src="<?= htmlspecialchars($image) ?>" alt="Galeri" 
                             style="width: 100%; height: 200px; object-fit: cover; border-radius: 10px; cursor: pointer; transition: transform 0.3s ease;"
                             onmouseover="this.style.transform='scale(1.05)'"
                             onmouseout="this.style.transform='scale(1)'"
                             onclick="window.open(this.src, '_blank')">
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>
            
            <?php if ($isUpcoming): ?>
            <div class="text-center">
                <button class="btn btn-primary" style="font-size: 1.2rem; padding: 1.2rem 3rem;" onclick="alert('Katılım formu yakında aktif olacak!')">
                    🎫 Etkinliğe Katıl
                </button>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php if ($isUpcoming && $timeRemaining > 0): ?>
<script>
function updateCountdown() {
    const now = new Date().getTime();
    const eventDate = new Date('<?= $event['date'] ?>').getTime();
    const distance = eventDate - now;
    
    if (distance < 0) {
        document.getElementById('countdown-timer').textContent = 'Etkinlik başladı!';
        return;
    }
    
    const days = Math.floor(distance / (1000 * 60 * 60 * 24));
    const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
    document.getElementById('countdown-timer').innerHTML = 
        `${days}g ${hours}s ${minutes}d ${seconds}sn`;
}
updateCountdown();
setInterval(updateCountdown, 1000);
</script>
<?php endif; ?>

<?php if ($event['location_lat'] && $event['location_lng']): ?>
<script>
function initMap() {
    const location = { lat: <?= $event['location_lat'] ?>, lng: <?= $event['location_lng'] ?> };
    const map = new google.maps.Map(document.getElementById('map'), {
        zoom: 15,
        center: location,
        styles: [
            { featureType: 'all', elementType: 'geometry', stylers: [{ color: '#1a1a24' }] },
            { featureType: 'all', elementType: 'labels.text.fill', stylers: [{ color: '#ffffff' }] }
        ]
    });
    new google.maps.Marker({ position: location, map: map, title: '<?= htmlspecialchars($event['location']) ?>' });
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap" async defer></script>
<?php endif; ?>
