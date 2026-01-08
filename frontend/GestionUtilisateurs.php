<?php
require_once '../session.php';
require_once '../classes/Auth.php';


// echo $user_id;
$user=new Auth();

$AfficherUsers=$user->affichierTousInfo();
// var_dump($AfficherUsers);
// $gerer=$user->gererUsers($user_id);

?>
<!DOCTYPE html>
<html lang="fr" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elite League | Security Database</title>
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
        .custom-scroll::-webkit-scrollbar { width: 4px; }
        .custom-scroll::-webkit-scrollbar-track { background: transparent; }
        .custom-scroll::-webkit-scrollbar-thumb { background: #334155; border-radius: 10px; }
        
        .status-pulse {
            width: 8px; height: 8px; border-radius: 50%; background: #10b981;
            box-shadow: 0 0 0 rgba(16, 185, 129, 0.4); animation: pulse 2s infinite;
        }
        @keyframes pulse { 0% { box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.7); } 70% { box-shadow: 0 0 0 10px rgba(16, 185, 129, 0); } 100% { box-shadow: 0 0 0 0 rgba(16, 185, 129, 0); } }
        
        .user-card { transition: all 0.3s ease; }
        .user-card:hover { background: rgba(255,255,255,0.05); transform: translateX(5px); }
    </style>
