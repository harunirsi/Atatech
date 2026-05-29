# 🚀 ATATech Club - Modern Teknoloji Kulübü Web Sitesi

Dünyanın en yaratıcı, en ileri görüşlü ve estetik takıntısı olan bir teknoloji kulübü web sitesi.

## ✨ Özellikler

- 🎨 **Modern Dark Mode Tasarım** - Neon vurgular (mavi, mor, yeşil)
- 🎭 **Canlı Animasyonlar** - Hareket eden gridler, hover efektleri, mikro etkileşimler
- 📱 **Mobile-First** - Responsive tasarım, her cihazda mükemmel görünüm
- ⚡ **Performans Odaklı** - Lighthouse 90+ hedefi
- 🎯 **Three.js Arka Plan** - Interaktif particle sistemi
- 📊 **Admin Paneli** - Kolay içerik yönetimi
- 🔐 **Güvenli Authentication** - Admin/Editor rolleri
- 📝 **Multi-step Başvuru Formu** - Modern kullanıcı deneyimi
- 🗺️ **Google Maps Entegrasyonu** - Etkinlik konumları
- ⌨️ **Keyboard Shortcuts** - K tuşu ile komut paleti
- 📈 **Canlı İstatistikler** - Animasyonlu sayaçlar
- 🎪 **3D Tilt Kartlar** - Kurul üyeleri için interaktif kartlar

## 📋 Gereksinimler

- XAMPP (PHP 7.4+ ve MySQL)
- Modern web tarayıcısı (Chrome, Firefox, Safari, Edge)
- İnternet bağlantısı (Three.js CDN için)

## 🛠️ Kurulum

### Adım 1: XAMPP'ı Başlatın

1. XAMPP Control Panel'i açın
2. **Apache** ve **MySQL** servislerini başlatın (Start butonlarına tıklayın)

### Adım 2: Veritabanını Oluşturun

#### Yöntem 1: phpMyAdmin ile (Önerilen)

1. Tarayıcınızda şu adresi açın: `http://localhost/phpmyadmin`
2. Sol menüden "New" (Yeni) butonuna tıklayın
3. Database name: `atatech_club` yazın
4. Collation: `utf8mb4_unicode_ci` seçin
5. "Create" butonuna tıklayın
6. Üst menüden "Import" (İçe Aktar) sekmesine gidin
7. "Choose File" butonuna tıklayın
8. `database/schema.sql` dosyasını seçin
9. "Go" (Git) butonuna tıklayın

#### Yöntem 2: Komut Satırı ile

Terminal/Command Prompt'u açın ve şu komutu çalıştırın:

```bash
cd /Applications/XAMPP/xamppfiles/htdocs/atatech
/Applications/XAMPP/xamppfiles/bin/mysql -u root < database/schema.sql
```

### Adım 3: Klasör İzinlerini Ayarlayın

Upload klasörlerine yazma izni verin:

```bash
chmod -R 755 public/uploads/
```

### Adım 4: Yapılandırmayı Kontrol Edin

`config/database.php` dosyasını kontrol edin:

```php
'host' => 'localhost',
'dbname' => 'atatech_club',
'username' => 'root',
'password' => '', // XAMPP için genelde boş
```

### Adım 5: Siteyi Açın

Tarayıcınızda şu adresi açın:

```
http://localhost/atatech/
```

🎉 **Tebrikler! Site çalışıyor olmalı.**

## 🔑 Admin Girişi

Varsayılan admin bilgileri:
- **E-posta:** `admin@atatech.club`
- **Şifre:** `admin123`

⚠️ **ÖNEMLİ:** İlk girişten sonra mutlaka şifreyi değiştirin!

Admin paneline giriş:
```
http://localhost/atatech/admin/login
```

## 📁 Proje Yapısı

