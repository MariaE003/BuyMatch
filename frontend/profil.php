<?php
require '../session.php';
require '../classes/Auth.php'; 
// $rolePage = "organisateur"; 

$idUser = $_SESSION["user_id"];
$user= new Auth();
$userData = $user->affichierInfo($idUser); // Méthode à adapter selon votre classe

// // Traitement du formulaire (exemple simplifié)
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     // Logique de mise à jour ici
// }
if (isset($_POST["send"])) {
    if (!empty($_POST['image']) && !empty($_POST['email']) && !empty($_POST['nom'])){
        if (!empty($_POST['password'])) {
            $user->setPassword($_POST['password']);
        }
        $user->setNom($_POST['nom']);
        $user->setImage($_POST['image']);
        $user->setEmail($_POST['email']);
        $user->ModifierProfil($idUser);
    
    //     header("Location: profil.php");
    
    }
}
?>
<!DOCTYPE html>
<html lang="fr" class="h-full bg-[#020617]">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elite League | Profil Utilisateur</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,700;0,900;1,700;1,900&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary: #818cf8;
            --secondary: #6366f1;
            --accent: #f59e0b;
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
        
        .input-field {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: white;
            transition: all 0.3s;
        }
        .input-field:focus {
            border-color: var(--primary);
            background: rgba(255, 255, 255, 0.07);
            outline: none;
            box-shadow: 0 0 15px rgba(129, 140, 248, 0.1);
        }
    </style>
