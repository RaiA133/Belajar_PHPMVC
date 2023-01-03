<?php

class App {
    public function __construct()
    {
        $url = $this->parseURL();
        var_dump($url);
    }

    public function parseURL()                               // mengambil data dari url / parsing
    {
        if( isset($_GET['url']) ) { 
            $url = rtrim($_GET['url'], '/');                // rtrim = menghilangkan "/" di ujung akhir url
            $url = filter_var($url, FILTER_SANITIZE_URL);   // bersihkan url dari karakter yg ngaco / percobaan hack
            $url = explode('/', $url);                      // memecah url yg menyatu dengan / menjadi terpisah kedalam array num yg terpisah (ketik 'home/about/rai/2' di url)

            return $url;
        }
    }
}