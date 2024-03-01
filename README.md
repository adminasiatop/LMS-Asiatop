## Cara Instalasi Project

Pastikan git cli sudah terinstall, kemudian jalankan perintah dibawah
```
1. clone repository
2. copy .env.example rename menjadi .env kemudian atur database di .env
3. composer install
4. php artisan key:generate
5. php artisan migrate --seed
```

## Akun Admin
```
email : admin@gmail.com
password : password
```

## Fitur Aplikasi 
- Terdapat 2 role yaitu : admin dan member
- Mengelola Tags (Admin)
- Mengelola Course (Admin)
- Mengelola Video (Admin)
- Mengelola User (Admin)
- Mengelola Transaksi (Admin)
- Mengelola Roles & Permission (Admin)
- Halaman Dashboard dengan berbagai fitur seperti : (Admin) 
   - Total pendapatan 
   - Notifikasi pembayaran belum terverifikasi
   - Jumlah course
   - Jumlah member
   - Jumlah artikel
- Pembelian Course
- Preview Course
- Keranjang
- Full akses untuk course yang di beli (Member)
- Mengubah Password dan Profile (Member)
- List Transaksi (Member)
- Search Data
- Responsive

## Fitur Yang Akan Dikembangkan
- Penerbitan sertifikat untuk member setelah menyelesaikan course
- Showcase project dari member
- Daftar peringkat para member
- Testimonial course
- Flash sale
- Diskon course
- Artikel
- Forum tanya jawab

## License
Aplikasi ini bersifat open source dapat digunakan oleh siapa pun dengan syarat tidak untuk di perjual belikan.



## Penjelasan Fitur CNC :
Struktur Perubahan nya ada di .PHP berikut :
1. Sidebar : untuk mapping tampilan system ke halaman .php
2. Controller : untuk mengatur antara database + tampilan + codingan
3. Model : untuk mengatur database
4. View : untuk mengatur tampilan utama system
5. Route : konsep MVC : mengatur mvc didalam sebuah system

Laravel cnc =
- View         : /resource/views/admin/cnc/index.blade.php
- Controller   : /app/http/Controllers/Admin/CncController.php
- Model        : /app/http/Models/Cnc.php
- Route        : /routes/web.php

tampilan view identifikasi (kamal)
tampilan view coaching (Panji)
tampilan view conceling (ikram)



https://github.com/Raf-Taufiqurrahman/Laravel-LMS (Link Github)
        'improvement',
        'support',
        'goal',
        'reality',
        'opsi',
        'will'
