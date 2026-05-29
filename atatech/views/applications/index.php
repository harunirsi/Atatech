<section class="section" style="padding-top: 8rem;">
    <div class="container" style="max-width: 800px;">
        <h1 class="section-title reveal">Kulübe Başvuru</h1>
        <p class="section-subtitle reveal">ATATech Club ailesine katılmak için formu doldurun</p>
        
        <form id="application-form" class="reveal" style="background: var(--bg-card); padding: 3rem; border-radius: 20px; border: 1px solid var(--border);">
            
            <!-- Step Indicator -->
            <div class="step-indicator">
                <div class="step active" id="step-1-indicator">1</div>
                <div class="step" id="step-2-indicator">2</div>
                <div class="step" id="step-3-indicator">3</div>
                <div class="step" id="step-4-indicator">4</div>
            </div>
            
            <!-- Progress Bar -->
            <div class="progress-bar">
                <div class="progress-fill" id="progress-fill" style="width: 25%;"></div>
            </div>
            
            <!-- Step 1: Personal Info -->
            <div class="form-step active" id="step-1">
                <h2 style="color: var(--primary); margin-bottom: 2rem;">Kişisel Bilgiler</h2>
                
                <div class="form-group">
                    <label class="form-label">Ad Soyad *</label>
                    <input type="text" name="name" class="form-input" required placeholder="Adınız ve soyadınız">
                </div>
                
                <div class="form-group">
                    <label class="form-label">E-posta *</label>
                    <input type="email" name="email" class="form-input" required placeholder="ornek@email.com">
                </div>
                
                <div class="form-group">
                    <label class="form-label">Telefon *</label>
                    <input type="tel" name="phone" class="form-input" required placeholder="05XX XXX XX XX">
                </div>
                
                <button type="button" class="btn btn-primary" onclick="nextStep()" style="width: 100%; margin-top: 1rem;">
                    İleri →
                </button>
            </div>
            
            <!-- Step 2: Interests -->
            <div class="form-step" id="step-2" style="display: none;">
                <h2 style="color: var(--primary); margin-bottom: 2rem;">İlgi Alanları</h2>
                
                <div class="form-group">
                    <label class="form-label">Hangi alanlara ilgi duyuyorsunuz? (Birden fazla seçebilirsiniz)</label>
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem; margin-top: 1rem;">
                        <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer; padding: 1rem; background: var(--bg-darker); border-radius: 10px; border: 1px solid var(--border); transition: all 0.3s ease;">
                            <input type="checkbox" name="interests[]" value="web-development" style="width: 20px; height: 20px; cursor: pointer;">
                            <span>Web Development</span>
                        </label>
                        <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer; padding: 1rem; background: var(--bg-darker); border-radius: 10px; border: 1px solid var(--border); transition: all 0.3s ease;">
                            <input type="checkbox" name="interests[]" value="mobile-development" style="width: 20px; height: 20px; cursor: pointer;">
                            <span>Mobile Development</span>
                        </label>
                        <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer; padding: 1rem; background: var(--bg-darker); border-radius: 10px; border: 1px solid var(--border); transition: all 0.3s ease;">
                            <input type="checkbox" name="interests[]" value="ai-ml" style="width: 20px; height: 20px; cursor: pointer;">
                            <span>AI & Machine Learning</span>
                        </label>
                        <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer; padding: 1rem; background: var(--bg-darker); border-radius: 10px; border: 1px solid var(--border); transition: all 0.3s ease;">
                            <input type="checkbox" name="interests[]" value="cybersecurity" style="width: 20px; height: 20px; cursor: pointer;">
                            <span>Cybersecurity</span>
                        </label>
                        <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer; padding: 1rem; background: var(--bg-darker); border-radius: 10px; border: 1px solid var(--border); transition: all 0.3s ease;">
                            <input type="checkbox" name="interests[]" value="game-development" style="width: 20px; height: 20px; cursor: pointer;">
                            <span>Game Development</span>
                        </label>
                        <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer; padding: 1rem; background: var(--bg-darker); border-radius: 10px; border: 1px solid var(--border); transition: all 0.3s ease;">
                            <input type="checkbox" name="interests[]" value="data-science" style="width: 20px; height: 20px; cursor: pointer;">
                            <span>Data Science</span>
                        </label>
                    </div>
                </div>
                
                <div style="display: flex; gap: 1rem; margin-top: 2rem;">
                    <button type="button" class="btn btn-outline" onclick="prevStep()" style="flex: 1;">
                        ← Geri
                    </button>
                    <button type="button" class="btn btn-primary" onclick="nextStep()" style="flex: 1;">
                        İleri →
                    </button>
                </div>
            </div>
            
            <!-- Step 3: Skills -->
            <div class="form-step" id="step-3" style="display: none;">
                <h2 style="color: var(--primary); margin-bottom: 2rem;">Yetkinlikler</h2>
                
                <div class="form-group">
                    <label class="form-label">Hangi teknolojileri biliyorsunuz? (Seviyelerini belirtin)</label>
                    <div id="skills-container" style="margin-top: 1rem;">
                        <div class="skill-item" style="margin-bottom: 1.5rem; padding: 1.5rem; background: var(--bg-darker); border-radius: 10px; border: 1px solid var(--border);">
                            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.5rem;">
                                <label style="color: var(--text-primary); font-weight: 600;">JavaScript</label>
                                <span id="js-level" style="color: var(--primary);">0</span>
                            </div>
                            <input type="range" name="skills[js]" min="0" max="100" value="0" class="skill-slider" 
                                   oninput="document.getElementById('js-level').textContent = this.value" 
                                   style="width: 100%;">
                        </div>
                        
                        <div class="skill-item" style="margin-bottom: 1.5rem; padding: 1.5rem; background: var(--bg-darker); border-radius: 10px; border: 1px solid var(--border);">
                            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.5rem;">
                                <label style="color: var(--text-primary); font-weight: 600;">Python</label>
                                <span id="python-level" style="color: var(--primary);">0</span>
                            </div>
                            <input type="range" name="skills[python]" min="0" max="100" value="0" class="skill-slider" 
                                   oninput="document.getElementById('python-level').textContent = this.value" 
                                   style="width: 100%;">
                        </div>
                        
                        <div class="skill-item" style="margin-bottom: 1.5rem; padding: 1.5rem; background: var(--bg-darker); border-radius: 10px; border: 1px solid var(--border);">
                            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.5rem;">
                                <label style="color: var(--text-primary); font-weight: 600;">PHP</label>
                                <span id="php-level" style="color: var(--primary);">0</span>
                            </div>
                            <input type="range" name="skills[php]" min="0" max="100" value="0" class="skill-slider" 
                                   oninput="document.getElementById('php-level').textContent = this.value" 
                                   style="width: 100%;">
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Deneyim</label>
                    <textarea name="experience" class="form-textarea" rows="4" placeholder="Teknoloji alanındaki deneyimlerinizi kısaca anlatın..."></textarea>
                </div>
                
                <div style="display: flex; gap: 1rem; margin-top: 2rem;">
                    <button type="button" class="btn btn-outline" onclick="prevStep()" style="flex: 1;">
                        ← Geri
                    </button>
                    <button type="button" class="btn btn-primary" onclick="nextStep()" style="flex: 1;">
                        İleri →
                    </button>
                </div>
            </div>
            
            <!-- Step 4: Motivation -->
            <div class="form-step" id="step-4" style="display: none;">
                <h2 style="color: var(--primary); margin-bottom: 2rem;">Motivasyon</h2>
                
                <div class="form-group">
                    <label class="form-label">Neden ATATech Club'a katılmak istiyorsunuz? *</label>
                    <textarea name="motivation" class="form-textarea" rows="6" required placeholder="Kulübe katılma motivasyonunuzu ve beklentilerinizi yazın..."></textarea>
                </div>
                
                <div style="display: flex; gap: 1rem; margin-top: 2rem;">
                    <button type="button" class="btn btn-outline" onclick="prevStep()" style="flex: 1;">
                        ← Geri
                    </button>
                    <button type="submit" class="btn btn-primary" style="flex: 1;">
                        ✨ Başvuruyu Gönder
                    </button>
                </div>
            </div>
        </form>
        
        <!-- Success Message -->
        <div id="success-message" style="display: none; background: var(--bg-card); padding: 3rem; border-radius: 20px; border: 1px solid var(--border); text-align: center;">
            <div style="font-size: 4rem; margin-bottom: 1rem;">🎉</div>
            <h2 style="color: var(--accent); margin-bottom: 1rem;">Başvurunuz Alındı!</h2>
            <p style="color: var(--text-secondary); margin-bottom: 2rem;">
                Başvurunuz başarıyla gönderildi. En kısa sürede size dönüş yapacağız.
            </p>
            <a href="/atatech/" class="btn btn-primary">Ana Sayfaya Dön</a>
        </div>
    </div>
