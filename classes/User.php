<?php
require __DIR__.'/../DB/Connect.php';
// abstract class User{
abstract class User{
    private $id;
    private $nom;
    private $email;
    private $password;
    private $image;
    private $role;

    private $pdo;


    public function getId(){return $this->id;}
    public function getNom(){return $this->nom;}
    public function getEmail(){return $this->email;}
    public function getImage(){return $this->image;}
    public function getRole(){return $this->role;}
    public function getPassword(){return $this->password;}
    // setters
    // public function setId($id){$this->id;}
    public function setNom($nom){$this->nom=$nom;}
    public function setEmail($email){$this->email=$email;}
    public function setImage($image){$this->image=$image;}
    public function setRole($role){$this->role=$role;}
    public function setPassword($password){$this->password=$password;}

    public function __construct(){
        $this->pdo=Connect::connect();
    }
    public function register($email){
        $re1=$this->pdo->prepare("SELECT * from users where email=:email");
        $re1->execute([
            ":email"=>$email,
        ]);
        if($re1->fetch(PDO::FETCH_ASSOC)){
            echo '<script>alert("ce email est deja exist !!")</script>';
            return false;
        }
        $this->password=password_hash($this->password,PASSWORD_BCRYPT);
        $req=$this->pdo->prepare("INSERT into users (nom, email, mot_de_passe, role, image) VALUES(:nom, :email, :password, :role, :image)");
        $req->execute([
            ":nom"=>$this->nom,
            ":email"=>$this->email,
            ":password"=>$this->password,
            ":role"=>$this->role,
            ":image"=>$this->image,
        ]);
        // var_dump($req);
        return true;
        // return bool valide pour virifier si user est registrer
        //  en ecrir placeholders :email without ''
    }

    public function login($email,$passw){
        // virifier l'emailand pw
        $req=$this->pdo->prepare("SELECT * from users where email=:email");
        $req->execute([
            ":email"=>$email,
        ]);
        $user=$req->fetch(PDO::FETCH_ASSOC);
        if ($user && password_verify($passw,$user['mot_de_passe'])){
            // pour les variable de session
            $this->id=$user["id"];
            $this->email=$user["email"];
            $this->role=$user["role"];
            return $user;
        }

        return false;
    }
}



?>