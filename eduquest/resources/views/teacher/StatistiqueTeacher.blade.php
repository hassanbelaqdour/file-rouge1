<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Statistiques Enseignant</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex">

    <!-- SIDEBAR FIXE -->
    <aside class="w-64 h-screen bg-white shadow-lg fixed top-0 left-0 border-r border-gray-200 z-10">
        <div class="p-6 border-b border-gray-100">
            <h1 class="text-2xl font-bold text-black">EduQuest - Enseignant</h1>
        </div>
        <nav class="p-6 space-y-4">
            <!-- Liens de navigation -->
            <a href="{{ route('teacher.Courses') }}" class="block text-gray-700 hover:text-blue-600">Tous les cours</a>
            <a href="{{ route('teacher.Students') }}" class="block text-gray-700 hover:text-blue-600">Étudiants inscrits</a>

            <!-- Bouton de déconnexion -->
            <form action="{{ route('logout') }}" method="POST" class="pt-6">
                @csrf
                <button type="submit" class="w-full bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                    Déconnexion
                </button>
            </form>
        </nav>
    </aside>

    <!-- CONTENU PRINCIPAL -->
    <main class="ml-64 w-full py-10 px-6">
        <div class="max-w-5xl mx-auto">
            <h1 class="text-3xl font-bold text-gray-800 mb-4">Statistiques Enseignant</h1>

            <div class="bg-white shadow-md rounded-lg p-6 space-y-4">
                <p class="text-gray-700">Bienvenue sur votre tableau de bord de statistiques.</p>
                <!-- Tu peux ajouter ici des blocs pour afficher des stats comme :
                    - nombre de cours créés
                    - nombre total d'étudiants
                    - taux d'engagement
                -->
            </div>
        </div>
    </main>

</body>
</html>
