<div>
    <h1 style="font-size: 2.5rem; margin-bottom: 2rem; background: linear-gradient(135deg, var(--primary), var(--secondary)); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
        Kurul Üyesi Düzenle
    </h1>
    
    <form method="POST" action="/atatech/admin/members/<?= $member['id'] ?>" enctype="multipart/form-data" style="background: var(--bg-card); padding: 2rem; border-radius: 20px; border: 1px solid var(--border); max-width: 800px;">
        <div class="form-group">
            <label class="form-label">Ad Soyad *</label>
            <input type="text" name="name" class="form-input" required value="<?= htmlspecialchars($member['name']) ?>">
        </div>
        
        <div class="form-group">
            <label class="form-label">Görev *</label>
            <input type="text" name="position" class="form-input" required value="<?= htmlspecialchars($member['position']) ?>">
        </div>
        
        <div class="form-group">
            <label class="form-label">Fotoğraf</label>
            <?php if ($member['photo']): ?>
                <div style="margin-bottom: 1rem;"><img src="<?= htmlspecialchars($member['photo']) ?>" style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover; border: 2px solid var(--primary);"></div>
            <?php endif; ?>
            <input type="file" name="photo" class="form-input" accept="image/*">
        </div>
        
        <div class="form-group">
            <label class="form-label">Vizyon</label>
            <textarea name="vision" class="form-textarea" rows="3"><?= htmlspecialchars($member['vision'] ?? '') ?></textarea>
        </div>
        
        <div class="form-group">
            <label class="form-label">LinkedIn URL</label>
            <input type="url" name="linkedin" class="form-input" value="<?= htmlspecialchars($member['linkedin'] ?? '') ?>">
        </div>
        
        <div class="form-group">
            <label class="form-label">GitHub URL</label>
            <input type="url" name="github" class="form-input" value="<?= htmlspecialchars($member['github'] ?? '') ?>">
        </div>
        
        <div class="form-group">
            <label class="form-label">E-posta</label>
            <input type="email" name="email" class="form-input" value="<?= htmlspecialchars($member['email'] ?? '') ?>">
        </div>
        
        <div class="form-group">
            <label class="form-label">Biyografi</label>
            <textarea name="bio" class="form-textarea" rows="5"><?= htmlspecialchars($member['bio'] ?? '') ?></textarea>
        </div>
        
        <div class="form-group">
            <label class="form-label">Sıralama</label>
            <input type="number" name="position_order" class="form-input" value="<?= $member['position_order'] ?>" min="0">
        </div>
        
        <div style="display: flex; gap: 1rem; margin-top: 2rem;">
            <a href="/atatech/admin/members" class="btn btn-outline" style="flex: 1;">İptal</a>
            <button type="submit" class="btn btn-primary" style="flex: 1;">Güncelle</button>
        </div>
    </form>
</div>
