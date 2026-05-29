<?php
// ATATech Club - Ana Giriş Noktası
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

ob_start();
session_start();

try {
    require_once __DIR__ . '/core/Database.php';
    require_once __DIR__ . '/core/Router.php';
    require_once __DIR__ . '/core/View.php';
    require_once __DIR__ . '/core/Auth.php';

    $router = new Router();
    $GLOBALS['router'] = $router;

    require_once __DIR__ . '/routes/web.php';
    require_once __DIR__ . '/routes/api.php';
    require_once __DIR__ . '/routes/admin.php';

    $router->dispatch();
    
    if (ob_get_level()) {
        ob_end_flush();
    }
    
} catch (Throwable $e) {
    while (ob_get_level()) {
        ob_end_clean();
    }
    
    http_response_code(500);
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <title>Hata - ATATech Club</title>
        <style>
            body {
                font-family: 'Courier New', monospace;
                padding: 40px;
                background: #0a0a0f;
                color: #fff;
                line-height: 1.6;
            }
            h1 { color: #ef4444; margin-bottom: 20px; }
            .error-box {
                background: #1a1a24;
                padding: 20px;
                border-radius: 10px;
                border-left: 4px solid #ef4444;
                margin-bottom: 20px;
            }
            pre {
                background: #0a0a0f;
                padding: 15px;
                border-radius: 5px;
                overflow: auto;
                font-size: 12px;
            }
            .info { color: #00d4ff; }
        </style>
    </head>
    <body>
        <h1>⚠️ Hata Oluştu!</h1>
        <div class="error-box">
            <p><strong>Mesaj:</strong> <span class="info"><?= htmlspecialchars($e->getMessage()) ?></span></p>
            <p><strong>Dosya:</strong> <?= htmlspecialchars($e->getFile()) ?></p>
            <p><strong>Satır:</strong> <?= $e->getLine() ?></p>
        </div>
        <h2>Stack Trace:</h2>
        <pre><?= htmlspecialchars($e->getTraceAsString()) ?></pre>
        <hr style="margin: 30px 0; border-color: #333;">
        <p><a href="/atatech/" style="color: #00d4ff;">Ana Sayfaya Dön</a></p>
    </body>
    </html>
    <?php
    exit;
}
