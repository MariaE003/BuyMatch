<?php 
// require_once './session.php';
require_once './classes/MatchEvent.php';
// print_r($_SESSION);
// var_dump($_SESSION);
// echo $_SESSION["user_id"];


// les match disponible
$match=new MatchEvent();
$matchs=$match->Matchs();
// var_dump($matchs);


if (isset($_POST["send"])) {
    $searchMatchs=$match->filterMatchs($_POST["LieuMatch"]);
}
?>

<!DOCTYPE html>
<html lang="fr" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elite Stadium Pass | Accueil</title>
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
        .match-card { transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1); border: 1px solid var(--glass-border); }
        .match-card:hover { transform: translateY(-8px); border-color: var(--primary); background: rgba(99, 102, 241, 0.05); }
        .btn-gradient { background: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%); }
        .hero-gradient { background: linear-gradient(to bottom, transparent, var(--dark-bg)); }
        
        /* Animation pour les logos */
        .team-logo { filter: drop-shadow(0 0 8px rgba(99, 102, 241, 0.3)); }
    </style>
</head>
<body class="min-h-screen flex flex-col">

    <!-- Navbar Premium -->
    <?php
    require './frontend/composant/nav.php';
    ?>

    <!-- Hero Section (Immersive) -->
    <header class="relative h-[60vh] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1508098682722-e99c43a406b2?q=80&w=2000" class="w-full h-full object-cover opacity-30 shadow-inner" alt="Stadium">
            <div class="absolute inset-0 hero-gradient"></div>
        </div>
        
        <div class="relative z-10 text-center px-4">
            <span class="bg-indigo-500/10 text-indigo-400 border border-indigo-500/20 px-4 py-1 rounded-full text-[10px] font-black uppercase tracking-[0.3em] mb-6 inline-block">Saison Officielle 2025</span>
            <h1 class="font-league text-6xl md:text-8xl font-black italic uppercase leading-none mb-6">
                Vivez la <span class="text-indigo-500">Passion</span> <br>en Direct
            </h1>
            <p class="text-slate-400 max-w-xl mx-auto text-sm md:text-base font-light tracking-wide mb-10">
                Réservez vos places pour les plus grandes affiches du championnat. Sécurité garantie et billets digitaux instantanés.
            </p>
            <a href="#matchs" class="btn-gradient px-10 py-4 rounded-2xl font-black text-xs uppercase tracking-[0.2em] shadow-xl hover:scale-105 transition-transform inline-block">
                Explorer les Matchs
            </a>
        </div>
    </header>

    <!-- Filter Bar (Glassmorphism) -->
    <section class="max-w-[1200px] mx-auto w-full px-6 -mt-12 relative z-20">
        <form method="POST" class="glass p-4 rounded-[2.5rem] shadow-2xl flex flex-col lg:flex-row gap-4 items-center border border-white/10">
            <div class="flex-1 w-full relative">
                <i class="fas fa-search absolute left-6 top-1/2 -translate-y-1/2 text-slate-500"></i>
                <input type="text" name="LieuMatch" id="searchMatch" placeholder="Rechercher une équipe ou un stade..." class="w-full bg-white/5 border border-white/5 rounded-2xl py-4 pl-14 pr-6 text-sm outline-none focus:border-indigo-500 transition">
            </div>
            
            <div class="flex w-full lg:w-auto gap-4">
                <!-- <select id="filterLieu" class="bg-white/5 border border-white/5 rounded-2xl py-4 px-6 text-sm outline-none focus:border-indigo-500 transition cursor-pointer">
                    <option value="" class="bg-[#05070a]">Tous les lieux</option>
                    <option value="Casablanca" class="bg-[#05070a]">Casablanca</option>
                    <option value="Rabat" class="bg-[#05070a]">Rabat</option>
                    <option value="Madrid" class="bg-[#05070a]">Madrid</option>
                </select> -->
                
                <button type="submit" name="send" class="bg-white text-black px-8 py-4 rounded-2xl font-black text-[10px] uppercase tracking-widest hover:bg-indigo-500 hover:text-white transition">
                    Filtrer
                </button>
            </div>
        </form>
    </section>
    <?php if (isset($_POST["send"]) && count($searchMatchs)>0) {?>
    <section class="max-w-[1400px] mx-auto w-full px-6 mt-28">
    <div class="mb-10">
        <h2 class="font-league text-3xl font-black italic uppercase text-indigo-400">
            Résultats de Recherche
        </h2>
        <p class="text-xs text-slate-400 mt-1">
            Matchs correspondant à votre recherche
        </p>
    </div>

    <div class="space-y-6">
        <?php 
        
        foreach ($searchMatchs as $match) { ?>
            <div class="relative group rounded-3xl overflow-hidden border border-indigo-500/30 bg-gradient-to-r from-indigo-500/10 via-white/5 to-transparent hover:border-indigo-500 transition">

                <!-- Badge -->
                <span class="absolute top-4 left-4 bg-indigo-500 text-black px-4 py-1 rounded-full text-[9px] font-black uppercase tracking-widest">
                    Match Recherché
                </span>

                <div class="flex flex-col lg:flex-row items-center gap-8 p-8">

                    <!-- Teams -->
                    <div class="flex items-center gap-6 flex-1">
                        <div class="text-center">
                            <img src="<?= $match["logoEquipe1"] ?>" class="w-14 h-14 mx-auto mb-2">
                            <span class="font-league text-[10px] font-bold">
                                <?= $match["Nomequipe1"] ?>
                            </span>
                        </div>

                        <span class="font-league text-xl font-black italic text-indigo-400">
                            VS
                        </span>

                        <div class="text-center">
                            <img src="<?= $match["logoEquipe2"] ?>" class="w-14 h-14 mx-auto mb-2">
                            <span class="font-league text-[10px] font-bold">
                                <?= $match["Nomequipe2"] ?>
                            </span>
                        </div>
                    </div>

                    <!-- Infos -->
                    <div class="flex flex-col gap-3 text-xs font-semibold text-slate-300 flex-1">
                        <div>
                            <i class="far fa-calendar-alt text-indigo-400 mr-2"></i>
                            <?= $match["date"] ?> • <?= substr($match["heure"], 0, 5) ?>
                        </div>
                        <div>
                            <i class="fas fa-map-marker-alt text-indigo-400 mr-2"></i>
                            <?= $match["lieu"] ?>
                        </div>
                    </div>

                    <!-- Action -->
                    <div>
                        <a href="./frontend/detail-match.php?id=<?= $match["id"] ?>"
                           class="inline-block bg-indigo-500 text-black px-8 py-3 rounded-xl font-black text-[10px] uppercase tracking-widest hover:bg-white transition">
                            Voir Détails
                        </a>
                    </div>

                </div>

                <!-- Glow -->
                <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition pointer-events-none"
                     style="box-shadow: inset 0 0 60px rgba(99,102,241,0.25);"></div>
            </div>
        <?php }} ?>
    </div>
