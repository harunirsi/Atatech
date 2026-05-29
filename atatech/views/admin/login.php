<div style="min-height: 100vh; display: flex; align-items: center; justify-content: center; background: var(--bg-dark); padding: 2rem;">
    <div style="background: var(--bg-card); padding: 3rem; border-radius: 20px; border: 1px solid var(--border); max-width: 400px; width: 100%; box-shadow: var(--shadow-neon-strong);">
        <div style="text-align: center; margin-bottom: 2rem;">
            <h1 style="font-size: 2rem; margin-bottom: 0.5rem; background: linear-gradient(135deg, var(--primary), var(--secondary)); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
                Admin Panel
            </h1>
            <p style="color: var(--text-secondary);">ATATech Club Yönetim Paneli</p>
        </div>
        
        <?php if (isset($error)): ?>
            <div style="background: rgba(239, 68, 68, 0.2); color: var(--danger); padding: 1rem; border-radius: 10px; margin-bottom: 1.5rem; border: 1px solid var(--danger);">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>
        
        <form method="POST" action="<?= htmlspecialchars($_SERVER['REQUEST_URI'] ?? '/atatech/admin/login') ?>">
            <div class="form-group">
                <label class="form-label">E-posta</label>
                <input type="email" name="email" class="form-input" required placeholder="admin@atatech.club" autofocus>
            </div>
            
            <div class="form-group">
                <label class="form-label">Şifre</label>
                <input type="password" name="password" class="form-input" required placeholder="••••••••">
            </div>
            
            <button type="submit" class="btn btn-primary" style="width: 100%; margin-top: 1rem;">
                🔐 Giriş Yap
            </button>
        </form>
        
        <div style="text-align: center; margin-top: 2rem;">
            <a href="/atatech/" style="color: var(--text-secondary); text-decoration: none; font-size: 0.9rem;">
                ← Ana Sayfaya Dön
            </a>
        </div>
    </div>
</div>
