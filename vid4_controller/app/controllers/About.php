<?php

// CONTROLLER
class About {
    //METHOD
    public function index($nama = 'Raie', $pekerjaan = 'Mahasiswa') //jika url = public/about/   (default)
    {
        echo 'about/index <br><br>';
        echo "Halo saya $nama, saya seorang $pekerjaan";
    }
    public function page() //jika url = public/about/page
    {
        echo 'about/page';
    }
}