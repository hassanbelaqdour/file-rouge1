<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Statistiques Administrateur</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex">

    <!-- SIDEBAR FIXE -->
    <aside class="w-64 h-screen bg-white shadow-lg fixed top-0 left-0 border-r border-gray-200 z-10">
        <div class="p-6 border-b border-gray-100">
            <h1 class="text-2xl font-bold text-black">EduQuest</h1>
        </div>
        <nav class="p-6 space-y-4">
            <a href="{{ route('admin.StatistiqueAdmin') }}" class="block text-gray-700 hover:text-blue-600 font-semibold">Statistique</a>
            <a href="{{ route('admin.Users') }}" class="block text-gray-700 hover:text-blue-600">Utilisateurs</a>
            <!-- Ajoute d'autres liens ici si besoin -->

            <!-- Bouton de déconnexion -->
            <form action="{{ route('logout') }}" method="POST" class="pt-6">
                @csrf
                <button type="submit" class="w-full bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Déconnexion</button>
            </form>
        </nav>
    </aside>

    <!-- CONTENU PRINCIPAL -->
    <main class="ml-64 w-full py-10 px-6">

        <div class="max-w-5xl mx-auto mb-6">
            <h1 class="text-3xl font-bold text-gray-800 mb-4">Statistiques des utilisateurs</h1>

            <div class="bg-white shadow-md rounded-lg p-6 space-y-4">
                <!-- Nombre total d'utilisateurs -->
                <div class="flex items-center justify-between border-b border-gray-200 pb-4">
                    <span class="text-xl font-semibold text-gray-800">Nombre total d'utilisateurs :</span>
                    <span class="text-2xl font-bold text-blue-600">{{ $totalUsers }}</span>
                </div>

                <!-- Nombre d'utilisateurs en attente -->
                <div class="flex items-center justify-between border-b border-gray-200 pb-4">
                    <span class="text-xl font-semibold text-gray-800">Nombre d'utilisateurs en attente :</span>
                    <span class="text-2xl font-bold text-yellow-600">{{ $pendingUsers }}</span>
                </div>

                <!-- Nombre d'utilisateurs approuvés -->
                <div class="flex items-center justify-between">
                    <span class="text-xl font-semibold text-gray-800">Nombre d'utilisateurs approuvés :</span>
                    <span class="text-2xl font-bold text-green-600">{{ $approvedUsers }}</span>
                </div>
            </div>
        </div>
    </main>

</body>
</html>
