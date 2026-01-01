<!-- <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,700;0,900;1,700;1,900&family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .font-league { font-family: 'Montserrat', sans-serif; }
        .glass { background: rgba(255, 255, 255, 0.03); backdrop-filter: blur(12px); border: 1px solid rgba(255, 255, 255, 0.08); }
    </style>
</head>
<body>
    
    dashboard-organizer.php
Layout identique au Dashboard Utilisateur avec ce contenu spécifique
<div class="flex-1 p-8 lg:p-12 overflow-y-auto bg-[#05070a]">
    <div class="flex justify-between items-center mb-12">
        <h1 class="font-league text-3xl font-black italic uppercase italic text-white">Console <span class="text-indigo-500">Organisateur</span></h1>
        <button onclick="toggleModal('modal-create')" class="bg-indigo-600 px-6 py-3 rounded-xl font-black text-[10px] uppercase tracking-widest text-white shadow-lg shadow-indigo-500/20 hover:scale-105 transition">+ Créer un Match</button>
    </div>

    Stats Panel
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
        <div class="glass p-6 rounded-3xl border-l-4 border-indigo-500">
            <p class="text-[10px] font-black text-slate-500 uppercase">Billets Vendus</p>
            <h3 class="text-3xl font-black italic font-league text-white mt-1">1,450 <span class="text-xs text-green-400">+5%</span></h3>
        </div>
        <div class="glass p-6 rounded-3xl border-l-4 border-emerald-500">
            <p class="text-[10px] font-black text-slate-500 uppercase">Chiffre d'Affaires</p>
            <h3 class="text-3xl font-black italic font-league text-white mt-1">72,500 DH</h3>
        </div>
        <div class="glass p-6 rounded-3xl border-l-4 border-amber-500">
            <p class="text-[10px] font-black text-slate-500 uppercase">Note Moyenne</p>
            <h3 class="text-3xl font-black italic font-league text-white mt-1">4.8 <i class="fas fa-star text-xs text-amber-500"></i></h3>
        </div>
    </div>

    Table des Matchs
    <div class="glass rounded-[2rem] overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead class="bg-white/5 text-[10px] font-black uppercase text-slate-500">
                <tr>
                    <th class="p-6">Événement</th>
                    <th class="p-6">Date & Lieu</th>
                    <th class="p-6">Statut</th>
                    <th class="p-6 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5 text-sm">
                <tr class="hover:bg-white/5 transition">
                    <td class="p-6">
                        <span class="font-bold text-white uppercase italic">Raja vs Wydad</span>
                        <p class="text-[10px] text-slate-500">3 Catégories définies</p>
                    </td>
                    <td class="p-6">
                        <div class="text-white font-medium">25 Déc. 2024</div>
                        <div class="text-[10px] text-slate-500">Casablanca</div>
                    </td>
                    <td class="p-6">
                        <span class="bg-amber-500/10 text-amber-500 text-[10px] px-3 py-1 rounded-full font-black uppercase">En Attente Admin</span>
                    </td>
                    <td class="p-6 text-right space-x-2">
                        <button class="text-slate-400 hover:text-white"><i class="fas fa-edit"></i></button>
                        <button class="text-slate-400 hover:text-indigo-400"><i class="fas fa-chart-bar"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</body>
</html> -->




