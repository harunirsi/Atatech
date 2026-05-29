<div>
    <a href="/atatech/admin/applications" class="btn btn-outline" style="margin-bottom: 2rem;">← Geri</a>
    
    <div style="background: var(--bg-card); padding: 2rem; border-radius: 20px; border: 1px solid var(--border); max-width: 900px;">
        <h1 style="font-size: 2rem; margin-bottom: 2rem; color: var(--primary);">Başvuru Detayları</h1>
        
        <div style="display: grid; gap: 1.5rem;">
            <div>
                <div style="color: var(--text-secondary); margin-bottom: 0.5rem;">Ad Soyad</div>
                <div style="color: var(--text-primary); font-size: 1.2rem; font-weight: 600;"><?= htmlspecialchars($application['name']) ?></div>
            </div>
            
            <div>
                <div style="color: var(--text-secondary); margin-bottom: 0.5rem;">E-posta</div>
                <div style="color: var(--text-primary);"><?= htmlspecialchars($application['email']) ?></div>
            </div>
            
            <div>
                <div style="color: var(--text-secondary); margin-bottom: 0.5rem;">Telefon</div>
                <div style="color: var(--text-primary);"><?= htmlspecialchars($application['phone']) ?></div>
            </div>
            
            <div>
                <div style="color: var(--text-secondary); margin-bottom: 0.5rem;">İlgi Alanları</div>
                <div style="display: flex; gap: 0.5rem; flex-wrap: wrap;">
                    <?php foreach ($application['interests'] as $interest): ?>
                        <span style="background: var(--bg-darker); padding: 0.5rem 1rem; border-radius: 20px; color: var(--text-primary);"><?= htmlspecialchars($interest) ?></span>
                    <?php endforeach; ?>
                </div>
            </div>
            
            <div>
                <div style="color: var(--text-secondary); margin-bottom: 0.5rem;">Yetkinlikler</div>
                <div style="display: flex; flex-direction: column; gap: 1rem;">
                    <?php foreach ($application['skills'] as $skill => $level): ?>
                        <div>
                            <div style="display: flex; justify-content: space-between; margin-bottom: 0.5rem;">
                                <span style="color: var(--text-primary);"><?= htmlspecialchars($skill) ?></span>
                                <span style="color: var(--primary);"><?= $level ?>%</span>
                            </div>
                            <div style="width: 100%; height: 8px; background: var(--bg-darker); border-radius: 4px; overflow: hidden;">
                                <div style="width: <?= $level ?>%; height: 100%; background: linear-gradient(90deg, var(--primary), var(--secondary));"></div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            
            <div>
                <div style="color: var(--text-secondary); margin-bottom: 0.5rem;">Deneyim</div>
                <div style="color: var(--text-primary); white-space: pre-wrap; line-height: 1.6;"><?= nl2br(htmlspecialchars($application['experience'] ?? '')) ?></div>
            </div>
            
            <div>
                <div style="color: var(--text-secondary); margin-bottom: 0.5rem;">Motivasyon</div>
                <div style="color: var(--text-primary); white-space: pre-wrap; line-height: 1.6;"><?= nl2br(htmlspecialchars($application['motivation'])) ?></div>
            </div>
            
            <div>
                <div style="color: var(--text-secondary); margin-bottom: 0.5rem;">Durum</div>
                <span class="status-badge <?= $application['status'] === 'approved' ? 'status-approved' : ($application['status'] === 'rejected' ? 'status-rejected' : 'status-pending') ?>"><?= ucfirst($application['status']) ?></span>
            </div>
            
            <?php if ($application['notes']): ?>
                <div>
                    <div style="color: var(--text-secondary); margin-bottom: 0.5rem;">Notlar</div>
                    <div style="color: var(--text-primary); white-space: pre-wrap; line-height: 1.6;"><?= nl2br(htmlspecialchars($application['notes'])) ?></div>
                </div>
            <?php endif; ?>
        </div>
        
        <form method="POST" action="/atatech/admin/applications/<?= $application['id'] ?>/status" style="margin-top: 2rem; padding-top: 2rem; border-top: 1px solid var(--border);">
            <h2 style="color: var(--primary); margin-bottom: 1rem;">Durum Güncelle</h2>
            
            <div class="form-group">
                <label class="form-label">Durum</label>
                <select name="status" class="form-select">
                    <option value="pending" <?= $application['status'] === 'pending' ? 'selected' : '' ?>>Beklemede</option>
                    <option value="approved" <?= $application['status'] === 'approved' ? 'selected' : '' ?>>Onaylandı</option>
                    <option value="rejected" <?= $application['status'] === 'rejected' ? 'selected' : '' ?>>Reddedildi</option>
                </select>
            </div>
            
            <div class="form-group">
                <label class="form-label">Notlar</label>
                <textarea name="notes" class="form-textarea" rows="4" placeholder="Başvuru hakkında notlar..."><?= htmlspecialchars($application['notes'] ?? '') ?></textarea>
            </div>
            
            <button type="submit" class="btn btn-primary">Güncelle</button>
        </form>
    </div>
</div>
