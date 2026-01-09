<?php
// require_once __DIR__.'/../../session.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

?>
<nav class="glass sticky top-0 z-50 px-6 py-4 border-b border-white/5">
        <div class="max-w-[1400px] mx-auto flex justify-between items-center">
            <div class="flex items-center gap-4">
                <div class="w-10 h-10 bg-indigo-600 rounded-xl flex items-center justify-center rotate-3 shadow-lg shadow-indigo-500/20">
                    <i class="fas fa-trophy text-white"></i>
                </div>
                <span class="font-league text-2xl font-black italic">ELITE<span class="text-indigo-500">STADIUM</span></span>
            </div>
            
            <div class="hidden md:flex items-center space-x-10 text-[10px] font-black uppercase tracking-[0.2em]">
                <a href="/../BuyMatch/index.php" class="text-indigo-400">Matchs</a>

                <a href="/../BuyMatch/frontend/DashboardOrganisateur.php" class="hover:text-indigo-400 transition <?= (isset($_SESSION["role"]) &&  $_SESSION["role"]==="organisateur" )?'flex':'hidden'?>">Dashboard</a>
                <a href="/../BuyMatch/frontend/DashboardAdministrateur.php" class="hover:text-indigo-400 transition <?= (isset($_SESSION["role"]) &&  $_SESSION["role"]==="admin" )?'flex':'hidden'?>">Dashboard</a>

                <a href="/../BuyMatch/frontend/Organisateur.php" class="hover:text-indigo-400 transition <?= (isset($_SESSION["role"]) && $_SESSION["role"]==="organisateur" ) ?'flex':'hidden'?>">Crrer Match</a>

                <a href="/../BuyMatch/frontend/Acheteur.php" class="hover:text-indigo-400 transition <?= (isset($_SESSION["role"]) && $_SESSION["role"]==="acheteur")  ?'flex':'hidden'?>">mes billets</a>
                <a href="/../BuyMatch/frontend/HistoriqueBillets.php" class="hover:text-indigo-400 transition <?= (isset($_SESSION["role"]) && $_SESSION["role"]==="acheteur")  ?'flex':'hidden'?>">historique des billets</a>

                <a href="/../BuyMatch/frontend/profil.php" class="hover:text-indigo-400 transition <?= (isset($_SESSION["role"])) &&  ($_SESSION["role"] === "acheteur" || $_SESSION["role"]==="organisateur")  ?'flex':'hidden'?>">Profil</a>
            </div>

            <div class="flex items-center gap-6">
                <a href="../BuyMatch/frontend/auth/login.php" class="text-[10px] font-black uppercase tracking-widest hover:text-indigo-400 transition <?= isset($_SESSION["user_id"])?'hidden':'flex'?>">Connexion</a>
                <a href="../BuyMatch/frontend/auth/register.php" class="btn-gradient px-6 py-2.5 rounded-full text-[10px] font-black uppercase tracking-widest shadow-lg shadow-indigo-500/20 <?= isset($_SESSION["user_id"])?'hidden':'flex'?>">S'inscrire</a>
                <form method="POST">
                    <button type="submit"  name="logout" class="btn-gradient px-6 py-2.5 rounded-full text-[10px] font-black uppercase tracking-widest shadow-lg shadow-indigo-500/20 <?= isset($_SESSION["user_id"])?'flex':'hidden'?>">logout</button>
                </form>
                
            </div>
        </div>
    </nav>