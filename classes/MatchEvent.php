<?php
require_once __DIR__.'/../DB/Connect.php';
require_once 'Categorie.php';
require_once 'Commentaire.php';

class MatchEvent{
    private $id;
    private $nomEqui1;
    private $nomEqui2;
    private $logoEqui1;
    private $logoEqui2;
    private $date;
    private $lieu;
    private $heure;
    // private $durre;
    private $capacite;
    private $statut;

    private $categorie;//pour objet categorie

    private $pdo;
    
    //constructeur recoit un objet du class categorie
    // methode deprecated: (Categorie $cate=null)
    public function __construct(?Categorie $cate=null){
        $this->pdo=Connect::connect();
        $this->categorie=$cate;//
    }

    public function getId() {return $this->id;}
    public function getNomEqui1() {return $this->nomEqui1;}
    public function getNomEqui2() {return $this->nomEqui2;}
    public function getLogoEqui1() {return $this->logoEqui1;}
    public function getLogoEqui2() { return $this->logoEqui2;}
    public function getDate() {return $this->date;}
    public function getLieu() {return $this->lieu;}
    public function getHeure() {return $this->heure;}
    public function getCapacite() {return $this->capacite;}
    public function getStatut() {return $this->statut;}
    // public function getCatePrice() {return $this->catePrice;}
    // public function getCateName() {return $this->cateName;}


    // public function setId($id) {$this->id = $id;}

    public function setNomEqui1($nomEqui1) {$this->nomEqui1 = $nomEqui1;}
    public function setNomEqui2($nomEqui2) {$this->nomEqui2 = $nomEqui2;}
    public function setLogoEqui1($logoEqui1) {$this->logoEqui1 = $logoEqui1;}
    public function setLogoEqui2($logoEqui2) {$this->logoEqui2 = $logoEqui2;}
    public function setDate($date) {$this->date = $date;}
    public function setLieu($lieu) {$this->lieu = $lieu;}
    public function setHeure($heure) { $this->heure = $heure;}
    public function setCapacite($capacite) {$this->capacite = $capacite;}
    public function setStatut($statut) {$this->statut = $statut;}

    // public function setCateName($cateName) {$this->cateName = $cateName;}
    // public function setCatePrice($catePrice) {$this->catePrice = $catePrice;}
    
    // les match de l'organisateur
    public function AffichierMatch($idOrg){
        $en_attente='en_attente';
        $req=$this->pdo->prepare("SELECT * from matchs where organisateur_id=? and statut=?");
        $req->execute([
            $idOrg,
            $en_attente
        ]);
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }
    // les match de tous les organisateur pour admin
    public function AffichierTousMatchs(){
        $en_attente='en_attente';
        $req=$this->pdo->prepare("SELECT m.id as idMatch,u.*,m.* from matchs m
        inner join users u on u.id=m.organisateur_id
         where m.statut=?");
        $req->execute([
            $en_attente
        ]);
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }
    // les match accepter par admin for achteur
    public function Matchs(){
        $valide='valide';
        $req=$this->pdo->prepare("SELECT * from matchs where statut=?");
        $req->execute([
            $valide
        ]);
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function AddMatch($idOrg){
        if ($this->getCapacite()<0 || $this->getCapacite()>2000 ) {
            throw new Exception("la capacite doit etre inferieure a 2000 !");
        }
        $req=$this->pdo->prepare("INSERT INTO matchs (Nomequipe1,logoEquipe1,Nomequipe2,logoEquipe2,date,lieu, 
        heure, nbrPlaceMax, organisateur_id) 
        VALUES (?,?,?,?,?,?,?,?,?)");
        $match=$req->execute([
            $this->getNomEqui1(),$this->getLogoEqui1(),$this->getNomEqui2(),$this->getLogoEqui2(),$this->getDate(),$this->getLieu(),
            $this->getHeure(),$this->getCapacite(),
            $idOrg,
        ]);
        if (!$match) {
            return false;
        }
        $id_match=$this->pdo->lastInsertId();
        
            $this->categorie->AddCategorie($id_match);// utilise la composition (la methode du class Categorie)
            return true;
    }
    public function findMatchById($id){
        $req=$this->pdo->prepare("SELECT * from matchs where id=?");
        $req->execute([
            $id
        ]);
        return $req->fetch(PDO::FETCH_ASSOC);
    }
    // les categorie par match
    public function CatduMatch($id){
        $req=$this->pdo->prepare("SELECT c.id,c.prix,c.label from matchs m
        inner join categories c on c.match_id=m.id
        where m.id=?");
        $req->execute([
            $id
        ]);
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function AffichierComemntaire(Commentaire $comment,$id_match){
        $req=$this->pdo->prepare("SELECT c.*,u.nom,u.image from commentaires c
                    inner join users u on u.id=c.user_id  where match_id=?");
        $req->execute([
            $id_match
        ]);
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }
    // le nombredes commentaire par match
    public function nbrComemntaireMatch($id_match){
        $req=$this->pdo->prepare("SELECT count(*) as nbr from commentaires where match_id=?");
        $req->execute([
            $id_match
        ]);
        $nbr=$req->fetch(PDO::FETCH_ASSOC);
        return $nbr["nbr"] ;
    }   
    
    // accepter/refuse le match par admin   
    public function valideRefuseMatch($idMatch,$statut) {
        if ($statut==="valide"){
            $valide="valide";
            $req=$this->pdo->prepare("UPDATE matchs set statut=? where id=?")           ;
            return $req->execute([
                $statut,(int)$idMatch
            ]);
            // var_dump($res);
            // return $res;
        }
        if ($statut==="refuse"){
            $refuse="refuse";
            $req=$this->pdo->prepare("UPDATE matchs set statut=? where id=?")           ;
            return $req->execute([
                $refuse,(int)$idMatch
            ]);
            
        }

        
    }
    public function nbrDemandeMatch(){
        $en_attente='en_attente';
        $req=$this->pdo->prepare("SELECT count(*) as nbr from matchs where statut=?")           ;
        $req->execute([
                $en_attente,
        ]);
        $nbr=$req->fetch(PDO::FETCH_ASSOC);

        return $nbr["nbr"];
    }
    
}
?>