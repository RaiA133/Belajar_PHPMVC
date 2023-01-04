pretty url / prasing url


.htaccess = konfigurasi server apache (5.15),(6.22) di video
https://www.youtube.com/watch?v=-wBKfa0-yyQ&list=PLFIM0718LjIVEh_d-h5wAjsdv2W4SAtkx&index=3

Options -Indexes                            // memblock akses kita ke folder selama tidak ada file index didalam folder tersebut
RewriteCond %{REQUEST_FILENAME} !-d         // jika url yg dipanggil adalah folder akan diabaikan
RewriteCond %{REQUEST_FILENAME} !-f         // keduanya menghindari nama folder/file yg sama dengan controller dan method kita
RewriteRule ^(.*)$ index.php?url=$1 [L]
    ^ = regex           // membaca apapun di url setelah public/
    .                   // ambil apapun
    *                   // semua karakter keyboar
    $                   // sampai semua selesai
    index.php?url=      // arahkan ke file index yg mengimrikn url
    $1 = placeholder    // taro kursor untuk menyimpan data
    [L] = flag/aturan   // jika ada rule yg terpenuhi jangan jalankan rule lain setelah ini

jadi inti nya ambil riwayat path kita di url    




app
        // controller
        if ( file_exists('../app/controllers/' . $url[0] . '.php') ) { // cek apakah file dengan nama yg sesuai kita ketika di url setelah public/ itu ada. contoh = public/home/
            $this->controller = $url[0];    // menimpa property $controller dengan value baru
            unset($url[0]); // hilangkan controller dari element array nya untuk mengambil parameternya
        }
        require_once '../app/controllers/' . $whis->controller . '.php';
        $this->controller = new $this->controller;

        //method
        // if ( isset($url[1]) )


VID7_MODEL new
- new controllers : Mahasiswa.php
- new 2 files in models 
- new views : mahasiswa = tempat tampilan dari databse (fetch)

ALUR SEJAUH ini
1. public/index.php => init.php => all file in core folder
1. url check : App.php & .htaccess => Home.php/About.php => all file in views & model folder