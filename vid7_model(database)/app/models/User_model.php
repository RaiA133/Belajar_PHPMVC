<?php

class User_model {
    // data sederhana dibawah ini akan di gunakan di home/index view
    // dimana pengambilan data dari file ini sudah diatur di file Home.php di controllers
    private $nama = 'Raie Aswajjillah';

    public function getUser()
    {
        return $this->nama;
    }
}