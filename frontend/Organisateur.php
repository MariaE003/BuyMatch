<?php
require '../session.php';
require '../classes/MatchEvent.php';
$rolePage = "organisateur";

$id_user = $_SESSION['user_id'];
$erreur='';
if (isset($_POST["send"])) {
    if (!empty($_POST['NomEqui1']) && !empty($_POST['NomEqui2']) && !empty($_POST['LogoEqui1']) 
        && !empty($_POST['LogoEqui2']) && !empty($_POST['date']) && !empty($_POST['heure']) 
        && !empty($_POST['lieu']) && !empty($_POST['capacite'])&& !empty($_POST["cat_label"]) && !empty($_POST["cat_price"])){
      
        // categorie
        try{
            $categorie=new Categorie();
            $categorie->setCatePrice($_POST["cat_price"]);
            $categorie->setCateName($_POST["cat_label"]);
            // match
            $creer = new MatchEvent($categorie);
            $creer->setNomEqui1($_POST['NomEqui1']);
            $creer->setNomEqui2($_POST['NomEqui2']);
            $creer->setLogoEqui1($_POST['LogoEqui1']);
            $creer->setLogoEqui2($_POST['LogoEqui2']);
            $creer->setDate($_POST['date']);
            $creer->setLieu($_POST['lieu']);
            $creer->setHeure($_POST['heure']);
            $creer->setCapacite($_POST['capacite']);
    
    
    
            // $idMatch=$creer->AddMatch($id_user);
            if ($creer->AddMatch($id_user)) {
                // $creer->AddCategorie($idMatch);
                header("Location: DashboardOrganisateur.php");
                exit();
            }
            else{
                echo "<p style='color:red'>Erreur: impossible d'ajouter le match.</p>";
            }
        }catch(Exception $e){
            $erreur = '<div class="p-4 mb-4 text-red-700 bg-red-100 rounded"> rreur :'.$e->getMessage().'</div>';
        }
    }
}

?>
<!DOCTYPE html>
<html lang="fr" class="h-full bg-[#020617]">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,
     initial-scale=1.0">
    <title>StadiumPass | Tactical Organizer Hub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,700;0,900;1,700;1,900&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary: #818cf8;
            --accent: #f43f5e;
            --bg-deep: #020617;
            --glass-card: rgba(15, 23, 42, 0.6);
            --glass-border: rgba(255, 255, 255, 0.05);
        }
        body { 
            font-family: 'Inter', sans-serif; 
            background-color: var(--bg-deep);
            color: #f8fafc;
            margin: 0;
        }
        .font-league { font-family: 'Montserrat', sans-serif; text-transform: uppercase; }
        .glass-panel { 
            background: var(--glass-card); 
            backdrop-filter: blur(25px); 
            border: 1px solid var(--glass-border); 
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }
        .custom-input {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: white;
            transition: all 0.3s ease;
        }
        .custom-input:focus {
            border-color: var(--primary);
            background: rgba(255, 255, 255, 0.07);
            outline: none;
            box-shadow: 0 0 15px rgba(129, 140, 248, 0.1);
        }
        .status-pulse {
            width: 8px; height: 8px; border-radius: 50%; background: #10b981;
            box-shadow: 0 0 0 rgba(16, 185, 129, 0.4); animation: pulse 2s infinite;
        }
        @keyframes pulse { 0% { box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.7); } 70% { box-shadow: 0 0 0 10px rgba(16, 185, 129, 0); } 100% { box-shadow: 0 0 0 0 rgba(16, 185, 129, 0); } }
        
        .custom-scroll::-webkit-scrollbar { width: 4px; }
        .custom-scroll::-webkit-scrollbar-thumb { background: rgba(129, 140, 248, 0.2); border-radius: 10px; }
    </style>
