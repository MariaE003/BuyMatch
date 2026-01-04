<?php
// require '../DB/Connect.php';
class Categorie{
    private $pdo;
    private array $cateName=[];
    private array $catePrice=[];

    public function getCatePrice() {return $this->catePrice;}
    public function getCateName() {return $this->cateName;}

    public function setCateName($cateName) {$this->cateName = $cateName;}
    public function setCatePrice($catePrice) {$this->catePrice = $catePrice;}


    public function __construct(){
        $this->pdo=Connect::connect();
    }


    public function AddCategorie($matId){
            $reqCat=$this->pdo->prepare("INSERT INTO categories (label, prix, match_id) 
            VALUES(?, ?, ?)");
        if (count($this->getCateName())>3) {
            throw new Exception("vous devais choisir trois categorie au maximum !!");
        }
        foreach($this->getCateName() as $index=>$cate ){
            $match=$reqCat->execute([
                $cate,
                $this->catePrice[$index],
                $matId
            ]);
    }
}

}
?>