</head>
<body class="flex h-screen overflow-hidden p-0">

    <!-- SIDEBAR -->
    <?php require './composant/aside.php'; ?>

    <!-- MAIN WORKSPACE -->
    <div class="flex-1 flex flex-col min-w-0">
        
        <!-- Tactical Header -->
        <header class="flex justify-between items-center px-8 py-6 flex-shrink-0">
            <div>
                <h1 class="font-league text-2xl font-black italic tracking-tighter text-white">
                    PROFIL <span class="text-indigo-500 text-3xl">TACTIQUE</span>
                </h1>
                <p class="text-[9px] font-black text-slate-500 uppercase tracking-[0.3em] italic mt-1">
                    Gestion des paramètres de compte sécurisés
                </p>
            </div>
            
            <div class="flex items-center gap-4">
                <div class="text-right">
                    <p class="text-xs font-bold italic text-slate-50"><?= $userData['nom'] ?? 'Utilisateur' ?></p>
                    <p class="text-[9px] text-indigo-400 font-black uppercase tracking-tighter">ID: #<?= $idUser ?></p>
                </div>
                <img src="<?= $userData['image'] ?? 'https://ui-avatars.com/api/?name=User' ?>" class="w-10 h-10 rounded-2xl border border-white/10 object-cover" alt="Avatar">
            </div>
        </header>

        <!-- SCROLLABLE CONTENT -->
        <main class="flex-1 overflow-y-auto custom-scroll px-8 pb-8">
            <form method="POST"  class="grid grid-cols-12 gap-8">
                
                <!-- Left Column: Avatar & Quick Info -->
                <div class="col-span-12 lg:col-span-4 space-y-6">
                    <div class="glass-panel rounded-[2.5rem] p-8 text-center relative overflow-hidden group">
                        <div class="relative inline-block mx-auto mb-6">
                            <img id="preview" src="<?= $userData['image'] ?? 'https://ui-avatars.com/api/?name=User&size=200' ?>" 
                                 class="w-40 h-40 rounded-[2.5rem] object-cover border-4 border-indigo-500/20 shadow-2xl" alt="Large Avatar">
                            <!-- <label for="imageUpload" class="absolute -bottom-2 -right-2 bg-indigo-600 w-10 h-10 rounded-xl flex items-center justify-center cursor-pointer hover:bg-indigo-500 transition-colors shadow-lg">
                                <i class="fas fa-camera text-sm"></i>
                                <input type="file" id="imageUpload" name="image" class="hidden" accept="image/*" onchange="previewImage(this)">
                            </label> -->
                        </div>
                        <h3 class="font-league text-xl font-black italic text-white uppercase"><?= $userData['nom'] ?></h3>
                        <p class="text-indigo-400 text-[10px] font-black uppercase tracking-[0.2em] mt-2 italic">Membre Elite League</p>
                        
                        <div class="mt-8 pt-8 border-t border-white/5 space-y-4">
                            <div class="flex justify-between text-[10px] font-bold uppercase tracking-widest">
                                <span class="text-slate-500 italic">Statut</span>
                                <span class="text-emerald-400">Opérationnel</span>
                            </div>
                            <div class="flex justify-between text-[10px] font-bold uppercase tracking-widest">
                                <span class="text-slate-500 italic">Niveau</span>
                                <span class="text-white">Premium</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Form Fields -->
                <div class="col-span-12 lg:col-span-8">
                    <div class="glass-panel rounded-[2.5rem] p-8 md:p-12">
                        <h3 class="font-league text-lg font-black italic uppercase text-white mb-8 flex items-center gap-3">
                            <i class="fas fa-user-shield text-indigo-500"></i>
                            Informations <span class="text-indigo-500">Personnelles</span>
                        </h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- image -->
                            <div class="space-y-2 md:col-span-2">
                                <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest ml-2 italic">image du profil</label>
                                <div class="relative">
                                    <input type="text" name="image" value="<?=$userData['image']?>"
                                    class="input-field w-full px-6 py-4 rounded-2xl text-sm font-semibold" placeholder="https://ui-avatars.com/api/?name=User&size=200">
                                </div>
                            </div>
                            <!-- Nom -->
                            <div class="space-y-2">
                                <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest ml-2 italic">Nom Complet</label>
                                <input type="text" name="nom" value="<?= $userData['nom'] ?>" 
                                       class="input-field w-full px-6 py-4 rounded-2xl text-sm font-semibold" placeholder="Votre nom">
                            </div>

                            <!-- Email -->
                            <div class="space-y-2">
                                <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest ml-2 italic">Adresse Email</label>
                                <input type="email" name="email" value="<?= $userData['email'] ?>" 
                                       class="input-field w-full px-6 py-4 rounded-2xl text-sm font-semibold text-slate-400" placeholder="email@exemple.com">
                            </div>

                            <!-- Password -->
                            <div class="space-y-2 md:col-span-2">
                                <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest ml-2 italic">Nouveau Mot de Passe</label>
                                <div class="relative">
                                    <input type="password" name="password" 
                                           class="input-field w-full px-6 py-4 rounded-2xl text-sm font-semibold" placeholder="••••••••••••">
                                    <i class="fas fa-lock absolute right-6 top-1/2 -translate-y-1/2 text-slate-600"></i>
                                </div>
                                <p class="text-[9px] text-slate-600 italic mt-2 ml-2">Laissez vide pour conserver le mot de passe actuel.</p>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="mt-12 flex justify-end">
                            <button type="submit" name="send" class="group relative overflow-hidden bg-gradient-to-r from-indigo-600 to-indigo-500 px-10 py-4 rounded-2xl text-xs font-black uppercase tracking-[0.2em] text-white shadow-xl hover:-translate-y-1 transition-all">
                                <span class="relative z-10 flex items-center gap-3">
                                    Mettre à jour le profil
                                    <i class="fas fa-chevron-right text-[10px] group-hover:translate-x-1 transition-transform"></i>
                                </span>
                                <div class="absolute inset-0 bg-white/20 translate-y-full group-hover:translate-y-0 transition-transform duration-300"></div>
                            </button>
                        </div>
                    </div>

                    
                </div>

            </form>
        </main>
    </div>

    <script>
        // Preview de l'image avant l'upload
        // function previewImage(input) {
        //     if (input.files && input.files[0]) {
        //         var reader = new FileReader();
        //         reader.onload = function(e) {
        //             document.getElementById('preview').src = e.target.result;
        //         }
        //         reader.readAsDataURL(input.files[0]);
        //     }
        // }
    </script>
</body>
</html>