</section>

    <!-- Match Grid Section -->
    <main id="matchs" class="max-w-[1400px] mx-auto w-full px-6 py-24">
        <div class="flex justify-between items-end mb-12">
            <div>
                <h2 class="font-league text-3xl font-black italic uppercase">Matchs en Vedette</h2>
                <div class="h-1 w-20 bg-indigo-500 mt-2"></div>
            </div>
            <span class="text-[10px] font-black text-slate-500 uppercase tracking-widest">Affichage de 12 événements</span>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            <!-- Match Card 1 -->
            <?php
                foreach($matchs as $match){

                
            ?>
            <div class="match-card glass rounded-[2.5rem] overflow-hidden flex flex-col">
                <div class="p-8 flex-grow">

                    <div class="flex justify-between items-center gap-4 mb-8">
                        <div class="text-center flex-1">
                            <div class="w-16 h-16 mx-auto mb-3 glass rounded-2xl overflow-hidden">
                                <img 
                                    src="<?= $match["logoEquipe1"] ?>" 
                                    alt="logo"
                                    class="w-full h-full "
                                >
                            </div>
                            <span class="font-league text-[10px] font-bold block">
                                <?= $match["Nomequipe1"] ?>
                            </span>
                        </div>

                        <div class="text-center">
                            <span class="font-league text-2xl font-black italic text-white/20">VS</span>
                        </div>
                        <div class="text-center flex-1">
                            <div class="w-16 h-16 mx-auto mb-3 glass rounded-2xl overflow-hidden">
                                <!-- <i class="fas fa-shield-halved text-2xl text-red-500 team-logo"></i> -->
                                <img class="w-full h-full" src="<?=$match["logoEquipe2"]?>" alt="logo">
                            </div>
                            <span class="font-league text-[10px] font-bold block"><?=$match["Nomequipe2"]?></span>
                        </div>
                    </div>

                    <div class="space-y-3 text-center md:text-left">
                        <div class="text-xs font-semibold text-slate-300">
                            <i class="far fa-calendar-alt text-indigo-500 mr-2"></i> <?=$match["date"]?> • <?=substr($match["heure"],0,5);?>
                        </div>
                        <div class="text-xs font-semibold text-slate-300">
                            <i class="fas fa-map-marker-alt text-indigo-500 mr-2"></i><?=$match["lieu"]?>
                        </div>
                    </div>
                </div>

                <div class="p-8 bg-white/5 border-t border-white/5 flex items-center justify-between">
                    <!-- <div>
                        <span class="text-[10px] font-black text-slate-500 uppercase block">À partir de</span>
                        <span class="text-xl font-black italic font-league tracking-tighter">50 DH</span>
                    </div> -->
                    <a href="./frontend/detail-match.php?id=<?=$match["id"]?>" class="bg-white text-black px-6 py-3 rounded-xl font-black text-[10px] uppercase tracking-widest hover:bg-indigo-500 hover:text-white transition">
                        Détails
                    </a>
                </div>
            </div>
            <?php } ?>

            <!-- Répéter les cartes (Match Card 2, 3...) -->
            <!-- Match Card 2 (Exemple simplifié pour remplissage) -->
            <!-- <div class="match-card glass rounded-[2.5rem] overflow-hidden flex flex-col">
                <div class="p-8 flex-grow">
                    <div class="flex justify-between items-center mb-10">
                        <span class="bg-green-500/10 text-green-400 text-[10px] px-3 py-1 rounded-full font-black uppercase">J-15</span>
                        <span class="text-[10px] text-slate-500 font-bold uppercase tracking-widest">Amical</span>
                    </div>
                    <div class="flex justify-around items-center mb-8">
                         <i class="fas fa-shield-halved text-4xl text-purple-400 opacity-50"></i>
                         <span class="font-league text-xl font-black italic text-white/10">VS</span>
                         <i class="fas fa-shield-halved text-4xl text-blue-400 opacity-50"></i>
                    </div>
                    <h3 class="font-league text-lg font-black text-center mb-6">MAROC <span class="text-indigo-500 mx-2">vs</span> ESPAGNE</h3>
                    <div class="text-xs font-semibold text-slate-300 text-center">
                        <i class="fas fa-map-marker-alt text-indigo-500 mr-2"></i> Grand Stade de Tanger
                    </div>
                </div>
                <div class="p-8 bg-white/5 border-t border-white/5 flex items-center justify-between">
                    <div>
                        <span class="text-[10px] font-black text-slate-500 uppercase block">Prix VIP</span>
                        <span class="text-xl font-black italic font-league tracking-tighter">300 DH</span>
                    </div>
                    <a href="#" class="bg-white text-black px-6 py-3 rounded-xl font-black text-[10px] uppercase tracking-widest hover:bg-indigo-500 hover:text-white transition">Détails</a>
                </div>
            </div> -->

        </div>
    </main>

    <!-- Footer Premium -->
     <?php
    require './frontend/composant/footer.php';
    ?>
   

    <!-- Native JS Logic -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Filtrage simple en Front-End
            const searchInput = document.getElementById('searchMatch');
            const filterLieu = document.getElementById('filterLieu');
            const matchCards = document.querySelectorAll('.match-card');

            const performFilter = () => {
                const query = searchInput.value.toLowerCase();
                const lieu = filterLieu.value.toLowerCase();

                matchCards.forEach(card => {
                    const text = card.textContent.toLowerCase();
                    const isMatch = text.includes(query) && text.includes(lieu);
                    
                    if(isMatch) {
                        card.style.display = "flex";
                        card.style.opacity = "1";
                    } else {
                        card.style.display = "none";
                        card.style.opacity = "0";
                    }
                });
            };

            searchInput.addEventListener('input', performFilter);
            filterLieu.addEventListener('change', performFilter);

            // Animation au scroll (Header)
            window.addEventListener('scroll', () => {
                const nav = document.querySelector('nav');
                if(window.scrollY > 50) {
                    nav.style.padding = "10px 24px";
                    nav.style.background = "rgba(5, 7, 10, 0.95)";
                } else {
                    nav.style.padding = "16px 24px";
                    nav.style.background = "rgba(255, 255, 255, 0.03)";
                }
            });
        });
    </script>
</body>
</html>