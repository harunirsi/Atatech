<div>
    <a href="/atatech/admin/messages" class="btn btn-outline" style="margin-bottom: 2rem;">← Geri</a>
    
    <div style="background: var(--bg-card); padding: 2rem; border-radius: 20px; border: 1px solid var(--border); max-width: 900px;">
        <h1 style="font-size: 2rem; margin-bottom: 2rem; color: var(--primary);">Mesaj Detayları</h1>
        
        <div style="display: grid; gap: 1.5rem; margin-bottom: 2rem;">
            <div>
                <div style="color: var(--text-secondary); margin-bottom: 0.5rem;">Gönderen</div>
                <div style="color: var(--text-primary); font-size: 1.2rem; font-weight: 600;"><?= htmlspecialchars($message['name']) ?></div>
            </div>
            
            <div>
                <div style="color: var(--text-secondary); margin-bottom: 0.5rem;">E-posta</div>
                <div style="color: var(--text-primary);">
                    <a href="mailto:<?= htmlspecialchars($message['email']) ?>" style="color: var(--primary); text-decoration: none;"><?= htmlspecialchars($message['email']) ?></a>
                </div>
            </div>
            
            <div>
                <div style="color: var(--text-secondary); margin-bottom: 0.5rem;">Konu</div>
                <div style="color: var(--text-primary);"><?= htmlspecialchars($message['subject'] ?? 'Konu yok') ?></div>
            </div>
            
            <div>
                <div style="color: var(--text-secondary); margin-bottom: 0.5rem;">Tarih</div>
                <div style="color: var(--text-primary);"><?= date('d.m.Y H:i', strtotime($message['created_at'])) ?></div>
            </div>
            
            <div>
                <div style="color: var(--text-secondary); margin-bottom: 0.5rem;">Durum</div>
                <span class="status-badge <?= $message['status'] === 'read' ? 'status-active' : 'status-pending' ?>"><?= ucfirst($message['status']) ?></span>
            </div>
            
            <div>
                <div style="color: var(--text-secondary); margin-bottom: 0.5rem;">Mesaj</div>
                <div style="color: var(--text-primary); white-space: pre-wrap; line-height: 1.8; padding: 1.5rem; background: var(--bg-darker); border-radius: 10px;">
                    <?= nl2br(htmlspecialchars($message['message'])) ?>
                </div>
            </div>
        </div>
        
        <form method="POST" action="/atatech/admin/messages/<?= $message['id'] ?>/status" style="padding-top: 2rem; border-top: 1px solid var(--border);">
            <div class="form-group">
                <label class="form-label">Durum</label>
                <select name="status" class="form-select">
                    <option value="unread" <?= $message['status'] === 'unread' ? 'selected' : '' ?>>Okunmadı</option>
                    <option value="read" <?= $message['status'] === 'read' ? 'selected' : '' ?>>Okundu</option>
                    <option value="replied" <?= $message['status'] === 'replied' ? 'selected' : '' ?>>Yanıtlandı</option>
                </select>
            </div>
            
            <button type="submit" class="btn btn-primary">Güncelle</button>
        </form>
    </div>
</div>
