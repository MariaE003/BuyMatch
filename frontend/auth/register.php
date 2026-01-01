<?php
// C:\laragon\www\BuyMatch\DB\Connect.php
// require_once __DIR__ .'/../../DB/Connect.php';
require_once '../../classes/User.php';
if (isset($_POST['sinscrire'])) {
    if (!empty($_POST["nom"]) && !empty($_POST["email"]) && !empty($_POST["photo"]) && !empty($_POST["password"])) {
        // echo"hhh";
        // echo "ihiii";    
    $nom=$_POST["nom"];
    $email=$_POST["email"];
    $image=$_POST["photo"];
    $password=$_POST["password"];
    $role=$_POST["role"];

    $user=new User();
    $user->setNom($nom);
    $user->setEmail($email);
    $user->setImage($image);
    $user->setRole($role);
    $user->setPassword($password);
    // var_dump($test);
    // $test=$user->register($email);

    if ($user->register($email)) {
        header("Location: login.php");
        exit();
    }
}
}
// $nom=$_POST["nom"];
//     $email=$_POST["email"];
//     $image=$_POST["photo"];
//     $password=$_POST["password"];
//     $role=$_POST["role"];
// $user=new User();
//     $user->register($nom,$email,$image,$password,$role);

?>
<!DOCTYPE html>
<html lang="fr" class="h-full bg-[#05070a]">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elite Stadium Pass | Inscription Officielle</title>
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
        .btn-gradient { background: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%); }
        
        /* Custom radio cards for roles */
        .role-card input:checked + .card-content {
            border-color: var(--primary);
            background: rgba(99, 102, 241, 0.1);
            box-shadow: 0 0 20px rgba(99, 102, 241, 0.2);
        }
    </style>
