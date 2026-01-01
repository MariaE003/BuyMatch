<!-- <!DOCTYPE html>
<html lang="fr" class="h-full bg-slate-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StadiumPass | Réservation de Billets</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap');
        body { font-family: 'Inter', sans-serif; }
    </style>
    <script src="../frontend/js/script.js"></script>
</head>
<body class="flex flex-col min-h-screen">
    Navbar
    <nav class="bg-slate-900 text-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center gap-2">
                    <div class="bg-indigo-600 p-2 rounded-lg">
                        <i class="fas fa-ticket-alt text-xl"></i>
                    </div>
                    <span class="text-xl font-bold tracking-tight">STADIUM<span class="text-indigo-400">PASS</span></span>
                </div>
                
                Desktop Menu
                <div class="hidden md:flex items-center space-x-8">
                    <a href="index.php" class="hover:text-indigo-400 transition">Matchs</a>
                    <a href="login.php" class="hover:text-indigo-400 transition">Connexion</a>
                    <a href="register.php" class="bg-indigo-600 hover:bg-indigo-700 px-5 py-2 rounded-full font-semibold transition">S'inscrire</a>
                </div>
            </div>
        </div>
    </nav>

    <main class="flex-grow">
        <div class="flex min-h-screen">
    Sidebar
    <aside class="w-64 bg-white border-r hidden md:block">
        <div class="p-6">
            <div class="flex items-center gap-3 mb-10">
                <div class="w-10 h-10 rounded-full bg-indigo-100 flex items-center justify-center">
                    <i class="fas fa-user text-indigo-600"></i>
                </div>
                <div>
                    <p class="font-bold text-slate-800 text-sm">Ahmed Bennani</p>
                    <p class="text-xs text-slate-500 italic">Acheteur</p>
                </div>
            </div>
            <nav class="space-y-2">
                <a href="#" class="flex items-center gap-3 p-3 rounded-lg bg-indigo-50 text-indigo-600 font-semibold">
                    <i class="fas fa-th-large"></i> Mes Billets
                </a>
                <a href="#" class="flex items-center gap-3 p-3 rounded-lg text-slate-600 hover:bg-slate-50 transition">
                    <i class="fas fa-history"></i> Historique
                </a>
                <a href="#" class="flex items-center gap-3 p-3 rounded-lg text-slate-600 hover:bg-slate-50 transition">
                    <i class="fas fa-cog"></i> Paramètres
                </a>
                <a href="#" class="flex items-center gap-3 p-3 rounded-lg text-red-500 hover:bg-red-50 transition mt-10">
                    <i class="fas fa-sign-out-alt"></i> Déconnexion
                </a>
            </nav>
        </div>
    </aside>

    Content
    <main class="flex-1 p-8 bg-slate-50">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-2xl font-bold text-slate-800">Mes Billets Actifs</h1>
            <button class="bg-indigo-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-indigo-700">+ Réserver un match</button>
        </div>

        Ticket List
        <div class="space-y-4">
            <div class="bg-white p-6 rounded-xl border flex justify-between items-center shadow-sm">
                <div class="flex gap-6 items-center">
                    <div class="text-center bg-slate-100 p-4 rounded-lg">
                        <span class="block text-2xl font-bold">25</span>
                        <span class="text-xs uppercase text-slate-500">Déc</span>
                    </div>
                    <div>
                        <h3 class="font-bold text-lg">Raja vs Wydad</h3>
                        <p class="text-sm text-slate-500 italic">Catégorie: Tribune Latérale | Place: #452</p>
                    </div>
                </div>
                <div class="flex gap-3">
                    <button class="p-2 text-indigo-600 hover:bg-indigo-50 rounded-lg transition" title="Télécharger PDF">
                        <i class="fas fa-file-pdf text-xl"></i>
                    </button>
                    <button class="bg-slate-100 text-slate-700 px-4 py-2 rounded-lg text-sm font-semibold">Voir le QR</button>
                </div>
            </div>
        </div>
    </main>
</div>


    </main>

    <footer class="bg-slate-900 text-slate-400 py-8 border-t border-slate-800">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p>&copy; 2024 StadiumPass POO Project. Tous droits réservés.</p>
        </div>
    </footer>
</body>
</html> -->



