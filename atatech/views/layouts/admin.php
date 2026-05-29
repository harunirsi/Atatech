<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Admin Panel' ?> - ATATech Club</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="/atatech/public/css/main.css">
    <link rel="stylesheet" href="/atatech/public/css/admin.css">
</head>
<body style="background: var(--bg-dark);">
    <?php if (Auth::check()): ?>
    <nav class="admin-nav" style="background: var(--bg-card); padding: 1rem 2rem; border-bottom: 1px solid var(--border);">
        <div style="max-width: 1400px; margin: 0 auto; display: flex; justify-content: space-between; align-items: center;">
            <a href="/atatech/admin" style="font-size: 1.5rem; font-weight: 700; color: var(--primary); text-decoration: none;">Admin Panel</a>
            <div style="display: flex; gap: 2rem; align-items: center;">
                <span style="color: var(--text-secondary);"><?= htmlspecialchars(Auth::user()['name']) ?></span>
                <a href="/atatech/admin/logout" style="color: var(--danger); text-decoration: none;">Çıkış</a>
            </div>
        </div>
    </nav>
    
    <div style="display: flex; min-height: calc(100vh - 60px);">
        <aside style="width: 250px; background: var(--bg-card); border-right: 1px solid var(--border); padding: 2rem 0;">
            <nav style="padding: 0 1rem;">
                <a href="/atatech/admin" style="display: block; padding: 1rem; color: var(--text-secondary); text-decoration: none; border-radius: 8px; margin-bottom: 0.5rem; transition: all 0.3s ease;" 
                   onmouseover="this.style.background='var(--bg-darker)'; this.style.color='var(--primary)'"
                   onmouseout="this.style.background=''; this.style.color='var(--text-secondary)'">
                    📊 Dashboard
                </a>
                <a href="/atatech/admin/members" style="display: block; padding: 1rem; color: var(--text-secondary); text-decoration: none; border-radius: 8px; margin-bottom: 0.5rem; transition: all 0.3s ease;"
                   onmouseover="this.style.background='var(--bg-darker)'; this.style.color='var(--primary)'"
                   onmouseout="this.style.background=''; this.style.color='var(--text-secondary)'">
                    👥 Kurul Üyeleri
                </a>
                <a href="/atatech/admin/events" style="display: block; padding: 1rem; color: var(--text-secondary); text-decoration: none; border-radius: 8px; margin-bottom: 0.5rem; transition: all 0.3s ease;"
                   onmouseover="this.style.background='var(--bg-darker)'; this.style.color='var(--primary)'"
                   onmouseout="this.style.background=''; this.style.color='var(--text-secondary)'">
                    🎉 Etkinlikler
                </a>
                <a href="/atatech/admin/applications" style="display: block; padding: 1rem; color: var(--text-secondary); text-decoration: none; border-radius: 8px; margin-bottom: 0.5rem; transition: all 0.3s ease;"
                   onmouseover="this.style.background='var(--bg-darker)'; this.style.color='var(--primary)'"
                   onmouseout="this.style.background=''; this.style.color='var(--text-secondary)'">
                    📝 Başvurular
                </a>
                <a href="/atatech/admin/messages" style="display: block; padding: 1rem; color: var(--text-secondary); text-decoration: none; border-radius: 8px; margin-bottom: 0.5rem; transition: all 0.3s ease;"
                   onmouseover="this.style.background='var(--bg-darker)'; this.style.color='var(--primary)'"
                   onmouseout="this.style.background=''; this.style.color='var(--text-secondary)'">
                    📧 Mesajlar
                </a>
            </nav>
        </aside>
        
        <main style="flex: 1; padding: 2rem;">
            <?= $content ?>
        </main>
    </div>
    <?php else: ?>
        <?= $content ?>
    <?php endif; ?>
    
    <script src="/atatech/public/js/main.js"></script>
</body>
</html>