```
atatech/
├── config/          # Yapılandırma dosyaları
│   ├── app.php      # Uygulama ayarları
│   └── database.php # Veritabanı ayarları
├── controllers/     # Controller sınıfları
│   ├── Admin/       # Admin controller'ları
│   └── ...          # Diğer controller'lar
├── core/            # Çekirdek sınıflar
│   ├── Database.php # Veritabanı sınıfı
│   ├── Router.php   # Router sınıfı
│   ├── View.php     # View render sınıfı
│   └── Auth.php     # Authentication sınıfı
├── database/        # SQL schema dosyası
│   └── schema.sql   # Veritabanı şeması
├── public/          # Public dosyalar
│   ├── css/         # CSS dosyaları
│   ├── js/          # JavaScript dosyaları
│   └── uploads/     # Yüklenen dosyalar
├── routes/          # Route tanımlamaları
│   ├── web.php      # Web route'ları
│   ├── api.php      # API route'ları
│   └── admin.php    # Admin route'ları
└── views/           # View dosyaları
    ├── admin/       # Admin view'ları
    ├── home/        # Ana sayfa
    ├── members/      # Kurul üyeleri
    ├── events/      # Etkinlikler
    ├── applications/# Başvurular
    ├── contact/     # İletişim
    └── layouts/     # Layout dosyaları
```

## 🎨 Özelleştirme

### Renkler

`public/css/main.css` dosyasında CSS değişkenlerini düzenleyin:

```css
:root {
    --primary: #00d4ff;    /* Ana renk (mavi) */
    --secondary: #9333ea;  /* İkincil renk (mor) */
    --accent: #10b981;     /* Vurgu rengi (yeşil) */
    --danger: #ef4444;     /* Hata rengi (kırmızı) */
}
```

### Logo ve İçerik

- **Logo:** `views/layouts/main.php` içinde "ATATech" yazısını değiştirin
- **İletişim bilgileri:** `config/app.php` dosyasını düzenleyin
- **Sosyal medya:** `config/app.php` içindeki `social` array'ini güncelleyin
- **Kulüp sloganı:** Veritabanındaki `settings` tablosundan veya `views/home/index.php` dosyasından değiştirebilirsiniz

## 🛠️ Geliştirme

### Yeni Sayfa Ekleme

1. `routes/web.php` dosyasına route ekleyin:
```php
$router->get('/yeni-sayfa', 'YeniController@index');
```

2. İlgili controller metodunu oluşturun:
```php
class YeniController {
    public function index() {
        View::render('yeni/index');
    }
}
```

3. View dosyasını `views/yeni/index.php` olarak oluşturun

### API Endpoint Ekleme

1. `routes/api.php` dosyasına route ekleyin:
```php
$router->get('/api/yeni-endpoint', 'ApiController@yeniMethod');
```

2. Controller'da ilgili metodu oluşturun:
```php
public function yeniMethod() {
    View::json(['success' => true, 'data' => $data]);
}
```

## 📝 Notlar

- Three.js CDN üzerinden yükleniyor (internet bağlantısı gerekli)
- Google Maps için API key gerekli (etkinlik detay sayfasında)
- Upload klasörleri `.gitkeep` dosyaları ile korunuyor
- Tüm dosya yüklemeleri `public/uploads/` klasörüne yapılıyor

## 🐛 Sorun Giderme

### Veritabanı bağlantı hatası

- MySQL servisinin çalıştığından emin olun (XAMPP Control Panel'de yeşil olmalı)
- `config/database.php` içindeki bilgileri kontrol edin
- Veritabanının oluşturulduğundan emin olun

### 404 hatası

- `.htaccess` dosyasının mevcut olduğundan emin olun
- Apache'de `mod_rewrite` modülünün aktif olduğunu kontrol edin:
  - XAMPP Control Panel → Apache → Config → httpd.conf
  - `#LoadModule rewrite_module` satırındaki `#` işaretini kaldırın
  - Apache'yi yeniden başlatın

### CSS/JS yüklenmiyor

- Tarayıcı konsolunu açın (F12)
- Hata mesajlarını kontrol edin
- Dosya yollarının doğru olduğundan emin olun (`/atatech/public/...`)

### Three.js çalışmıyor

- İnternet bağlantınızı kontrol edin
- Tarayıcı konsolunda hata var mı kontrol edin
- CDN bağlantısının engellenmediğinden emin olun

## 📄 Lisans

Bu proje ATATech Club için özel olarak geliştirilmiştir.

## 👥 Katkıda Bulunanlar

ATATech Club Ekibi

---

**Not:** Bu site bir "kulüp sitesi" değil, bir teknoloji manifestosu gibi tasarlanmıştır. Siteyi gören biri "buraya girmeliyim" demeli! 🚀
