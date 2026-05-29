<div>
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
        <h1 style="font-size: 2.5rem; background: linear-gradient(135deg, var(--primary), var(--secondary)); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
            Etkinlikler
        </h1>
        <a href="/atatech/admin/events/create" class="btn btn-primary">+ Yeni Etkinlik Ekle</a>
    </div>
    
    <?php if (empty($events)): ?>
        <p style="color: var(--text-secondary);">Henüz etkinlik eklenmemiş.</p>
    <?php else: ?>
        <div class="admin-table">
            <table>
                <thead>
                    <tr>
                        <th>Afiş</th>
                        <th>Başlık</th>
                        <th>Tarih</th>
                        <th>Konum</th>
                        <th>Durum</th>
                        <th>İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($events as $event): ?>
                        <tr>
                            <td><?= $event['poster'] ? '<img src="' . htmlspecialchars($event['poster']) . '" style="width: 80px; height: 50px; object-fit: cover; border-radius: 5px;">' : '📷' ?></td>
                            <td><?= htmlspecialchars($event['title']) ?> <?= $event['is_featured'] ? '⭐' : '' ?></td>
                            <td><?= date('d.m.Y H:i', strtotime($event['date'])) ?></td>
                            <td><?= htmlspecialchars($event['location'] ?? '-') ?></td>
                            <td><span class="status-badge <?= $event['status'] === 'active' ? 'status-active' : 'status-draft' ?>"><?= ucfirst($event['status']) ?></span></td>
                            <td>
                                <div class="admin-actions">
                                    <a href="/atatech/admin/events/<?= $event['id'] ?>/edit" class="btn btn-sm btn-primary">Düzenle</a>
                                    <form method="POST" action="/atatech/admin/events/<?= $event['id'] ?>/delete" style="display: inline;" onsubmit="return confirm('Bu etkinliği silmek istediğinize emin misiniz?');">
                                        <button type="submit" class="btn btn-sm btn-danger">Sil</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>