</section>

<script>
let currentStep = 1;
const totalSteps = 4;

function nextStep() {
    if (currentStep < totalSteps) {
        document.getElementById(`step-${currentStep}`).style.display = 'none';
        document.getElementById(`step-${currentStep}-indicator`).classList.remove('active');
        
        currentStep++;
        
        document.getElementById(`step-${currentStep}`).style.display = 'block';
        document.getElementById(`step-${currentStep}-indicator`).classList.add('active');
        document.getElementById(`step-${currentStep - 1}-indicator`).classList.add('completed');
        
        updateProgress();
    }
}

function prevStep() {
    if (currentStep > 1) {
        document.getElementById(`step-${currentStep}`).style.display = 'none';
        document.getElementById(`step-${currentStep}-indicator`).classList.remove('active');
        document.getElementById(`step-${currentStep - 1}-indicator`).classList.remove('completed');
        
        currentStep--;
        
        document.getElementById(`step-${currentStep}`).style.display = 'block';
        document.getElementById(`step-${currentStep}-indicator`).classList.add('active');
        
        updateProgress();
    }
}

function updateProgress() {
    const progress = (currentStep / totalSteps) * 100;
    document.getElementById('progress-fill').style.width = progress + '%';
}

document.getElementById('application-form').addEventListener('submit', async function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    
    try {
        const response = await fetch('/atatech/basvuru', {
            method: 'POST',
            body: formData
        });
        
        const result = await response.json();
        
        if (result.success) {
            document.getElementById('application-form').style.display = 'none';
            document.getElementById('success-message').style.display = 'block';
        } else {
            alert(result.message || 'Bir hata oluştu. Lütfen tekrar deneyin.');
        }
    } catch (error) {
        alert('Bir hata oluştu. Lütfen tekrar deneyin.');
    }
});
</script>

<style>
.skill-slider {
    -webkit-appearance: none;
    appearance: none;
    height: 6px;
    background: var(--bg-card);
    border-radius: 3px;
    outline: none;
}

.skill-slider::-webkit-slider-thumb {
    -webkit-appearance: none;
    appearance: none;
    width: 20px;
    height: 20px;
    background: var(--primary);
    border-radius: 50%;
    cursor: pointer;
    box-shadow: 0 0 10px rgba(0, 212, 255, 0.5);
}

.skill-slider::-moz-range-thumb {
    width: 20px;
    height: 20px;
    background: var(--primary);
    border-radius: 50%;
    cursor: pointer;
    border: none;
    box-shadow: 0 0 10px rgba(0, 212, 255, 0.5);
}
</style>
