<?php

// CONTROLLER
class Home extends Controller{
    // METHOD | home/Index
    public function index() //jika url = home/about/   (default)
    {
        $data['title'] = 'Halaman About View';
        $data['nama'] = $this->model('User_model')->getUser(); // $data['nama] akan diambil dari model/User_model.php di method getUser
        $this->view('templates/header', $data); // $data diambil dari data" yg di tetapkan diatas
        $this->view('home/index', $data); // 'home/index' akan di taro di $view di core/controller.php
        $this->view('templates/footer');
    }
}