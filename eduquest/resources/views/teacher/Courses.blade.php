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
            <a href="{{ route('teacher.courses') }}" class="block text-gray-700 hover:text-blue-600 font-semibold">Tous les cours</a> {{-- Assurez-vous que ce lien pointe vers la bonne route --}}
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

                {{-- Supprimez l'ancien bloc d'alerte HTML pour 'success' --}}
                {{-- @if (session('success')) ... @endif --}}

                {{-- Gardez le bloc pour les erreurs de validation --}}
                @if ($errors->any())
                    <div class="mb-4 p-4 bg-red-100 text-red-700 border border-red-300 rounded">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


                <form action="{{ route('teacher.courses.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Titre -->
                    <div class="mb-4">
                        <label for="title" class="block text-gray-700 font-semibold">Titre du cours</label>
                        <input type="text" name="title" id="title" value="{{ old('title') }}" class="w-full border px-4 py-2 rounded mt-1 @error('title') border-red-500 @enderror" required>
                        @error('title')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div class="mb-4">
                        <label for="description" class="block text-gray-700 font-semibold">Description</label>
                        <textarea name="description" id="description" rows="4" class="w-full border px-4 py-2 rounded mt-1 @error('description') border-red-500 @enderror" required>{{ old('description') }}</textarea>
                        @error('description')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Niveau -->
                    <div class="mb-4">
                        <label for="level" class="block text-gray-700 font-semibold">Niveau</label>
                        <select name="level" id="level" class="w-full border px-4 py-2 rounded mt-1 @error('level') border-red-500 @enderror" required>
                            <option value="beginner" {{ old('level') == 'beginner' ? 'selected' : '' }}>Débutant</option>
                            <option value="intermediate" {{ old('level') == 'intermediate' ? 'selected' : '' }}>Intermédiaire</option>
                            <option value="advanced" {{ old('level') == 'advanced' ? 'selected' : '' }}>Avancé</option>
                        </select>
                        @error('level')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Type -->
                    <div class="mb-4">
                        <label for="type" class="block text-gray-700 font-semibold">Type</label>
                        <select name="type" id="type" class="w-full border px-4 py-2 rounded mt-1 @error('type') border-red-500 @enderror" required>
                            <option value="free" {{ old('type', 'free') == 'free' ? 'selected' : '' }}>Gratuit</option>
                            <option value="paid" {{ old('type') == 'paid' ? 'selected' : '' }}>Payant</option>
                        </select>
                        @error('type')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Prix (visible si type = paid) -->
                    <div class="mb-4" id="priceField" style="{{ old('type', 'free') == 'paid' ? '' : 'display: none;' }}">
                        <label for="price" class="block text-gray-700 font-semibold">Prix (€)</label>
                        <input type="number" step="0.01" min="0" name="price" id="price" value="{{ old('price') }}" class="w-full border px-4 py-2 rounded mt-1 @error('price') border-red-500 @enderror">
                        @error('price')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Vidéo -->
                    <div class="mb-4">
                        <label for="video_path" class="block text-gray-700 font-semibold">Vidéo (Optionnel)</label>
                        <input type="file" name="video_path" id="video_path" accept="video/mp4,video/mpeg,video/quicktime" class="w-full border px-4 py-2 rounded mt-1 @error('video_path') border-red-500 @enderror">
                        @error('video_path')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- PDF -->
                    <div class="mb-4">
                        <label for="pdf_path" class="block text-gray-700 font-semibold">PDF (Optionnel)</label>
                        <input type="file" name="pdf_path" id="pdf_path" accept=".pdf,application/pdf" class="w-full border px-4 py-2 rounded mt-1 @error('pdf_path') border-red-500 @enderror">
                        @error('pdf_path')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Bouton -->
                    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                        Enregistrer le cours
                    </button>
                </form>

                {{-- Script pour le champ Prix conditionnel --}}
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        const typeSelect = document.getElementById('type');
                        const priceField = document.getElementById('priceField');
                        const priceInput = document.getElementById('price');

                        function togglePriceField() {
                            if (typeSelect.value === 'paid') {
                                priceField.style.display = 'block';
                                priceInput.required = true;
                            } else {
                                priceField.style.display = 'none';
                                priceInput.required = false;
                            }
                        }
                        typeSelect.addEventListener('change', togglePriceField);
                        togglePriceField(); // Run on load
                    });
                </script>

            </div>

            <!-- AFFICHAGE DES COURS EN CARTES -->
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
                                            {{ $course->type }} @if($course->type == 'paid') ({{ number_format($course->price, 2) }} €) @endif
                                        </span>
                                    </div>

                                    {{-- J'ai simplifié l'affichage du prix ici car il est déjà dans le badge 'type' --}}
                                    {{-- <p class="text-sm text-gray-700 mb-2">
                                        💰 <strong>{{ number_format($course->price, 2) }} €</strong>
                                    </p> --}}

                                    @if ($course->pdf_path)
                                        <p class="text-sm text-blue-600 mt-1">
                                            📄 <a href="{{ Storage::url($course->pdf_path) }}" target="_blank" class="underline">Voir le PDF</a>
                                        </p>
                                    @endif

                                    @if ($course->video_path)
                                        <p class="text-sm text-blue-600 mt-1">
                                            🎥 <a href="{{ Storage::url($course->video_path) }}" target="_blank" class="underline">Voir la vidéo</a>
                                        </p>
                                    @endif

                                    <p class="text-xs text-gray-500 mt-3">
                                        Créé le : {{ $course->created_at->format('d/m/Y') }}
                                    </p>
                                </div>

                                @if ($course->teacher)
                                <div class="mt-4 text-sm text-gray-600 border-t pt-2">
                                    👨‍🏫 Par : <strong>{{ $course->teacher->first_name ?? ''}} {{ $course->teacher->last_name ?? ''}}</strong>
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

        // Optionnel : Si vous voulez toujours masquer le formulaire après succès
        // même si l'alerte JS est affichée.
        @if(session('success'))
            const formToHide = document.getElementById("addCourseForm");
            if (formToHide) { // Vérifie si l'élément existe
                formToHide.classList.add("hidden");
            }
        @endif
    </script>

    {{-- NOUVEAU SCRIPT POUR L'ALERTE JS SIMPLE --}}
    @if (session('success'))
    <script>
        // Attend que le DOM soit chargé (bonne pratique)
        document.addEventListener('DOMContentLoaded', function() {
            // Affiche l'alerte standard du navigateur avec le message flashé
            // json_encode est utilisé pour s'assurer que les caractères spéciaux
            // dans le message (comme les apostrophes) ne cassent pas le JS.
            alert({!! json_encode(session('success')) !!});
        });
    </script>
    @endif

</body>
</html>