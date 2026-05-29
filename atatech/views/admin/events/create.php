<div>
    <h1 style="font-size: 2.5rem; margin-bottom: 2rem; background: linear-gradient(135deg, var(--primary), var(--secondary)); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
        Yeni Etkinlik Ekle
    </h1>
    
    <form method="POST" action="/atatech/admin/events" enctype="multipart/form-data" style="background: var(--bg-card); padding: 2rem; border-radius: 20px; border: 1px solid var(--border); max-width: 800px;">
        <div class="form-group">
            <label class="form-label">Başlık *</label>
            <input type="text" name="title" class="form-input" required>
        </div>
        
        <div class="form-group">
            <label class="form-label">Kısa Açıklama</label>
            <textarea name="short_description" class="form-textarea" rows="2" placeholder="Kart görünümünde gösterilecek kısa açıklama"></textarea>
        </div>
        
        <div class="form-group">
            <label class="form-label">Açıklama</label>
            <textarea name="description" class="form-textarea" rows="6" placeholder="Detaylı etkinlik açıklaması"></textarea>
        </div>
        
        <div class="form-group">
            <label class="form-label">Afiş</label>
            <input type="file" name="poster" class="form-input" accept="image/*">
        </div>
        
        <div class="form-group">
            <label class="form-label">Tarih ve Saat *</label>
            <input type="datetime-local" name="date" class="form-input" required>
        </div>
        
        <div class="form-group">
            <label class="form-label">Konum</label>
            <input type="text" name="location" class="form-input" placeholder="Etkinlik konumu">
        </div>
        
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
            <div class="form-group">
                <label class="form-label">Enlem (Latitude)</label>
                <input type="number" step="any" name="location_lat" class="form-input" placeholder="41.0082">
            </div>
            
            <div class="form-group">
                <label class="form-label">Boylam (Longitude)</label>
                <input type="number" step="any" name="location_lng" class="form-input" placeholder="28.9784">
            </div>
        </div>
        
        <div class="form-group">
            <label class="form-label">Kapasite</label>
            <input type="number" name="capacity" class="form-input" min="0" placeholder="Maksimum katılımcı sayısı">
        </div>
        
        <div class="form-group">
            <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer;">
                <input type="checkbox" name="is_featured" value="1" style="width: 20px; height: 20px;">
                <span>Öne Çıkan Etkinlik</span>
            </label>
        </div>
        
        <div class="form-group">
            <label class="form-label">Durum</label>
            <select name="status" class="form-select">
                <option value="active">Aktif</option>
                <option value="draft">Taslak</option>
            </select>
        </div>
        
        <div style="display: flex; gap: 1rem; margin-top: 2rem;">
            <a href="/atatech/admin/events" class="btn btn-outline" style="flex: 1;">İptal</a>
            <button type="submit" class="btn btn-primary" style="flex: 1;">Kaydet</button>
        </div>
    </form>
</div>