<!-- <!DOCTYPE html>
<html lang="fr" class="h-full">
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
            --emerald: #10b981;
            --amber: #f59e0b;
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
            backdrop-filter: blur(20px); 
            border: 1px solid var(--glass-border); 
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }
        .bento-grid { display: grid; grid-template-columns: repeat(12, 1fr); gap: 1.5rem; }
        
        /* Animation pour le bouton de création */
        .btn-create {
            background: linear-gradient(135deg, var(--primary) 0%, #4f46e5 100%);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .btn-create:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px -5px rgba(129, 140, 248, 0.5);
        }

        /* Status Badges */
        .badge-pending { background: rgba(245, 158, 11, 0.1); color: #f59e0b; border: 1px solid rgba(245, 158, 11, 0.2); }
        .badge-approved { background: rgba(16, 185, 129, 0.1); color: #10b981; border: 1px solid rgba(16, 185, 129, 0.2); }

        .custom-scroll::-webkit-scrollbar { width: 4px; }
        .custom-scroll::-webkit-scrollbar-thumb { background: var(--glass-border); border-radius: 10px; }
    </style>
</head>
<body class="flex h-screen p-6 overflow-hidden">

    Slim Sidebar Navigation
    <aside class="w-20 glass-panel rounded-[2.5rem] flex flex-col items-center py-8 gap-10 flex-shrink-0">
        <div class="text-indigo-500 text-2xl rotate-3"><i class="fas fa-trophy"></i></div>
        <nav class="flex flex-col gap-8">
            <a href="#" class="p-4 rounded-2xl bg-indigo-500/10 text-indigo-400" title="Dashboard"><i class="fas fa-chart-line text-xl"></i></a>
            <a href="#" class="p-4 rounded-2xl text-slate-500 hover:bg-white/5 transition" title="Matchs"><i class="fas fa-futbol text-xl"></i></a>
            <a href="#" class="p-4 rounded-2xl text-slate-500 hover:bg-white/5 transition" title="Commentaires"><i class="fas fa-comments text-xl"></i></a>
            <a href="#" class="p-4 rounded-2xl text-slate-500 hover:bg-white/5 transition" title="Profil"><i class="fas fa-id-card text-xl"></i></a>
        </nav>
        <a href="logout.php" class="mt-auto p-4 rounded-2xl text-rose-500 hover:bg-rose-500/10 transition"><i class="fas fa-power-off text-xl"></i></a>
    </aside>

    Main Workspace
    <main class="flex-1 ml-6 flex flex-col gap-6 overflow-hidden">
        
        Top Navigation / Header
        <header class="flex justify-between items-center px-4">
            <div>
                <h1 class="font-league text-2xl font-black italic tracking-tighter">TACTICAL <span class="text-indigo-500 text-3xl">CONSOLE</span></h1>
                <p class="text-[9px] font-black text-slate-500 uppercase tracking-[0.3em] italic mt-1">Organizer Privilege Access</p>
            </div>
            
            <div class="flex items-center gap-6">
                <button onclick="toggleModal('modal-create')" class="btn-create px-8 py-3.5 rounded-2xl text-[10px] font-black uppercase tracking-widest text-white shadow-xl">
                    <i class="fas fa-plus mr-2"></i> Créer un Match
                </button>
                <div class="w-px h-8 bg-white/10 mx-2"></div>
                <div class="flex items-center gap-4">
                    <div class="text-right">
                        <p class="text-xs font-bold italic">Organisateur Pro</p>
                        <p class="text-[9px] text-indigo-400 font-black uppercase tracking-tighter">ID: #ORG-2025</p>
                    </div>
                    <img src="https://ui-avatars.com/api/?name=Organizer&background=818cf8&color=fff" class="w-10 h-10 rounded-2xl border border-white/10" alt="Avatar">
                </div>
            </div>
        </header>

        Bento Body
        <div class="flex-1 bento-grid overflow-y-auto pr-2 custom-scroll">
            
            1. Stats Bento Row (Large)
            <div class="col-span-12 lg:col-span-12 bento-grid mb-4">
                
                Stat Card: Tickets
                <div class="col-span-12 md:col-span-4 glass-panel p-8 rounded-[2.5rem] relative overflow-hidden group">
                    <div class="relative z-10">
                        <p class="text-[10px] font-black text-slate-500 uppercase mb-2 italic tracking-widest">Billets Vendus</p>
                        <h4 class="text-4xl font-black font-league italic">1,450</h4>
                        <p class="text-emerald-400 text-[10px] font-bold mt-2 uppercase tracking-tighter"><i class="fas fa-arrow-up mr-1"></i> +5.2% cette semaine</p>
                    </div>
                    <i class="fas fa-ticket text-7xl text-white/5 absolute -right-4 -bottom-4 group-hover:rotate-12 transition-transform"></i>
                </div>

                Stat Card: Revenue
                <div class="col-span-12 md:col-span-4 glass-panel p-8 rounded-[2.5rem] relative overflow-hidden group border-b-2 border-indigo-500">
                    <div class="relative z-10">
                        <p class="text-[10px] font-black text-slate-500 uppercase mb-2 italic tracking-widest">Chiffre d'Affaires</p>
                        <h4 class="text-4xl font-black font-league italic">72,500 <span class="text-lg">DH</span></h4>
                        <p class="text-indigo-400 text-[10px] font-bold mt-2 uppercase tracking-tighter">Total cumulé saison</p>
                    </div>
                    <i class="fas fa-sack-dollar text-7xl text-white/5 absolute -right-4 -bottom-4 group-hover:scale-110 transition-transform"></i>
                </div>

                Stat Card: Rating
                <div class="col-span-12 md:col-span-4 glass-panel p-8 rounded-[2.5rem] relative overflow-hidden group">
                    <div class="relative z-10">
                        <p class="text-[10px] font-black text-slate-500 uppercase mb-2 italic tracking-widest">Note Moyenne</p>
                        <h4 class="text-4xl font-black font-league italic">4.8 <span class="text-indigo-500 text-sm">/ 5</span></h4>
                        <div class="flex gap-1 mt-2">
                            <i class="fas fa-star text-amber-500 text-[10px]"></i>
                            <i class="fas fa-star text-amber-500 text-[10px]"></i>
                            <i class="fas fa-star text-amber-500 text-[10px]"></i>
                            <i class="fas fa-star text-amber-500 text-[10px]"></i>
                            <i class="fas fa-star text-slate-700 text-[10px]"></i>
                        </div>
                    </div>
                    <i class="fas fa-ranking-star text-7xl text-white/5 absolute -right-4 -bottom-4 transition-transform"></i>
                </div>
            </div>

            2. Match Management Grid (Main)
            <div class="col-span-12 lg:col-span-8 glass-panel rounded-[2.5rem] p-10">
                <div class="flex justify-between items-center mb-10 px-2">
                    <h3 class="font-league text-xl font-black italic uppercase tracking-tighter italic">Gestion des <span class="text-indigo-500 text-2xl">Événements</span></h3>
                    <div class="flex gap-4">
                        <div class="glass-panel px-4 py-2 rounded-xl border border-white/5 flex items-center gap-2">
                            <i class="fas fa-filter text-[10px] text-slate-500"></i>
                            <span class="text-[10px] font-black uppercase tracking-widest text-slate-400">Tout voir</span>
                        </div>
                    </div>
                </div>

                <div class="space-y-4">
                    Match Item Row
                    <div class="flex items-center justify-between p-6 bg-white/[0.02] border border-white/5 rounded-3xl hover:bg-indigo-500/[0.03] hover:border-indigo-500/30 transition group">
                        <div class="flex items-center gap-8">
                            <div class="w-14 h-14 glass-panel rounded-2xl flex items-center justify-center font-league italic font-black text-indigo-500 shadow-inner">VS</div>
                            <div>
                                <h4 class="text-sm font-black uppercase italic tracking-tighter text-white">Raja CA <span class="text-slate-500 mx-1">X</span> Wydad AC</h4>
                                <div class="flex items-center gap-4 mt-1">
                                    <p class="text-[10px] text-slate-500 font-bold italic uppercase"><i class="fas fa-map-marker-alt text-indigo-500 mr-2"></i>Casablanca</p>
                                    <p class="text-[10px] text-slate-500 font-bold italic uppercase"><i class="fas fa-calendar-day text-indigo-500 mr-2"></i>25 Déc. 2024</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="flex items-center gap-12">
                            <div class="text-center hidden md:block">
                                <p class="text-[9px] font-black text-slate-500 uppercase tracking-widest mb-1">Status</p>
                                <span class="badge-pending text-[9px] px-3 py-1 rounded-full font-black uppercase italic">En attente admin</span>
                            </div>
                            <div class="flex gap-2">
                                <button class="w-10 h-10 glass-panel rounded-xl flex items-center justify-center text-slate-400 hover:text-white hover:bg-white/10 transition" title="Modifier">
                                    <i class="fas fa-pen-to-square text-xs"></i>
                                </button>
                                <button class="w-10 h-10 glass-panel rounded-xl flex items-center justify-center text-slate-400 hover:text-indigo-400 hover:bg-indigo-500/10 transition" title="Stats">
                                    <i class="fas fa-chart-simple text-xs"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    Repeat for other matches...
                </div>
            </div>

            3. Comments & Recent Activity (Sidebar Bento)
            <div class="col-span-12 lg:col-span-4 space-y-6">
                
                Comments Card
                <div class="glass-panel rounded-[2.5rem] p-8 h-fit border-t-2 border-indigo-500/20">
                    <div class="flex justify-between items-center mb-6 px-2">
                        <h3 class="font-league text-xs font-black italic uppercase tracking-widest italic text-indigo-400">Avis Clients</h3>
                        <i class="fas fa-quote-right text-slate-800 text-lg"></i>
                    </div>
                    
                    <div class="space-y-4">
                        <div class="p-5 bg-white/5 rounded-[2rem] border border-white/5 relative overflow-hidden group">
                            <div class="flex items-center gap-3 mb-3">
                                <img src="https://ui-avatars.com/api/?name=User" class="w-6 h-6 rounded-full grayscale opacity-50">
                                <span class="text-[10px] font-bold text-slate-400 italic">Anonyme #482</span>
                            </div>
                            <p class="text-[11px] text-slate-300 font-light italic leading-relaxed">"Organisation parfaite pour le derby, accès rapide au stade grâce aux billets QR !"</p>
                            <div class="mt-4 flex justify-between items-center">
                                <span class="text-[8px] font-black uppercase text-indigo-500 tracking-tighter">Match: Derby Casa</span>
                                <div class="flex gap-0.5 text-amber-500 text-[8px]">
                                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="w-full mt-6 py-4 rounded-2xl border border-dashed border-white/10 text-[9px] font-black uppercase tracking-widest text-slate-500 hover:text-indigo-400 hover:border-indigo-400 transition">Voir tous les avis</button>
                </div>

                Technical Status
                <div class="glass-panel rounded-[2.5rem] p-8 bg-gradient-to-br from-indigo-500/5 to-transparent">
                    <h4 class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] mb-4 text-center">Système Intégrité</h4>
                    <div class="flex justify-around items-center">
                        <div class="text-center">
                            <p class="text-[8px] font-black text-indigo-400 uppercase italic">Emails</p>
                            <div class="h-1.5 w-8 bg-emerald-500 rounded-full mx-auto mt-1"></div>
                        </div>
                        <div class="text-center">
                            <p class="text-[8px] font-black text-indigo-400 uppercase italic">Billets</p>
                            <div class="h-1.5 w-8 bg-emerald-500 rounded-full mx-auto mt-1"></div>
                        </div>
                        <div class="text-center">
                            <p class="text-[8px] font-black text-indigo-400 uppercase italic">PDF</p>
                            <div class="h-1.5 w-8 bg-emerald-500 rounded-full mx-auto mt-1"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>

    Modal Concept placeholder (Hidden)
    <div id="modal-create" class="hidden fixed inset-0 z-[100] bg-black/90 backdrop-blur-md flex items-center justify-center p-6">
        Contenu du formulaire de création ici
    </div>

</body>
</html> -->


<!-- 
<!DOCTYPE html>
<html lang="fr" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elite League | Feminine Tactical Console</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,700;0,900;1,700;1,900&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <style>
        :root {
            /* Palette de couleurs féminines et professionnelles */
            --primary: #f472b6; /* Pink 400 */
            --secondary: #d946ef; /* Fuchsia 500 */
            --accent: #a855f7; /* Purple 500 */
            --bg-deep: #0f0110; /* Noir Prune profond */
            --glass-card: rgba(35, 5, 35, 0.6);
            --glass-border: rgba(244, 114, 182, 0.15);
        }
        body { 
            font-family: 'Inter', sans-serif; 
            background-color: var(--bg-deep);
            color: #fdf2f8;
        }
        .font-league { font-family: 'Montserrat', sans-serif; text-transform: uppercase; }
        .glass-panel { 
            background: var(--glass-card); 
            backdrop-filter: blur(20px); 
            border: 1px solid var(--glass-border); 
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.7);
        }
        .bento-grid { display: grid; grid-template-columns: repeat(12, 1fr); gap: 1.5rem; }
        
        /* Bouton Création Gradient Rose/Fuchsia */
        .btn-create {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .btn-create:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px -5px rgba(244, 114, 182, 0.4);
        }

        /* Status Badges Rose/Lilas */
        .badge-pending { background: rgba(217, 70, 239, 0.1); color: #d946ef; border: 1px solid rgba(217, 70, 239, 0.2); }
        .badge-approved { background: rgba(34, 211, 238, 0.1); color: #22d3ee; border: 1px solid rgba(34, 211, 238, 0.2); }

        .custom-scroll::-webkit-scrollbar { width: 4px; }
        .custom-scroll::-webkit-scrollbar-thumb { background: var(--glass-border); border-radius: 10px; }
    </style>
</head>
<body class="flex h-screen p-6 overflow-hidden">

    Slim Sidebar Navigation (Pink Accents)
    <aside class="w-20 glass-panel rounded-[2.5rem] flex flex-col items-center py-8 gap-10 flex-shrink-0">
        <div class="text-pink-500 text-2xl rotate-3"><i class="fas fa-trophy"></i></div>
        <nav class="flex flex-col gap-8">
            <a href="#" class="p-4 rounded-2xl bg-pink-500/10 text-pink-400" title="Dashboard"><i class="fas fa-chart-line text-xl"></i></a>
            <a href="#" class="p-4 rounded-2xl text-pink-200/40 hover:bg-pink-500/10 hover:text-pink-400 transition" title="Matchs"><i class="fas fa-futbol text-xl"></i></a>
            <a href="#" class="p-4 rounded-2xl text-pink-200/40 hover:bg-pink-500/10 hover:text-pink-400 transition" title="Commentaires"><i class="fas fa-comments text-xl"></i></a>
            <a href="#" class="p-4 rounded-2xl text-pink-200/40 hover:bg-pink-500/10 hover:text-pink-400 transition" title="Profil"><i class="fas fa-id-card text-xl"></i></a>
        </nav>
        <a href="logout.php" class="mt-auto p-4 rounded-2xl text-rose-400 hover:bg-rose-500/10 transition"><i class="fas fa-power-off text-xl"></i></a>
    </aside>

    Main Workspace
    <main class="flex-1 ml-6 flex flex-col gap-6 overflow-hidden">
        
        Top Navigation / Header (Fuchsia)
        <header class="flex justify-between items-center px-4">
            <div>
                <h1 class="font-league text-2xl font-black italic tracking-tighter text-white">TACTICAL <span class="text-pink-400 text-3xl">CONSOLE</span></h1>
                <p class="text-[9px] font-black text-pink-300/50 uppercase tracking-[0.3em] italic mt-1 font-bold">Organizer Privilege Access</p>
            </div>
            
            <div class="flex items-center gap-6">
                <button onclick="toggleModal('modal-create')" class="btn-create px-8 py-3.5 rounded-2xl text-[10px] font-black uppercase tracking-widest text-white shadow-xl">
                    <i class="fas fa-plus mr-2 text-xs"></i> Créer un Match
                </button>
                <div class="w-px h-8 bg-pink-500/20 mx-2"></div>
                <div class="flex items-center gap-4">
                    <div class="text-right">
                        <p class="text-xs font-bold italic text-pink-100">Organisatrice Pro</p>
                        <p class="text-[9px] text-fuchsia-400 font-black uppercase tracking-tighter italic font-bold">ID: #FEM-2025</p>
                    </div>
                    <img src="https://ui-avatars.com/api/?name=Organizer&background=f472b6&color=fff" class="w-10 h-10 rounded-2xl border border-pink-500/30" alt="Avatar">
                </div>
            </div>
        </header>

        Bento Body
        <div class="flex-1 bento-grid overflow-y-auto pr-2 custom-scroll">
            
            1. Stats Bento Row (Pink/Purple)
            <div class="col-span-12 lg:col-span-12 bento-grid mb-4">
                
                Stat Card: Tickets
                <div class="col-span-12 md:col-span-4 glass-panel p-8 rounded-[2.5rem] relative overflow-hidden group">
                    <div class="relative z-10">
                        <p class="text-[10px] font-black text-pink-300/50 uppercase mb-2 italic tracking-widest font-bold">Billets Vendus</p>
                        <h4 class="text-4xl font-black font-league italic text-white">1,450</h4>
                        <p class="text-pink-400 text-[10px] font-bold mt-2 uppercase tracking-tighter"><i class="fas fa-heart mr-1"></i> +5.2% cette semaine</p>
                    </div>
                    <i class="fas fa-ticket text-7xl text-pink-500/5 absolute -right-4 -bottom-4 group-hover:rotate-12 transition-transform"></i>
                </div>

                Stat Card: Revenue (Gradient Border)
                <div class="col-span-12 md:col-span-4 glass-panel p-8 rounded-[2.5rem] relative overflow-hidden group border-b-2 border-fuchsia-500">
                    <div class="relative z-10">
                        <p class="text-[10px] font-black text-pink-300/50 uppercase mb-2 italic tracking-widest font-bold">Chiffre d'Affaires</p>
                        <h4 class="text-4xl font-black font-league italic text-white">72,500 <span class="text-lg">DH</span></h4>
                        <p class="text-fuchsia-400 text-[10px] font-bold mt-2 uppercase tracking-tighter">Performance VIP</p>
                    </div>
                    <i class="fas fa-gem text-7xl text-fuchsia-500/5 absolute -right-4 -bottom-4 group-hover:scale-110 transition-transform"></i>
                </div>

                Stat Card: Rating
                <div class="col-span-12 md:col-span-4 glass-panel p-8 rounded-[2.5rem] relative overflow-hidden group">
                    <div class="relative z-10">
                        <p class="text-[10px] font-black text-pink-300/50 uppercase mb-2 italic tracking-widest font-bold">Note Moyenne</p>
                        <h4 class="text-4xl font-black font-league italic text-white">4.8 <span class="text-pink-500 text-sm">/ 5</span></h4>
                        <div class="flex gap-1 mt-2">
                            <i class="fas fa-star text-pink-400 text-[10px]"></i>
                            <i class="fas fa-star text-pink-400 text-[10px]"></i>
                            <i class="fas fa-star text-pink-400 text-[10px]"></i>
                            <i class="fas fa-star text-pink-400 text-[10px]"></i>
                            <i class="fas fa-star text-pink-900 text-[10px]"></i>
                        </div>
                    </div>
                    <i class="fas fa-magic text-7xl text-pink-500/5 absolute -right-4 -bottom-4 transition-transform"></i>
                </div>
            </div>

            2. Match Management Grid
            <div class="col-span-12 lg:col-span-8 glass-panel rounded-[2.5rem] p-10">
                <div class="flex justify-between items-center mb-10 px-2">
                    <h3 class="font-league text-xl font-black italic uppercase tracking-tighter italic text-pink-50">Gestion des <span class="text-pink-400 text-2xl">Événements</span></h3>
                    <div class="flex gap-4">
                        <div class="glass-panel px-4 py-2 rounded-xl border border-pink-500/20 flex items-center gap-2">
                            <i class="fas fa-sparkles text-[10px] text-pink-400"></i>
                            <span class="text-[10px] font-black uppercase tracking-widest text-pink-200/50">Tous les matchs</span>
                        </div>
                    </div>
                </div>

                <div class="space-y-4">
                    Match Item Row (Purple Hover)
                    <div class="flex items-center justify-between p-6 bg-pink-500/[0.02] border border-pink-500/10 rounded-3xl hover:bg-pink-500/[0.05] hover:border-pink-500/30 transition group">
                        <div class="flex items-center gap-8">
                            <div class="w-14 h-14 glass-panel rounded-2xl flex items-center justify-center font-league italic font-black text-pink-400 shadow-lg border-pink-500/30">VS</div>
                            <div>
                                <h4 class="text-sm font-black uppercase italic tracking-tighter text-white">Raja CA <span class="text-pink-300/40 mx-1">X</span> Wydad AC</h4>
                                <div class="flex items-center gap-4 mt-1">
                                    <p class="text-[10px] text-pink-300/50 font-bold italic uppercase"><i class="fas fa-map-marker-alt text-pink-400 mr-2"></i>Casablanca</p>
                                    <p class="text-[10px] text-pink-300/50 font-bold italic uppercase"><i class="fas fa-moon text-pink-400 mr-2"></i>20:45 PM</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="flex items-center gap-12">
                            <div class="text-center hidden md:block">
                                <span class="badge-pending text-[9px] px-3 py-1 rounded-full font-black uppercase italic">En attente</span>
                            </div>
                            <div class="flex gap-2">
                                <button class="w-10 h-10 glass-panel rounded-xl flex items-center justify-center text-pink-300/40 hover:text-white hover:bg-pink-500/20 transition">
                                    <i class="fas fa-heart-pulse text-xs"></i>
                                </button>
                                <button class="w-10 h-10 glass-panel rounded-xl flex items-center justify-center text-pink-300/40 hover:text-pink-400 hover:bg-pink-500/20 transition">
                                    <i class="fas fa-chart-pie text-xs"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            3. Comments Sidebar (Violet/Prune)
            <div class="col-span-12 lg:col-span-4 space-y-6">
                
                <div class="glass-panel rounded-[2.5rem] p-8 h-fit border-t-2 border-fuchsia-500/30">
                    <div class="flex justify-between items-center mb-6 px-2">
                        <h3 class="font-league text-xs font-black italic uppercase tracking-widest italic text-fuchsia-400">Avis Clients</h3>
                        <i class="fas fa-feather text-pink-900 text-lg"></i>
                    </div>
                    
                    <div class="space-y-4">
                        <div class="p-5 bg-pink-500/[0.03] rounded-[2rem] border border-pink-500/10 relative overflow-hidden group">
                            <div class="flex items-center gap-3 mb-3">
                                <img src="https://ui-avatars.com/api/?name=Lina" class="w-6 h-6 rounded-full border border-pink-500/30">
                                <span class="text-[10px] font-bold text-pink-200 italic">Lina El.</span>
                            </div>
                            <p class="text-[11px] text-pink-100/70 font-light italic leading-relaxed font-medium">"Interface magnifique et très fluide pour réserver mes places au derby !"</p>
                            <div class="mt-4 flex justify-between items-center">
                                <span class="text-[8px] font-black uppercase text-pink-400 tracking-tighter">Fan Authentique</span>
                                <div class="flex gap-0.5 text-pink-400 text-[8px]">
                                    <i class="fas fa-heart"></i><i class="fas fa-heart"></i><i class="fas fa-heart"></i><i class="fas fa-heart"></i><i class="fas fa-heart"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="w-full mt-6 py-4 rounded-2xl border border-dashed border-pink-500/20 text-[9px] font-black uppercase tracking-widest text-pink-300/40 hover:text-pink-400 hover:border-pink-400 transition">Voir tous les avis</button>
                </div>

                Pink Technical Status
                <div class="glass-panel rounded-[2.5rem] p-8 bg-gradient-to-br from-pink-500/10 to-transparent">
                    <h4 class="text-[10px] font-black text-pink-300/50 uppercase tracking-[0.2em] mb-4 text-center italic font-bold">État du Serveur</h4>
                    <div class="flex justify-around items-center">
                        <div class="text-center">
                            <p class="text-[8px] font-black text-pink-400 uppercase italic">Email</p>
                            <div class="h-1.5 w-8 bg-cyan-400 rounded-full mx-auto mt-1 shadow-[0_0_10px_#22d3ee]"></div>
                        </div>
                        <div class="text-center">
                            <p class="text-[8px] font-black text-pink-400 uppercase italic">PDF</p>
                            <div class="h-1.5 w-8 bg-cyan-400 rounded-full mx-auto mt-1 shadow-[0_0_10px_#22d3ee]"></div>
                        </div>
                        <div class="text-center">
                            <p class="text-[8px] font-black text-pink-400 uppercase italic">QR</p>
                            <div class="h-1.5 w-8 bg-cyan-400 rounded-full mx-auto mt-1 shadow-[0_0_10px_#22d3ee]"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>

</body>
</html> -->



<!DOCTYPE html>
<html lang="fr" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elite League | Feminine Tactical Console</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,700;0,900;1,700;1,900&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <style>
        :root {
            /* Palette Féminine & Claire */
            --primary: #f472b6;    /* Rose doux */
            --secondary: #c084fc;  /* Mauve clair */
            --accent: #fb923c;    /* Pêche */
            --success: #2dd4bf;   /* Turquoise clair */
            --bg-deep: #120a0e;   /* Fond prune très sombre (plus chaleureux que le noir) */
            --glass-card: rgba(45, 25, 35, 0.4); 
            --glass-border: rgba(244, 114, 182, 0.15); /* Bordure teintée rose */
        }
        body { 
            font-family: 'Inter', sans-serif; 
            background-color: var(--bg-deep);
            color: #fdf2f8; /* Texte blanc cassé rosé */
        }
        .font-league { font-family: 'Montserrat', sans-serif; text-transform: uppercase; }
        .glass-panel { 
            background: var(--glass-card); 
            backdrop-filter: blur(25px); 
            border: 1px solid var(--glass-border); 
            box-shadow: 0 20px 40px -10px rgba(0, 0, 0, 0.4);
        }
        .bento-grid { display: grid; grid-template-columns: repeat(12, 1fr); gap: 1.5rem; }
        
        .btn-create {
            background: linear-gradient(135deg, #f472b6 0%, #c084fc 100%);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .btn-create:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px -5px rgba(244, 114, 182, 0.4);
        }

        .badge-pending { background: rgba(251, 146, 60, 0.1); color: #fb923c; border: 1px solid rgba(251, 146, 60, 0.2); }
        
        .custom-scroll::-webkit-scrollbar { width: 4px; }
        .custom-scroll::-webkit-scrollbar-thumb { background: rgba(244, 114, 182, 0.2); border-radius: 10px; }
        
        /* Animation subtile pour les icônes */
        .icon-glow { filter: drop-shadow(0 0 5px var(--primary)); }
    </style>
</head>
<body class="flex h-screen p-6 overflow-hidden">

    <!-- Slim Sidebar Navigation (Pink/Purple) -->
    <aside class="w-20 glass-panel rounded-[2.5rem] flex flex-col items-center py-8 gap-10 flex-shrink-0">
        <div class="text-pink-400 text-2xl rotate-3 icon-glow"><i class="fas fa-sparkles"></i></div>
        <nav class="flex flex-col gap-8">
            <a href="#" class="p-4 rounded-2xl bg-pink-500/10 text-pink-400" title="Dashboard"><i class="fas fa-chart-line text-xl"></i></a>
            <a href="#" class="p-4 rounded-2xl text-pink-200/40 hover:text-pink-300 hover:bg-white/5 transition" title="Matchs"><i class="fas fa-futbol text-xl"></i></a>
            <a href="#" class="p-4 rounded-2xl text-pink-200/40 hover:text-pink-300 hover:bg-white/5 transition" title="Commentaires"><i class="fas fa-comments text-xl"></i></a>
            <a href="#" class="p-4 rounded-2xl text-pink-200/40 hover:text-pink-300 hover:bg-white/5 transition" title="Profil"><i class="fas fa-id-card text-xl"></i></a>
        </nav>
        <a href="logout.php" class="mt-auto p-4 rounded-2xl text-rose-300 hover:bg-rose-500/10 transition"><i class="fas fa-power-off text-xl"></i></a>
    </aside>

    <!-- Main Workspace -->
    <main class="flex-1 ml-6 flex flex-col gap-6 overflow-hidden">
        
        <!-- Top Navigation (Soft Header) -->
        <header class="flex justify-between items-center px-4">
            <div>
                <h1 class="font-league text-2xl font-black italic tracking-tighter text-pink-100">ELITE <span class="text-pink-400 text-3xl">LADY</span></h1>
                <p class="text-[9px] font-black text-pink-300/50 uppercase tracking-[0.3em] italic mt-1">Console de Gestion • Mode Créateur</p>
            </div>
            
            <div class="flex items-center gap-6">
                <button onclick="toggleModal('modal-create')" class="btn-create px-8 py-3.5 rounded-2xl text-[10px] font-black uppercase tracking-widest text-white shadow-xl">
                    <i class="fas fa-magic mr-2"></i> Créer un Match
                </button>
                <div class="w-px h-8 bg-pink-400/10 mx-2"></div>
                <div class="flex items-center gap-4">
                    <div class="text-right">
                        <p class="text-xs font-bold italic text-pink-50">Sarah Organise</p>
                        <p class="text-[9px] text-purple-400 font-black uppercase tracking-tighter">ID: #ELITE-GIRL</p>
                    </div>
                    <img src="https://ui-avatars.com/api/?name=Sarah+G&background=f472b6&color=fff" class="w-10 h-10 rounded-2xl border border-pink-400/20 shadow-lg shadow-pink-500/10" alt="Avatar">
                </div>
            </div>
        </header>

        <!-- Bento Body -->
        <div class="flex-1 bento-grid overflow-y-auto pr-2 custom-scroll">
            
            <!-- 1. Stats Row (Rose & Peach Gradient) -->
            <div class="col-span-12 lg:col-span-12 bento-grid mb-4">
                
                <!-- Stat: Tickets (Soft Pink) -->
                <div class="col-span-12 md:col-span-4 glass-panel p-8 rounded-[2.5rem] relative overflow-hidden group">
                    <div class="relative z-10">
                        <p class="text-[10px] font-black text-pink-200/50 uppercase mb-2 italic tracking-widest">Billets Vendus</p>
                        <h4 class="text-4xl font-black font-league italic text-pink-100">1,450</h4>
                        <p class="text-turquoise-300 text-[10px] font-bold mt-2 uppercase tracking-tighter" style="color: var(--success)"><i class="fas fa-heart mr-1"></i> +5.2% Love</p>
                    </div>
                    <i class="fas fa-ticket-alt text-7xl text-pink-400/5 absolute -right-4 -bottom-4 group-hover:rotate-12 transition-transform"></i>
                </div>

                <!-- Stat: Revenue (Soft Purple) -->
                <div class="col-span-12 md:col-span-4 glass-panel p-8 rounded-[2.5rem] relative overflow-hidden group border-b-2 border-purple-400/40">
                    <div class="relative z-10">
                        <p class="text-[10px] font-black text-pink-200/50 uppercase mb-2 italic tracking-widest">Chiffre d'Affaires</p>
                        <h4 class="text-4xl font-black font-league italic text-pink-100">72,500 <span class="text-lg">DH</span></h4>
                        <p class="text-purple-400 text-[10px] font-bold mt-2 uppercase tracking-tighter italic font-medium">Croissance douce</p>
                    </div>
                    <i class="fas fa-gem text-7xl text-purple-400/5 absolute -right-4 -bottom-4 group-hover:scale-110 transition-transform"></i>
                </div>

                <!-- Stat: Rating (Soft Peach) -->
                <div class="col-span-12 md:col-span-4 glass-panel p-8 rounded-[2.5rem] relative overflow-hidden group">
                    <div class="relative z-10">
                        <p class="text-[10px] font-black text-pink-200/50 uppercase mb-2 italic tracking-widest">Avis Clients</p>
                        <h4 class="text-4xl font-black font-league italic text-pink-100">4.9 <span class="text-pink-400 text-sm">/ 5</span></h4>
                        <div class="flex gap-1 mt-2">
                            <i class="fas fa-star text-pink-400 text-[10px]"></i>
                            <i class="fas fa-star text-pink-400 text-[10px]"></i>
                            <i class="fas fa-star text-pink-400 text-[10px]"></i>
                            <i class="fas fa-star text-pink-400 text-[10px]"></i>
                            <i class="fas fa-star text-pink-400 text-[10px]"></i>
                        </div>
                    </div>
                    <i class="fas fa-smile-beam text-7xl text-pink-400/5 absolute -right-4 -bottom-4 transition-transform"></i>
                </div>
            </div>

            <!-- 2. Match Management (Soft Glass) -->
            <div class="col-span-12 lg:col-span-8 glass-panel rounded-[2.5rem] p-10">
                <div class="flex justify-between items-center mb-10 px-2">
                    <h3 class="font-league text-xl font-black italic uppercase tracking-tighter italic text-pink-50">Gestion des <span class="text-pink-400 text-2xl">Matchs</span></h3>
                    <div class="glass-panel px-4 py-2 rounded-xl border border-pink-400/10 flex items-center gap-2">
                        <i class="fas fa-heart text-[10px] text-pink-400"></i>
                        <span class="text-[10px] font-black uppercase tracking-widest text-pink-200/60 text-xs">Tout mon univers</span>
                    </div>
                </div>

                <div class="space-y-4">
                    <!-- Match Item (Feminine Colors) -->
                    <div class="flex items-center justify-between p-6 bg-pink-400/[0.02] border border-pink-400/10 rounded-3xl hover:bg-pink-400/[0.05] hover:border-pink-400/30 transition group">
                        <div class="flex items-center gap-8">
                            <div class="w-14 h-14 glass-panel rounded-2xl flex items-center justify-center font-league italic font-black text-pink-400 shadow-inner border-pink-400/20">VS</div>
                            <div>
                                <h4 class="text-sm font-black uppercase italic tracking-tighter text-pink-50">Real Madrid <span class="text-pink-300/40 mx-1">X</span> Barça</h4>
                                <div class="flex items-center gap-4 mt-1">
                                    <p class="text-[10px] text-pink-300/60 font-bold italic uppercase"><i class="fas fa-map-marker-alt text-pink-400 mr-2"></i>Grand Stade</p>
                                    <p class="text-[10px] text-pink-300/60 font-bold italic uppercase"><i class="fas fa-clock text-pink-400 mr-2"></i>20:45</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="flex items-center gap-8">
                            <span class="badge-pending text-[9px] px-3 py-1 rounded-full font-black uppercase italic" style="background: rgba(244, 114, 182, 0.1); color: var(--primary); border-color: rgba(244, 114, 182, 0.2)">En examen</span>
                            <div class="flex gap-2">
                                <button class="w-10 h-10 glass-panel rounded-xl flex items-center justify-center text-pink-300/60 hover:text-white hover:bg-pink-500/20 transition">
                                    <i class="fas fa-pen text-xs"></i>
                                </button>
                                <button class="w-10 h-10 glass-panel rounded-xl flex items-center justify-center text-pink-300/60 hover:text-pink-400 hover:bg-pink-500/20 transition">
                                    <i class="fas fa-chart-pie text-xs"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 3. Comments (Peach & Lavender) -->
            <div class="col-span-12 lg:col-span-4 space-y-6">
                
                <div class="glass-panel rounded-[2.5rem] p-8 h-fit border-t-2 border-pink-400/30">
                    <div class="flex justify-between items-center mb-6 px-2">
                        <h3 class="font-league text-xs font-black italic uppercase tracking-widest italic text-pink-400">Derniers Mots</h3>
                        <i class="fas fa-feather-pointed text-pink-400 text-lg opacity-40"></i>
                    </div>
                    
                    <div class="space-y-4">
                        <div class="p-5 bg-pink-400/5 rounded-[2rem] border border-pink-400/10 relative overflow-hidden group hover:border-pink-400/30 transition">
                            <div class="flex items-center gap-3 mb-3">
                                <img src="https://ui-avatars.com/api/?name=Lina" class="w-6 h-6 rounded-full grayscale opacity-40">
                                <span class="text-[10px] font-bold text-pink-200/40 italic">Lina M.</span>
                            </div>
                            <p class="text-[11px] text-pink-100/70 font-light italic leading-relaxed">"Expérience incroyable, l'interface est si douce et facile à utiliser !"</p>
                            <div class="mt-4 flex justify-between items-center">
                                <span class="text-[8px] font-black uppercase text-pink-400 tracking-tighter italic">Match: Final Cup</span>
                                <div class="flex gap-0.5 text-pink-400 text-[8px]">
                                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="w-full mt-6 py-4 rounded-2xl border border-dashed border-pink-400/20 text-[9px] font-black uppercase tracking-widest text-pink-300/40 hover:text-pink-400 hover:border-pink-400 transition">Lire tous les messages</button>
                </div>

                <!-- Soft Technical Status -->
                <div class="glass-panel rounded-[2.5rem] p-8 bg-gradient-to-br from-purple-500/10 to-transparent">
                    <h4 class="text-[10px] font-black text-pink-200/30 uppercase tracking-[0.2em] mb-4 text-center">État de la magie</h4>
                    <div class="flex justify-around items-center">
                        <div class="text-center group">
                            <i class="fas fa-envelope-open-heart text-pink-400 mb-1 block opacity-40 group-hover:opacity-100 transition"></i>
                            <div class="h-1 w-6 bg-pink-400 rounded-full mx-auto shadow-lg shadow-pink-500/50"></div>
                        </div>
                        <div class="text-center group">
                            <i class="fas fa-ticket text-purple-400 mb-1 block opacity-40 group-hover:opacity-100 transition"></i>
                            <div class="h-1 w-6 bg-purple-400 rounded-full mx-auto shadow-lg shadow-purple-500/50"></div>
                        </div>
                        <div class="text-center group">
                            <i class="fas fa-file-pdf text-turquoise-400 mb-1 block opacity-40 group-hover:opacity-100 transition" style="color:var(--success)"></i>
                            <div class="h-1 w-6 bg-turquoise-400 rounded-full mx-auto shadow-lg shadow-turquoise-500/50" style="background:var(--success)"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>

</body>
</html>