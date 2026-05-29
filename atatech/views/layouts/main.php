<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- SEO Meta Tags -->
    <title><?= isset($title) ? htmlspecialchars($title) . ' - ATATECH' : 'ATATECH - Teknoloji Tutkunlarının Buluşma Noktası' ?></title>
    <meta name="title" content="ATATECH - Teknoloji Tutkunlarının Buluşma Noktası">
    <meta name="description" content="ATATECH, teknolojiye tutkulu öğrencilerin bir araya geldiği, projeler geliştirdiği, etkinlikler düzenlediği ve birlikte büyüdüğü bir teknoloji topluluğudur.">
    <meta name="keywords" content="ATATECH, teknoloji topluluğu, öğrenci kulübü, yazılım geliştirme, programlama, etkinlik, proje, teknoloji, üniversite kulübü">
    <meta name="author" content="ATATECH Teknoloji Topluluğu">
    <meta name="robots" content="index, follow">
    <meta name="language" content="Turkish">
    <meta name="theme-color" content="#00d4ff">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Styles -->
    <link rel="stylesheet" href="/atatech/public/css/main.css">
    
    <?php if (isset($extra_css)): ?>
        <?php foreach ($extra_css as $css): ?>
            <link rel="stylesheet" href="<?= $css ?>">
        <?php endforeach; ?>
    <?php endif; ?>
