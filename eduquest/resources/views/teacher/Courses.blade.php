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
            <form action="{{ route('teacher.courses.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <!-- Titre -->
    <div class="mb-4">
        <label for="title" class="block text-gray-700 font-semibold">Titre du cours</label>
        <input type="text" name="title" id="title" class="w-full border px-4 py-2 rounded mt-1" required>
    </div>

    <!-- Description -->
    <div class="mb-4">
        <label for="description" class="block text-gray-700 font-semibold">Description</label>
        <textarea name="description" id="description" rows="4" class="w-full border px-4 py-2 rounded mt-1" required></textarea>
    </div>

    <!-- Niveau -->
    <div class="mb-4">
        <label for="level" class="block text-gray-700 font-semibold">Niveau</label>
        <select name="level" id="level" class="w-full border px-4 py-2 rounded mt-1" required>
            <option value="beginner">Débutant</option>
            <option value="intermediate">Intermédiaire</option>
            <option value="advanced">Avancé</option>
        </select>
    </div>

    <!-- Type -->
    <div class="mb-4">
        <label for="type" class="block text-gray-700 font-semibold">Type</label>
        <select name="type" id="type" class="w-full border px-4 py-2 rounded mt-1" required>
            <option value="free">Gratuit</option>
            <option value="paid">Payant</option>
        </select>
    </div>

    <!-- Prix (visible si type = paid) -->
    <div class="mb-4" id="priceField" style="display: none;">
        <label for="price" class="block text-gray-700 font-semibold">Prix (€)</label>
        <input type="number" step="0.01" name="price" id="price" class="w-full border px-4 py-2 rounded mt-1">
    </div>

    <!-- Vidéo -->
    <div class="mb-4">
        <label for="video_path" class="block text-gray-700 font-semibold">Vidéo</label>
        <input type="file" name="video_path" id="video_path" class="w-full border px-4 py-2 rounded mt-1">
    </div>

    <!-- PDF -->
    <div class="mb-4">
        <label for="pdf_path" class="block text-gray-700 font-semibold">PDF</label>
        <input type="file" name="pdf_path" id="pdf_path" class="w-full border px-4 py-2 rounded mt-1">
    </div>

    <!-- Bouton -->
    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
        Enregistrer le cours
    </button>
</form>

            </div>

            <!-- TABLEAU DES COURS -->
            <!-- AFFICHAGE DES COURS EN CARTES AVEC TOUS LES CHAMPS -->
<div class="bg-white shadow-md rounded-lg p-6">
    @if ($courses->count() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($courses as $course)
                <div class="bg-white border border-gray-200 rounded-lg shadow-sm p-4 hover:shadow-md transition flex flex-col justify-between h-full">
                    <div>
                        <h2 class="text-lg font-semibold text-gray-800 mb-2">{{ $course->title }}</h2>
                        <p class="text-gray-600 text-sm mb-2">{{ Str::limit($course->description, 80) }}</p>

                        <div class="mb-2">
                            <span class="inline-block px-3 py-1 text-sm rounded-full bg-blue-100 text-blue-800 capitalize">
                                {{ $course->level }}
                            </span>
                            <span class="inline-block px-3 py-1 text-sm rounded-full bg-green-100 text-green-800 capitalize ml-2">
                                {{ $course->type }}
                            </span>
                        </div>

                        <p class="text-sm text-gray-700 mb-2">
                            💰 <strong>{{ number_format($course->price, 2) }} €</strong>
                        </p>

                        @if ($course->pdf_path)
                            <p class="text-sm text-blue-600">
                                📄 <a href="{{ asset('storage/' . $course->pdf_path) }}" target="_blank" class="underline">Voir le PDF</a>
                            </p>
                        @endif

                        @if ($course->video_path)
                            <p class="text-sm text-blue-600">
                                🎥 <a href="{{ asset('storage/' . $course->video_path) }}" target="_blank" class="underline">Voir la vidéo</a>
                            </p>
                        @endif

                        <p class="text-xs text-gray-500 mt-3">
                            Créé le : {{ $course->created_at->format('d/m/Y') }}
                        </p>
                    </div>

                    @if ($course->teacher)
                    <div class="mt-4 text-sm text-gray-600">
                        👨‍🏫 Enseignant : <strong>{{ $course->teacher->first_name}} {{ $course->teacher->last_name}}</strong>
                    </div>

                    @endif
                </div>
            @endforeach
        </div>
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
