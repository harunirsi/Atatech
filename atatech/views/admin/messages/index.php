<div>
    <h1 style="font-size: 2.5rem; margin-bottom: 2rem; background: linear-gradient(135deg, var(--primary), var(--secondary)); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
        Mesajlar
    </h1>
    
    <?php if (empty($messages)): ?>
        <p style="color: var(--text-secondary);">Henüz mesaj yok.</p>
    <?php else: ?>
        <div class="admin-table">
            <table>
                <thead>
                    <tr>
                        <th>Ad Soyad</th>
                        <th>E-posta</th>
                        <th>Konu</th>
                        <th>Durum</th>
                        <th>Tarih</th>
                        <th>İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($messages as $msg): 
                        $statusClass = $msg['status'] === 'read' ? 'status-active' : 'status-pending';
                    ?>
                        <tr>
                            <td><?= htmlspecialchars($msg['name']) ?></td>
                            <td><?= htmlspecialchars($msg['email']) ?></td>
                            <td><?= htmlspecialchars($msg['subject'] ?? '-') ?></td>
                            <td><span class="status-badge <?= $statusClass ?>"><?= ucfirst($msg['status']) ?></span></td>
                            <td><?= date('d.m.Y H:i', strtotime($msg['created_at'])) ?></td>
                            <td><a href="/atatech/admin/messages/<?= $msg['id'] ?>" class="btn btn-sm btn-primary">Görüntüle</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>
