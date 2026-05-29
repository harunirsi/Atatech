# 🚀 Hızlı Kurulum Kılavuzu

## Adım 1: XAMPP'ı Başlatın

1. XAMPP Control Panel'i açın
2. **Apache** ve **MySQL** servislerini başlatın (Start butonlarına tıklayın)
   - Her iki servis de yeşil renkte olmalı

## Adım 2: Veritabanını Oluşturun

### Yöntem 1: phpMyAdmin ile (Kolay - Önerilen) ⭐

1. Tarayıcınızda şu adresi açın: `http://localhost/phpmyadmin`
2. Sol menüden **"New"** (Yeni) butonuna tıklayın
3. **Database name:** `atatech_club` yazın
4. **Collation:** `utf8mb4_unicode_ci` seçin
5. **"Create"** butonuna tıklayın
6. Üst menüden **"Import"** (İçe Aktar) sekmesine gidin
7. **"Choose File"** butonuna tıklayın
8. `database/schema.sql` dosyasını seçin
9. **"Go"** (Git) butonuna tıklayın

✅ Veritabanı başarıyla oluşturuldu!

### Yöntem 2: Komut Satırı ile (Hızlı)

Terminal/Command Prompt'u açın ve şu komutu çalıştırın:

**macOS/Linux:**
```bash
cd /Applications/XAMPP/xamppfiles/htdocs/atatech
/Applications/XAMPP/xamppfiles/bin/mysql -u root < database/schema.sql
```

**Windows:**
```cmd
cd C:\xampp\htdocs\atatech
C:\xampp\mysql\bin\mysql.exe -u root < database\schema.sql
```

## Adım 3: Klasör İzinlerini Ayarlayın

Upload klasörlerine yazma izni verin:

**macOS/Linux:**
```bash
chmod -R 755 public/uploads/
```

**Windows:**
Windows'ta genellikle izin ayarlamaya gerek yoktur, ancak hata alırsanız klasörlere sağ tıklayıp "Özellikler" → "Güvenlik" bölümünden yazma izni verin.

## Adım 4: Yapılandırmayı Kontrol Edin

`config/database.php` dosyasını açın ve şu bilgileri kontrol edin:

```php
'host' => 'localhost',
'dbname' => 'atatech_club',
'username' => 'root',
'password' => '', // XAMPP için genelde boş
```

Eğer MySQL şifreniz varsa, `password` kısmına yazın.

## Adım 5: Siteyi Açın

Tarayıcınızda şu adresi açın:

```
http://localhost/atatech/
```

🎉 **Tebrikler! Site çalışıyor olmalı.**

## Adım 6: Admin Paneline Giriş Yapın

1. Şu adrese gidin: `http://localhost/atatech/admin/login`
2. Varsayılan giriş bilgileri:
   - **E-posta:** `admin@atatech.club`
   - **Şifre:** `admin123`

⚠️ **ÖNEMLİ:** İlk girişten sonra mutlaka şifreyi değiştirin!

## 🔧 Sorun Giderme

### "Database connection failed" hatası alıyorsanız:

1. ✅ MySQL servisinin çalıştığından emin olun (XAMPP Control Panel'de yeşil olmalı)
2. ✅ `config/database.php` dosyasını kontrol edin:
   ```php
   'username' => 'root',
   'password' => '',  // XAMPP için genelde boş
   ```
3. ✅ Veritabanının oluşturulduğundan emin olun (phpMyAdmin'de kontrol edin)

### 404 hatası alıyorsanız:

1. ✅ `.htaccess` dosyasının mevcut olduğundan emin olun
2. ✅ Apache'de `mod_rewrite` modülünün aktif olduğunu kontrol edin:
   - XAMPP Control Panel → Apache → Config → `httpd.conf`
   - `#LoadModule rewrite_module` satırındaki `#` işaretini kaldırın
   - Apache'yi yeniden başlatın

### CSS/JS yüklenmiyorsa:

1. ✅ Tarayıcı konsolunu açın (F12)
2. ✅ Hata mesajlarını kontrol edin
3. ✅ Dosya yollarının doğru olduğundan emin olun (`/atatech/public/...`)

### Three.js animasyonu çalışmıyor:

1. ✅ İnternet bağlantınızı kontrol edin (CDN'den yükleniyor)
2. ✅ Tarayıcı konsolunda hata var mı kontrol edin
3. ✅ Firewall veya antivirüs CDN bağlantısını engelliyor olabilir

### Upload hatası alıyorsanız:

1. ✅ `public/uploads/` klasörünün mevcut olduğundan emin olun
2. ✅ Klasör izinlerini kontrol edin (755 veya 777)
3. ✅ `public/uploads/events/` ve `public/uploads/members/` klasörlerinin var olduğundan emin olun

## 📝 İlk Kullanım İpuçları

1. **Admin Paneline Giriş:** `http://localhost/atatech/admin/login`
2. **Kurul Üyesi Ekle:** Admin Panel → Kurul Üyeleri → Yeni Ekle
3. **Etkinlik Ekle:** Admin Panel → Etkinlikler → Yeni Ekle
4. **Başvuruları Görüntüle:** Admin Panel → Başvurular
5. **Mesajları Kontrol Et:** Admin Panel → Mesajlar

## 🎨 Özelleştirme

### Renkleri Değiştirme

`public/css/main.css` dosyasını açın ve `:root` bölümündeki renkleri değiştirin:

```css
:root {
    --primary: #00d4ff;    /* Mavi */
    --secondary: #9333ea;  /* Mor */
    --accent: #10b981;     /* Yeşil */
}
```

### Logo Değiştirme

`views/layouts/main.php` dosyasını açın ve şu satırı bulun:

```php
<a href="/atatech/" class="logo">ATATech</a>
```

"ATATech" yazısını istediğinizle değiştirin veya bir logo görseli ekleyin.

### Sosyal Medya Linkleri

`config/app.php` dosyasını açın ve `social` array'ini düzenleyin:

```php
'social' => [
    'github' => 'https://github.com/atatech',
    'linkedin' => 'https://linkedin.com/company/atatech',
    'instagram' => 'https://instagram.com/atatech',
    'twitter' => 'https://twitter.com/atatech',
]
```

## ✅ Kurulum Kontrol Listesi

- [ ] XAMPP Apache çalışıyor
- [ ] XAMPP MySQL çalışıyor
- [ ] Veritabanı oluşturuldu (`atatech_club`)
- [ ] Schema.sql import edildi
- [ ] Klasör izinleri ayarlandı
- [ ] Site açılıyor (`http://localhost/atatech/`)
- [ ] Admin paneline giriş yapılabiliyor
- [ ] CSS/JS dosyaları yükleniyor
- [ ] Three.js animasyonu çalışıyor

Tüm maddeleri işaretlediyseniz, kurulum tamamlanmıştır! 🎉

---

**Sorun mu yaşıyorsunuz?** 
- Tarayıcı konsolunu kontrol edin (F12)
- Apache ve MySQL loglarını kontrol edin
- `config/database.php` dosyasını tekrar gözden geçirin
