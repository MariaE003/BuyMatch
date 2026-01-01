<!DOCTYPE html>
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
    <!-- Navbar -->
    <nav class="bg-slate-900 text-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center gap-2">
                    <div class="bg-indigo-600 p-2 rounded-lg">
                        <i class="fas fa-ticket-alt text-xl"></i>
                    </div>
                    <span class="text-xl font-bold tracking-tight">STADIUM<span class="text-indigo-400">PASS</span></span>
                </div>
                
                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="index.php" class="hover:text-indigo-400 transition">Matchs</a>
                    <a href="login.php" class="hover:text-indigo-400 transition">Connexion</a>
                    <a href="register.php" class="bg-indigo-600 hover:bg-indigo-700 px-5 py-2 rounded-full font-semibold transition">S'inscrire</a>
                </div>
            </div>
        </div>
    </nav>

    <main class="flex-grow">
    <div class="max-w-6xl mx-auto px-4 py-10">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
        <!-- Stats Widgets -->
        <div class="bg-white p-6 rounded-2xl shadow-sm border-l-4 border-indigo-500">
            <p class="text-slate-500 text-sm font-semibold uppercase">Billets Vendus</p>
            <h3 class="text-3xl font-bold text-slate-800">1,240 <span class="text-sm text-green-500 font-normal">+12%</span></h3>
        </div>
        <div class="bg-white p-6 rounded-2xl shadow-sm border-l-4 border-green-500">
            <p class="text-slate-500 text-sm font-semibold uppercase">Chiffre d'Affaires</p>
            <h3 class="text-3xl font-bold text-slate-800">62,000 DH</h3>
        </div>
        <div class="bg-white p-6 rounded-2xl shadow-sm border-l-4 border-orange-500">
            <p class="text-slate-500 text-sm font-semibold uppercase">Matchs en attente</p>
            <h3 class="text-3xl font-bold text-slate-800">2</h3>
        </div>
    </div>

    <!-- Formulaire de création -->
    <div class="bg-white rounded-2xl shadow-md overflow-hidden">
        <div class="p-6 bg-slate-900 text-white">
            <h2 class="text-xl font-bold">Créer une demande d'événement</h2>
        </div>
        <form class="p-8 grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Équipe A (Nom & Logo URL)</label>
                <input type="text" class="w-full p-3 border rounded-xl focus:ring-indigo-500 outline-none mb-2" placeholder="Nom Équipe A">
                <input type="text" class="w-full p-3 border rounded-xl focus:ring-indigo-500 outline-none" placeholder="URL Logo">
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Équipe B (Nom & Logo URL)</label>
                <input type="text" class="w-full p-3 border rounded-xl focus:ring-indigo-500 outline-none mb-2" placeholder="Nom Équipe B">
                <input type="text" class="w-full p-3 border rounded-xl focus:ring-indigo-500 outline-none" placeholder="URL Logo">
            </div>
            <div class="col-span-1 md:col-span-2 grid grid-cols-2 md:grid-cols-4 gap-4">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Date</label>
                    <input type="date" class="w-full p-3 border rounded-xl">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Heure</label>
                    <input type="time" class="w-full p-3 border rounded-xl">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Capacité Max</label>
                    <input type="number" max="2000" class="w-full p-3 border rounded-xl">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Lieu</label>
                    <input type="text" class="w-full p-3 border rounded-xl">
                </div>
            </div>
            <button class="md:col-span-2 bg-indigo-600 text-white font-bold py-4 rounded-xl hover:bg-indigo-700 transition shadow-lg">Envoyer la demande pour validation</button>
        </form>
    </div>
</div>
</main>

    <footer class="bg-slate-900 text-slate-400 py-8 border-t border-slate-800">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p>&copy; 2024 StadiumPass POO Project. Tous droits réservés.</p>
        </div>
    </footer>
</body>
</html>