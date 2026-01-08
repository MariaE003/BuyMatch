<?php
require '../classes/MatchEvent.php';
require '../classes/Billet.php';
require '../session.php';
// require '../classes/Commentaire.php';
$messageErreur='';
$match_id=$_GET["id"];
$iduser=$_SESSION["user_id"];

// echo $_SESSION["role"];

$comment=new Commentaire();

if (isset($_POST["envoyer"])) {
    if (!empty($_POST["comment"])) {
        // $comment->
        try {
            
            $comment->setContenu($_POST["comment"]);

            $comment->virifierMatchDate($match_id);
            $comment->crrerComment($iduser,$match_id);
        } catch (Exception $e){
            //throw $th;
            $messageErreur="<div class='p-4 mb-4 text-red-700 bg-red-100 rounded'>".$e->getMessage()."</div>";
        }
    }
}
// echo $match_id;
$match=new MatchEvent();
$InfoMatch=$match->findMatchById($match_id);
// var_dump($InfoMatch);
$commentMatch=$match->AffichierComemntaire($comment,$match_id);
// var_dump($commentMatch);
$nrbComent=$match->nbrComemntaireMatch($match_id);


?>
<!DOCTYPE html>
<html lang="fr" class="h-full bg-[#020617]">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elite League | Gestion des Commentaires</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,700;0,900;1,700;1,900&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary: #818cf8;
            --secondary: #6366f1;
            --accent: #f59e0b;
            --success: #10b981;
            --bg-deep: #020617;
            --glass-card: rgba(15, 23, 42, 0.6); 
            --glass-border: rgba(255, 255, 255, 0.05); 
        }
        body { 
            font-family: 'Inter', sans-serif; 
            background-color: var(--bg-deep);
            color: #f8fafc;
        }
        .font-league { font-family: 'Montserrat', sans-serif; text-transform: uppercase; }
        .glass-panel { 
            background: var(--glass-card); 
            backdrop-filter: blur(25px); 
            border: 1px solid var(--glass-border); 
        }
        .custom-scroll::-webkit-scrollbar { width: 4px; }
        .custom-scroll::-webkit-scrollbar-thumb { background: rgba(129, 140, 248, 0.2); border-radius: 10px; }
        .bento-grid { display: grid; grid-template-columns: repeat(12, 1fr); gap: 1.5rem; }
        
        .comment-gradient {
            background: linear-gradient(90deg, rgba(129, 140, 248, 0.05) 0%, transparent 100%);
        }
    </style>
