<?php
require_once '../session.php';
require_once '../classes/MatchEvent.php';
require_once '../classes/Billet.php';

$rolePage="admin";

// var_dump($_POST);
// exit;

$match=new MatchEvent();
$matchEnAttent=$match->AffichierTousMatchs();


if (isset($_POST["action"])) {
    $idMatch=$_POST["idMatch"];
    // var_dump($idMatch);
    
    // if ($_POST["action"]==="valide") {
    $test=$match->valideRefuseMatch($idMatch,$_POST["action"]);
    // var_dump($test);
    // }
    // C:\Apache24\htdocs\BuyMatch\frontend\DashboardAdministrateur.php
    header("Location: DashboardAdministrateur.php");
    // if ($_POST["action"]==="refuse") {
        // $match->valideRefuseMatch($idMatch,$_POST["action"]);
        // }
    }
        
$bill=new Billet();
$billets=$bill->totalBillets();
$VentesBrutes=$bill->VentesBrutes();

?>
<!DOCTYPE html>
<html lang="fr" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elite League | Tactical Admin Hub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,700;0,900;1,700;1,900&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary: #818cf8;
            --accent: #f43f5e;
            --bg-deep: #020617;
            --glass-card: rgba(15, 23, 42, 0.6);
        }
        body { 
            font-family: 'Inter', sans-serif; 
            background-color: var(--bg-deep);
            color: #f8fafc;
        }
        .font-league { font-family: 'Montserrat', sans-serif; text-transform: uppercase; }
        .glass-panel { 
            background: var(--glass-card); 
            backdrop-filter: blur(20px); 
            border: 1px solid rgba(255, 255, 255, 0.05); 
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }
        .bento-grid { display: grid; grid-template-columns: repeat(12, 1fr); gap: 1.5rem; }
        .btn-action { transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); }
        .btn-action:hover { transform: translateY(-2px); box-shadow: 0 10px 15px -3px rgba(129, 140, 248, 0.3); }
        
        /* Status pulse */
        .status-pulse {
            width: 8px; height: 8px; border-radius: 50%; background: #10b981;
            box-shadow: 0 0 0 rgba(16, 185, 129, 0.4); animation: pulse 2s infinite;
        }
        @keyframes pulse { 0% { box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.7); } 70% { box-shadow: 0 0 0 10px rgba(16, 185, 129, 0); } 100% { box-shadow: 0 0 0 0 rgba(16, 185, 129, 0); } }
    </style>
