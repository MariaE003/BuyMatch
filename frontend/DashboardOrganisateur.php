<?php
require '../session.php';
require '../classes/MatchEvent.php';
$rolePage = "organisateur";
checkRole(['organisateur']);

$idUser=$_SESSION["user_id"];
$req=new MatchEvent();
$Match=$req->AffichierMatch($idUser);
// var_dump($Match);


?>
<!DOCTYPE html>
<html lang="fr" class="h-full bg-[#020617]">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elite League | Tactical Organizer Console</title>
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
        .icon-glow { filter: drop-shadow(0 0 5px var(--primary)); }
        
        /* Correction du layout Bento */
        .bento-grid { display: grid; grid-template-columns: repeat(12, 1fr); gap: 1.5rem; }
    </style>
</head>
<body class="flex h-screen overflow-hidden p-0">

    <!-- 2. MAIN WORKSPACE -->
    <div class="flex-1 flex flex-col min-w-0">
        
        <!-- Top Navigation (Inclusion de nav.php si c'est une barre horizontale) -->
        <?php if(file_exists('../frontend/composant/nav.php')) include '../frontend/composant/nav.php'; ?>

        <!-- Tactical Header -->
        <header class="flex justify-between items-center px-8 py-6 flex-shrink-0">
            <div>
                <h1 class="font-league text-2xl font-black italic tracking-tighter text-white">
                    TACTICAL <span class="text-indigo-500 text-3xl">CONSOLE</span>
                </h1>
                <p class="text-[9px] font-black text-slate-500 uppercase tracking-[0.3em] italic mt-1">
                    Organizer Privilege Access • System Live
                </p>
            </div>
            
            <div class="flex items-center gap-6">
                <a href="./Organisateur.php" class="bg-gradient-to-r from-indigo-600 to-indigo-500 px-8 py-3.5 rounded-2xl text-[10px] font-black uppercase tracking-widest text-white shadow-[0_10px_20px_-5px_rgba(129,140,248,0.4)] hover:-translate-y-0.5 transition-all">
                    <i class="fas fa-plus mr-2"></i> Créer un Match
                </a>
                <div class="flex items-center gap-4 border-l border-white/10 pl-6">
                    <div class="text-right">
                        <p class="text-xs font-bold italic text-slate-50">Organisateur Pro</p>
                        <p class="text-[9px] text-indigo-400 font-black uppercase tracking-tighter">ID: #ORG-2025</p>
                    </div>
                    <img src="https://ui-avatars.com/api/?name=Organizer&background=818cf8&color=fff" class="w-10 h-10 rounded-2xl border border-white/10" alt="Avatar">
                </div>
            </div>
        </header>

        <!-- 3. SCROLLABLE CONTENT AREA -->
        <main class="flex-1 overflow-y-auto custom-scroll px-8 pb-8">
            <div class="bento-grid">
                
                <!-- Stat Cards Row -->
                <div class="col-span-12 md:col-span-4 glass-panel p-8 rounded-[2.5rem] relative overflow-hidden group">
                    <p class="text-[10px] font-black text-slate-500 uppercase mb-2 italic tracking-widest">Billets Vendus</p>
                    <h4 class="text-4xl font-black font-league italic text-white">1,450</h4>
                    <p class="text-emerald-400 text-[10px] font-bold mt-2 uppercase tracking-tighter"><i class="fas fa-arrow-up mr-1"></i> +5.2% Performance</p>
                    <i class="fas fa-ticket-alt text-7xl text-white/5 absolute -right-4 -bottom-4 group-hover:rotate-12 transition-transform"></i>
                </div>

                <div class="col-span-12 md:col-span-4 glass-panel p-8 rounded-[2.5rem] relative overflow-hidden group border-b-2 border-indigo-500/40">
                    <p class="text-[10px] font-black text-slate-500 uppercase mb-2 italic tracking-widest">Chiffre d'Affaires</p>
                    <h4 class="text-4xl font-black font-league italic text-white">72,500 <span class="text-lg text-slate-400">DH</span></h4>
                    <p class="text-indigo-400 text-[10px] font-bold mt-2 uppercase tracking-tighter italic">Flux actif</p>
                    <i class="fas fa-sack-dollar text-7xl text-white/5 absolute -right-4 -bottom-4 group-hover:scale-110 transition-transform"></i>
                </div>

                <div class="col-span-12 md:col-span-4 glass-panel p-8 rounded-[2.5rem] relative overflow-hidden group">
                    <p class="text-[10px] font-black text-slate-500 uppercase mb-2 italic tracking-widest">Score Événement</p>
                    <h4 class="text-4xl font-black font-league italic text-white">4.9 <span class="text-indigo-500 text-sm">/ 5</span></h4>
                    <div class="flex gap-1 mt-2">
                        <i class="fas fa-star text-amber-500 text-[10px]"></i>
                        <i class="fas fa-star text-amber-500 text-[10px]"></i>
                        <i class="fas fa-star text-amber-500 text-[10px]"></i>
                        <i class="fas fa-star text-amber-500 text-[10px]"></i>
                        <i class="fas fa-star text-amber-500 text-[10px]"></i>
                    </div>
                    <i class="fas fa-ranking-star text-7xl text-white/5 absolute -right-4 -bottom-4 transition-transform"></i>
                </div>

                <!-- Match List (Main Section) -->
                <div class="col-span-12 lg:col-span-8 glass-panel rounded-[2.5rem] p-8">
                    <h3 class="font-league text-lg font-black italic uppercase text-white mb-8">Gestion des <span class="text-indigo-500">Matchs</span></h3>
                    
                    <?php foreach($Match as $match){  ?>

                    <div class="space-y-4 m-y-5" style="margin: 19px 0px;">
                        <div class="flex items-center justify-between p-6 bg-white/[0.02] border border-white/5 rounded-3xl hover:border-indigo-500/30 transition group">
                            <div class="flex items-center gap-6">
                                <div class="w-12 h-12 glass-panel rounded-2xl flex items-center justify-center font-league italic font-black text-indigo-500">VS</div>
                                <div>
                                    <h4 class="text-sm font-black uppercase italic text-white italic"><?=$match["Nomequipe1"]." X ".$match["Nomequipe2"]?></h4>
                                    <p class="text-[10px] text-slate-500 font-bold uppercase mt-1"><?=$match["lieu"]." • ". substr($match["heure"],0,5)?></p>
                                </div>
                            </div>
                            <div class="flex items-center gap-4">
                                <span class="badge-pending text-[8px] px-3 py-1 rounded-full font-black uppercase"><?=$match["statut"]?></span>
                                <!-- <button class="w-10 h-10 glass-panel rounded-xl flex items-center justify-center text-slate-400 hover:text-white transition"><i class="fas fa-edit"></i></button> -->
                                <a href="./matchCommentaires.php?id=<?= $match["id"]?>" class="w-10 h-10 glass-panel rounded-xl flex items-center justify-center text-slate-400 hover:text-white transition"><i class="fas fa-comments text-indigo-500"></i></a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>

                <!-- Sidebar Intelligence (Right) -->
                <div class="col-span-12 lg:col-span-4 space-y-6">
                    <div class="glass-panel rounded-[2.5rem] p-8 border-t-2 border-indigo-500/30">
                        <h3 class="font-league text-xs font-black italic uppercase text-indigo-400 mb-6 tracking-widest">Feed Utilisateurs</h3>
                        <div class="p-4 bg-white/5 rounded-2xl border border-white/5">
                            <p class="text-[11px] text-slate-300 italic leading-relaxed">"Système de billetterie ultra fluide, QR code généré instantanément."</p>
                            <div class="mt-4 flex justify-between items-center">
                                <span class="text-[8px] font-black uppercase text-indigo-500 italic">User_#842</span>
                                <div class="flex gap-0.5 text-amber-500 text-[8px]"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                            </div>
                        </div>
                    </div>

                    <!-- System Status -->
                    <div class="glass-panel rounded-[2.5rem] p-6 bg-gradient-to-br from-indigo-500/10 to-transparent">
                        <h4 class="text-[10px] font-black text-slate-500 uppercase tracking-widest mb-4 text-center">Intégrité Système</h4>
                        <div class="flex justify-around items-center">
                            <div class="text-center group">
                                <i class="fas fa-server text-indigo-400 mb-2 block opacity-60"></i>
                                <div class="h-1 w-8 bg-indigo-500 rounded-full"></div>
                            </div>
                            <div class="text-center group">
                                <i class="fas fa-database text-emerald-400 mb-2 block opacity-60"></i>
                                <div class="h-1 w-8 bg-emerald-500 rounded-full"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Inclusion du Footer à l'intérieur du scroll -->
            <?php 
            if(file_exists('../frontend/composant/footer.php')) : ?>
                <!-- <div class="mt-12 opacity-50">
                    <?php require '../frontend/composant/footer.php'; ?>
                </div> -->
            <?php endif; ?>
        </main>
    </div>

</body>
</html>