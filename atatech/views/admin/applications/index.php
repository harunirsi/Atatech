<div>
    <h1 style="font-size: 2.5rem; margin-bottom: 2rem; background: linear-gradient(135deg, var(--primary), var(--secondary)); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
        Başvurular
    </h1>
    
    <?php if (empty($applications)): ?>
        <p style="color: var(--text-secondary);">Henüz başvuru yok.</p>
    <?php else: ?>
        <div class="admin-table">
            <table>
                <thead>
                    <tr>
                        <th>Ad Soyad</th>
                        <th>E-posta</th>
                        <th>Telefon</th>
                        <th>Durum</th>
                        <th>Tarih</th>
                        <th>İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($applications as $app): 
                        $statusClass = $app['status'] === 'approved' ? 'status-approved' : ($app['status'] === 'rejected' ? 'status-rejected' : 'status-pending');
                    ?>
                        <tr>
                            <td><?= htmlspecialchars($app['name']) ?></td>
                            <td><?= htmlspecialchars($app['email']) ?></td>
                            <td><?= htmlspecialchars($app['phone']) ?></td>
                            <td><span class="status-badge <?= $statusClass ?>"><?= ucfirst($app['status']) ?></span></td>
                            <td><?= date('d.m.Y', strtotime($app['created_at'])) ?></td>
                            <td><a href="/atatech/admin/applications/<?= $app['id'] ?>" class="btn btn-sm btn-primary">Görüntüle</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>
