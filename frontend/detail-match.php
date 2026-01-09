<?php

require '../session.php';
// $rolePage="acheteur";
// checkRole(['admin','acheteur']);//org??

require_once "../classes/MatchEvent.php";
require_once "../classes/Billet.php";
require_once "../classes/Auth.php";

$usee_id=$_SESSION["user_id"];
$idMatch=$_GET["id"];


$matchs=new MatchEvent();
$match=$matchs->findMatchById($idMatch);
$cate=$matchs->CatduMatch($idMatch);
$erreur='';


if (isset($_POST["envoyer"])) {
    if (!empty($_POST["quantity"]) && !empty($_POST["category"])) {
        # numero_place, qr_code,quantite, user_id, match_id, categorie_id

        // idcat
        $categorie_id=$_POST["category"];
        // echo $categorie_id;
        $qt=(int) $_POST["quantity"];
        // var_dump($qt);
        try{
            $billet=new Billet();
            $billet->setQuantite($_POST["quantity"]);
            $idBillet=[];
            for ($i=0; $i <$qt ; $i++) { 
            $NumPlace=$billet->getLastPlace($categorie_id,$idMatch);
            $billet->genererIdCode($usee_id,$idMatch,$categorie_id,$i);//i pour eviter duplicate
            $billet->setNumeroPlace($NumPlace);

            
            $idBil=$billet->acheterBillets($usee_id,$idMatch,$categorie_id);
            $idBillet[]=$idBil;
        }
        if ($idBillet) {
            $billet->deminuerNombredesPlaces($_POST["quantity"],$idMatch);

            $IdbilletsAcheter=implode(",",$idBillet);
            $pdf = $billet->genererPdf($idMatch,$usee_id,$IdbilletsAcheter);
            if(file_exists($pdf)){
                echo "PDF trouvé: $pdf";
            }else{
                echo "PDF non trouvé!";
            }

            // Envoyer l'email
            // ghanjib email et nom du user
            // 
            
            $userInfo=new Auth();
            $userInfo1=$userInfo->affichierInfo($usee_id);
            $billet->sendEmail($userInfo1["email"],$userInfo1["nom"], $pdf);      
        }
            // echo '<script> alert('') </script>'
            // header("Location: Acheteur.php?id=$idBillet");
            header("Location: Acheteur.php");

        }catch(Exception $e){
            $erreur='<div class="p-4 mb-4 text-red-700 bg-red-100 rounded"> erreur :'.$e->getMessage().'</div>';
        }
    }
    // echo $_POST["quantity"],$_POST["category"];
}
?>

<!DOCTYPE html>
<html lang="fr" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elite Stadium Pass | Détails du Match</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,700;0,900;1,700;1,900&family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary: #6366f1;
            --dark-bg: #05070a;
            --glass: rgba(255, 255, 255, 0.03);
            --glass-border: rgba(255, 255, 255, 0.08);
        }
        body { 
            font-family: 'Inter', sans-serif; 
            background-color: var(--dark-bg);
            color: #e2e8f0;
        }
        .font-league { font-family: 'Montserrat', sans-serif; text-transform: uppercase; letter-spacing: -0.02em; }
        .glass { background: var(--glass); backdrop-filter: blur(12px); border: 1px solid var(--glass-border); }
        .btn-gradient { background: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%); }
        
        .team-vs-anim { animation: pulse 2s infinite; }
        @keyframes pulse {
            0%, 100% { transform: scale(1); opacity: 0.2; }
            50% { transform: scale(1.1); opacity: 0.5; }
        }

        .category-card.selected {
            border-color: var(--primary);
            background: rgba(99, 102, 241, 0.1);
            box-shadow: 0 0 20px rgba(99, 102, 241, 0.2);
        }
    </style>
