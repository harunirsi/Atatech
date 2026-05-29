<section class="section" style="padding-top: 8rem;">
    <div class="container">
        <h1 class="section-title reveal">İletişim</h1>
        <p class="section-subtitle reveal">Bize ulaşın, sorularınızı sorun, önerilerinizi paylaşın</p>
        
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 3rem; margin-top: 3rem;">
            <!-- Contact Form -->
            <div class="reveal" style="background: var(--bg-card); padding: 3rem; border-radius: 20px; border: 1px solid var(--border);">
                <h2 style="color: var(--primary); margin-bottom: 2rem;">Mesaj Gönder</h2>
                
                <form id="contact-form">
                    <div class="form-group">
                        <label class="form-label">Ad Soyad *</label>
                        <input type="text" name="name" class="form-input" required placeholder="Adınız ve soyadınız">
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">E-posta *</label>
                        <input type="email" name="email" class="form-input" required placeholder="ornek@email.com">
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Konu</label>
                        <input type="text" name="subject" class="form-input" placeholder="Mesaj konusu">
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Mesaj *</label>
                        <textarea name="message" class="form-textarea" rows="6" required placeholder="Mesajınızı buraya yazın..."></textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-primary" style="width: 100%;">
                        📧 Mesajı Gönder
                    </button>
                </form>
                
                <div id="contact-success" style="display: none; margin-top: 1rem; padding: 1rem; background: rgba(16, 185, 129, 0.2); border-radius: 10px; color: var(--accent); text-align: center;">
                    ✅ Mesajınız başarıyla gönderildi!
                </div>
            </div>
            
            <!-- Contact Info & Map -->
            <div class="reveal">
                <div style="background: var(--bg-card); padding: 3rem; border-radius: 20px; border: 1px solid var(--border); margin-bottom: 2rem;">
                    <h2 style="color: var(--primary); margin-bottom: 2rem;">İletişim Bilgileri</h2>
                    
                    <?php
                    $app = require __DIR__ . '/../../config/app.php';
                    ?>
                    
                    <div style="margin-bottom: 2rem;">
                        <div style="color: var(--primary); font-weight: 600; margin-bottom: 0.5rem;">📧 E-posta</div>
                        <a href="mailto:<?= htmlspecialchars($app['admin_email']) ?>" style="color: var(--text-secondary); text-decoration: none; transition: color 0.3s ease;" 
                           onmouseover="this.style.color='var(--primary)'"
                           onmouseout="this.style.color='var(--text-secondary)'">
                            <?= htmlspecialchars($app['admin_email']) ?>
                        </a>
                    </div>
                    
                    <div style="margin-bottom: 2rem;">
                        <div style="color: var(--primary); font-weight: 600; margin-bottom: 1rem;">🔗 Sosyal Medya</div>
                        <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
                            <?php foreach ($app['social'] as $platform => $url): ?>
                                <a href="<?= htmlspecialchars($url) ?>" target="_blank" rel="noopener" 
                                   style="display: inline-block; width: 50px; height: 50px; border-radius: 50%; background: var(--bg-darker); border: 1px solid var(--border); display: flex; align-items: center; justify-content: center; color: var(--text-secondary); text-decoration: none; transition: all 0.3s ease;"
                                   onmouseover="this.style.background='var(--primary)'; this.style.color='var(--bg-dark)'; this.style.transform='scale(1.1)'"
                                   onmouseout="this.style.background='var(--bg-darker)'; this.style.color='var(--text-secondary)'; this.style.transform='scale(1)'"
                                   title="<?= ucfirst($platform) ?>">
                                    <?= ucfirst(substr($platform, 0, 1)) ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                
                <!-- Animated Illustration Placeholder -->
                <div style="background: var(--bg-card); padding: 3rem; border-radius: 20px; border: 1px solid var(--border); text-align: center;">
                    <div style="font-size: 5rem; margin-bottom: 1rem;">💬</div>
                    <p style="color: var(--text-secondary);">
                        Sorularınız için bize ulaşmaktan çekinmeyin!
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
document.getElementById('contact-form').addEventListener('submit', async function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    
    try {
        const response = await fetch('/atatech/iletisim', {
            method: 'POST',
            body: formData
        });
        
        const result = await response.json();
        
        if (result.success) {
            document.getElementById('contact-form').reset();
            document.getElementById('contact-success').style.display = 'block';
            setTimeout(() => {
                document.getElementById('contact-success').style.display = 'none';
            }, 5000);
        } else {
            alert(result.message || 'Bir hata oluştu. Lütfen tekrar deneyin.');
        }
    } catch (error) {
        alert('Bir hata oluştu. Lütfen tekrar deneyin.');
    }
});
</script>

<style>
@media (max-width: 768px) {
    .section > .container > div[style*="grid-template-columns"] {
        grid-template-columns: 1fr !important;
    }
}
</style>
