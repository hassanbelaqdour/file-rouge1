<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mes Cours</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex">

    <!-- SIDEBAR FIXE -->
    <aside class="w-64 h-screen bg-white shadow-lg fixed top-0 left-0 border-r border-gray-200 z-10">
        <div class="p-6 border-b border-gray-100">
            <h1 class="text-2xl font-bold text-black">EduQuest - Enseignant</h1>
        </div>
        <nav class="p-6 space-y-4">
            <a href="{{ route('teacher.StatistiqueTeacher') }}" class="block text-gray-700 hover:text-blue-600">Statistiques</a>
            <a href="" class="block text-gray-700 hover:text-blue-600 font-semibold">Tous les cours</a>
            <a href="" class="block text-gray-700 hover:text-blue-600">Étudiants inscrits</a>
            <form action="{{ route('logout') }}" method="POST" class="pt-6">
                @csrf
                <button type="submit" class="w-full bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Déconnexion</button>
            </form>
        </nav>
    </aside>

    <!-- CONTENU PRINCIPAL -->
    <main class="ml-64 w-full py-10 px-6">
        <div class="max-w-6xl mx-auto">

            <!-- HEADER -->
            <div class="flex items-center justify-between mb-6">
                <h1 class="text-3xl font-bold text-gray-800">Mes Cours</h1>
                <button id="toggleFormBtn" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    + Ajouter un cours
                </button>
            </div>

            <!-- FORMULAIRE AJOUT DE COURS (hidden par défaut) -->
            <div id="addCourseForm" class="hidden bg-white shadow-md rounded-lg p-6 mb-6">
                <form action="{{ route('teacher.courses.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="title" class="block text-gray-700 font-semibold">Titre du cours</label>
                        <input type="text" name="title" id="title" class="w-full border px-4 py-2 rounded mt-1" required>
                    </div>
                    <div class="mb-4">
                        <label for="description" class="block text-gray-700 font-semibold">Description</label>
                        <textarea name="description" id="description" rows="4" class="w-full border px-4 py-2 rounded mt-1" required></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="level" class="block text-gray-700 font-semibold">Niveau</label>
                        <select name="level" id="level" class="w-full border px-4 py-2 rounded mt-1" required>
                            <option value="beginner">Débutant</option>
                            <option value="intermediate">Intermédiaire</option>
                            <option value="advanced">Avancé</option>
                        </select>
                    </div>
                    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                        Enregistrer le cours
                    </button>
                </form>
            </div>

            <!-- TABLEAU DES COURS -->
            <div class="bg-white shadow-md rounded-lg p-6">
                @if ($courses->count() > 0)
                    <table class="w-full table-auto border border-gray-200">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border px-4 py-2 text-left">Titre</th>
                                <th class="border px-4 py-2 text-left">Description</th>
                                <th class="border px-4 py-2 text-left">Niveau</th>
                                <th class="border px-4 py-2 text-left">Créé le</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($courses as $course)
                                <tr>
                                    <td class="border px-4 py-2">{{ $course->title }}</td>
                                    <td class="border px-4 py-2">{{ Str::limit($course->description, 60) }}</td>
                                    <td class="border px-4 py-2 capitalize">{{ $course->level }}</td>
                                    <td class="border px-4 py-2">{{ $course->created_at->format('d/m/Y') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-gray-600 text-center">Aucun cours trouvé.</p>
                @endif
            </div>
        </div>
    </main>

    <!-- SCRIPT POUR AFFICHER / MASQUER LE FORMULAIRE -->
    <script>
        document.getElementById("toggleFormBtn").addEventListener("click", function () {
            const form = document.getElementById("addCourseForm");
            form.classList.toggle("hidden");
        });

        // Si besoin : masquer le formulaire après soumission avec JS
        @if(session('success'))
            document.getElementById("addCourseForm").classList.add("hidden");
        @endif
    </script>

</body>
</html>
