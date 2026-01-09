<?php
require '../session.php';
require '../classes/Billet.php';
$rolePage="acheteur";
// checkRole(['acheteur']);

$user_id=$_SESSION["user_id"];
$billet=new Billet();
// echo $user_id;
$billetVenu=$billet->BilletVenir($user_id);
// echo count($billetVenu);

?>

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
    <?php require_once '../frontend/composant/nav.php'?>

    <main class="flex-grow flex flex-col lg:flex-row">
        
        <!-- Main Content (Dashboard / Matchs) -->
        <div class="flex-1 p-6 lg:p-12 overflow-y-auto">
            
            <!-- Header Section -->
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6 mb-12">
                <div>
                    <h1 class="font-league text-4xl font-black italic uppercase italic">Mes Billets <span class="text-indigo-500 text-6xl">.</span></h1>
                    <p class="text-slate-500 text-sm mt-2">Vous avez <span class="text-white font-bold">2 billets</span> actifs pour les prochains matchs.</p>
                </div>
                <a href="../index.php" class="btn-gradient px-8 py-4 rounded-2xl font-black text-xs uppercase tracking-widest flex items-center gap-3">
                    <i class="fas fa-plus"></i> Réserver un match
                </a>
            </div>

            <!-- Billets Grid -->
            <div class="grid grid-cols-1 xl:grid-cols-2 gap-8">
                
                <?php foreach ($billetVenu as $billets) { 
                    // var_dump($billets);
                    ?>
                <div class="match-card glass rounded-[2.5rem] p-1 overflow-hidden relative group">
                    <div class="absolute -right-10 -top-10 w-40 h-40 bg-indigo-600/10 rounded-full blur-3xl group-hover:bg-indigo-600/20 transition"></div>
                    
                    <div class="p-8">
                        <div class="flex justify-between items-start mb-8">
                            <div class="bg-white/5 p-4 rounded-2xl text-center min-w-[70px]">
                                <span class="block text-2xl font-black font-league italic"><?=$billets["jour"]?></span>
                                <span class="text-[10px] uppercase font-black text-indigo-400"><?=strtoupper(substr($billets["mois"],0,3))?> <?=$billets["annee"]?></span>
                            </div>
                            <div class="text-right">
                                <span class="bg-green-500/20 text-green-400 text-[10px] px-3 py-1 rounded-full font-black uppercase tracking-tighter">Confirmé</span>
                                <p class="text-[10px] text-slate-500 mt-2 font-bold uppercase tracking-widest">ID: <?=$billets["id_code"]?></p>
                            </div>
                        </div>

                        <div class="space-y-4 mb-8">
                            <h3 class="font-league text-2xl font-black uppercase italic"><?=$billets["Nomequipe1"]?><span class="text-indigo-500 italic text-sm mx-2">VS</span> <?=$billets["Nomequipe2"]?></h3>
                            <div class="flex items-center gap-6 text-xs text-slate-400 font-semibold">
                                <span><i class="fas fa-map-marker-alt text-indigo-500 mr-2"></i><?=$billets["lieu"]?></span>
                                <span><i class="fas fa-chair text-indigo-500 mr-2"></i><?=$billets["numero_place"]?></span>
                            </div>
                        </div>

                        <div class="flex items-center justify-between pt-6 border-t border-white/5">
                            <div class="flex -space-x-2">
                                <!-- <div class="w-8 h-8 rounded-full border-2 border-[#05070a] bg-slate-800 flex items-center justify-center text-[10px] font-bold">VIP</div> -->
                            </div>
                            <div class="flex gap-3">
                                <!-- <button class="w-12 h-12 rounded-xl bg-white/5 flex items-center justify-center hover:bg-white/10 transition text-indigo-400" title="PDF">
                                    <i class="fas fa-file-pdf"></i>
                                </button> -->
                               <button class=" w-12 h-12 bg-indigo-600 hover:bg-indigo-500 text-white px-6 rounded-xl text-xs font-black uppercase transition shadow-lg shadow-indigo-500/20">
                                    <i class="fas fa-file-pdf"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>

            </div>
        </div>
    </main>

    <!-- Footer Simple & Dark -->
        <?php require_once '../frontend/composant/footer.php'?>


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