</head>
<body>
    <!-- Scroll Progress Bar -->
    <div class="scroll-progress"></div>
    
    <!-- Loader -->
    <div class="loader">
        <div class="loader-content">
            <div class="loader-spinner"></div>
            <p style="color: var(--primary); font-weight: 600;">ATATECH</p>
        </div>
    </div>
    
    <!-- Navigation -->
    <nav class="nav" id="main-nav">
        <div class="nav-container">
            <a href="/atatech/" class="logo">
                <span class="logo-text">ATATECH</span>
                <span class="logo-dot"></span>
            </a>
            <ul class="nav-links" id="nav-links">
                <li><a href="/atatech/" class="nav-link">Ana Sayfa</a></li>
                <li><a href="/atatech/kurul" class="nav-link">Kurul</a></li>
                <li><a href="/atatech/etkinlikler" class="nav-link">Etkinlikler</a></li>
                <li><a href="/atatech/formlar" class="nav-link">Formlar</a></li>
                <li><a href="/atatech/basvuru" class="nav-link">Başvuru</a></li>
                <li><a href="/atatech/iletisim" class="nav-link">İletişim</a></li>
                <li><a href="/atatech/giris" class="nav-link nav-link-primary">Giriş Yap</a></li>
                <li><a href="/atatech/uye-ol" class="nav-link nav-link-cta">Üye Ol</a></li>
            </ul>
            <button class="nav-toggle" id="nav-toggle" aria-label="Toggle navigation">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
        <div class="nav-backdrop"></div>
    </nav>
    
    <!-- Main Content -->
    <main>
        <?= $content ?>
    </main>
    
    <!-- Footer -->
    <footer style="background: var(--bg-darker); padding: 3rem 2rem; text-align: center; border-top: 1px solid var(--border);">
        <div class="container">
            <p style="color: var(--text-secondary); margin-bottom: 1rem;">
                &copy; <?= date('Y') ?> ATATECH. Tüm hakları saklıdır.
            </p>
            <div style="display: flex; justify-content: center; gap: 1.5rem; align-items: center;">
                <?php
                $app = require __DIR__ . '/../../config/app.php';
                if (isset($app['social']['instagram'])):
                ?>
                    <a href="<?= htmlspecialchars($app['social']['instagram']) ?>" target="_blank" rel="noopener" 
                       style="display: flex; align-items: center; justify-content: center; width: 40px; height: 40px; border-radius: 50%; background: rgba(255, 255, 255, 0.05); border: 2px solid rgba(255, 255, 255, 0.1); color: var(--text-secondary); text-decoration: none; transition: all 0.3s ease;"
                       onmouseover="this.style.color='#E4405F'; this.style.borderColor='#E4405F'; this.style.background='rgba(228, 64, 95, 0.1)'"
                       onmouseout="this.style.color='var(--text-secondary)'; this.style.borderColor='rgba(255, 255, 255, 0.1)'; this.style.background='rgba(255, 255, 255, 0.05)'"
                       title="Instagram">
                        <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24" style="display: block;">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                        </svg>
                    </a>
                <?php endif; ?>
                <?php if (isset($app['social']['linkedin'])): ?>
                    <a href="<?= htmlspecialchars($app['social']['linkedin']) ?>" target="_blank" rel="noopener" 
                       style="display: flex; align-items: center; justify-content: center; width: 40px; height: 40px; border-radius: 50%; background: rgba(255, 255, 255, 0.05); border: 2px solid rgba(255, 255, 255, 0.1); color: var(--text-secondary); text-decoration: none; transition: all 0.3s ease;"
                       onmouseover="this.style.color='#0077B5'; this.style.borderColor='#0077B5'; this.style.background='rgba(0, 119, 181, 0.1)'"
                       onmouseout="this.style.color='var(--text-secondary)'; this.style.borderColor='rgba(255, 255, 255, 0.1)'; this.style.background='rgba(255, 255, 255, 0.05)'"
                       title="LinkedIn">
                        <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24" style="display: block;">
                            <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                        </svg>
                    </a>
                <?php endif; ?>
                <?php if (!empty($app['social']['github'])): ?>
                    <a href="<?= htmlspecialchars($app['social']['github']) ?>" target="_blank" rel="noopener" 
                       style="display: flex; align-items: center; justify-content: center; width: 40px; height: 40px; border-radius: 50%; background: rgba(255, 255, 255, 0.05); border: 2px solid rgba(255, 255, 255, 0.1); color: var(--text-secondary); text-decoration: none; transition: all 0.3s ease;"
                       onmouseover="this.style.color='#ffffff'; this.style.borderColor='#ffffff'; this.style.background='rgba(255, 255, 255, 0.1)'"
                       onmouseout="this.style.color='var(--text-secondary)'; this.style.borderColor='rgba(255, 255, 255, 0.1)'; this.style.background='rgba(255, 255, 255, 0.05)'"
                       title="GitHub">
                        <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24" style="display: block;">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12 2C6.477 2 2 6.477 2 12c0 4.42 2.865 8.166 6.839 9.489.5.092.682-.217.682-.482 0-.237-.008-.866-.013-1.7-2.782.603-3.369-1.34-3.369-1.34-.454-1.156-1.11-1.464-1.11-1.464-.908-.62.069-.608.069-.608 1.003.07 1.531 1.03 1.531 1.03.892 1.529 2.341 1.087 2.91.831.092-.646.35-1.086.636-1.336-2.22-.253-4.555-1.11-4.555-4.943 0-1.091.39-1.984 1.029-2.683-.103-.253-.446-1.27.098-2.647 0 0 .84-.269 2.75 1.025A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.294 2.747-1.025 2.747-1.025.546 1.377.203 2.394.1 2.647.64.699 1.028 1.592 1.028 2.683 0 3.842-2.339 4.687-4.566 4.935.359.309.678.919.678 1.852 0 1.336-.012 2.415-.012 2.743 0 .267.18.577.688.479C19.138 20.162 22 16.418 22 12c0-5.523-4.477-10-10-10z"/>
                        </svg>
                    </a>
                <?php endif; ?>
            </div>
            <p style="color: var(--text-secondary); margin-top: 1rem; font-size: 0.9rem;">
                <kbd style="background: var(--bg-card); padding: 0.25rem 0.5rem; border-radius: 4px; border: 1px solid var(--border);">Ctrl+K</kbd> veya <kbd style="background: var(--bg-card); padding: 0.25rem 0.5rem; border-radius: 4px; border: 1px solid var(--border);">Cmd+K</kbd> ile komut paletini aç
            </p>
        </div>
    </footer>
    
    <!-- Command Palette -->
    <div id="command-palette" class="command-palette">
        <input type="text" placeholder="Komut ara... (örn: Ana Sayfa, Kurul)">
        <ul class="command-list"></ul>
    </div>
    
    <!-- Scripts -->
    <script src="/atatech/public/js/main.js"></script>
    
    <?php if (isset($extra_js)): ?>
        <?php foreach ($extra_js as $js): ?>
            <script src="<?= $js ?>"></script>
        <?php endforeach; ?>
    <?php endif; ?>
</body>
</html>
