<?php

class Connect{
    private static $host="localhost";
    private static $dbname="buymatch";
    private static $username="root";
    private static $password="root";
    private static $pdo=null;

    public static function connect(){
        try{
            if (self::$pdo===null) {
                self::$pdo=new PDO("mysql:host=".self::$host.";dbname=".self::$dbname,self::$username,self::$password);
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                // echo 'connexion reussite';
                return self::$pdo;
            }
            // echo 'connexion reussite';
            return self::$pdo;
        }catch(PDOException $e){
            die("connection faild:".$e->getMessage());
        }

    }
}


// $pdoo=Connect::connect1();

?>