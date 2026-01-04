<?php
require_once '../DB/Connect.php';

class Billet {
    private $id;
    private $numero_place;
    private $id_code;
    private $pdo;
    private $quantite;

    public function getId() {return $this->id;}
    public function setId($id) {$this->id = $id;}
    
    public function getQuantite() {return $this->quantite;}
    public function setQuantite($quantite) {$this->quantite = $quantite;}

    public function getNumeroPlace() { return $this->numero_place;}
    public function setNumeroPlace($numero_place) { $this->numero_place = $numero_place;}

    public function getIdCode() { return $this->id_code;}
    public function setIdCode($id_code) { $this->id_code = $id_code;}


    public function __construct(){
        $this->pdo=Connect::connect();
    }
    public function genererPdf(){
        
    } 
    public function sendEmail(){

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
    

    public function genererIdCode($user_id,$match_id,$categorie_id,$i=0){//i pour eviter duplicate
        return $this->setIdCode("Billet-" . strtoupper(substr(md5($user_id . $match_id . $categorie_id . date('YmdHis').$i),0,8)));
    }
    // billets (numero_place, id_code, user_id, match_id, categorie_id)
    public function getLastPlace($idCat,$idMatch){
        
        $req=$this->pdo->prepare("SELECT c.label,b.numero_place from billets b 
        inner join categories c on c.id=b.categorie_id
        where b.categorie_id=? and b.match_id=?
        order by b.numero_place desc
        limit 1
        ");
        $req->execute([        $idCat,$idMatch       ]);  
        $lastPlace=$req->fetch(PDO::FETCH_ASSOC);
        // var_dump($lastPlace);
        if ($lastPlace) {
            $NbrPlace=substr($lastPlace["numero_place"],11);
            $NbrPlace ++ ;
            return substr($lastPlace["label"],0,10)."-".$NbrPlace;
        }else{
            // je dois tester cette else
            $req=$this->pdo->prepare("SELECT label from categories 
            where id=? ");

            $req->execute([    $idCat   ]);  
            $first=$req->fetch(PDO::FETCH_ASSOC);

            // var_dump($first);//si la valeur est fals
            return $first["label"]."-1" ;
        }
    }
    // total price
    // qr_code || numero_place
    public function acheterBillets($user_id,$match_id,$categorie_id){
        $req=$this->pdo->prepare("INSERT into billets (numero_place, id_code, user_id, match_id, categorie_id,quantite) values(?,?,?,?,?,?)");
        return $req->execute([
            $this->numero_place,
            $this->id_code,
            $user_id,
            $match_id,
            $categorie_id,
            $this->quantite,
        ]);        

    }
}
?>
