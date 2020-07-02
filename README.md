# OrenzLaundry (Web Repository)

Halo! Selamat datang di repository web Orenz Laundry, berikut merupakan aplikasi berbasis mobile dan website (pada form admin) yang merupakan sebuah aplikasi untuk melakukan transaksi laundry secara online sehingga pelanggan tidak perlu pergi ke tempat laundry, selain itu Orenz Laundry dari sisi website membantu admin dan pemilik laundry untuk melakukan manajemen transaksi, serta pelaporan yang lebih terinci dan lengkap.

## Requirements (Kebutuhan)
- [PHP](https://php.net/) versi 5.6 atau lebih baru.
- [Android Studio](https://developer.android.com/studio) versi 3.6 atau lebih baru
- [XAMPP](https://www.apachefriends.org/download.html) 7.2.28 atau lebih baru.
- [Codeigniter](https://codeigniter.com/en/download) versi 3.1.11
- [Visual Studio Code](https://code.visualstudio.com/download) ( an option for your text editor )


## Instalasi

1. Jalankan tools yang anda perlukan diatas sesuai prosedur masing - masing,
2. Salin direktori github ini ke root folder webservice lokal anda (misal : htdocs),
3. Buat database `orenz_laundry`, lalu import database terbaru yang tersedia pada `kelompok1_tif_d/database/`
4. Sesuaikan configurasi pada file `kelompok1_tif_d/OrenzLaundry/applcation/config/database.php` seperti dibawah ini
``` php 
defined('BASEPATH') OR exit('No direct script access allowed');
$active_group = 'default';
$query_builder = TRUE;

$db['default'] = array(
    'dsn'   => '',
    'hostname' => 'localhost',
    'username' => 'root',
    'password' => '',
    'database' => 'orenz_laundry',
    'dbdriver' => 'mysqli',
    'dbprefix' => '',
    'pconnect' => FALSE,
    'db_debug' => (ENVIRONMENT !== 'production'),
    'cache_on' => FALSE,
    'cachedir' => '',
    'char_set' => 'utf8',
    'dbcollat' => 'utf8_general_ci',
    'swap_pre' => '',
    'encrypt' => FALSE,
    'compress' => FALSE,
    'stricton' => FALSE,
    'failover' => array(),
    'save_queries' => TRUE
);
```
5. Kunjungi link berikut untuk memastikan instalasi telah selesai dilakukan, anda akan tertuju pada halaman landing page OrenzLaundry `http://localhost/kelompok1_tif_d/OrenzLaundry/`

## Fact & Tips
- Seharusnya repository ini terkoneksi dengan repository mobile Orenz Laundry yang dapat diakses pada link berikut [OrenzLaundry Mobile](https://github.com/WildanE41181398/Kelompok1), kami menyarankan untuk melihatnya juga untuk pemahaman yang lebih maksimal,
- Pengerjaan sistem informasi ini dibuat selama 3 bulan mulai dari April 2020 - Juni 2020,
- Repository ini dibangun oleh Mahasiswa Politeknik Negeri Jember, Jurusan Teknologi Informasi dengan tim 6 orang dan menggunakan Scrum dalam pengembangannya.