<!-- 
<!DOCTYPE html>
<html lang="fr" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StadiumPass | Espace Personnel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap');
        body { 
            font-family: 'Poppins', sans-serif; 
            background-color: #0f172a; /* Fond très sombre */
        }
        .glass-card {
            background: rgba(30, 41, 59, 0.7);
            backdrop-filter: blur(10px);
            border: 1px border: rgba(255, 255, 255, 0.1);
        }
        .sidebar-link-active {
            background: linear-gradient(90deg, rgba(59, 130, 246, 0.2) 0%, rgba(59, 130, 246, 0) 100%);
            border-left: 4px solid #3b82f6;
        }
    </style>
</head>
<body class="flex flex-col min-h-screen text-slate-200">

    <nav class="bg-slate-950/80 border-b border-slate-800 backdrop-blur-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">
                <div class="flex items-center gap-3">
                    <div class="bg-blue-600 p-2.5 rounded-xl shadow-lg shadow-blue-900/20">
                        <i class="fas fa-ticket-alt text-white text-xl"></i>
                    </div>
                    <span class="text-2xl font-black tracking-tighter text-white">STADIUM<span class="text-blue-500">PASS</span></span>
                </div>
                
                <div class="hidden md:flex items-center space-x-10">
                    <a href="index.php" class="text-sm font-medium hover:text-blue-400 transition italic uppercase tracking-widest">Matchs</a>
                    <div class="h-8 w-[1px] bg-slate-800"></div>
                    <div class="flex items-center gap-3">
                        <span class="text-sm font-semibold text-slate-400">Ahmed Bennani</span>
                        <div class="w-10 h-10 rounded-full border-2 border-blue-500 p-0.5">
                            <img src="https://ui-avatars.com/api/?name=Ahmed+Bennani&background=0D8ABC&color=fff" class="rounded-full" alt="Avatar">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="flex flex-grow overflow-hidden">
        <aside class="w-72 bg-slate-950 border-r border-slate-800 hidden md:block">
            <div class="flex flex-col h-full py-8">
                <nav class="space-y-1 flex-grow">
                    <a href="#" class="sidebar-link-active flex items-center gap-4 px-8 py-4 text-blue-400 font-bold">
                        <i class="fas fa-th-large w-5"></i> Mes Billets
                    </a>
                    <a href="#" class="flex items-center gap-4 px-8 py-4 text-slate-500 hover:text-slate-200 hover:bg-slate-900 transition">
                        <i class="fas fa-history w-5"></i> Historique
                    </a>
                    <a href="#" class="flex items-center gap-4 px-8 py-4 text-slate-500 hover:text-slate-200 hover:bg-slate-900 transition">
                        <i class="fas fa-star w-5"></i> Mes Avis
                    </a>
                    <a href="#" class="flex items-center gap-4 px-8 py-4 text-slate-500 hover:text-slate-200 hover:bg-slate-900 transition">
                        <i class="fas fa-user-cog w-5"></i> Profil
                    </a>
                </nav>
                
                <div class="px-8 mt-auto">
                    <a href="#" class="flex items-center gap-4 py-4 text-red-400 hover:text-red-300 transition font-semibold border-t border-slate-800">
                        <i class="fas fa-sign-out-alt w-5"></i> Déconnexion
                    </a>
                </div>
            </div>
        </aside>

        <main class="flex-1 overflow-y-auto p-8 bg-[#0f172a]">
            <div class="max-w-4xl mx-auto">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-12 gap-4">
                    <div>
                        <h1 class="text-3xl font-black text-white uppercase tracking-tight">Tableau de bord</h1>
                        <p class="text-slate-500 mt-1">Gérez vos réservations et vos accès au stade.</p>
                    </div>
                    <button class="bg-blue-600 hover:bg-blue-500 text-white px-6 py-3 rounded-xl font-bold shadow-xl shadow-blue-900/30 transition transform hover:scale-105 flex items-center gap-2">
                        <i class="fas fa-plus"></i> Nouveau Match
                    </button>
                </div>

                <div class="grid gap-6">
                    <h2 class="text-sm font-bold text-blue-500 uppercase tracking-[0.2em] mb-2">Billets Actifs</h2>
                    
                    <div class="glass-card rounded-2xl overflow-hidden border border-slate-700/50 group hover:border-blue-500/50 transition-all duration-300">
                        <div class="flex flex-col md:flex-row">
                            <div class="bg-slate-900 p-6 flex flex-col items-center justify-center border-b md:border-b-0 md:border-r border-slate-800 min-w-[120px]">
                                <span class="text-3xl font-black text-white">25</span>
                                <span class="text-blue-500 font-bold uppercase text-xs tracking-widest">Déc</span>
                                <span class="text-slate-600 text-xs mt-1">2024</span>
                            </div>
                            
                            <div class="p-6 flex-grow flex flex-col justify-center">
                                <div class="flex items-center gap-2 mb-2">
                                    <span class="bg-green-500/10 text-green-500 text-[10px] px-2 py-0.5 rounded-full font-bold uppercase tracking-tighter">Confirmé</span>
                                    <span class="text-slate-500 text-xs">• 20:00 GMT</span>
                                </div>
                                <h3 class="text-xl font-bold text-white group-hover:text-blue-400 transition">Raja Casablanca <span class="text-slate-500 px-2 font-light text-base italic">vs</span> Wydad AC</h3>
                                <div class="flex flex-wrap gap-4 mt-3">
                                    <span class="text-sm text-slate-400 flex items-center gap-2">
                                        <i class="fas fa-chair text-blue-500"></i> Zone: Tribune Est
                                    </span>
                                    <span class="text-sm text-slate-400 flex items-center gap-2">
                                        <i class="fas fa-hashtag text-blue-500"></i> Place: #452
                                    </span>
                                </div>
                            </div>

                            <div class="p-6 bg-slate-900/50 flex md:flex-col justify-center gap-3 border-t md:border-t-0 md:border-l border-slate-800">
                                <button class="flex-1 md:flex-none p-3 bg-slate-800 hover:bg-blue-600 text-white rounded-xl transition shadow-inner" title="Télécharger">
                                    <i class="fas fa-file-pdf"></i>
                                </button>
                                <button class="flex-1 md:flex-none px-4 py-3 bg-blue-600 hover:bg-blue-500 text-white rounded-xl text-xs font-bold uppercase tracking-widest transition">
                                    QR Code
                                </button>
                            </div>
                        </div>
                    </div>
                    </div>
            </div>
        </main>
    </div>

    <footer class="bg-slate-950 text-slate-600 py-6 border-t border-slate-900">
        <div class="max-w-7xl mx-auto px-4 flex flex-col md:flex-row justify-between items-center gap-4">
            <p class="text-sm font-medium tracking-wide">&copy; 2025 STADIUM<span class="text-blue-500">PASS</span> PRO</p>
            <div class="flex gap-6 text-xs uppercase font-bold tracking-widest">
                <a href="#" class="hover:text-white">Support</a>
                <a href="#" class="hover:text-white">Confidentialité</a>
            </div>
        </div>
    </footer>

