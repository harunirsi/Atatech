<div>
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
        <h1 style="font-size: 2.5rem; background: linear-gradient(135deg, var(--primary), var(--secondary)); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
            Kurul Üyeleri
        </h1>
        <a href="/atatech/admin/members/create" class="btn btn-primary">+ Yeni Üye Ekle</a>
    </div>
    
    <?php if (empty($members)): ?>
        <p style="color: var(--text-secondary);">Henüz üye eklenmemiş.</p>
    <?php else: ?>
        <div class="admin-table">
            <table>
                <thead>
                    <tr>
                        <th>Fotoğraf</th>
                        <th>Ad Soyad</th>
                        <th>Görev</th>
                        <th>Durum</th>
                        <th>İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($members as $member): ?>
                        <tr>
                            <td><?= $member['photo'] ? '<img src="' . htmlspecialchars($member['photo']) . '" style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover;">' : '📷' ?></td>
                            <td><?= htmlspecialchars($member['name']) ?></td>
                            <td><?= htmlspecialchars($member['position']) ?></td>
                            <td><span class="status-badge <?= $member['status'] === 'active' ? 'status-active' : 'status-draft' ?>"><?= ucfirst($member['status']) ?></span></td>
                            <td>
                                <div class="admin-actions">
                                    <a href="/atatech/admin/members/<?= $member['id'] ?>/edit" class="btn btn-sm btn-primary">Düzenle</a>
                                    <form method="POST" action="/atatech/admin/members/<?= $member['id'] ?>/delete" style="display: inline;" onsubmit="return confirm('Bu üyeyi silmek istediğinize emin misiniz?');">
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
