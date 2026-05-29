<section class="section" style="padding-top: 8rem;">
    <div class="container" style="max-width: 800px;">
        <div class="reveal" style="text-align: center; margin-bottom: 3rem;">
            <?php if ($member['photo']): ?>
                <img src="<?= htmlspecialchars($member['photo']) ?>" alt="<?= htmlspecialchars($member['name']) ?>" 
                     style="width: 200px; height: 200px; border-radius: 50%; border: 4px solid var(--primary); margin-bottom: 2rem; object-fit: cover;">
            <?php endif; ?>
            
            <h1 style="font-size: 2.5rem; margin-bottom: 0.5rem;"><?= htmlspecialchars($member['name']) ?></h1>
            <p style="font-size: 1.3rem; color: var(--primary); margin-bottom: 2rem;"><?= htmlspecialchars($member['position']) ?></p>
            
            <div style="display: flex; justify-content: center; gap: 1rem; margin-bottom: 2rem;">
                <?php if ($member['linkedin']): ?>
                    <a href="<?= htmlspecialchars($member['linkedin']) ?>" target="_blank" rel="noopener" class="btn btn-outline">LinkedIn</a>
                <?php endif; ?>
                <?php if ($member['github']): ?>
                    <a href="<?= htmlspecialchars($member['github']) ?>" target="_blank" rel="noopener" class="btn btn-outline">GitHub</a>
                <?php endif; ?>
                <?php if ($member['email']): ?>
                    <a href="mailto:<?= htmlspecialchars($member['email']) ?>" class="btn btn-outline">E-posta</a>
                <?php endif; ?>
            </div>
        </div>
        
        <?php if ($member['vision']): ?>
        <div class="reveal" style="background: var(--bg-card); padding: 2rem; border-radius: 20px; margin-bottom: 2rem; border: 1px solid var(--border);">
            <h2 style="color: var(--primary); margin-bottom: 1rem;">Vizyon</h2>
            <p style="color: var(--text-secondary); line-height: 1.8; font-size: 1.1rem;"><?= nl2br(htmlspecialchars($member['vision'])) ?></p>
        </div>
        <?php endif; ?>
        
        <?php if ($member['bio']): ?>
        <div class="reveal" style="background: var(--bg-card); padding: 2rem; border-radius: 20px; border: 1px solid var(--border);">
            <h2 style="color: var(--primary); margin-bottom: 1rem;">Hakkında</h2>
            <p style="color: var(--text-secondary); line-height: 1.8;"><?= nl2br(htmlspecialchars($member['bio'])) ?></p>
        </div>
        <?php endif; ?>
        
        <div class="text-center mt-2">
            <a href="/atatech/kurul" class="btn btn-primary">← Tüm Üyelere Dön</a>
        </div>
    </div>
</section>
