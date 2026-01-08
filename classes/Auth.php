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
        $req=$this->pdo->prepare("SELECT  * from users where id=?");
        $req->execute([
            $id_user
        ]);
        return  $req->fetch(PDO::FETCH_ASSOC);
        
    }
    public function gererUsers($idUser,$statut){
        if ($statut==="activer") {
            $req=$this->pdo->prepare("UPDATE users set statut='activer' where id=?");
            return $req->execute([
                $idUser
            ]);
        }

        if ($statut==="desactiver") {
            $req=$this->pdo->prepare("UPDATE users set statut='desactiver' where id=?");
            return $req->execute([
                $idUser
            ]);
        }
        

    }

     public function affichierTousInfo(){
        $req=$this->pdo->prepare("SELECT  * from users where role='acheteur' or role='organisateur'");
        $req->execute();
        return  $req->fetchAll(PDO::FETCH_ASSOC);
    }
    // nbr users
    public function nbrUsers(){
        $req=$this->pdo->prepare("SELECT  count(*) as nbr from users where role!='admin' ");
        $req->execute();
        $test=$req->fetch(PDO::FETCH_ASSOC);
        return  $test["nbr"];
    }
    // nbr organisateurs
    public function nbrOrg(){
        $req=$this->pdo->prepare("SELECT  count(*) as nbr from users where role='organisateur' ");
        $req->execute();
        $test=$req->fetch(PDO::FETCH_ASSOC);
        return  $test["nbr"];
    }

    public function nbrBannis(){
        $req=$this->pdo->prepare("SELECT  count(*) as nbr from users where statut='desactiver' ");
        $req->execute();
        $test=$req->fetch(PDO::FETCH_ASSOC);
        return  $test["nbr"];
    }
}
?>