</body>
</html> -->
<!-- 

<!DOCTYPE html>
<html lang="fr" class="h-full bg-gray-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StadiumPass | Réservation de Billets</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap');
        body { font-family: 'Inter', sans-serif; }
    </style>
    <script src="../frontend/js/script.js"></script>
</head>
<body class="flex flex-col min-h-screen">

Navbar
<nav class="bg-gradient-to-r from-indigo-600 via-indigo-700 to-indigo-800 text-white shadow-lg sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <div class="flex items-center gap-2">
                <div class="bg-white p-2 rounded-lg text-indigo-700 shadow-md">
                    <i class="fas fa-ticket-alt text-xl"></i>
                </div>
                <span class="text-2xl font-bold tracking-tight">STADIUM<span class="text-yellow-400">PASS</span></span>
            </div>

            Desktop Menu
            <div class="hidden md:flex items-center space-x-8">
                <a href="index.php" class="hover:text-yellow-400 transition font-semibold">Matchs</a>
                <a href="login.php" class="hover:text-yellow-400 transition font-semibold">Connexion</a>
                <a href="register.php" class="bg-yellow-400 text-indigo-800 hover:bg-yellow-300 px-5 py-2 rounded-full font-semibold transition shadow-md">S'inscrire</a>
            </div>
        </div>
    </div>
</nav>

