<?php
 session_start();
 
 require_once '../../classes/Auth.php';

$erreur="";

 if (isset($_POST['connecter'])) {
    if (!empty($_POST['email']) && !empty($_POST['password']) ) {
        $user=new Auth();
        // les setter modifier
        // $user->setEmail($_POST['email']);
        // $user->setPassword($_POST['password']);
        try{
            if ($user->login($_POST['email'],$_POST['password'])) {
                $_SESSION['user_id']=$user->getId();
                $_SESSION['role']=$user->getRole();
                // C:\laragon\www\BuyMatch\index.php
                header("Location: /BuyMatch/index.php");
            }
        }catch(Exception $e){
            $erreur=$e->getMessage();
        }
    }
    echo $_SESSION['role'];
}


?>
<!DOCTYPE html>
<html lang="fr" class="h-full bg-[#05070a]">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,700;0,900;1,700;1,900&family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .font-league { font-family: 'Montserrat', sans-serif; }
        .glass { background: rgba(255, 255, 255, 0.03); backdrop-filter: blur(12px); border: 1px solid rgba(255, 255, 255, 0.08); }
    </style>
</head>
<body class="h-full overflow-hidden">
    <div class="flex min-h-full">
        <!-- Left: Form -->
        <div class="flex flex-1 flex-col justify-center px-4 py-12 sm:px-6 lg:flex-none lg:px-20 xl:px-24">
            <div class="mx-auto w-full max-w-sm lg:w-96">
                <div class="mb-10">
                    <a href="index.php" class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-indigo-600 rounded-xl flex items-center justify-center rotate-3"><i class="fas fa-trophy text-white"></i></div>
                        <span class="font-league text-2xl font-black italic text-white uppercase">ELITE<span class="text-indigo-500">PASS</span></span>
                    </a>
                    <h2 class="mt-8 text-3xl font-black italic font-league text-white uppercase italic">Bienvenue <span class="text-indigo-500">Champion</span></h2>
                    <p class="mt-2 text-sm text-slate-400 font-light">Accédez à vos billets et aux exclusivités de la ligue.</p>
                </div>
                <!-- <div class=""><?php $erreur?$erreur:''?></div> -->
                 <?php if($erreur){
                 ?>
                <div class="mb-4 p-4 rounded-2xl border border-rose-500/30 bg-rose-500/10 text-rose-400 flex items-center gap-3">
                    <i class="fa-solid fa-circle-exclamation text-xl"></i>
                    <span class="text-sm font-semibold italic">
                        <?= $erreur ?>
                    </span>
                </div>
                <?php }?>
                <form  method="POST" class="space-y-6">
                    <div>
                        <label class="block text-[10px] font-black uppercase tracking-widest text-slate-500 mb-2">Adresse Email</label>
                        <input type="email" name='email' required class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white outline-none focus:border-indigo-500 transition">
                    </div>
                    <div>
                        <label class="block text-[10px] font-black uppercase tracking-widest text-slate-500 mb-2">Mot de passe</label>
                        <input type="password" name='password' required class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white outline-none focus:border-indigo-500 transition">
                    </div>
                    <button type="submit" name="connecter" class="w-full bg-indigo-600 py-4 rounded-xl font-black text-xs uppercase tracking-[0.2em] text-white hover:bg-indigo-500 transition shadow-lg shadow-indigo-500/20">Se Connecter</button>
                </form>

                <p class="mt-10 text-center text-xs text-slate-500">
                    Pas encore de compte ? <a href="./register.php" class="text-indigo-400 font-bold hover:underline">Inscrivez-vous ici</a>
                </p>
            </div>
        </div>
        <!-- Right: Decorative Image -->
        <div class="relative hidden w-0 flex-1 lg:block">
            <img class="absolute inset-0 h-full w-full object-cover opacity-40" src="https://images.unsplash.com/photo-1574629810360-7efbbe195018?q=80&w=2000" alt="">
            <div class="absolute inset-0 bg-gradient-to-r from-[#05070a] to-transparent"></div>
        </div>
    </div>
</body>
</html>