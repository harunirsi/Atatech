<?php
$eventDate = date('Y-m-d\TH:i', strtotime($event['date']));
?>

<div>
    <h1 style="font-size: 2.5rem; margin-bottom: 2rem; background: linear-gradient(135deg, var(--primary), var(--secondary)); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
        Etkinlik Düzenle
    </h1>
    
    <form method="POST" action="/atatech/admin/events/<?= $event['id'] ?>" enctype="multipart/form-data" style="background: var(--bg-card); padding: 2rem; border-radius: 20px; border: 1px solid var(--border); max-width: 800px;">
        <div class="form-group">
            <label class="form-label">Başlık *</label>
            <input type="text" name="title" class="form-input" required value="<?= htmlspecialchars($event['title']) ?>">
        </div>
        
        <div class="form-group">
            <label class="form-label">Kısa Açıklama</label>
            <textarea name="short_description" class="form-textarea" rows="2"><?= htmlspecialchars($event['short_description'] ?? '') ?></textarea>
        </div>
        
        <div class="form-group">
            <label class="form-label">Açıklama</label>
            <textarea name="description" class="form-textarea" rows="6"><?= htmlspecialchars($event['description'] ?? '') ?></textarea>
        </div>
        
        <div class="form-group">
            <label class="form-label">Afiş</label>
            <?php if ($event['poster']): ?>
                <div style="margin-bottom: 1rem;"><img src="<?= htmlspecialchars($event['poster']) ?>" style="max-width: 300px; border-radius: 10px; border: 2px solid var(--primary);"></div>
            <?php endif; ?>
            <input type="file" name="poster" class="form-input" accept="image/*">
        </div>
        
        <div class="form-group">
            <label class="form-label">Tarih ve Saat *</label>
            <input type="datetime-local" name="date" class="form-input" required value="<?= $eventDate ?>">
        </div>
        
        <div class="form-group">
            <label class="form-label">Konum</label>
            <input type="text" name="location" class="form-input" value="<?= htmlspecialchars($event['location'] ?? '') ?>">
        </div>
        
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
            <div class="form-group">
                <label class="form-label">Enlem</label>
                <input type="number" step="any" name="location_lat" class="form-input" value="<?= $event['location_lat'] ?? '' ?>">
            </div>
            
            <div class="form-group">
                <label class="form-label">Boylam</label>
                <input type="number" step="any" name="location_lng" class="form-input" value="<?= $event['location_lng'] ?? '' ?>">
            </div>
        </div>
        
        <div class="form-group">
            <label class="form-label">Kapasite</label>
            <input type="number" name="capacity" class="form-input" value="<?= $event['capacity'] ?? '' ?>" min="0">
        </div>
        
        <div class="form-group">
            <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer;">
                <input type="checkbox" name="is_featured" value="1" <?= $event['is_featured'] ? 'checked' : '' ?> style="width: 20px; height: 20px;">
                <span>Öne Çıkan Etkinlik</span>
            </label>
        </div>
        
        <div class="form-group">
            <label class="form-label">Durum</label>
            <select name="status" class="form-select">
                <option value="active" <?= $event['status'] === 'active' ? 'selected' : '' ?>>Aktif</option>
                <option value="draft" <?= $event['status'] === 'draft' ? 'selected' : '' ?>>Taslak</option>
                <option value="cancelled" <?= $event['status'] === 'cancelled' ? 'selected' : '' ?>>İptal</option>
            </select>
        </div>
        
        <div style="display: flex; gap: 1rem; margin-top: 2rem;">
            <a href="/atatech/admin/events" class="btn btn-outline" style="flex: 1;">İptal</a>
            <button type="submit" class="btn btn-primary" style="flex: 1;">Güncelle</button>
        </div>
    </form>
</div>
