<?php

class App {
    // PROPERRTY
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseURL();
        if($url == NULL)                // cek $url[0] kalau Null, jadikan nilai default $url[0] = 'Home' 
        {                               // dari komen video yt nya
			$url = [$this->controller];
		}


        // localhost/public/controller/method/params1/params2/dll...


        // CONTROLLER URL = Mengambil inputan controller pada url untuk disimpan di property variabel $controller diatas
        if ( file_exists('../app/controllers/' . $url[0] . '.php') ) { // cek apakah file dengan nama yg sesuai kita ketika di url setelah public/ itu ada. contoh = public/home/
            $this->controller = $url[0];    // menimpa property $controller dengan value baru
            unset($url[0]); // hilangkan controller dari element array nya untuk mengambil parameternya
        }
        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;          // mengintansiasi class agar bisa memanggil method setelah home 'home/about'

        // METHOD URL
        if ( isset($url[1]) ) {  // hanya pengecekan apakah ada method di url, tanpa pengecekan file di folder controllers seperti diatas
            if (method_exists($this->controller, $url[1])){
                $this->method = $url[1];
                unset($url[1]); //hilangkan method di url, sehingga sekarang hanya ada parameter yg akan di masukan ke $params di variabel $_GET
                // contoh : $_GET = [home,index,satu,dua] ==> [satu,dua]
            }
        }

        
        // PARAMS / PARAMETERS URL
        if ( !empty($url) ) {
            $this->params = array_values($url); 
            // var_dump($url);
        }

        /* 
        JADI INTINYA JIKA DI URL ADA 'home/index' atau 'about/page' 
        setelah public/ maka 3 property dalam class App diatas akan di 
        isi sesuai dengan isi url, yaitu property/method/params1/params2/dll.. 
        lalu data akan di unset karena agar ketika kita masuk ke bagian PARAMS
        data Property & Method dari link yg dimasukan tidak ikut terbawa.
        */

        //jalankan controller & method, serta kirimkan params jika ada
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    // pemecahan url dan atur suapaya '/' tidak dibawa
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