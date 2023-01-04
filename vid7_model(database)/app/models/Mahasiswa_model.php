<?php

class Mahasiswa_model 
{
    // private $mhs =                                   // ini cara manual tanpa input dari database
    // [
    //     [
    //         "nama" => "Raie Aswajjillah",
    //         "nim" => "41037006211028",
    //         "jurusan" => "Teknik Informatika", 
    //         "email" => "rai010303@gmail.com",
    //     ],
    //     [
    //         "nama" => "Ridwan",
    //         "nim" => "41037006211082", 
    //         "jurusan" => "Teknik Elektro", 
    //         "email" => "ridwan15@gmail.com",
    //     ],
    //     [
    //         "nama" => "Irvan",
    //         "nim" => "41037006211034", 
    //         "jurusan" => "Teknik Industri", 
    //         "email" => "irvan3444@gmail.com",
    //     ]
    // ];
    
    

    // | ====  PDO   ===== | KONEKSI DATABASE
    // |  PHP DATA OBJECT  | lebih flexibel jika ingin ganti server ke yg lain

    private $dbh; //database handler (dbh)
    private $stmt; //statement (stmt)

    public function __construct()
    {
        // data source name (dsn) = koneksi ke PDO
        $dsn = 'mysql:host=localhost;dbname=mvcphp';

        try
        {
            $this->dbh = new PDO($dsn, 'root', '');
        }
        catch(PDOException $e)
        {
            die($e->getMessage());
        }
    }

    public function getAllMahasiswa()
    {
        // query PDO
        $this->stmt = $this->dbh->prepare('SELECT * FROM mahasiswa');
        $this->stmt->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}