<main class="flex-grow flex">
    Sidebar
    <aside class="w-64 bg-white border-r hidden md:block shadow-md">
        <div class="p-6">
            <div class="flex items-center gap-3 mb-10">
                <div class="w-12 h-12 rounded-full bg-indigo-100 flex items-center justify-center shadow-sm">
                    <i class="fas fa-user text-indigo-600 text-lg"></i>
                </div>
                <div>
                    <p class="font-bold text-gray-800 text-sm">Ahmed Bennani</p>
                    <p class="text-xs text-gray-500 italic">Acheteur</p>
                </div>
            </div>
            <nav class="space-y-3">
                <a href="#" class="flex items-center gap-3 p-3 rounded-lg bg-indigo-50 text-indigo-600 font-semibold shadow-sm hover:bg-indigo-100 transition">
                    <i class="fas fa-th-large"></i> Mes Billets
                </a>
                <a href="#" class="flex items-center gap-3 p-3 rounded-lg text-gray-600 hover:bg-gray-100 transition">
                    <i class="fas fa-history"></i> Historique
                </a>
                <a href="#" class="flex items-center gap-3 p-3 rounded-lg text-gray-600 hover:bg-gray-100 transition">
                    <i class="fas fa-cog"></i> Paramètres
                </a>
                <a href="#" class="flex items-center gap-3 p-3 rounded-lg text-red-500 hover:bg-red-50 transition mt-10">
                    <i class="fas fa-sign-out-alt"></i> Déconnexion
                </a>
            </nav>
        </div>
    </aside>

    Content
    <main class="flex-1 p-8 bg-gray-50">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Mes Billets Actifs</h1>
            <button class="bg-yellow-400 text-indigo-800 px-6 py-3 rounded-xl shadow-lg hover:bg-yellow-300 font-semibold transition">+ Réserver un match</button>
        </div>

        Ticket List
        <div class="space-y-6">
            <div class="bg-white p-6 rounded-2xl border border-gray-200 flex justify-between items-center shadow hover:shadow-lg transition">
                <div class="flex gap-6 items-center">
                    <div class="text-center bg-gray-100 p-4 rounded-lg shadow-inner">
                        <span class="block text-3xl font-bold text-indigo-600">25</span>
                        <span class="text-sm uppercase text-gray-500">Déc</span>
                    </div>
                    <div>
                        <h3 class="font-bold text-xl text-gray-800">Raja vs Wydad</h3>
                        <p class="text-sm text-gray-500 italic">Catégorie: Tribune Latérale | Place: #452</p>
                    </div>
                </div>
                <div class="flex gap-4">
                    <button class="p-3 text-yellow-500 hover:bg-yellow-100 rounded-lg transition shadow-sm" title="Télécharger PDF">
                        <i class="fas fa-file-pdf text-2xl"></i>
                    </button>
                    <button class="bg-indigo-50 text-indigo-800 px-5 py-2 rounded-lg font-semibold shadow-sm hover:bg-indigo-100 transition">Voir le QR</button>
                </div>
            </div>

            Exemple de deuxième billet
            <div class="bg-white p-6 rounded-2xl border border-gray-200 flex justify-between items-center shadow hover:shadow-lg transition">
                <div class="flex gap-6 items-center">
                    <div class="text-center bg-gray-100 p-4 rounded-lg shadow-inner">
                        <span class="block text-3xl font-bold text-indigo-600">28</span>
                        <span class="text-sm uppercase text-gray-500">Déc</span>
                    </div>
                    <div>
                        <h3 class="font-bold text-xl text-gray-800">FAR vs HUSA</h3>
                        <p class="text-sm text-gray-500 italic">Catégorie: Tribune Centrale | Place: #178</p>
                    </div>
                </div>
                <div class="flex gap-4">
                    <button class="p-3 text-yellow-500 hover:bg-yellow-100 rounded-lg transition shadow-sm" title="Télécharger PDF">
                        <i class="fas fa-file-pdf text-2xl"></i>
                    </button>
                    <button class="bg-indigo-50 text-indigo-800 px-5 py-2 rounded-lg font-semibold shadow-sm hover:bg-indigo-100 transition">Voir le QR</button>
                </div>
            </div>
        </div>
    </main>
</main>

<footer class="bg-gray-900 text-gray-400 py-8 border-t border-gray-800 mt-auto">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <p>&copy; 2024 StadiumPass POO Project. Tous droits réservés.</p>
    </div>
</footer>

</body>
</html> -->