</head>
<body class="flex h-screen overflow-hidden p-0">

    <?php if(file_exists('./composant/aside.php')) require './composant/aside.php'; ?>

    <div class="flex-1 flex flex-col min-w-0 overflow-hidden">
        
        <?php if(file_exists('../frontend/composant/nav.php')) include '../frontend/composant/nav.php'; ?>

        <header class="flex justify-between items-center px-8 py-6 flex-shrink-0">
            <div>
                <h1 class="font-league text-2xl font-black italic tracking-tighter text-white">
                    STADIUM<span class="text-indigo-500">PASS</span>
                </h1>
                <div class="flex items-center gap-2 mt-1">
                    <div class="status-pulse"></div>
                    <span class="text-[9px] font-black text-slate-500 uppercase tracking-[0.3em] italic">Organizer Privilege Access • System Live</span>
                </div>
            </div>
            
            <div class="flex items-center gap-6">
                <div class="text-right hidden sm:block border-r border-white/10 pr-6">
                    <p class="text-xs font-bold italic text-slate-50">Organisateur Pro</p>
                    <p class="text-[9px] text-indigo-400 font-black uppercase tracking-tighter">ID: #ORG-2025</p>
                </div>
                <div class="w-10 h-10 rounded-2xl bg-gradient-to-tr from-indigo-500 to-indigo-700 p-[1px] flex items-center justify-center shadow-lg shadow-indigo-500/20">
                    <img src="https://ui-avatars.com/api/?name=Org&background=020617&color=fff" class="w-9 h-9 rounded-[14px]" alt="Avatar">
                </div>
            </div>
        </header>

        <main class="flex-1 overflow-y-auto custom-scroll px-8 pb-8 space-y-6">
            
            <!-- Form Section -->
            <div class="glass-panel rounded-[2.5rem] overflow-hidden">
                <div class="bg-white/5 px-8 py-5 border-b border-white/5 flex justify-between items-center">
                    <h2 class="font-league text-lg font-black italic tracking-tight"><i class="fas fa-plus-circle text-indigo-500 mr-2"></i>Nouvelle Demande d'Événement</h2>
                    <span class="text-[9px] font-black uppercase text-slate-500 bg-white/5 px-3 py-1 rounded-full border border-white/10">Configuration</span>
                </div>
                <?=$erreur?$erreur:'';?>

                <form class="p-8" method="POST">
                    <!-- Section Équipes -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                        <div class="space-y-4 p-6 bg-white/[0.02] rounded-[2rem] border border-white/5 hover:border-indigo-500/30 transition-all">
                            <label class="block text-[10px] font-black uppercase tracking-[0.2em] text-indigo-400 italic">Équipe Domicile</label>
                            <input type="text" class="custom-input w-full p-4 rounded-2xl text-sm font-semibold" placeholder="Nom Équipe A" name="NomEqui1" required>
                            <input type="text" class="custom-input w-full p-4 rounded-2xl text-xs" placeholder="URL du Logo" name="LogoEqui1" required>
                        </div>
                        <div class="space-y-4 p-6 bg-white/[0.02] rounded-[2rem] border border-white/5 hover:border-rose-500/30 transition-all">
                            <label class="block text-[10px] font-black uppercase tracking-[0.2em] text-rose-500 italic">Équipe Visiteur</label>
                            <input type="text" class="custom-input w-full p-4 rounded-2xl text-sm font-semibold" placeholder="Nom Équipe B" name="NomEqui2" required>
                            <input type="text" class="custom-input w-full p-4 rounded-2xl text-xs" placeholder="URL du Logo" name="LogoEqui2" required>
                        </div>
                    </div>

                    <!-- Section Match Info -->
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-10">
                        <div class="space-y-1">
                            <label class="text-[8px] uppercase font-bold text-slate-500 ml-2">Date du Match</label>
                            <input type="date" class="custom-input w-full p-4 rounded-2xl text-xs uppercase" name="date" required>
                        </div>
                        <div class="space-y-1">
                            <label class="text-[8px] uppercase font-bold text-slate-500 ml-2">Heure</label>
                            <input type="time" class="custom-input w-full p-4 rounded-2xl text-xs" name="heure" required>
                        </div>
                        <div class="space-y-1">
                            <label class="text-[8px] uppercase font-bold text-slate-500 ml-2">Capacité Totale</label>
                            <input type="number" class="custom-input w-full p-4 rounded-2xl text-xs" placeholder="Places" name="capacite" required>
                        </div>
                        <div class="space-y-1">
                            <label class="text-[8px] uppercase font-bold text-slate-500 ml-2">Lieu / Stade</label>
                            <input type="text" class="custom-input w-full p-4 rounded-2xl text-xs" placeholder="Stade" name="lieu" required>
                        </div>
                    </div>

                    <!-- CATÉGORIES DE BILLETS -->
                    <div class="mb-10">
                        <h3 class="text-xs font-black uppercase tracking-[0.3em] text-indigo-400 mb-6 flex items-center gap-3">
                            <span class="w-8 h-px bg-indigo-500/30"></span> 
                            Ticket Categories & Pricing
                            <span class="flex-1 h-px bg-indigo-500/30"></span>
                        </h3>
                        <div id="categories-container" class="space-y-4">
                                                
                            <div class="space-y-6">
                                <div id="categories-container" class="grid grid-cols-1 md:grid-cols-1 gap-6">
                                    <div class="glass-panel p-6 rounded-3xl border-l-4 border-indigo-500 bg-white/5 space-y-4 category-item relative group">
                                        <div class="flex items-center justify-between mb-2">
                                            <div class="flex items-center gap-3">
                                                <i class="fas fa-tags text-indigo-500 text-xs"></i>
                                                <span class="category-label text-[10px] font-black uppercase text-slate-400 tracking-widest">Catégorie 01</span>
                                            </div>
                                            <button type="button" class="remove-category hidden text-rose-500 hover:text-rose-400 p-2 text-xs transition-all">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </div>
                                        
                                        <div class="grid grid-cols-1 sm:grid-cols-1 gap-4">
                                            <select name="cat_label[]" id="categorie" class="custom-input w-full p-4 rounded-xl text-xs font-bold text-white bg-slate-900 border-white/10 outline-none appearance-none cursor-pointer">
                                                <option value="categorie1">Catégorie 1</option>
                                                <option value="categorie2">Catégorie 2</option>
                                                <option value="categorie3">Catégorie 3</option>
                                                <option value="categorie4">Catégorie 4</option>
                                            </select>

                                            <div class="relative">
                                                <input type="number" name="cat_price[]" class="custom-input w-full p-4 rounded-xl text-xs font-bold pl-10 text-white" placeholder="Prix">
                                                <span class="absolute left-4 top-[58%] -translate-y-1/2 text-[10px] text-slate-500 font-black">DH</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <button type="button" id="add-category" class="mt-4 flex items-center gap-3 px-6 py-3 rounded-2xl border border-dashed border-indigo-500/30 text-indigo-400 hover:bg-indigo-500/5 hover:border-indigo-500 transition-all text-[10px] font-black uppercase tracking-widest">
                                <i class="fas fa-plus-circle"></i> Ajouter une catégorie
                            </button>
                    </div>

                    <button type="submit" name="send" class="w-full bg-gradient-to-r from-indigo-600 to-indigo-800 hover:from-indigo-500 hover:to-indigo-700 text-white font-black font-league italic py-5 rounded-[1.5rem] transition-all transform hover:-translate-y-1 shadow-xl shadow-indigo-500/20 uppercase tracking-widest text-sm">
                        Déployer la demande d'événement
                    </button>
                </form>
            </div>
        </main>
    </div>

    <script>
        document.querySelectorAll('button').forEach(btn => {
            btn.addEventListener('mousedown', () => btn.style.transform = 'scale(0.98)');
            btn.addEventListener('mouseup', () => btn.style.transform = 'translateY(-4px)');
        });


        // pour ajouter/supprimer une cat
        document.addEventListener('DOMContentLoaded', function() {
            const maxCategories = 4;
            const container = document.getElementById('categories-container');
            const addBtn = document.getElementById('add-category');

            function updateCategories() {
                const items = container.querySelectorAll('.category-item');
                const borders = ['border-indigo-500', 'border-emerald-500', 'border-amber-500'];
                const iconColors = ['text-indigo-500', 'text-emerald-500', 'text-amber-500'];

                items.forEach((item, index) => {
                    // Update label Catégorie 01, 02, 03
                    item.querySelector('.category-label').innerText = `Catégorie 0${index + 1}`;
                    
                    // Update border colors
                    item.classList.remove('border-indigo-500','border-emerald-500','border-amber-500');
                    item.classList.add(borders[index % borders.length]);

                    // Update icon colors
                    const icon = item.querySelector('.fa-tags');
                    icon.classList.remove('text-indigo-500','text-emerald-500','text-amber-500');
                    icon.classList.add(iconColors[index % iconColors.length]);

                    // Show or hide remove button
                    const removeBtn = item.querySelector('.remove-category');
                    removeBtn.classList.toggle('hidden', items.length === 1);
                });

                // Hide add button if max reached
                addBtn.style.display = items.length >= maxCategories ? 'none' : 'flex';
            }

            addBtn.addEventListener('click', function() {
                const items = container.querySelectorAll('.category-item');
                if(items.length >= maxCategories) return;

                // Clone the first category-item
                const newItem = items[0].cloneNode(true);

                // Empty inputs & selects
                newItem.querySelectorAll('input').forEach(input => input.value = '');
                newItem.querySelectorAll('select').forEach(sel => sel.selectedIndex = 0);

                // Insert before the add button
                container.insertBefore(newItem, addBtn);

                updateCategories();
            });

            container.addEventListener('click', function(e) {
                const btn = e.target.closest('.remove-category');
                if(btn) {
                    const items = container.querySelectorAll('.category-item');
                    if(items.length > 1) {
                        btn.closest('.category-item').remove();
                        updateCategories();
                    }
                }
            });

            updateCategories();
        });

</script>
</body>
</html>