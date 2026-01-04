<?php
class Commentaire{
    private $id;
    private $contenu;

    private $id_match;
    private $id_user;

    public function __construct($contenu=null,$id_match=null,$id_user=null){
        $this->contenu=$contenu;
        $this->id_match=$id_match;
        $this->id_user=$id_user;
    }

    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getContenu() {
        return $this->contenu;
    }

    public function setContenu($contenu) {
        $this->contenu = $contenu;
    }


}

?>