</head>
<body class="flex h-screen p-6 overflow-hidden">

    <!-- Sidebar Navigation -->
    <aside class="w-20 glass-panel rounded-[2.5rem] flex flex-col items-center py-8 gap-10 flex-shrink-0">
        <div class="text-indigo-500 text-2xl rotate-3"><i class="fas fa-bolt"></i></div>
        <nav class="flex flex-col gap-8">
            <a href="#" class="p-4 rounded-2xl text-slate-500 hover:bg-white/5 transition" title="Dashboard"><i class="fas fa-th-large text-xl"></i></a>
            <a href="#" class="p-4 rounded-2xl text-slate-500 hover:bg-white/5 transition" title="Matchs"><i class="fas fa-gamepad text-xl"></i></a>
            <a href="#" class="p-4 rounded-2xl bg-indigo-500/10 text-indigo-400" title="Utilisateurs"><i class="fas fa-user-shield text-xl"></i></a>
            <a href="#" class="p-4 rounded-2xl text-slate-500 hover:bg-white/5 transition" title="Paramètres"><i class="fas fa-sliders text-xl"></i></a>
        </nav>
        <a href="#" class="mt-auto p-4 rounded-2xl text-rose-500 hover:bg-rose-500/10 transition"><i class="fas fa-power-off text-xl"></i></a>
    </aside>

    <!-- Main Workspace -->
    <main class="flex-1 ml-6 flex flex-col gap-6 overflow-hidden">
        
        <!-- Header -->
        <header class="flex justify-between items-center px-4">
            <div>
                <h1 class="font-league text-2xl font-black italic tracking-tighter uppercase">Security <span class="text-indigo-500">Database</span></h1>
                <div class="flex items-center gap-2 mt-1">
                    <div class="status-pulse"></div>
                    <span class="text-[9px] font-black text-slate-500 uppercase tracking-widest italic">System Online: 1,284 Active Nodes</span>
                </div>
            </div>
            
            <div class="flex items-center gap-6">
                <div class="glass-panel px-4 py-2 rounded-2xl flex items-center gap-3 border border-indigo-500/20">
                    <i class="fas fa-search text-indigo-400 text-xs"></i>
                    <input type="text" placeholder="Search accounts..." class="bg-transparent border-none outline-none text-xs w-64 font-medium text-white placeholder:text-slate-600">
                </div>
                <div class="flex items-center gap-4 border-l border-white/5 pl-6">
                    <div class="text-right">
                        <p class="text-xs font-bold">Admin_Core</p>
                        <p class="text-[9px] text-indigo-400 font-black uppercase tracking-widest">Root Access</p>
                    </div>
                    <div class="w-10 h-10 rounded-2xl bg-gradient-to-tr from-indigo-500 to-indigo-700 p-[2px]">
                        <img src="https://ui-avatars.com/api/?name=Admin&background=020617&color=fff" class="w-full h-full rounded-[14px]" alt="">
                    </div>
                </div>
            </div>
        </header>

        <!-- Stats Overview -->
        <div class="grid grid-cols-4 gap-6">
            <div class="glass-panel p-6 rounded-[2rem] border-l-4 border-indigo-500">
                <p class="text-[10px] font-black text-slate-500 uppercase italic mb-1">Total Utilisateurs</p>
                <h3 class="text-2xl font-black font-league">2,840</h3>
            </div>
            <div class="glass-panel p-6 rounded-[2rem]">
                <p class="text-[10px] font-black text-slate-500 uppercase italic mb-1">Organisateurs</p>
                <h3 class="text-2xl font-black font-league text-indigo-400">142</h3>
            </div>
            <div class="glass-panel p-6 rounded-[2rem]">
                <p class="text-[10px] font-black text-slate-500 uppercase italic mb-1">Nouveaux (24h)</p>
                <h3 class="text-2xl font-black font-league text-emerald-500">+12</h3>
            </div>
            <div class="glass-panel p-6 rounded-[2rem] border-l-4 border-rose-500">
                <p class="text-[10px] font-black text-slate-500 uppercase italic mb-1">Bannis</p>
                <h3 class="text-2xl font-black font-league text-rose-500">09</h3>
            </div>
        </div>

        <!-- Accounts Table Container -->
        <div class="flex-1 glass-panel rounded-[2.5rem] p-8 overflow-hidden flex flex-col">
            <div class="flex justify-between items-center mb-8">
                <h3 class="font-league text-xl font-black italic tracking-widest uppercase">Master <span class="text-indigo-500">Index</span></h3>
                <div class="flex gap-4">
                    <button class="text-[10px] font-black uppercase bg-white/5 border border-white/10 px-4 py-2 rounded-xl hover:bg-white/10 transition">Filtres Avancés</button>
                    <button class="text-[10px] font-black uppercase bg-indigo-500 text-white px-4 py-2 rounded-xl hover:bg-indigo-600 transition">+ Ajouter Utilisateur</button>
                </div>
            </div>

            <!-- Table Header -->
            <div class="grid grid-cols-12 px-6 mb-4 text-[10px] font-black uppercase tracking-widest text-slate-500 italic">
                <div class="col-span-4">Utilisateur</div>
                <div class="col-span-3">Rôle / Statut</div>
                <div class="col-span-3">Date d'inscription</div>
                <div class="col-span-2 text-right">Actions</div>
            </div>

            <!-- Scrollable List -->
            <div class="flex-1 overflow-y-auto pr-4 custom-scroll space-y-3">
                
                <!-- Account Row 1 -->
                 <?php foreach($AfficherUsers as $users){ ?>
                <div class="user-card grid grid-cols-12 items-center p-4 bg-white/[0.02] border border-white/5 rounded-2xl group">
                    <div class="col-span-4 flex items-center gap-4">
                        <div class="w-10 h-10 rounded-xl bg-slate-800 flex items-center justify-center font-black text-indigo-500 border border-white/5"><?=strtoupper(substr($users['nom'],0,2))?></div>
                        <div>
                            <p class="text-sm font-bold"><?=$users['nom']?></p>
                            <p class="text-[10px] text-slate-500"><?=$users['email']?></p>
                        </div>
                    </div>
                    <div class="col-span-3 flex items-center gap-3">
                        <span class="text-[9px] font-black uppercase bg-indigo-500/10 text-indigo-400 px-3 py-1 rounded-lg border border-indigo-500/20"><?=$users['role']?></span>
                        <div class="w-2 h-2 rounded-full bg-emerald-500 shadow-[0_0_10px_rgba(16,185,129,0.5)]"></div>
                    </div>
                    <div class="col-span-3 flex items-center gap-3">
                        <span class="text-[9px] font-black uppercase bg-indigo-500/10 text-indigo-400 px-3 py-1 rounded-lg border border-indigo-500/20"><?=$users['statut']?></span>
                    </div>

                    <div class="col-span-3 text-[11px] text-slate-400 font-medium italic">
                        <?=$users['date_inscription']?>
                    </div>
                    <!-- absolute -bottom-4 right-4 flex gap-2 opacity-0 group-hover:opacity-100 translate-y-2 group-hover:translate-y-0 transition-all  -->
                    <form method="POST">

                        <div class="absolute -bottom-4 right-4 flex gap-2 opacity-0 group-hover:opacity-100 translate-y-2 group-hover:translate-y-0 transition-all">
                            <button type="submit" name="activer" class="w-8 h-8 bg-indigo-500/10 text-indigo-400 rounded-lg text-xs hover:bg-indigo-500 hover:text-white transition"><i class="fas fa-sync"></i></button>
                            <button type="submit" name="desactiver" class="w-8 h-8 bg-rose-500/10 text-rose-500 rounded-lg text-xs hover:bg-rose-500 hover:text-white transition"><i class="fas fa-ban"></i></button>
                        </div>

                    </form>
                </div>
                <!-- absolute -bottom-4 right-4 flex gap-2 opacity-0 group-hover:opacity-100 translate-y-2 group-hover:translate-y-0 transition-all -->
                <?php } ?>

                <!-- Account Row 2 (Banned State) -->
                <!-- <div class="user-card grid grid-cols-12 items-center p-4 bg-rose-500/[0.02] border border-rose-500/10 rounded-2xl group opacity-60">
                    <div class="col-span-4 flex items-center gap-4">
                        <div class="w-10 h-10 rounded-xl bg-slate-900 flex items-center justify-center font-black text-slate-600 border border-white/5">JD</div>
                        <div>
                            <p class="text-sm font-bold italic line-through text-slate-500">John Doe #09</p>
                            <p class="text-[10px] text-slate-600 font-mono italic">Account_Terminated_Ref88</p>
                        </div>
                    </div>
                    <div class="col-span-3 flex items-center gap-3">
                        <span class="text-[9px] font-black uppercase bg-slate-500/10 text-slate-500 px-3 py-1 rounded-lg border border-slate-500/20">Client</span>
                        <span class="text-[8px] font-black uppercase text-rose-500 italic">[ BANNI ]</span>
                    </div>
                    <div class="col-span-3 text-[11px] text-slate-600 font-medium italic">
                        05 Septembre 2023
                    </div>
                    <div class="col-span-2 flex justify-end gap-2">
                        <button class="text-[9px] font-black uppercase text-indigo-400 hover:underline">Restaurer</button>
                    </div>
                </div> -->
            </div>

            <!-- Footer Pagination -->
            <div class="mt-6 flex justify-between items-center px-4">
                <p class="text-[10px] text-slate-500 font-black uppercase italic">Affichage 1-10 de 2,840 comptes</p>
                <div class="flex gap-2">
                    <button class="w-8 h-8 rounded-lg bg-white/5 flex items-center justify-center text-slate-500 hover:bg-indigo-500 hover:text-white transition"><i class="fas fa-chevron-left text-[10px]"></i></button>
                    <button class="w-8 h-8 rounded-lg bg-indigo-500 flex items-center justify-center text-white text-[10px] font-black">1</button>
                    <button class="w-8 h-8 rounded-lg bg-white/5 flex items-center justify-center text-slate-400 text-[10px] font-black hover:bg-white/10 transition">2</button>
                    <button class="w-8 h-8 rounded-lg bg-white/5 flex items-center justify-center text-slate-400 text-[10px] font-black hover:bg-white/10 transition">3</button>
                    <button class="w-8 h-8 rounded-lg bg-white/5 flex items-center justify-center text-slate-500 hover:bg-indigo-500 hover:text-white transition"><i class="fas fa-chevron-right text-[10px]"></i></button>
                </div>
            </div>
        </div>
    </main>

    <script>
        // Simple interactive feedback
        document.querySelectorAll('.user-card button').forEach(btn => {
            btn.addEventListener('click', function(e) {
                if(this.classList.contains('bg-rose-500/10')) {
                    if(confirm('Voulez-vous vraiment suspendre cet accès ?')) {
                        this.closest('.user-card').style.opacity = '0.3';
                        this.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
                    }
                }
            });
        });
    </script>
</body>
</html>