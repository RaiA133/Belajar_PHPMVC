<?php

// CONTROLLER
class Home extends Controller{
    // METHOD | home/Index
    public function index() //jika url = home/about/   (default)
    {
    {
        $data['title'] = 'Halaman About View';
        $this->view('templates/header', $data);
        $this->view('home/index'); // 'home/index' akan di taro di $view di core/controller.php
        $this->view('templates/footer');
    }
}
}