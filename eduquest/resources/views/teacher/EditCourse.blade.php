<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Modifier le Cours : {{ $course->title }} - EduQuest</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome CDN for icons (required by the new sidebar) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        /* Styles scrollbar (ajusté pour le thème sombre du nouveau sidebar) */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #333; border-radius: 10px; } /* Ajusté pour thème sombre */
        ::-webkit-scrollbar-thumb { background: #555; border-radius: 10px; } /* Ajusté pour thème sombre */
        ::-webkit-scrollbar-thumb:hover { background: #777; } /* Ajusté pour thème sombre */

        /* Note: video styles, aspect ratios, and x-cloak from original code are kept */
        video { max-width: 100%; height: auto; border-radius: 0.5rem; box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1); }
        .aspect-w-16 { position: relative; padding-bottom: 56.25%; }
        .aspect-h-9 { /* Combinable */ }
        .aspect-w-16 > *, .aspect-h-9 > * { position: absolute; height: 100%; width: 100%; top: 0; right: 0; bottom: 0; left: 0; }
        [x-cloak] { display: none !important; }

         /* Fix Material Symbols icon alignment if needed (though likely not used with FA sidebar) */
         .material-symbols-outlined, .material-icons {
            vertical-align: middle;
         }
    </style>
    {{-- AlpineJS is not strictly needed for this page based on the code provided, but keeping it as it might be used elsewhere --}}
    {{-- <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script> --}}
</head>
<body class="bg-gray-100 flex antialiased">

    <!-- Nouveau Panneau Latéral (Sidebar) - Inspiré de Jobsly -->
    <aside class="w-64 h-screen bg-gray-900 text-gray-100 shadow-lg fixed top-0 left-0 z-20 flex flex-col overflow-y-auto">

        <!-- Header Sidebar -->
        <div class="flex justify-between items-center px-5 py-4 border-b border-gray-700">
            <!-- Remplacé le logo SVG par un titre simple -->
            <h1 class="text-2xl font-bold text-white">EduQuest</h1>
            <!-- Icône Menu Hamburger -->
             <i class="fas fa-bars text-xl text-gray-400 cursor-pointer hover:text-white"></i>
        </div>

        <!-- Barre de recherche -->
        <div class="relative px-4 mt-6">
            <input type="text" placeholder="Search..." class="w-full px-4 py-2 pl-10 bg-gray-800 border border-gray-700 rounded-lg text-sm text-gray-300 placeholder-gray-500 focus:outline-none focus:border-blue-600 focus:ring-blue-600">
            <!-- Icône Loupe -->
            <i class="fas fa-magnifying-glass absolute left-7 top-1/2 transform -translate-y-1/2 text-gray-500 text-sm"></i>
        </div>

        <!-- Navigation Principale -->
        <nav class="mt-6 space-y-3 flex-grow px-4">
            {{-- Item Statistiques --}}
            <a href="{{ route('teacher.StatistiqueTeacher') }}" class="flex items-center space-x-3 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-150 ease-in-out
               {{ request()->routeIs('teacher.StatistiqueTeacher') ? 'bg-gray-700 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                <!-- Icône Statistiques (Font Awesome) -->
                <i class="fas fa-chart-simple text-lg"></i>
                <span>Statistiques</span>
            </a>

            {{-- Item Tous les cours --}}
            <a href="{{ route('teacher.courses') }}" class="flex items-center space-x-3 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-150 ease-in-out
               {{ request()->routeIs('teacher.courses*') ? 'bg-gray-700 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                <!-- Icône Tous les cours (Font Awesome) -->
                 <i class="fas fa-book text-lg"></i>
                 <span>Tous les cours</span>
            </a>

            {{-- Item Catégories --}}
             <a href="{{ route('categories.index') }}" class="flex items-center space-x-3 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-150 ease-in-out
               {{ request()->routeIs('categories.index') ? 'bg-gray-700 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                <!-- Icône Catégories (Font Awesome) -->
                 <i class="fas fa-tags text-lg"></i>
                 <span>Catégories</span>
            </a>
            {{-- Autres liens (Etudiants, etc.) pourraient être ajoutés ici --}}

        </nav>

        <!-- Séparateur visuel avant le profil -->
        <div class="border-t border-gray-700 mt-auto pt-4 mx-4"></div>

        <!-- Section Profil Utilisateur -->
        <div class="px-4 pb-4 pt-2">
             {{-- Utilisation des données d'authentification pour le profil si l'utilisateur est connecté --}}
             @auth
             <div class="flex items-center space-x-3 p-3 bg-gray-800 rounded-lg">
                <!-- Avatar Utilisateur (Utilise les initiales ou un placeholder) -->
                 <div class="w-8 h-8 rounded-full bg-indigo-600 text-white flex items-center justify-center font-semibold text-sm flex-shrink-0 border border-gray-600">
                      {{ strtoupper(substr(Auth::user()->first_name ?? 'A', 0, 1)) }}{{ strtoupper(substr(Auth::user()->last_name ?? 'D', 0, 1)) }}
                 </div>
                <div class="flex-grow">
                    <p class="text-sm font-semibold text-white">{{ Auth::user()->first_name ?? 'Admin' }} {{ Auth::user()->last_name ?? '' }}</p>
                    <p class="text-xs text-gray-400">{{ Auth::user()->email ?? 'admin@example.com' }}</p>
                </div>
                <!-- Icône Plus d'options -->
                <i class="fas fa-ellipsis text-gray-400 text-lg cursor-pointer hover:text-white"></i>
             </div>
             @endauth
             {{-- Logout --}}
             <div class="mt-4">
                 <form action="{{ route('logout') }}" method="POST">
                     @csrf
                     <button type="submit" class="w-full flex items-center justify-center text-sm font-medium text-red-400 bg-gray-800 hover:bg-gray-700 px-3 py-2 rounded-md group transition-colors duration-200">
                         <i class="fas fa-sign-out-alt w-5 h-5 mr-2 text-red-500"></i>
                         Déconnexion
                     </button>
                 </form>
             </div>
        </div>

    </aside>
    <!-- ================================================== -->


    <!-- CONTENU PRINCIPAL -->
    <main class="ml-64 w-full p-6 md:p-8 lg:p-10">
        <div class="max-w-4xl mx-auto">

            <!-- Header Page (inchangé) -->
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">Modifier le Cours</h1>
                    <p class="mt-1 text-sm text-gray-600">Mise à jour de : <span class="font-medium">{{ $course->title }}</span></p>
                </div>
                 <a href="{{ route('teacher.courses') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <svg class="-ml-1 mr-2 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" /> </svg>
                    Retour aux cours
                </a>
            </div>

            <!-- Formulaire de Modification (inchangé) -->
            <div class="bg-white shadow-lg rounded-lg p-6 md:p-8 border border-gray-200">

                 @if ($errors->any())
                    <div class="mb-6 p-4 border border-red-300 bg-red-50 text-red-700 rounded-md">
                        <div class="flex items-center"><svg class="h-5 w-5 mr-3 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z" clip-rule="evenodd" /></svg><h3 class="text-sm font-semibold">Erreurs:</h3></div>
                        <ul class="mt-2 ml-8 list-disc text-sm space-y-1"> @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach </ul>
                    </div>
                 @endif


                 <form action="{{ route('teacher.courses.update', $course->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-6">

                        <div class="space-y-6">

                            <div>
                                <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Titre <span class="text-red-500">*</span></label>

                                <input type="text" name="title" id="title" value="{{ old('title', $course->title) }}" required
                                       class="block w-full shadow-sm sm:text-sm rounded-md border-gray-300 focus:ring-blue-500 focus:border-blue-500 @error('title') border-red-500 ring-1 ring-red-500 @enderror">
                                @error('title')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                            </div>


                            <div>
                                <label for="level" class="block text-sm font-medium text-gray-700 mb-1">Niveau <span class="text-red-500">*</span></label>
                                <select name="level" id="level" required class="block w-full shadow-sm sm:text-sm rounded-md border-gray-300 focus:ring-blue-500 focus:border-blue-500 @error('level') border-red-500 ring-1 ring-red-500 @enderror">

                                    <option value="beginner" {{ old('level', $course->level) == 'beginner' ? 'selected' : '' }}>Débutant</option>
                                    <option value="intermediate" {{ old('level', $course->level) == 'intermediate' ? 'selected' : '' }}>Intermédiaire</option>
                                    <option value="advanced" {{ old('level', $course->level) == 'advanced' ? 'selected' : '' }}>Avancé</option>
                                </select>
                                @error('level')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                            </div>


                            <div>
                                <label for="type" class="block text-sm font-medium text-gray-700 mb-1">Type <span class="text-red-500">*</span></label>
                                <select name="type" id="type" required class="block w-full shadow-sm sm:text-sm rounded-md border-gray-300 focus:ring-blue-500 focus:border-blue-500 @error('type') border-red-500 ring-1 ring-red-500 @enderror">
                                    <option value="free" {{ old('type', $course->type) == 'free' ? 'selected' : '' }}>Gratuit</option>
                                    <option value="paid" {{ old('type', $course->type) == 'paid' ? 'selected' : '' }}>Payant</option>
                                </select>
                                @error('type')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                            </div>


                            <div id="priceField" style="{{ old('type', $course->type) == 'paid' ? '' : 'display: none;' }}">
                                <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Prix (€) @if(old('type', $course->type) == 'paid')<span class="text-red-500">*</span>@endif</label>
                                <input type="number" step="0.01" min="0" name="price" id="price" value="{{ old('price', $course->price) }}"
                                       class="block w-full shadow-sm sm:text-sm rounded-md border-gray-300 focus:ring-blue-500 focus:border-blue-500 @error('price') border-red-500 ring-1 ring-red-500 @enderror">
                                @error('price')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                            </div>


                             <div>
                                <label for="video_path" class="block text-sm font-medium text-gray-700 mb-1">Vidéo (Optionnel)</label>
                                <input type="file" name="video_path" id="video_path" accept="video/*"
                                       class="block w-full text-sm text-gray-500 border border-gray-300 rounded-md cursor-pointer bg-gray-50 focus:outline-none file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 @error('video_path') border-red-500 ring-1 ring-red-500 @enderror">
                                <p class="mt-1 text-xs text-gray-500">Laissez vide pour conserver la vidéo actuelle.</p>

                                @if($course->video_path)
                                <div class="mt-2 text-xs text-gray-600">
                                    Vidéo actuelle : <a href="{{ Storage::url($course->video_path) }}" target="_blank" class="text-blue-600 hover:underline">{{ basename($course->video_path) }}</a>
                                </div>
                                @endif
                                @error('video_path')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                            </div>

                        </div>


                        <div class="space-y-6">

                            <div>
                                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description <span class="text-red-500">*</span></label>
                                <textarea name="description" id="description" rows="4" required class="block w-full shadow-sm sm:text-sm rounded-md border-gray-300 focus:ring-blue-500 focus:border-blue-500 @error('description') border-red-500 ring-1 ring-red-500 @enderror">{{ old('description', $course->description) }}</textarea>
                                @error('description')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                            </div>


                            <div>
                                <label for="category_id" class="block text-sm font-medium text-gray-700 mb-1">Catégorie <span class="text-red-500">*</span></label>
                                <select name="category_id" id="category_id" required class="block w-full shadow-sm sm:text-sm rounded-md border-gray-300 focus:ring-blue-500 focus:border-blue-500 @error('category_id') border-red-500 ring-1 ring-red-500 @enderror">
                                    <option value="">-- Choisir --</option>

                                    @isset($categories)
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ old('category_id', $course->category_id) == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    @else
                                        <option value="" disabled>Chargement...</option>
                                    @endisset
                                </select>
                                @error('category_id')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                            </div>


                             <div>
                                 <label for="image_path" class="block text-sm font-medium text-gray-700 mb-1">
                                     Image du cours <span class="text-xs text-gray-500">(Optionnel si déjà existante)</span>
                                 </label>

                                 @if ($course->image_path)
                                 <div class="mb-2">
                                     <img src="{{ Storage::url($course->image_path) }}" alt="Image actuelle" class="h-24 w-auto rounded border object-cover">
                                 </div>
                                 @endif
                                 <input type="file" name="image_path" id="image_path" accept="image/*"
                                        class="block w-full text-sm text-gray-500 border border-gray-300 rounded-md cursor-pointer bg-gray-50 focus:outline-none file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 @error('image_path') border-red-500 ring-1 ring-red-500 @enderror">
                                 <p class="mt-1 text-xs text-gray-500">Laissez vide pour conserver l'image actuelle.</p>
                                 @error('image_path')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                             </div>


                            <div>
                                <label for="pdf_path" class="block text-sm font-medium text-gray-700 mb-1">PDF (Optionnel)</label>
                                <input type="file" name="pdf_path" id="pdf_path" accept=".pdf,application/pdf"
                                       class="block w-full text-sm text-gray-500 border border-gray-300 rounded-md cursor-pointer bg-gray-50 focus:outline-none file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 @error('pdf_path') border-red-500 ring-1 ring-red-500 @enderror">
                                <p class="mt-1 text-xs text-gray-500">Laissez vide pour conserver le PDF actuel.</p>

                                 @if($course->pdf_path)
                                <div class="mt-2 text-xs text-gray-600">
                                    PDF actuel : <a href="{{ Storage::url($course->pdf_path) }}" target="_blank" class="text-blue-600 hover:underline">{{ basename($course->pdf_path) }}</a>
                                </div>
                                @endif
                                @error('pdf_path')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                            </div>

                        </div>
                    </div>


                    <div class="pt-5 border-t border-gray-200">
                        <div class="flex justify-end space-x-3">
                            <a href="{{ route('teacher.courses') }}" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Annuler
                            </a>
                            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                Mettre à jour le cours
                            </button>
                        </div>
                    </div>
                 </form>


                <script>
                     document.addEventListener('DOMContentLoaded', function () {
                         const typeSelect = document.getElementById('type');
                         const priceField = document.getElementById('priceField');
                         const priceInput = document.getElementById('price');
                         const priceLabel = priceField.querySelector('label');

                         function togglePriceField() {
                             const isPaid = typeSelect.value === 'paid';
                             priceField.style.display = isPaid ? 'block' : 'none';
                             priceInput.required = isPaid;
                              if (priceLabel) {
                                 const requiredSpan = priceLabel.querySelector('span.text-red-500');
                                 if (isPaid && !requiredSpan) {
                                     const newSpan = document.createElement('span'); newSpan.className = 'text-red-500'; newSpan.textContent = ' *'; priceLabel.appendChild(newSpan);
                                 } else if (!isPaid && requiredSpan) { requiredSpan.remove(); }
                             }
                             if (!isPaid) { priceInput.value = ''; }
                         }
                         typeSelect.addEventListener('change', togglePriceField);
                         togglePriceField(); // Exécute au chargement
                     });
                </script>

            </div>

        </div>
    </main>

</body>
</html>