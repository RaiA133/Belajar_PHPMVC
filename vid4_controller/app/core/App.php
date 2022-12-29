<?php

class App {
    protected $controller = 'Home';
    protected $method = 'Index';
    protected $params = [];
    
    public function __construct()
    {
        $url = $this->parseURL();

        if ( file_exists(('../app/controllers/'. $url[0] . '.php')) ) { // cek apakah file dengan nama yg sesuai kita ketika di url setelah public/ itu ada. contoh = public/home/
            $this->controller = $url[0];    // menimpa property $controller dengan value baru
            unset($url[0]); // hilangkan controller dari element array nya untuk mengambil parameternya
            var_dump($url);
        }
    }

    public function parseURL()                               // mengambil data dari url / parsing
    {
        if( isset($_GET['url']) ) { 
            $url = rtrim($_GET['url'], '/');                // rtrim = menghilangkan "/" di akhir url
            $url = filter_var($url, FILTER_SANITIZE_URL);   // bersihkan url dari karakter yg ngaco / percobaan hack
            $url = explode('/', $url);                      // memecah url yg menyatu dengan / menjadi terpisah kedalam array num yg terpisah (ketik 'home/about/rai/2' di url)

            return $url;
        }
    }
}