</head>
<body class="flex h-screen p-6 overflow-hidden">

    <!-- Sidebar : Mini Slim Navigation -->
    <aside class="w-20 glass-panel rounded-[2.5rem] flex flex-col items-center py-8 gap-10 flex-shrink-0">
        <div class="text-indigo-500 text-2xl rotate-3"><i class="fas fa-bolt"></i></div>
        <nav class="flex flex-col gap-8">
            <a href="#" class="p-4 rounded-2xl bg-indigo-500/10 text-indigo-400" title="Dashboard"><i class="fas fa-th-large text-xl"></i></a>
            <a href="#" class="p-4 rounded-2xl text-slate-500 hover:bg-white/5 transition" title="Matchs"><i class="fas fa-gamepad text-xl"></i></a>
            <a href="#" class="p-4 rounded-2xl text-slate-500 hover:bg-white/5 transition" title="Utilisateurs"><i class="fas fa-user-shield text-xl"></i></a>
            <a href="#" class="p-4 rounded-2xl text-slate-500 hover:bg-white/5 transition" title="Paramètres"><i class="fas fa-sliders text-xl"></i></a>
        </nav>
        <a href="logout.php" class="mt-auto p-4 rounded-2xl text-rose-500 hover:bg-rose-500/10 transition"><i class="fas fa-power-off text-xl"></i></a>
    </aside>

    <!-- Main Workspace -->
    <main class="flex-1 ml-6 flex flex-col gap-6 overflow-hidden">
        
        <!-- Header Top -->
        <header class="flex justify-between items-center px-4">
            <div>
                <h1 class="font-league text-2xl font-black italic tracking-tighter">TACTICAL<span class="text-indigo-500">HUB</span></h1>
                <div class="flex items-center gap-2 mt-1">
                    <div class="status-pulse"></div>
                    <span class="text-[9px] font-black text-slate-500 uppercase tracking-widest italic italic">System Integrity : Secure</span>
                </div>
            </div>
            
            <div class="flex items-center gap-6">
                <div class="glass-panel px-4 py-2 rounded-2xl flex items-center gap-3">
                    <i class="fas fa-search text-slate-500 text-xs"></i>
                    <input type="text" placeholder="Global Search..." class="bg-transparent border-none outline-none text-xs w-48 font-medium">
                </div>
                <div class="flex items-center gap-4 border-l border-white/5 pl-6">
                    <div class="text-right">
                        <p class="text-xs font-bold">Admin_Core</p>
                        <p class="text-[9px] text-indigo-400 font-black uppercase">Root Access</p>
                    </div>
                    <div class="w-10 h-10 rounded-2xl bg-gradient-to-tr from-indigo-500 to-indigo-700 p-[2px]">
                        <img src="https://ui-avatars.com/api/?name=Admin&background=020617&color=fff" class="w-full h-full rounded-[14px] object-cover" alt="">
                    </div>
                </div>
            </div>
        </header>

        <!-- Bento Grid Layout -->
        <div class="flex-1 bento-grid overflow-y-auto pr-2 custom-scroll">
            
            <!-- 1. Stats Block (Large) -->
            <div class="col-span-12 lg:col-span-8 bento-grid">
                
                <!-- Stat Mini-Card -->
                <div class="col-span-4 glass-panel p-6 rounded-[2rem] flex items-center justify-between group overflow-hidden relative">
                    <div class="relative z-10">
                        <p class="text-[10px] font-black text-slate-500 uppercase mb-1 italic">Ventes Brutes</p>
                        <h4 class="text-2xl font-black font-league italic"><?=$VentesBrutes?> <span class="text-xs text-indigo-400">DH</span></h4>
                    </div>
                    <i class="fas fa-chart-line text-4xl text-white/5 absolute -right-2 -bottom-2 group-hover:text-indigo-500/20 transition-all"></i>
                </div>

                <!-- Stat Mini-Card -->
                <div class="col-span-4 glass-panel p-6 rounded-[2rem] flex items-center justify-between group overflow-hidden relative border-b-2 border-indigo-500">
                    <div class="relative z-10">
                        <p class="text-[10px] font-black text-slate-500 uppercase mb-1 italic">Billets Actifs</p>
                        <h4 class="text-2xl font-black font-league italic"><?=$billets?></h4>
                    </div>
                    <i class="fas fa-ticket text-4xl text-white/5 absolute -right-2 -bottom-2 transition-all"></i>
                </div>

                <!-- Stat Mini-Card -->
                <div class="col-span-4 glass-panel p-6 rounded-[2rem] flex items-center justify-between group overflow-hidden relative">
                    <div class="relative z-10">
                        <p class="text-[10px] font-black text-slate-500 uppercase mb-1 italic">Demandes Actives</p>
                        <h4 class="text-2xl font-black font-league italic"><?=$match->nbrDemandeMatch()?></h4>
                    </div>
                    <i class="fas fa-hourglass-half text-4xl text-white/5 absolute -right-2 -bottom-2 group-hover:text-amber-500/20 transition-all"></i>
                </div>

                <!-- 2. Match Validation Center (Main) -->
                <div class="col-span-12 glass-panel rounded-[2.5rem] p-8">
                    <div class="flex justify-between items-center mb-8 px-2">
                        <h3 class="font-league text-lg font-black italic uppercase italic">Validation <span class="text-indigo-500">Queue</span></h3>
                        <button class="text-[10px] font-black uppercase text-slate-500 border border-white/10 px-4 py-1.5 rounded-full hover:bg-white/5 transition">Tout voir</button>
                    </div>

                    <div class="space-y-4">

                        <?php
                        if (count($matchEnAttent)>0) {
                         foreach($matchEnAttent as $match) {  ?>
                        <!-- Match Item -->
                        <div class="flex items-center justify-between p-4 bg-white/[0.02] border border-white/5 rounded-3xl hover:bg-indigo-500/[0.02] hover:border-indigo-500/20 transition group">
                            <div class="flex items-center gap-6">
                                <div class="w-12 h-12 glass-panel rounded-2xl flex items-center justify-center font-league italic font-black text-indigo-500">VS</div>
                                <div>
                                    <div class="flex items-center gap-3">
                                        <p class="text-xs font-black uppercase italic tracking-tighter"><?=$match["Nomequipe1"]?><span class="text-slate-500 px-2 font-normal">X</span> <?=$match["Nomequipe2"]?></p>
                                        <span class="text-[8px] bg-orange-800 text-[#0a152f] px-2 py-0.5 rounded uppercase font-black"><?=$match["statut"]?></span>
                                    </div>
                                    <p class="text-[10px] text-slate-500 mt-1">Organisateur : <span class="text-white"><?=$match["nom"]?></span> • <?=$match["lieu"]?></p>
                                </div>
                            </div>
                            <div class="flex gap-2 opacity-0 group-hover:opacity-100 transition-all transform translate-x-4 group-hover:translate-x-0">
                                <form  method="POST">
                                    <input type="hidden" name="idMatch" value="<?=$match["idMatch"]?>">
                                    <button type="submit" name="action" value="valide" class="btn-action bg-emerald-500/10 text-emerald-500 px-4 py-2 rounded-xl text-[10px] font-black uppercase border border-emerald-500/20">Approuver</button>
                                    <button type="submit" name="action" value="refuse" class="btn-action bg-rose-500/10 text-rose-500 px-4 py-2 rounded-xl text-[10px] font-black uppercase border border-rose-500/20">Refuser</button>
                                </form>
                            </div>
                        </div>
                        <?php 
                            }
                             }else{
                            ?>
                                <div class="p-6 my-4 border border-dashed border-gray-500 bg-gray-800 rounded-xl text-center text-gray-300 flex flex-col items-center justify-center space-y-2">
                                    <i class="fas fa-comments-slash text-4xl text-gray-500"></i>
                                    <p class="text-sm font-semibold">Aucun demande l'instant.</p>
                                    <!-- <span class="text-xs text-gray-400">Soyez le premier à laisser un avis !</span> -->
                                </div>
                                <?php
                             }

                            ?>

                        <!-- Match Item 2 -->
                        <!-- <div class="flex items-center justify-between p-4 bg-white/[0.02] border border-white/5 rounded-3xl">
                            <div class="flex items-center gap-6">
                                <div class="w-12 h-12 glass-panel rounded-2xl flex items-center justify-center font-league italic font-black text-slate-500">VS</div>
                                <div>
                                    <p class="text-xs font-black uppercase italic tracking-tighter">Raja CA <span class="text-slate-500 px-2 font-normal">X</span> RS Berkane</p>
                                    <p class="text-[10px] text-slate-500 mt-1">Organisateur : <span class="text-white">FRMF</span> • Stade Mohammed V</p>
                                </div>
                            </div>
                            <button class="p-3 rounded-xl bg-white/5 text-slate-500"><i class="fas fa-ellipsis-v"></i></button>
                        </div> -->
                    </div>
                </div>
            </div>

            <!-- 3. Sidebar Intelligence (Right) -->
            <div class="col-span-12 lg:col-span-4 space-y-6">
                
                <!-- Users Management Control -->
                <div class="glass-panel rounded-[2.5rem] p-8 h-fit">
                    <h3 class="font-league text-lg font-black italic uppercase italic text-indigo-400 mb-6 tracking-widest text-center">Security <span class="text-white">Control</span></h3>
                    <div class="space-y-4">
                        <div class="p-4 bg-white/5 rounded-2xl flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-slate-800 flex items-center justify-center"><i class="fas fa-user text-[10px]"></i></div>
                                <div>
                                    <p class="text-[11px] font-bold">Hamid Elidrissi</p>
                                    <p class="text-[9px] text-slate-500 uppercase font-black italic">Organisateur</p>
                                </div>
                            </div>
                            <div class="flex gap-2">
                                <button class="w-7 h-7 bg-indigo-500/20 text-indigo-400 rounded-lg text-[10px]"><i class="fas fa-sync"></i></button>
                                <button class="w-7 h-7 bg-rose-500/20 text-rose-500 rounded-lg text-[10px]"><i class="fas fa-ban"></i></button>
                            </div>
                        </div>
                        <div class="p-4 bg-white/5 rounded-2xl flex items-center justify-between opacity-50">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-slate-800 flex items-center justify-center"><i class="fas fa-user text-[10px]"></i></div>
                                <p class="text-[11px] font-bold italic">User_Banned_#09</p>
                            </div>
                            <button class="text-[9px] font-black uppercase text-indigo-400">Restaurer</button>
                        </div>
                    </div>
                    <button class="w-full mt-6 py-4 rounded-2xl border border-dashed border-white/10 text-[9px] font-black uppercase tracking-widest text-slate-500 hover:border-indigo-500 hover:text-indigo-400 transition">Base de données complète</button>
                </div>

                <!-- Modération Avis (Bonus Section) -->
                <div class="glass-panel rounded-[2.5rem] p-8 border-t-2 border-rose-500/20">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="font-league text-xs font-black italic uppercase tracking-widest italic text-rose-500">Alertes Avis</h3>
                        <span class="text-[10px] bg-rose-500 text-white px-2 py-0.5 rounded-full font-bold">24</span>
                    </div>
                    <div class="space-y-4">
                        <div class="text-[10px] p-4 glass-panel border-l-2 border-rose-500 rounded-xl relative overflow-hidden">
                            <p class="text-slate-400 leading-relaxed italic">"Signalement: Langage offensif détecté dans les commentaires du match #88."</p>
                            <div class="mt-3 flex justify-between items-center relative z-10">
                                <span class="text-[8px] font-black text-rose-400 uppercase tracking-tighter italic">Urgent : Modération requise</span>
                                <button class="bg-white/10 p-2 rounded-lg hover:bg-rose-500 transition"><i class="fas fa-trash-alt text-[10px]"></i></button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <!-- Simple JS for UI feedback -->
    <script>
        document.querySelectorAll('.btn-action').forEach(btn => {
            btn.addEventListener('click', function() {
                this.closest('.flex').style.opacity = '0.5';
                this.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
                setTimeout(() => {
                    this.closest('.flex').remove();
                }, 1000);
            });
        });
    </script>
</body>
</html>