</head>
<body class="h-full">

    <div class="flex min-h-full">
        <!-- Left Side: Form -->
        <div class="flex flex-1 flex-col justify-center px-6 py-12 lg:flex-none lg:px-20 xl:px-24 z-10 bg-[#05070a]">
            <div class="mx-auto w-full max-w-sm lg:w-[450px]">
                
                <!-- Logo -->
                <div class="mb-10">
                    <a href="index.php" class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-indigo-600 rounded-xl flex items-center justify-center rotate-3 shadow-lg shadow-indigo-500/20">
                            <i class="fas fa-trophy text-white"></i>
                        </div>
                        <span class="font-league text-2xl font-black italic text-white uppercase italic">ELITE<span class="text-indigo-500">PASS</span></span>
                    </a>
                    <h2 class="mt-8 text-3xl font-black italic font-league text-white uppercase italic tracking-tighter">Créer un <span class="text-indigo-500 text-5xl">Compte</span></h2>
                    <p class="mt-2 text-sm text-slate-400 font-light italic">Rejoignez l'élite et vivez le sport intensément.</p>
                </div>

                <!-- Formulaire -->
                <form method="POST" class="space-y-6">
                    
                    <!-- Sélection de Rôle -->
                    <div class="space-y-4">
                        <label class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-500">Choisir votre profil</label>
                        <div class="grid grid-cols-2 gap-4">
                            <!-- Option Acheteur -->
                            <label class="role-card cursor-pointer group">
                                <input type="radio" name="role" value="acheteur" class="hidden" checked>
                                <div class="card-content glass p-4 rounded-2xl border border-white/5 transition flex flex-col items-center gap-2 group-hover:border-white/20">
                                    <i class="fas fa-ticket text-xl text-slate-500 group-hover:text-indigo-400 transition"></i>
                                    <span class="text-[10px] font-black uppercase tracking-widest text-white">Acheteur</span>
                                </div>
                            </label>
                            <!-- Option Organisateur -->
                            <label class="role-card cursor-pointer group">
                                <input type="radio" name="role" value="organisateur" class="hidden">
                                <div class="card-content glass p-4 rounded-2xl border border-white/5 transition flex flex-col items-center gap-2 group-hover:border-white/20">
                                    <i class="fas fa-calendar-check text-xl text-slate-500 group-hover:text-indigo-400 transition"></i>
                                    <span class="text-[10px] font-black uppercase tracking-widest text-white">Organisateur</span>
                                </div>
                            </label>
                        </div>
                    </div>
                    <!-- image  -->
                     <div>
                        <label class="block text-[10px] font-black uppercase tracking-[0.2em] text-slate-500 mb-2">Image du Profils</label>
                        <div class="relative">
                            <!-- <i class="fas fa-user absolute left-4 top-1/2 -translate-y-1/2 text-slate-600 text-xs"></i> -->
                            <i class="fa-slab-press fa-regular fa-image fas fa-user absolute left-4 top-1/2 -translate-y-1/2 text-slate-600 text-xs"></i>
                            <input type="text" name="photo" required  placeholder="https://www.example.com/images/photo.jpg"
                            class="w-full bg-white/5 border border-white/10 rounded-xl px-12 py-3.5 text-white text-sm outline-none focus:border-indigo-500 focus:bg-indigo-500/5 transition">
                        </div>
                    </div>
                    <!-- Nom complet -->
                    <div>
                        <label class="block text-[10px] font-black uppercase tracking-[0.2em] text-slate-500 mb-2">Nom Complet</label>
                        <div class="relative">
                            <i class="fas fa-user absolute left-4 top-1/2 -translate-y-1/2 text-slate-600 text-xs"></i>
                            <input type="text"  name="nom" required placeholder="Ex: Ahmed Bennani" 
                                   class="w-full bg-white/5 border border-white/10 rounded-xl px-12 py-3.5 text-white text-sm outline-none focus:border-indigo-500 focus:bg-indigo-500/5 transition">
                        </div>
                    </div>

                    <!-- Email -->
                    <div>
                        <label class="block text-[10px] font-black uppercase tracking-[0.2em] text-slate-500 mb-2">Adresse Email</label>
                        <div class="relative">
                            <i class="fas fa-envelope absolute left-4 top-1/2 -translate-y-1/2 text-slate-600 text-xs"></i>
                            <input type="email" name="email" required placeholder="contact@example.com" 
                                   class="w-full bg-white/5 border border-white/10 rounded-xl px-12 py-3.5 text-white text-sm outline-none focus:border-indigo-500 focus:bg-indigo-500/5 transition">
                        </div>
                    </div>

                    <!-- Mot de passe -->
                    <div>
                        <label class="block text-[10px] font-black uppercase tracking-[0.2em] text-slate-500 mb-2">Mot de passe</label>
                        <div class="relative">
                            <i class="fas fa-lock absolute left-4 top-1/2 -translate-y-1/2 text-slate-600 text-xs"></i>
                            <input type="password" id="password" name="password" required placeholder="••••••••" 
                                   class="w-full bg-white/5 border border-white/10 rounded-xl px-12 py-3.5 text-white text-sm outline-none focus:border-indigo-500 focus:bg-indigo-500/5 transition">
                            <button type="button" onclick="togglePass()" class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-600 hover:text-white transition">
                                <i class="fas fa-eye text-xs"></i>
                            </button>
                        </div>
                    </div>

                    <!-- CGU -->
                    <div class="flex items-center gap-3 py-2">
                        <input type="checkbox" required class="w-4 h-4 rounded border-white/10 bg-white/5 text-indigo-600 focus:ring-offset-[#05070a]">
                        <span class="text-[10px] text-slate-500 uppercase font-bold tracking-tighter">J'accepte les termes et les conditions de la ligue</span>
                    </div>

                    <button name="sinscrire" type="submit" class="w-full btn-gradient py-4 rounded-2xl font-black text-xs uppercase tracking-[0.2em] text-white shadow-xl shadow-indigo-500/20 hover:scale-[1.02] transition-transform">
                        Créer mon compte
                    </button>
                </form>

                <p class="mt-10 text-center text-xs text-slate-500 uppercase font-bold tracking-widest">
                    Déjà inscrit ? <a href="login.php" class="text-indigo-500 hover:text-white transition underline underline-offset-4">Se connecter</a>
                </p>
            </div>
        </div>

        <!-- Right Side: Background Image -->
        <div class="relative hidden w-0 flex-1 lg:block overflow-hidden">
            <img class="absolute inset-0 h-full w-full object-cover opacity-30 transform scale-110 motion-safe:animate-[pulse_10s_infinite]" 
                 src="https://images.unsplash.com/photo-1504450758481-7338eba7524a?q=80&w=2000" alt="Stadium Crowds">
            <div class="absolute inset-0 bg-gradient-to-r from-[#05070a] via-[#05070a]/50 to-transparent"></div>
            
            <!-- Floating Text Overlay -->
            <div class="absolute bottom-20 left-20 max-w-lg">
                <span class="text-indigo-500 font-league text-6xl font-black italic block">OFFICIEL.</span>
                <p class="text-white text-lg font-light italic mt-4 opacity-80 leading-relaxed uppercase tracking-tighter">
                    Accédez aux billets les plus convoités et gérez vos événements avec une précision professionnelle.
                </p>
            </div>
        </div>
    </div>

    <script>
        // Toggle visibilité mot de passe
        function togglePass() {
            const passInput = document.getElementById('password');
            const icon = event.currentTarget.querySelector('i');
            if (passInput.type === "password") {
                passInput.type = "text";
                icon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                passInput.type = "password";
                icon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        }
    </script>
</body>
</html>