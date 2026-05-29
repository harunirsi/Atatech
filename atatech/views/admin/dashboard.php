<div>
    <h1 style="font-size: 2.5rem; margin-bottom: 2rem; background: linear-gradient(135deg, var(--primary), var(--secondary)); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
        Dashboard
    </h1>
    
    <!-- Stats Cards -->
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 2rem; margin-bottom: 3rem;">
        <div style="background: var(--bg-card); padding: 2rem; border-radius: 20px; border: 1px solid var(--border);">
            <div style="color: var(--text-secondary); margin-bottom: 0.5rem;">👥 Toplam Üye</div>
            <div style="font-size: 2.5rem; font-weight: 700; color: var(--primary);"><?= $stats['members'] ?></div>
        </div>
        
        <div style="background: var(--bg-card); padding: 2rem; border-radius: 20px; border: 1px solid var(--border);">
            <div style="color: var(--text-secondary); margin-bottom: 0.5rem;">🎉 Toplam Etkinlik</div>
            <div style="font-size: 2.5rem; font-weight: 700; color: var(--secondary);"><?= $stats['events'] ?></div>
        </div>
        
        <div style="background: var(--bg-card); padding: 2rem; border-radius: 20px; border: 1px solid var(--border);">
            <div style="color: var(--text-secondary); margin-bottom: 0.5rem;">📝 Bekleyen Başvuru</div>
            <div style="font-size: 2.5rem; font-weight: 700; color: var(--accent);"><?= $stats['applications'] ?></div>
        </div>
        
        <div style="background: var(--bg-card); padding: 2rem; border-radius: 20px; border: 1px solid var(--border);">
            <div style="color: var(--text-secondary); margin-bottom: 0.5rem;">📧 Okunmamış Mesaj</div>
            <div style="font-size: 2.5rem; font-weight: 700; color: var(--danger);"><?= $stats['messages'] ?></div>
        </div>
    </div>
    
    <!-- Recent Applications -->
    <div style="background: var(--bg-card); padding: 2rem; border-radius: 20px; border: 1px solid var(--border); margin-bottom: 2rem;">
        <h2 style="color: var(--primary); margin-bottom: 1.5rem;">Son Başvurular</h2>
        <?php if (empty($recentApplications)): ?>
            <p style="color: var(--text-secondary);">Henüz başvuru yok.</p>
        <?php else: ?>
            <div class="admin-table">
                <table>
                    <thead>
                        <tr>
                            <th>Ad Soyad</th>
                            <th>E-posta</th>
                            <th>Durum</th>
                            <th>Tarih</th>
                            <th>İşlem</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach (array_slice($recentApplications, 0, 5) as $app): 
                            $statusClass = $app['status'] === 'approved' ? 'status-approved' : ($app['status'] === 'rejected' ? 'status-rejected' : 'status-pending');
                        ?>
                            <tr>
                                <td><?= htmlspecialchars($app['name']) ?></td>
                                <td><?= htmlspecialchars($app['email']) ?></td>
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
    
    <!-- Recent Messages -->
    <div style="background: var(--bg-card); padding: 2rem; border-radius: 20px; border: 1px solid var(--border);">
        <h2 style="color: var(--primary); margin-bottom: 1.5rem;">Son Mesajlar</h2>
        <?php if (empty($recentMessages)): ?>
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
                            <th>İşlem</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach (array_slice($recentMessages, 0, 5) as $msg): 
                            $statusClass = $msg['status'] === 'read' ? 'status-active' : 'status-pending';
                        ?>
                            <tr>
                                <td><?= htmlspecialchars($msg['name']) ?></td>
                                <td><?= htmlspecialchars($msg['email']) ?></td>
                                <td><?= htmlspecialchars($msg['subject'] ?? '-') ?></td>
                                <td><span class="status-badge <?= $statusClass ?>"><?= ucfirst($msg['status']) ?></span></td>
                                <td><?= date('d.m.Y', strtotime($msg['created_at'])) ?></td>
                                <td><a href="/atatech/admin/messages/<?= $msg['id'] ?>" class="btn btn-sm btn-primary">Görüntüle</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
</div>
