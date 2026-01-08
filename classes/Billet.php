<?php
require_once '../DB/Connect.php';
require_once '../fpdf/fpdf.php';


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
            // var_dump($firt);
            return $first["label"]."-1" ;
        }
    }
    // total price
    // qr_code || numero_place
    public function acheterBillets($user_id,$match_id,$categorie_id){
        if($this->quantite>4){
            throw new Exception("vous devez le droit d'acheter 4 billets au maximum !");
        }
        $req=$this->pdo->prepare("INSERT into billets (numero_place, id_code, user_id, match_id, categorie_id,quantite) values(?,?,?,?,?,?)");
        $req->execute([
            $this->numero_place,
            $this->id_code,
            $user_id,
            $match_id,
            $categorie_id,
            $this->quantite,
        ]); 
        return $this->pdo->lastInsertId();       
        
    }
    public function BilletVenir($user_id){
        $req=$this->pdo->prepare("SELECT b.*,m.*,monthname(m.date) as mois,day(m.date) as jour,year(m.date) as annee from billets b
        inner join matchs m on b.match_id = m.id
        where user_id=? and m.date>curDate()
        order by m.date");
        $req->execute([
            $user_id,
        ]); 
        return $req->fetchAll(PDO::FETCH_ASSOC);  
    }

    // historique
    public function BilletPasse($user_id){
        $req=$this->pdo->prepare("SELECT b.*,m.*,monthname(m.date) as mois,day(m.date) as jour,year(m.date) as annee from billets b
        inner join matchs m on b.match_id = m.id
        where user_id=? and m.date<curDate()
        order by m.date");
        $req->execute([
            $user_id,
        ]); 
        return $req->fetchAll(PDO::FETCH_ASSOC);  
    }
   
        public function genererPdf($idMatch,$user_id,$IdbilletsAcheter){
        $req=$this->pdo->prepare("SELECT b.numero_place,b.id_code,b.user_id,b.match_id,b.categorie_id,m.*,c.label from billets b
        inner join matchs m on b.match_id = m.id 
        inner join categories c on c.id=b.categorie_id
        where b.match_id=? and b.user_id=? and b.id=? ");
        $req->execute([$idMatch,$user_id,$IdbilletsAcheter]);
        $billet=$req->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($billet);

        $pdf=new FPDF();
        foreach($billet as $b){
            $pdf->AddPage();    
            // $pdf->Cell(0,10,$b["numero_place"],0,1);
            // $pdf->Cell(0,10,$b["id_code"],0,1);
            // $pdf->Cell(0,10,$b["user_id"],0,1);
            // $pdf->Cell(0,10,$b["Nomequipe1"],0,1);
            // $pdf->Cell(0,10,$b["Nomequipe2"],0,1);

            // bordure et font
            $pdf->SetFillColor(245,245,245);           
            $pdf->Rect(15,20,180,110,'F');            
            $pdf->SetDrawColor(200,0,50);             
            $pdf->Rect(15,20,180,110);                

            // header (titre du ticket)
            $pdf->SetFillColor(200,0,50);             
            $pdf->Rect(15,20,180,20,'F');             
            $pdf->SetFont('Arial','B',18);             
            $pdf->SetTextColor(255,255,255);          
            $pdf->SetXY(15,25);                       
            $pdf->Cell(180,10,'MATCH TICKET',0,0,'C');

            // les nom des equip
            $pdf->SetTextColor(0,0,0);               
            $pdf->SetFont('Arial','B',16);             
            $pdf->SetXY(15,45);                       
            $pdf->Cell(180,10,$b['Nomequipe1'].' VS '.$b['Nomequipe2'],0,0,'C');

            // ligne pour separer
            $pdf->SetDrawColor(200,0,50);             
            $pdf->Line(25,58,185,58);                 

            // info du ticket
            $pdf->SetFont('Arial','',11);              
            $pdf->SetXY(25,65);                       
            $pdf->Cell(40,8,'Place:',0,0);             
            $pdf->Cell(40,8,$b['numero_place'],0,1);   
            $pdf->SetX(25);
            $pdf->Cell(40,8,'Categorie:',0,0);          
            $pdf->Cell(40,8,$b['label'],0,1);          

            $pdf->SetXY(115,65);                      
            $pdf->Cell(30,8,'Date:',0,0);              
            $pdf->Cell(40,8,$b['date'],0,1);          
            $pdf->SetX(115);
            $pdf->Cell(30,8,'Stade:',0,0);             
            $pdf->Cell(40,8,$b['lieu'],0,1);

            // code ticket
            $pdf->SetFillColor(40,40,40);       
            $pdf->Rect(25,95,160,12,'F');               
            $pdf->SetTextColor(255,255,255);      
            $pdf->SetFont('Arial','B',12);           
            $pdf->SetXY(25,98);
            $pdf->Cell(160,6,'CODE : '.$b['id_code'],0,0,'C'); 

            //  footer
            $pdf->SetFont('Arial','I',9);               
            $pdf->SetTextColor(120,120,120);            
            $pdf->SetXY(15,112);
            $pdf->Cell(180,6,'BuyMatch - Ticket Officiel',0,0,'C');

            
        }
        // sauvegarder lefichier pdf pour utiliser dans senEmail()
        $file="billet_match_".$idMatch.".pdf";
        $pdf->Output('F',$file);
        return $file;                             
    } 
    public function sendEmail($toEmail,$toName,$pdfFile){
        require '../PHPMailer/src/PHPMailer.php';
        require '../PHPMailer/src/SMTP.php';
        require '../PHPMailer/src/Exception.php';

        
        try {
            $mail=new PHPMailer\PHPMailer\PHPMailer(true);
            $mail->isSMTP();
        $mail->Host       = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth   = true;
        $mail->Username   = '4f54d28a136c37'; // ton email
        $mail->Password   = '27421923509a2a';  //  password 
        $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 2525;

        $mail->setFrom('marigotbi@gmail.com', 'BuyMatch');
        $mail->addAddress($toEmail, $toName);

        // attachment
        $mail->addAttachment($pdfFile);

        // contenue
        $mail->isHTML(true);
        $mail->Subject = 'Votre ticket pour le match';
        $mail->Body    = "<p>Bonjour $toName,</p>
                          <p>Merci pour votre reservation. Veuillez trouver votre ticket en piece jointe.</p>";
        $mail->AltBody = "Bonjour $toName, Merci pour votre reservation. Veuillez trouver votre ticket en piece jointe.";

        $mail->send();
        echo "Email envoye ";

        // supprimer le file temporaire 
        if(file_exists($pdfFile)){
            unlink($pdfFile);
        }

        } catch (Exception $e) {
        echo "Erreur lors de l'envoi de l'email:". $e->getMessage();
    }
    }

    public function deminuerNombredesPlaces($qt,$match_id){
        $req=$this->pdo->prepare("UPDATE matchs set nbrPlaceMax=nbrPlaceMax-? where id=?");
        return $req->execute([
            $qt,
            $match_id,
        ]);
    }

    public function totalBillets(){
        $req=$this->pdo->prepare("SELECT count(*) as nombre from billets");
        $req->execute();
        $res=$req->fetch(PDO::FETCH_ASSOC);
        // var_dump($res["nombre"]);
        return $res["nombre"];
    }


    public function VentesBrutes(){
        $req=$this->pdo->prepare("SELECT sum(b.quantite * c.prix) as ventebrute from billets b
        inner join categories c on c.id=b.categorie_id")           ;
        $req->execute();
        $nbr=$req->fetch(PDO::FETCH_ASSOC);

        return $nbr["ventebrute"];
    }

}
?>
