<?php
require_once __DIR__.'../../DB/Connect.php';
class Commentaire{
    private $id;
    private $contenu;

    private $id_match;
    private $id_user;
    private $pdo;

    public function __construct($contenu=null,$id_match=null,$id_user=null){
        $this->contenu=$contenu;
        $this->id_match=$id_match;
        $this->id_user=$id_user;
        $this->pdo=Connect::connect();
    }

    
    public function getId() {
        return $this->id;
    }

    // public function setId($id) {
    //     $this->id = $id;
    // }

    public function getContenu() {
        return $this->contenu;
    }

    public function setContenu($contenu) {
        $this->contenu = $contenu;
    }


    public function virifierMatchDate($id_match){
        $req=$this->pdo->prepare("SELECT * from matchs where id=? and date < curdate()");
        $req->execute([
            $id_match,
        ]);
        $match=$req->fetch(PDO::FETCH_ASSOC);
        if (!$match) {
            throw new Exception("vous devez creer un commentaire apres le match !!");
        }
        return $match;
    }
    public function crrerComment($id_user,$id_match){
        $req=$this->pdo->prepare('INSERT into commentaires (commentaire, user_id, match_id) values(?,?,?)');
        $req->execute([
            $this->contenu,
            $id_user,
            $id_match,
        ]);
    }


}

?>