<!DOCTYPE html>
<html lang="fr" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elite Stadium Pass | Official Ticketing</title>
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
        .match-card { transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); }
        .match-card:hover { transform: translateY(-5px); border-color: var(--primary); background: rgba(99, 102, 241, 0.05); }
        .btn-gradient { background: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%); }
        .sidebar-item.active { background: linear-gradient(90deg, rgba(99, 102, 241, 0.1) 0%, transparent 100%); border-left: 4px solid #6366f1; }
        
        /* Custom scrollbar */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: #05070a; }
        ::-webkit-scrollbar-thumb { background: #1e293b; border-radius: 10px; }
    </style>
</head>
<body class="flex flex-col min-h-screen">

    <!-- Navbar Premium -->
    <nav class="glass sticky top-0 z-50 px-6 py-4 border-b border-white/5">
        <div class="max-w-[1600px] mx-auto flex justify-between items-center">
            <div class="flex items-center gap-4">
                <div class="w-10 h-10 bg-indigo-600 rounded-xl flex items-center justify-center rotate-3 shadow-lg shadow-indigo-500/20">
                    <i class="fas fa-trophy text-white"></i>
                </div>
                <span class="font-league text-2xl font-black italic italic">ELITE<span class="text-indigo-500">STADIUM</span></span>
            </div>
            
            <div class="hidden md:flex items-center space-x-10 text-xs font-bold uppercase tracking-[0.2em]">
                <a href="index.php" class="text-indigo-400">Matchs</a>
                <a href="#" class="hover:text-indigo-400 transition">Calendrier</a>
                <a href="#" class="hover:text-indigo-400 transition">Stades</a>
            </div>

            <div class="flex items-center gap-6">
                <a href="login.php" class="text-xs font-bold hover:text-indigo-400 transition">CONNEXION</a>
                <a href="register.php" class="btn-gradient px-6 py-2.5 rounded-full text-xs font-black uppercase tracking-wider shadow-lg shadow-indigo-500/20">S'inscrire</a>
            </div>
        </div>
    </nav>

    <main class="flex-grow flex flex-col lg:flex-row">
        
        <!-- Sidebar Tech-Design -->
        <aside class="w-full lg:w-72 glass border-r border-white/5 flex-shrink-0">
            <div class="p-8">
                <div class="flex items-center gap-4 mb-12 p-4 glass rounded-2xl">
                    <div class="relative">
                        <img src="https://ui-avatars.com/api/?name=Ahmed+Bennani&background=6366f1&color=fff" class="w-12 h-12 rounded-xl" alt="Profile">
                        <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-green-500 border-2 border-[#05070a] rounded-full"></div>
                    </div>
                    <div>
                        <p class="font-league text-sm font-bold">Ahmed B.</p>
                        <span class="text-[10px] bg-indigo-500/20 text-indigo-400 px-2 py-0.5 rounded font-black uppercase">Acheteur</span>
                    </div>
                </div>

                <nav class="space-y-2">
                    <p class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] mb-4 px-4">Menu Principal</p>
                    <a href="#" class="sidebar-item active flex items-center gap-4 p-4 rounded-xl text-sm font-bold transition">
                        <i class="fas fa-ticket-alt w-5 text-indigo-500"></i> Mes Billets
                    </a>
                    <a href="#" class="sidebar-item flex items-center gap-4 p-4 rounded-xl text-sm font-bold text-slate-400 hover:text-white transition">
                        <i class="fas fa-history w-5"></i> Historique
                    </a>
                    <a href="#" class="sidebar-item flex items-center gap-4 p-4 rounded-xl text-sm font-bold text-slate-400 hover:text-white transition">
                        <i class="fas fa-heart w-5"></i> Favoris
                    </a>
                    <a href="#" class="sidebar-item flex items-center gap-4 p-4 rounded-xl text-sm font-bold text-slate-400 hover:text-white transition">
                        <i class="fas fa-user-cog w-5"></i> Mon Profil
                    </a>
                    
                    <div class="pt-10">
                        <a href="#" class="flex items-center gap-4 p-4 rounded-xl text-sm font-bold text-red-400 hover:bg-red-500/10 transition">
                            <i class="fas fa-sign-out-alt w-5"></i> Déconnexion
                        </a>
                    </div>
                </nav>
            </div>
        </aside>

        <!-- Main Content (Dashboard / Matchs) -->
        <div class="flex-1 p-6 lg:p-12 overflow-y-auto">
            
            <!-- Header Section -->
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6 mb-12">
                <div>
                    <h1 class="font-league text-4xl font-black italic uppercase italic">Mes Billets <span class="text-indigo-500 text-6xl">.</span></h1>
                    <p class="text-slate-500 text-sm mt-2">Vous avez <span class="text-white font-bold">2 billets</span> actifs pour les prochains matchs.</p>
                </div>
                <button class="btn-gradient px-8 py-4 rounded-2xl font-black text-xs uppercase tracking-widest flex items-center gap-3">
                    <i class="fas fa-plus"></i> Réserver un match
                </button>
            </div>

            <!-- Billets Grid -->
            <div class="grid grid-cols-1 xl:grid-cols-2 gap-8">
                
                <!-- Ticket Card Style "VIP Pass" -->
                <div class="match-card glass rounded-[2.5rem] p-1 overflow-hidden relative group">
                    <div class="absolute -right-10 -top-10 w-40 h-40 bg-indigo-600/10 rounded-full blur-3xl group-hover:bg-indigo-600/20 transition"></div>
                    
                    <div class="p-8">
                        <div class="flex justify-between items-start mb-8">
                            <div class="bg-white/5 p-4 rounded-2xl text-center min-w-[70px]">
                                <span class="block text-2xl font-black font-league italic">25</span>
                                <span class="text-[10px] uppercase font-black text-indigo-400">DÉC 2024</span>
                            </div>
                            <div class="text-right">
                                <span class="bg-green-500/20 text-green-400 text-[10px] px-3 py-1 rounded-full font-black uppercase tracking-tighter">Confirmé</span>
                                <p class="text-[10px] text-slate-500 mt-2 font-bold uppercase tracking-widest">ID: #SP-8829</p>
                            </div>
                        </div>

                        <div class="space-y-4 mb-8">
                            <h3 class="font-league text-2xl font-black uppercase italic">Raja CA <span class="text-indigo-500 italic text-sm mx-2">VS</span> Wydad AC</h3>
                            <div class="flex items-center gap-6 text-xs text-slate-400 font-semibold">
                                <span><i class="fas fa-map-marker-alt text-indigo-500 mr-2"></i>Stade Mohammed V</span>
                                <span><i class="fas fa-chair text-indigo-500 mr-2"></i>Tribune Latérale (P-452)</span>
                            </div>
                        </div>

                        <div class="flex items-center justify-between pt-6 border-t border-white/5">
                            <div class="flex -space-x-2">
                                <div class="w-8 h-8 rounded-full border-2 border-[#05070a] bg-slate-800 flex items-center justify-center text-[10px] font-bold">VIP</div>
                            </div>
                            <div class="flex gap-3">
                                <button class="w-12 h-12 rounded-xl bg-white/5 flex items-center justify-center hover:bg-white/10 transition text-indigo-400" title="PDF">
                                    <i class="fas fa-file-pdf"></i>
                                </button>
                                <button class="bg-indigo-600 hover:bg-indigo-500 text-white px-6 rounded-xl text-xs font-black uppercase transition shadow-lg shadow-indigo-500/20">
                                    Afficher QR
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <!-- Footer Simple & Dark -->
    <footer class="bg-black/50 backdrop-blur-md border-t border-white/5 py-10 px-6">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center gap-6">
            <div class="flex items-center gap-4 grayscale opacity-50">
                <span class="font-league text-xl font-black italic italic">ELITE<span class="text-indigo-500">STADIUM</span></span>
            </div>
            <p class="text-[10px] font-bold text-slate-600 uppercase tracking-[0.3em]">© 2024 Elite Stadium Pass. All Professional Rights Reserved.</p>
            <div class="flex gap-6 text-slate-500">
                <a href="#" class="hover:text-white transition"><i class="fab fa-twitter"></i></a>
                <a href="#" class="hover:text-white transition"><i class="fab fa-instagram"></i></a>
                <a href="#" class="hover:text-white transition"><i class="fab fa-linkedin"></i></a>
            </div>
        </div>
    </footer>

    <!-- Native JS pour petites interactions -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Effet simple au clic des items menu
            const items = document.querySelectorAll('.sidebar-item');
            items.forEach(item => {
                item.addEventListener('click', function() {
                    items.forEach(i => i.classList.remove('active', 'text-white'));
                    this.classList.add('active', 'text-white');
                });
            });
        });
    </script>
</body>
</html>
