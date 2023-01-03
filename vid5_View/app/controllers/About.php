<?php

// CONTROLLER
class About extends Controller{
    //METHOD | about/index
    public function index($nama = 'Raie Aswajjillah', $pekerjaan = 'Mahasiswa', $umur = '19') //jika url = public/about/   (default)
    {   
        $data['nama'] = $nama;
        $data['pekerjaan'] = $pekerjaan;
        $data['umur'] = $umur;
        $data['title'] = 'Halaman About View';
        $this->view('templates/header', $data);
        $this->view('about/index', $data);
        $this->view('templates/footer');
    }
    //METHOD | about/page 
    public function page() //jika url = public/about/page
    {
        $data['title'] = 'Halaman About Page';
        $this->view('templates/header', $data);
        $this->view('about/page');
        $this->view('templates/footer');
    }
}