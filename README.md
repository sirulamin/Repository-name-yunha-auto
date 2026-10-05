# Yunha Auto

Aplikasi showroom mobil berbasis Laravel untuk katalog kendaraan, wishlist, test drive, reservasi, pembayaran, dan administrasi showroom.

## Stack

- Laravel 10.x (legacy baseline; see production note)
- PHP 8.1+ for the current baseline
- MySQL / MariaDB
- Blade + Alpine.js
- Vite + Tailwind CSS

## Setup lokal

1. Salin `.env.example` menjadi `.env`.
2. Atur koneksi database pada `.env`.
3. Jalankan `php artisan key:generate`.
4. Jalankan `composer install` jika folder `vendor` tidak tersedia.
5. Jalankan `npm install` jika folder `node_modules` tidak tersedia.
6. Jalankan `php artisan migrate`.
7. Atur `ADMIN_INITIAL_PASSWORD` sebelum menjalankan seeder admin.
8. Jalankan `php artisan db:seed`.
9. Jalankan `php artisan storage:link`.
10. Jalankan `npm run build`.
11. Jalankan aplikasi melalui web server / `php artisan serve` untuk development.

## Akun admin

Seeder membuat akun `admin@yunhaauto.com`. Password awal dibaca dari `ADMIN_INITIAL_PASSWORD` dan tidak menimpa password admin yang sudah ada ketika seeder dijalankan ulang.

Jangan menyimpan password production di source code.

## Perbaikan utama pada reviewed build

- Duplikasi route customer dihapus.
- Route admin resource dibatasi hanya ke aksi yang benar-benar tersedia.
- Role customer/admin dipisahkan melalui middleware.
- Redirect login untuk admin/customer dipisahkan.
- Status test drive diseragamkan dengan enum database.
- Validasi test drive dan pencegahan bentrok jadwal diperketat.
- Reservasi menggunakan transaction + row locking untuk mengurangi risiko double booking.
- Konfirmasi reservasi mengelola status unit mobil.
- Pembayaran customer tidak lagi otomatis menjadi `Paid`; pembayaran menunggu verifikasi admin.
- Ditambahkan halaman admin untuk verifikasi pembayaran.
- Ditambahkan business indexes untuk query operasional.
- Penghapusan mobil membersihkan file gambar terkait.
- Brand yang masih memiliki mobil tidak dapat dihapus melalui controller.
- Role user tidak lagi mass-assignable.
- Profil customer mendukung nomor telepon.
- Navbar customer dibuat responsive.
- Header halaman customer yang berulang dihapus.
- Wishlist disatukan dengan layout customer.
- Error pages dasar ditambahkan.
- Feature tests untuk alur bisnis utama ditambahkan.

## Production note

Jangan deploy baseline Laravel 10 ini apa adanya. Laravel 10 sudah melewati masa security support. Rencana upgrade ke Laravel 13 + PHP 8.3 atau lebih tinggi perlu dilakukan dan seluruh test suite harus lulus sebelum go-live.

Untuk production, pastikan minimal:

- `APP_ENV=production`
- `APP_DEBUG=false`
- HTTPS aktif
- web server hanya menunjuk ke folder `public/`
- database production terpisah dari development
- backup database terjadwal
- monitoring dan logging terpusat
- payment gateway nyata digunakan sebelum pembayaran online dianggap final
- credential production hanya berada di environment/secret manager

## Validasi lokal

Static PHP lint dan Blade compilation telah diperiksa pada reviewed source. PHPUnit tidak dapat dijalankan pada environment audit karena ekstensi PHP `dom`, `mbstring`, dan `xmlwriter` tidak tersedia di environment tersebut. Jalankan `php artisan test` pada environment development yang lengkap sebelum deployment.
