<?php
require '../DB/Connect.php';
class User{
    private $id;
    private $nom;
    private $email;
    private $password;
    private $image;
    private $role;

    private $pdo;
    public function __construct(){
        $pdo=Connect::connect();
    }
}



?>