</head>
<body class="flex h-screen overflow-hidden p-0">

    <!-- SIDEBAR (Placeholder) -->
    <aside class="w-64 glass-panel border-r border-white/5 hidden lg:flex flex-col">
        <div class="p-8">
            <div class="text-indigo-500 font-black text-2xl font-league italic">ELITE<span class="text-white">L.</span></div>
        </div>
        <nav class="flex-1 px-4 space-y-2">
            <a href="#" class="flex items-center gap-4 p-4 text-slate-400 hover:text-white hover:bg-white/5 rounded-2xl transition">
                <i class="fas fa-th-large"></i> <span class="text-xs font-bold uppercase tracking-widest">Dashboard</span>
            </a>
            <a href="#" class="flex items-center gap-4 p-4 text-white bg-indigo-500/10 border border-indigo-500/20 rounded-2xl transition">
                <i class="fas fa-comments text-indigo-500"></i> <span class="text-xs font-bold uppercase tracking-widest">Commentaires</span>
            </a>
        </nav>
    </aside>

    <!-- MAIN WORKSPACE -->
    <div class="flex-1 flex flex-col min-w-0">
        
        <!-- Tactical Header -->
        <header class="flex justify-between items-center px-8 py-6 flex-shrink-0">
            <div>
                <h1 class="font-league text-2xl font-black italic tracking-tighter text-white">
                    MODERATION <span class="text-indigo-500 text-3xl">CENTER</span>
                </h1>
                <p class="text-[9px] font-black text-slate-500 uppercase tracking-[0.3em] italic mt-1">
                    Community Feedback • Live Stream Monitoring
                </p>
            </div>
            
            <div class="flex items-center gap-6">
                <div class="flex items-center gap-4 border-l border-white/10 pl-6">
                    <div class="text-right">
                        <p class="text-xs font-bold italic text-slate-50">Admin Moderator</p>
                        <p class="text-[9px] text-indigo-400 font-black uppercase tracking-tighter">Status: Online</p>
                    </div>
                    <img src="https://ui-avatars.com/api/?name=Admin&background=818cf8&color=fff" class="w-10 h-10 rounded-2xl border border-white/10" alt="Avatar">
                </div>
            </div>
        </header>

        <!-- SCROLLABLE CONTENT AREA -->
        <main class="flex-1 overflow-y-auto custom-scroll px-8 pb-8">
            <div class="bento-grid">
                
                <!-- Match Selector & Comments (Left) -->
                <div class="col-span-12 lg:col-span-8 space-y-6">
                    
                    <!-- Match Info Card -->
                    <div class="glass-panel rounded-[2.5rem] p-6 border-l-4 border-indigo-500">
                        <div class="flex flex-wrap items-center justify-between gap-4">
                            <div class="flex items-center gap-6">
                                <div class="w-16 h-16 glass-panel rounded-3xl flex items-center justify-center font-league italic font-black text-2xl text-indigo-500 shadow-lg shadow-indigo-500/10">VS</div>
                                <div>
                                    <div class="flex items-center gap-3">
                                        <h4 class="text-xl font-black uppercase italic text-white tracking-tighter"><?=$InfoMatch["Nomequipe1"]?><span class="text-indigo-500">X</span><?=$InfoMatch["Nomequipe2"]?></h4>
                                        <!-- <span class="bg-emerald-500/10 text-emerald-500 text-[8px] px-2 py-0.5 rounded-full font-black uppercase border border-emerald-500/20">En Direct</span> -->
                                    </div>
                                    <p class="text-[10px] text-slate-500 font-bold uppercase mt-1 tracking-widest"><i class="fas fa-map-marker-alt mr-1 text-indigo-500"></i><?=$InfoMatch["lieu"] ." • ".substr($InfoMatch["heure"],0,5 )?></p>
                                </div>
                            </div>
                            <div class="flex gap-2">
                                <div class="text-center px-4 py-2 bg-white/5 rounded-2xl border border-white/5">
                                    <p class="text-[9px] font-black text-slate-500 uppercase">Commentaires</p>
                                    <p class="text-lg font-black text-white italic"><?=$nrbComent?></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Comments Feed -->
                    <div class="glass-panel rounded-[2.5rem] flex flex-col h-[600px]">
                        <div class="p-6 border-b border-white/5 flex justify-between items-center">
                            <h3 class="font-league text-sm font-black italic uppercase text-white tracking-widest">Discussion <span class="text-indigo-500"></span></h3>
                        </div>

                        <!-- Scrollable Comments -->
                        <div class="flex-1 overflow-y-auto p-6 space-y-6 custom-scroll">
                            
                            <!-- Comment Item 1 -->
                             
                             <?php
                             echo $messageErreur?$messageErreur:'';
                             if (count($commentMatch)>0) {
                             foreach($commentMatch as $comment){                             
                             ?>
                            <div class="flex gap-4 group">
                                <img src="<?=$comment["image"]?>" class="w-10 h-10 rounded-xl" alt="">
                                <div class="flex-1">
                                    <div class="flex items-baseline justify-between mb-1">
                                        <h5 class="text-xs font-black uppercase italic text-indigo-400"><?=$comment["nom"]?>
                                        </h5>
                                    </div>                                    
                                    
                                    <!-- button delete -->
                                    <div class="group relative p-4 rounded-2xl rounded-tl-none bg-white/[0.03] border border-white/5 text-sm text-slate-300 leading-relaxed italic">
                                        
                                        <?=$comment["commentaire"]?>
                                        
                                        <!-- Le bouton de suppression -->
                                        <?php if ($_SESSION["role"] === "admin") {?>
                                        <button type="submit" name="delect" value="<?=$comment["id"]?>" class="absolute top-2 right-2 w-8 h-8 flex items-center justify-center bg-rose-500/20 rounded-lg border border-rose-500/30 
                                            opacity-0 group-hover:opacity-100 transition-all duration-300 hover:bg-rose-500 hover:text-white">
                                            <i class="fa-regular fa-trash-can text-rose-500 group-hover:text-white text-xs"></i>
                                        </button>
                                        <?php 
                                        }
                                        ?>
                                    
                                </div> 
                                </div>
                            </div>
                            <?php 
                            }
                             }else{
                            ?>
                                <div class="p-6 my-4 border border-dashed border-gray-500 bg-gray-800 rounded-xl text-center text-gray-300 flex flex-col items-center justify-center space-y-2">
                                    <i class="fas fa-comments-slash text-4xl text-gray-500"></i>
                                    <!-- <p class="text-sm font-semibold">Aucun commentaire pour ce match pour l'instant.</p> -->
                                    <span class="text-xs text-gray-400">Soyez le premier à laisser un avis !</span>
                                </div>
                                <?php
                             }

                            ?>
                        </div>
                        <!-- Input Area -->
                        <?php if ($_SESSION["role"] !== "organisateur" && $_SESSION["role"] !== "admin") {
                            ?>
                        <form method="POST" class="p-6 border-t border-white/5 bg-white/[0.01]">
                            <div class="relative">
                                <input type="text" name="comment" placeholder="Ajouter un commentaire officiel..." class="w-full bg-white/5 border border-white/10 rounded-2xl py-4 pl-6 pr-32 text-sm text-white focus:outline-none focus:border-indigo-500/50 transition">
                                <button type="submit" name="envoyer" class="absolute right-2 top-2 bottom-2 bg-indigo-500 hover:bg-indigo-600 px-6 rounded-xl text-[10px] font-black uppercase tracking-widest transition-all" >
                                    Envoyer
                                </button>
                            </div>
                        </form>
                        <?php } ?>
                    </div>
                </div>

                <!-- Sidebar Stats (Right) -->
                <div class="col-span-12 lg:col-span-4 space-y-6">
                    <?php
                        $biller=new Billet();
                        $billerVendus=$biller->BilletsVendusParMatch($match_id);

                        $chiffre= $biller->chiffreAffaire($match_id);
                    ?>
                    <div class="col-span-12 md:col-span-4 glass-panel p-8 rounded-[2.5rem] relative overflow-hidden group">
                        <p class="text-[10px] font-black text-slate-500 uppercase mb-2 italic tracking-widest">Billets Vendus</p>
                        <h4 class="text-4xl font-black font-league italic text-white"><?=$billerVendus?></h4>
                        <p class="text-emerald-400 text-[10px] font-bold mt-2 uppercase tracking-tighter"><i class="fas fa-arrow-up mr-1"></i> +5.2% Performance</p>
                        <i class="fas fa-ticket-alt text-7xl text-white/5 absolute -right-4 -bottom-4 group-hover:rotate-12 transition-transform"></i>
                    </div>

                    <div class="col-span-12 md:col-span-4 glass-panel p-8 rounded-[2.5rem] relative overflow-hidden group border-b-2 border-indigo-500/40">
                    <p class="text-[10px] font-black text-slate-500 uppercase mb-2 italic tracking-widest">Chiffre d'Affaires</p>
                    <h4 class="text-4xl font-black font-league italic text-white"><?=$chiffre?$chiffre:0?><span class="text-lg text-slate-400">DH</span></h4>
                    <p class="text-indigo-400 text-[10px] font-bold mt-2 uppercase tracking-tighter italic">Flux actif</p>
                    <i class="fas fa-sack-dollar text-7xl text-white/5 absolute -right-4 -bottom-4 group-hover:scale-110 transition-transform"></i>
                </div>
                </div>
            </div>
        </main>
    </div>

</body>
</html>