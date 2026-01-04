<?php
require_once '../DB/Connect.php';

class Billet {
    private $id;
    private $numero_place;
    private $QrCode;
    private $pdo;

    public function getId() {return $this->id;}
    public function setId($id) {$this->id = $id;}

    public function getNumeroPlace() { return $this->numero_place;}
    public function setNumeroPlace($numero_place) { $this->numero_place = $numero_place;}

    public function getQrCode() { return $this->QrCode;}
    public function setQrCode($QrCode) { $this->QrCode = $QrCode;}


    public function __construct(){
        $this->pdo=Connect::connect();
    }
    public function genererPdf(){
        
    } 
    public function sendEmail(){

    }
    public function genererQRCode(){

    }
    // public function BilletsVendusParM($id_match){
    //     $req=$this->pdo->prepare("SELECT count(*) from billets where match_id = ?");
    //     $req->execute([
    //         $id_match
    //     ]);
    //     return $req->fetch(PDO::FETCH_ASSOC);
    // }
    public function BilletsVendusParMatch($id_match){
        $req=$this->pdo->prepare("SELECT count(*) as nbr from billets where match_id = ?");
        $req->execute([
            $id_match
        ]);
        $nbrBille=$req->fetch();
        return $nbrBille['nbr'];
    }
    public function chiffreAffaire($match_id){
        $req=$this->pdo->prepare("SELECT sum(c.prix*b.quantite) as chiffre from billets b
        inner join categories c on b.categorie_id=c.id
        where b.match_id = ?");
        $req->execute([
            $match_id
        ]);
        $chiffreBille=$req->fetch();
        return $chiffreBille['chiffre'];
    }
}
?>
