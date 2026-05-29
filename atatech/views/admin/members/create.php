<div>
    <h1 style="font-size: 2.5rem; margin-bottom: 2rem; background: linear-gradient(135deg, var(--primary), var(--secondary)); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
        Yeni Kurul Üyesi Ekle
    </h1>
    
    <form method="POST" action="/atatech/admin/members" enctype="multipart/form-data" style="background: var(--bg-card); padding: 2rem; border-radius: 20px; border: 1px solid var(--border); max-width: 800px;">
        <div class="form-group">
            <label class="form-label">Ad Soyad *</label>
            <input type="text" name="name" class="form-input" required>
        </div>
        
        <div class="form-group">
            <label class="form-label">Görev *</label>
            <input type="text" name="position" class="form-input" required placeholder="Örn: Başkan, Başkan Yardımcısı">
        </div>
        
        <div class="form-group">
            <label class="form-label">Fotoğraf</label>
            <input type="file" name="photo" class="form-input" accept="image/*">
        </div>
        
        <div class="form-group">
            <label class="form-label">Vizyon</label>
            <textarea name="vision" class="form-textarea" rows="3" placeholder="Kısa vizyon cümlesi"></textarea>
        </div>
        
        <div class="form-group">
            <label class="form-label">LinkedIn URL</label>
            <input type="url" name="linkedin" class="form-input" placeholder="https://linkedin.com/in/...">
        </div>
        
        <div class="form-group">
            <label class="form-label">GitHub URL</label>
            <input type="url" name="github" class="form-input" placeholder="https://github.com/...">
        </div>
        
        <div class="form-group">
            <label class="form-label">E-posta</label>
            <input type="email" name="email" class="form-input" placeholder="ornek@email.com">
        </div>
        
        <div class="form-group">
            <label class="form-label">Biyografi</label>
            <textarea name="bio" class="form-textarea" rows="5" placeholder="Detaylı biyografi"></textarea>
        </div>
        
        <div class="form-group">
            <label class="form-label">Sıralama</label>
            <input type="number" name="position_order" class="form-input" value="0" min="0">
            <small style="color: var(--text-secondary);">Düşük sayılar önce görünür</small>
        </div>
        
        <div style="display: flex; gap: 1rem; margin-top: 2rem;">
            <a href="/atatech/admin/members" class="btn btn-outline" style="flex: 1;">İptal</a>
            <button type="submit" class="btn btn-primary" style="flex: 1;">Kaydet</button>
        </div>
    </form>
</div>