</head>
<body class="min-h-screen flex flex-col">

    <!-- Navbar -->
    <nav class="glass sticky top-0 z-50 px-6 py-4 border-b border-white/5">
        <div class="max-w-[1400px] mx-auto flex justify-between items-center">
            <div class="flex items-center gap-4">
                <a href="../index.php" class="flex items-center gap-4">
                    <div class="w-10 h-10 bg-indigo-600 rounded-xl flex items-center justify-center rotate-3">
                        <i class="fas fa-arrow-left text-white"></i>
                    </div>
                    <span class="font-league text-2xl font-black italic">MATCH<span class="text-indigo-500">CENTER</span></span>
                </a>
            </div>
            <div class="flex items-center gap-6">
                <span class="text-[10px] font-black text-slate-500 uppercase tracking-widest hidden md:block">Connecté en tant que : Ahmed B.</span>
                <img src="https://ui-avatars.com/api/?name=Ahmed+B&background=6366f1&color=fff" class="w-8 h-8 rounded-full border border-white/10" alt="">
            </div>
        </div>
    </nav>

    <!-- Match Hero Header -->
    <header class="relative h-[45vh] flex items-center justify-center overflow-hidden border-b border-white/5">
        <div class="absolute inset-0 z-0">
            <div class="absolute inset-0 bg-gradient-to-b from-indigo-900/20 to-[#05070a] z-10"></div>
            <img src="https://images.unsplash.com/photo-1522778119026-d647f0596c20?q=80&w=2000" class="w-full h-full object-cover opacity-20" alt="">
        </div>

        <div class="relative z-20 w-full max-w-5xl px-6 flex flex-col md:flex-row items-center justify-between gap-12">
            <!-- Team 1 -->
            <div class="text-center space-y-4">
                <div class="w-32 h-32 md:w-48 md:h-48 glass rounded-full flex items-center justify-center p-8 mx-auto border-2 border-indigo-500/30">
                    <i class="fas fa-shield-halved text-6xl md:text-8xl text-indigo-500 drop-shadow-[0_0_15px_rgba(99,102,241,0.5)]"></i>
                </div>
                <h2 class="font-league text-2xl md:text-4xl font-black italic"><?= $match["Nomequipe1"] ?></h2>
            </div>

            <!-- VS Divider -->
            <div class="text-center">
                <div class="font-league text-6xl md:text-8xl font-black italic text-white/10 team-vs-anim">VS</div>
                <div class="mt-4 bg-white/5 px-6 py-2 rounded-full border border-white/10">
                    <span class="text-[10px] font-black uppercase tracking-[0.3em] text-indigo-400">Matchday 14</span>
                </div>
            </div>

            <!-- Team 2 -->
            <div class="text-center space-y-4">
                <div class="w-32 h-32 md:w-48 md:h-48 glass rounded-full flex items-center justify-center p-8 mx-auto border-2 border-red-500/30">
                    <i class="fas fa-shield-halved text-6xl md:text-8xl text-red-500 drop-shadow-[0_0_15px_rgba(239,68,68,0.5)]"></i>
                </div>
                <h2 class="font-league text-2xl md:text-4xl font-black italic"><?= $match["Nomequipe2"] ?></h2>
            </div>
        </div>
    </header>

    <!-- Content Grid -->
    <main class="max-w-[1400px] mx-auto w-full px-6 py-12 grid grid-cols-1 lg:grid-cols-3 gap-12">
        
        <!-- Left Column: Info & Booking -->
        <div class="lg:col-span-2 space-y-12">
            
            <!-- Information du Match -->
            <div class="glass rounded-[2.5rem] p-8 md:p-12">
                <h3 class="font-league text-2xl font-black italic mb-8 uppercase tracking-tighter">Information <span class="text-indigo-500">Match</span></h3>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                    <div>
                        <p class="text-[10px] font-black text-slate-500 uppercase mb-2">Date</p>
                        <p class="text-sm font-bold"><i class="far fa-calendar text-indigo-500 mr-2"></i> <?= $match["date"] ?></p>
                    </div>
                    <div>
                        <p class="text-[10px] font-black text-slate-500 uppercase mb-2">Coup d'envoi</p>
                        <p class="text-sm font-bold"><i class="far fa-clock text-indigo-500 mr-2"></i> <?= substr($match["heure"],0,5) ?></p>
                    </div>
                    <div>
                        <p class="text-[10px] font-black text-slate-500 uppercase mb-2">Lieu</p>
                        <p class="text-sm font-bold"><i class="fas fa-map-marker-alt text-indigo-500 mr-2"></i> <?= $match["lieu"] ?></p>
                    </div>
                    <div>
                        <p class="text-[10px] font-black text-slate-500 uppercase mb-2">Durée</p>
                        <p class="text-sm font-bold"><i class="fas fa-stopwatch text-indigo-500 mr-2"></i><?= $match["duree"] ?> MIN</p>
                    </div>
                </div>
            </div>

            <!-- Réservation (Action Utilisateur) -->
            <div class="glass rounded-[2.5rem] p-8 md:p-12 border-l-4 border-indigo-500">
                <div class="flex justify-between items-center mb-10">
                    <h3 class="font-league text-2xl font-black italic uppercase tracking-tighter">Réserver vos <span class="text-indigo-500">Places</span></h3>
                    <span class="text-[10px] bg-white/10 px-4 py-1 rounded-full font-bold uppercase text-slate-400">Max 4 billets</span>
                </div>
                <?=$erreur?$erreur:''?>
                <form  method="POST" class="space-y-10" >
                    <!-- Sélection de Catégorie -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- Cat 1 -->
                         <?php foreach($cate as $categ){  ?>
                        <label class="category-card glass p-6 rounded-3xl cursor-pointer transition relative group border-2 border-transparent">
                            <input type="radio" name="category"  value="<?=$categ["id"]?>" id="<?=$categ["id"]?>" data-price="<?=$categ["prix"]?>" class="hidden">
                            <!-- <p class="text-[10px] font-black text-slate-500 uppercase mb-2">Premium</p> -->
                            <p class="font-league text-xl font-black italic"><?=$categ["label"]?></p>
                            <p class="text-indigo-400 font-black mt-4"><?=$categ["prix"]?></p>
                            <!-- <i class="fas fa-crown absolute top-6 right-6 text-indigo-500 opacity-20 group-hover:opacity-100 transition"></i> -->
                        </label>
                        <?php } ?>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 ">
                        <div>
                            <label class="text-[10px] font-black text-slate-500 uppercase block mb-4 ">Nombre de billets</label>
                            <div class="flex items-center gap-4 bg-white/5 p-2 rounded-2xl border border-white/5 w-fit">
                                <button type="button" onclick="changeQty(-1)" class="w-10 h-10 rounded-xl glass hover:bg-indigo-600 transition">-</button>
                                <input type="number" id="qty" name="quantity" value="1" min="1" max="4" readonly class="bg-transparent w-12 text-center font-bold outline-none">
                                <button type="button" onclick="changeQty(1)" class="w-10 h-10 rounded-xl glass hover:bg-indigo-600 transition">+</button>
                            </div>
                        </div>
                        <!-- <div>
                            <label class="text-[10px] font-black text-slate-500 uppercase block mb-4">Place numérotée (Optionnel)</label>
                            <input type="text" placeholder="Ex: B-24" class="w-full bg-white/5 border border-white/5 rounded-2xl p-4 outline-none focus:border-indigo-500 transition font-bold uppercase">
                        </div> -->
                    </div>

                    <div class="pt-8 border-t border-white/5 flex flex-col md:flex-row justify-between items-center gap-6">
                        <div>
                            <p class="text-xs text-slate-500 font-bold uppercase italic">Total à payer</p>
                            <p id="totalPrice" class="font-league text-4xl font-black italic tracking-tighter">0 DH</p>
                        </div>
                        <button type="submit" name="envoyer" class="btn-gradient px-12 py-5 rounded-2xl font-black text-xs uppercase tracking-[0.2em] shadow-xl w-full md:w-auto">
                            Confirmer la réservation
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Right Column: Stats, Stadium & Reviews -->
        <div class="space-y-12">
            
            <!-- Stadium Card -->
            <div class="glass rounded-[2.5rem] p-8">
                <h4 class="font-league text-lg font-black italic mb-6">Le <span class="text-indigo-500">Stade</span></h4>
                <div class="rounded-3xl overflow-hidden h-48 bg-slate-800 mb-6 relative">
                    <img src="https://images.unsplash.com/photo-1540747913346-19e3ad6466b9?q=80&w=1000" class="w-full h-full object-cover opacity-60" alt="">
                    <div class="absolute inset-0 flex items-center justify-center">
                        <button class="bg-white text-black p-4 rounded-full shadow-2xl hover:scale-110 transition">
                            <i class="fas fa-map-marked-alt"></i>
                        </button>
                    </div>
                </div>
                <p class="text-sm font-bold uppercase italic"><?=$match["lieu"]?></p>
                <p class="text-xs text-slate-500 mt-1">Capacité : <?=$match["nbrPlaceMax"]?> Spectateurs</p>
            </div>

            <!-- Notes & Avis (Bonus Section) -->
            <div class="glass rounded-[2.5rem] p-8">
                <div class="flex justify-between items-center mb-8">
                    <h4 class="font-league text-lg font-black italic italic">Avis <span class="text-indigo-500">Fans</span></h4>
                    <div class="text-right">
                        <div class="flex text-yellow-500 text-xs mb-1">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                        </div>
                        <span class="text-[10px] font-black text-slate-500 uppercase">4.8 / 5.0</span>
                    </div>
                </div>

                <div class="space-y-6">
                    <!-- Un avis -->
                    <div class="p-4 bg-white/5 rounded-2xl border border-white/5">
                        <div class="flex items-center gap-3 mb-3">
                            <img src="https://ui-avatars.com/api/?name=Samir+H" class="w-6 h-6 rounded-full" alt="">
                            <span class="text-[10px] font-bold">Samir H.</span>
                        </div>
                        <p class="text-xs text-slate-400 italic font-light">"Ambiance électrique prévue ! Le processus d'achat sur Elite Stadium est top."</p>
                    </div>
                    <!-- Formulaire d'avis (si match fini - conditionnel en PHP) -->
                    <div class="pt-6 border-t border-white/5">
                        <a href="./matchCommentaires.php?id=<?=$idMatch?>" class="text-[10px] font-black text-slate-500 uppercase mb-4 text-center italic underline">Laisser un commentaire après le match</a>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-black/50 border-t border-white/5 py-10 px-6 mt-auto">
        <div class="max-w-7xl mx-auto text-center">
            <p class="text-[10px] font-bold text-slate-600 uppercase tracking-[0.3em]">© 2025 Elite Stadium Pass • Billetterie Officielle Sécurisée</p>
        </div>
    </footer>

    <!-- Script de gestion dynamique -->
    <script>
        function changeQty(val) {
            const qtyInput = document.getElementById('qty');
            let current = parseInt(qtyInput.value);
            current += val;
            if (current >= 1 && current <= 6) {
                qtyInput.value = current;
                updateTotal();
            }
        }

        function updateTotal() {
            const selectedCat = document.querySelector('input[name="category"]:checked');
            const qty = parseInt(document.getElementById('qty').value);
            const totalDisplay = document.getElementById('totalPrice');

            if (selectedCat) {
                const price = parseInt(selectedCat.dataset.price);
                totalDisplay.innerText = (price * qty) + " DH";
            }
        }

        // Event listeners pour les catégories
        document.querySelectorAll('.category-card').forEach(card => {
            card.addEventListener('click', () => {
                document.querySelectorAll('.category-card').forEach(c => c.classList.remove('selected'));
                card.classList.add('selected');
                updateTotal();
            });
        });
    </script>
</body>
</html>