<?php
require_once 'User.php';
class Auth extends User{
    public function __construct(){
        parent::__construct();
    }

     public function ModifierProfil($id_user){
        if ($this->password) {
        
            $this->password=password_hash($this->password,PASSWORD_BCRYPT);
            $req=$this->pdo->prepare("UPDATE users set nom=?, email=?, mot_de_passe=?, image=?  where id=?");
            return $req->execute([
            $this->nom, $this->email,$this->password,$this->image,
            $id_user
        ]);
        
        }else{
            
            $req=$this->pdo->prepare("UPDATE users set nom=?, email=?, image=?  where id=?");
            return $req->execute([
            $this->nom, $this->email,$this->image,
            $id_user
        ]);

        }
        
        
    }

    public function affichierInfo($id_user){
        $req=$this->pdo->prepare("select  * from users where id=?");
        $req->execute([
            $id_user
        ]);
        return  $req->fetch(PDO::FETCH_ASSOC);
        
    }
}
?>