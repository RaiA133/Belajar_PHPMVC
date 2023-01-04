<?php

class Controller {
    // from : controllers/Home, About, Mahasiswa.php
    public function view( $view, $data = [])
    {
        require_once '../app/views/' . $view . '.php'; //contoh : $view = 'home/index'
    }
    // from : controllers/Home.php
    public function model( $model )
    {
        require_once '../app/models/' . $model . '.php'; 
        return new $model;
    }
}