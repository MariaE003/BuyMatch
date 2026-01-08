<html lang="en">
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
    <!-- error-404.php -->
<div class="min-h-screen flex flex-col items-center justify-center bg-[#05070a] text-center px-4">
    <div class="relative mb-10">
        <h1 class="text-[15rem] font-black font-league italic text-white/5 leading-none">404</h1>
        <div class="absolute inset-0 flex items-center justify-center">
            <i class="fas fa-exclamation-triangle text-7xl text-indigo-500 drop-shadow-[0_0_30px_rgba(99,102,241,0.5)]"></i>
        </div>
    </div>
    <h2 class="font-league text-3xl font-black italic uppercase text-white mb-4">Hors-Jeu !</h2>
    <p class="text-slate-500 max-w-md mb-10 font-light italic">La page que vous recherchez semble avoir quitté le terrain. Revenez au centre du jeu.</p>
    <a href="../BuyMatch/index.php" class="btn-gradient px-10 py-4 rounded-full font-black text-xs uppercase tracking-widest text-white shadow-xl">Retour à l'accueil</a>
</div>
</body>
</html>