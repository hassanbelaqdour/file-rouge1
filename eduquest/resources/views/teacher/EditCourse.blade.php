<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Modifier le Cours : {{ $course->title }} - EduQuest</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome CDN for icons (required by the sidebar and file inputs) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        /* Styles scrollbar (ajusté pour le thème sombre du nouveau sidebar) */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #333; border-radius: 10px; } /* Ajusté pour thème sombre */
        ::-webkit-scrollbar-thumb { background: #555; border-radius: 10px; } /* Ajusté pour thème sombre */
        ::-webkit-scrollbar-thumb:hover { background: #777; } /* Ajusté pour thème sombre */

        /* Styles spécifiques au contenu principal (inchangés ou adaptés) */
        video { max-width: 100%; height: auto; border-radius: 0.5rem; box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1); }
        .aspect-w-16 { position: relative; padding-bottom: 56.25%; }
        .aspect-h-9 { /* Combinable */ }
        .aspect-w-16 > *, .aspect-h-9 > * { position: absolute; height: 100%; width: 100%; top: 0; right: 0; bottom: 0; left: 0; }
        [x-cloak] { display: none !important; }

         /* Fix Material Symbols icon alignment if needed (though likely not used with FA sidebar) */
         .material-symbols-outlined, .material-icons {
            vertical-align: middle;
         }
         /* Style pour le conteneur de l'input file stylisé */
         .custom-file-input-area {
            /* Imitation du style du formulaire de leçon sombre */
            background-color: #374151; /* gray-700 */
            border: 1px solid #4b5563; /* gray-600 */
            border-radius: 0.375rem; /* rounded-md */
            text-align: center;
            cursor: pointer;
            transition-property: background-color, border-color, color, fill, stroke, opacity, box-shadow, transform;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
            transition-duration: 200ms;
         }
         .custom-file-input-area:hover {
             background-color: #4a5568; /* gray-600 hover */
         }
         /* Ajustement pour les erreurs de validation sur l'input file stylisé */
          .custom-file-input-area.border-red-500 {
             border-color: #EF4444; /* red-500 */
             box-shadow: 0 0 0 1px #EF4444; /* ring-1 */
         }


    </style>
    {{-- AlpineJS is not strictly needed for this page based on the code provided, but keeping it as it might be used elsewhere --}}
    {{-- <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script> --}}
</head>
<body class="bg-gray-100 flex antialiased">

    <!-- Panneau Latéral (Sidebar) - Style Jobsly (inchangé) -->
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

            {{-- Item Tous les cours (Actif si route teacher.courses*) --}}
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
                      {{ strtoupper(substr(Auth::user()->first_name ?? 'U', 0, 1)) }}{{ strtoupper(substr(Auth::user()->last_name ?? 's', 0, 1)) }}
                 </div>
                <div class="flex-grow">
                    <p class="text-sm font-semibold text-white">{{ Auth::user()->first_name ?? 'Utilisateur' }} {{ Auth::user()->last_name ?? '' }}</p>
                    <p class="text-xs text-gray-400">{{ Auth::user()->email ?? 'email@exemple.com' }}</p>
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

            <!-- Formulaire de Modification (Style sombre, 2 colonnes, champs d'upload stylisés) -->
            <div class="bg-gray-800 shadow-lg rounded-lg p-6 md:p-8 border border-gray-700">

                 {{-- Boîte Erreurs Validation --}}
                 @if ($errors->any())
                    <div class="mb-6 p-4 border border-red-600 bg-red-900 text-red-200 rounded-md"> {{-- Styles sombres pour les erreurs --}}
                        <div class="flex items-center"><svg class="h-5 w-5 mr-3 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z" clip-rule="evenodd" /></svg><h3 class="text-sm font-semibold">Erreurs de Validation:</h3></div>
                        <ul class="mt-2 ml-8 list-disc text-sm space-y-1"> @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach </ul>
                    </div>
                 @endif

                 {{-- Titre du formulaire (Optionnel, style sombre) --}}
                 {{-- <div class="text-center mb-6">
                     <h1 class="text-2xl font-bold text-white mb-2">Modifier le Cours</h1>
                     <p class="text-gray-400 text-sm">Mettre à jour les informations du cours</p>
                 </div> --}}


                 <form action="{{ route('teacher.courses.update', $course->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        {{-- Colonne Gauche: Champs standards + Description + Catégorie --}}
                        <div class="space-y-6">

                             <div class="mb-4 md:mb-0">
                                 <label for="title" class="block text-gray-400 text-sm font-medium text-center mb-2">
                                    Titre <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="title" name="title" value="{{ old('title', $course->title) }}" required
                                       class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md text-white placeholder-gray-500 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('title') border-red-500 ring-1 ring-red-500 @enderror" placeholder="">
                                @error('title')<p class="mt-1 text-xs text-red-400">{{ $message }}</p>@enderror
                             </div>

                             <div class="mb-4 md:mb-0 relative">
                                 <label for="level" class="block text-gray-400 text-sm font-medium text-center mb-2">
                                    Niveau <span class="text-red-500">*</span>
                                </label>
                                 <select name="level" id="level" required
                                         class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 appearance-none pr-8 @error('level') border-red-500 ring-1 ring-red-500 @enderror">
                                     <option value="">-- Choisir --</option>
                                     <option value="beginner" {{ old('level', $course->level) == 'beginner' ? 'selected' : '' }}>Débutant</option>
                                     <option value="intermediate" {{ old('level', $course->level) == 'intermediate' ? 'selected' : '' }}>Intermédiaire</option>
                                     <option value="advanced" {{ old('level', $course->level) == 'advanced' ? 'selected' : '' }}>Avancé</option>
                                 </select>
                                  {{-- Icône pour le select --}}
                                 <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-400 mt-3">
                                     <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                 </div>
                                 @error('level')<p class="mt-1 text-xs text-red-400">{{ $message }}</p>@enderror
                             </div>

                             <div class="mb-4 md:mb-0 relative">
                                 <label for="type" class="block text-gray-400 text-sm font-medium text-center mb-2">
                                    Type <span class="text-red-500">*</span>
                                </label>
                                 <select name="type" id="type" required
                                         class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 appearance-none pr-8 @error('type') border-red-500 ring-1 ring-red-500 @enderror">
                                     <option value="free" {{ old('type', $course->type) == 'free' ? 'selected' : '' }}>Gratuit</option>
                                     <option value="paid" {{ old('type', $course->type) == 'paid' ? 'selected' : '' }}>Payant</option>
                                 </select>
                                  {{-- Icône pour le select --}}
                                 <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-400 mt-3">
                                     <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                 </div>
                                 @error('type')<p class="mt-1 text-xs text-red-400">{{ $message }}</p>@enderror
                             </div>

                             {{-- Champ Prix conditionnel --}}
                             <div id="priceField" style="{{ old('type', $course->type) == 'paid' ? '' : 'display: none;' }}">
                                 <label for="price" class="block text-gray-400 text-sm font-medium text-center mb-2">
                                    Prix (€) @if(old('type', $course->type) == 'paid')<span class="text-red-500">*</span>@endif
                                </label>
                                 <input type="number" step="0.01" min="0" name="price" id="price" value="{{ old('price', $course->price) }}"
                                        class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md text-white placeholder-gray-500 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('price') border-red-500 ring-1 ring-red-500 @enderror">
                                 @error('price')<p class="mt-1 text-xs text-red-400">{{ $message }}</p>@enderror
                             </div>

                              {{-- Champ Description (déplacé ici) --}}
                              <div> {{-- Retire mb-4/md:mb-0 car space-y-6 gère l'espacement --}}
                                 <label for="description" class="block text-sm font-medium text-gray-400 text-center mb-2">
                                    Description <span class="text-red-500">*</span>
                                </label>
                                 <textarea id="description" name="description" rows="4" required
                                           class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md text-white placeholder-gray-500 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('description') border-red-500 ring-1 ring-red-500 @enderror" placeholder=""></textarea>
                                 @error('description')<p class="mt-1 text-xs text-red-400">{{ $message }}</p>@enderror
                             </div>

                             {{-- Champ Catégorie (déplacé ici) --}}
                             <div> {{-- Retire mb-4/md:mb-0 --}}
                                 <label for="category_id" class="block text-sm font-medium text-gray-400 text-center mb-2">
                                     Catégorie <span class="text-red-500">*</span>
                                 </label>
                                 <select name="category_id" id="category_id" required
                                         class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 appearance-none pr-8 @error('category_id') border-red-500 ring-1 ring-red-500 @enderror">
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
                                  {{-- Icône pour le select --}}
                                 <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-400 mt-3">
                                     <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                 </div>
                                 @error('category_id')<p class="mt-1 text-xs text-red-400">{{ $message }}</p>@enderror
                             </div>


                        </div>

                        {{-- Colonne Droite: Champs d'upload de fichier --}}
                        <div class="space-y-6"> {{-- Utilise space-y-6 pour l'espacement --}}

                             {{-- Champ Image du cours --}}
                             <div class="mb-4 md:mb-0">
                                 <label for="image_path" class="block text-gray-400 text-sm font-medium text-center mb-2">
                                     Image du cours <span class="text-red-500">*</span>
                                 </label>
                                  {{-- Affichage de l'image actuelle si elle existe --}}
                                 @if ($course->image_path)
                                     <div class="mb-2 flex justify-center">
                                         <img src="{{ Storage::url($course->image_path) }}" alt="Image actuelle" class="h-24 w-auto rounded border border-gray-700 object-cover">
                                     </div>
                                 @endif
                                 {{-- Applique le style du conteneur d'upload file --}}
                                 <div class="custom-file-input-area w-full px-4 py-6 @error('image_path') border-red-500 ring-1 ring-red-500 @enderror">
                                     {{-- Input file caché --}}
                                     <input type="file" id="image_path" name="image_path" accept="image/*" class="hidden"> {{-- Required removed for edit form, as leaving it empty means keeping current --}}
                                     {{-- Label cliquable avec icône et texte --}}
                                    <label for="image_path" class="flex flex-col items-center justify-center">
                                        {{-- Icône Image (Font Awesome) --}}
                                        <i class="fas fa-image w-8 h-8 mb-2 text-gray-400"></i>
                                        <span class="text-sm text-gray-400">Cliquez pour uploader une image</span>
                                    </label>
                                </div>
                                 <p class="mt-1 text-xs text-gray-400 text-center">Laissez vide pour conserver l'image actuelle.</p>
                                @error('image_path')<p class="mt-1 text-xs text-red-400">{{ $message }}</p>@enderror
                            </div>

                             {{-- Champ Vidéo du cours --}}
                             <div class="mb-4 md:mb-0">
                                <label for="video_path" class="block text-gray-400 text-sm font-medium text-center mb-2">
                                    Vidéo du cours (Optionnel)
                                </label>
                                 {{-- Affichage de la vidéo actuelle si elle existe (simple lien) --}}
                                 @if($course->video_path)
                                <div class="mt-2 text-xs text-gray-400 text-center">
                                    Vidéo actuelle : <a href="{{ Storage::url($course->video_path) }}" target="_blank" class="text-blue-400 hover:underline">{{ basename($course->video_path) }}</a>
                                </div>
                                @endif
                                 {{-- Applique le style du conteneur d'upload file --}}
                                <div class="custom-file-input-area w-full px-4 py-6 @error('video_path') border-red-500 ring-1 ring-red-500 @enderror">
                                    {{-- Input file caché --}}
                                    <input type="file" id="video_path" name="video_path" accept="video/*" class="hidden">
                                    {{-- Label cliquable avec icône et texte --}}
                                    <label for="video_path" class="flex flex-col items-center justify-center">
                                        {{-- Icône Vidéo (Font Awesome) --}}
                                        <i class="fas fa-video w-8 h-8 mb-2 text-gray-400"></i>
                                        <span class="text-sm text-gray-400">Cliquez pour uploader une vidéo</span>
                                    </label>
                                </div>
                                 <p class="mt-1 text-xs text-gray-400 text-center">Laissez vide pour conserver la vidéo actuelle.</p>
                                 @error('video_path')<p class="mt-1 text-xs text-red-400">{{ $message }}</p>@enderror
                            </div>

                            {{-- Champ PDF --}}
                            <div>
                                <label for="pdf_path" class="block text-sm font-medium text-gray-400 text-center mb-2">
                                    PDF (Optionnel)
                                </label>
                                 {{-- Affichage du PDF actuel si il existe (simple lien) --}}
                                 @if($course->pdf_path)
                                <div class="mt-2 text-xs text-gray-400 text-center">
                                    PDF actuel : <a href="{{ Storage::url($course->pdf_path) }}" target="_blank" class="text-blue-400 hover:underline">{{ basename($course->pdf_path) }}</a>
                                </div>
                                @endif
                                 {{-- Applique le style du conteneur d'upload file --}}
                                <div class="custom-file-input-area w-full px-4 py-6 @error('pdf_path') border-red-500 ring-1 ring-red-500 @enderror">
                                    {{-- Input file caché --}}
                                    <input type="file" id="pdf_path" name="pdf_path" accept=".pdf,application/pdf" class="hidden">
                                    {{-- Label cliquable avec icône et texte --}}
                                    <label for="pdf_path" class="flex flex-col items-center justify-center">
                                        {{-- Icône PDF (Font Awesome) --}}
                                        <i class="fas fa-file-pdf w-8 h-8 mb-2 text-gray-400"></i>
                                        <span class="text-sm text-gray-400">Cliquez pour uploader un PDF</span>
                                    </label>
                                </div>
                                 <p class="mt-1 text-xs text-gray-400 text-center">Laissez vide pour conserver le PDF actuel.</p>
                                 @error('pdf_path')<p class="mt-1 text-xs text-red-400">{{ $message }}</p>@enderror
                            </div>

                        </div>

                    </div> {{-- Fin de la grille --}}


                    {{-- Actions Formulaire (placé en dehors de la grille) --}}
                    <div class="pt-5 border-t border-gray-700 mt-6 flex justify-end space-x-3">
                         {{-- Bouton Annuler (stylisé sombre) --}}
                         <a href="{{ route('teacher.courses') }}"
                                 class="bg-gray-700 py-2 px-4 border border-gray-600 rounded-md shadow-sm text-sm font-medium text-gray-300 hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                             Annuler
                         </a> {{-- Utilisez <a> pour Annuler si c'est juste un retour --}}
                        {{-- Bouton Soumettre (stylisé vert comme l'original) --}}
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                            Mettre à jour le cours
                        </button>
                    </div>
                 </form>


                {{-- Script prix conditionnel (du formulaire d'origine, adapté) --}}
                <script>
                     document.addEventListener('DOMContentLoaded', function () {
                         const typeSelect = document.getElementById('type');
                         const priceField = document.getElementById('priceField');
                         const priceInput = document.getElementById('price');

                         function togglePriceField() {
                             // Assurez-vous que typeSelect existe pour éviter les erreurs
                             if (!typeSelect) return;

                             const isPaid = typeSelect.value === 'paid';
                             if (priceField) { // Assurez-vous que priceField existe
                                 priceField.style.display = isPaid ? 'block' : 'none';
                             }
                             if (priceInput) { // Assurez-vous que priceInput existe
                                 priceInput.required = isPaid;
                                 // Dans un formulaire de modification, on ne vide pas la valeur si on switch
                                 // à gratuit puis à payant à nouveau. Mais le script d'origine le faisait.
                                 // Je vais le laisser tel quel pour l'instant, mais c'est à noter.
                                 // if (!isPaid) {
                                 //     priceInput.value = '';
                                 // }
                             }


                             // Gérer l'affichage de l'étoile rouge pour le champ prix
                             const priceLabel = priceField?.querySelector('label'); // Utilisation de l'opérateur optionnel chaining
                             if (priceLabel) {
                                 let requiredSpan = priceLabel.querySelector('span.text-red-500');
                                 if (isPaid) {
                                     if (!requiredSpan) { // Ajouter l'étoile si elle n'existe pas
                                         requiredSpan = document.createElement('span');
                                         requiredSpan.className = 'text-red-500';
                                         requiredSpan.textContent = ' *';
                                         priceLabel.appendChild(requiredSpan);
                                     }
                                 } else {
                                     if (requiredSpan) { // Supprimer l'étoile si elle existe
                                         requiredSpan.remove();
                                     }
                                 }
                             }
                         }
                         // S'assure que typeSelect existe avant d'ajouter l'écouteur
                         if (typeSelect) {
                             typeSelect.addEventListener('change', togglePriceField);
                         }
                         // Exécute au chargement seulement si les éléments nécessaires existent
                         if (typeSelect && priceField && priceInput) {
                            togglePriceField();
                         }


                         // Gestion des inputs file (afficher le nom du fichier sélectionné) - OPTIONNEL
                         // Cible nos inputs file *cachés* par le style, mais contenus dans le div cliquable
                         const fileInputs = document.querySelectorAll('input[type="file"].hidden'); // Cible les inputs cachés
                         fileInputs.forEach(input => {
                             input.addEventListener('change', function() {
                                 const fileName = this.files[0] ? this.files[0].name : ''; // Vide si aucun fichier
                                 // Trouver le label parent cliquable
                                 const clickableDiv = this.closest('.custom-file-input-area'); // Div conteneur stylisé
                                 if (!clickableDiv) return; // S'assurer d'avoir trouvé le div parent

                                 const label = clickableDiv.querySelector('label'); // Le label est à l'intérieur
                                 if (label) {
                                     const textSpan = label.querySelector('span.text-sm'); // Cible le span spécifique du texte
                                     const icon = label.querySelector('i'); // Cible l'icône Font Awesome
                                     if (textSpan) {
                                         if (fileName) {
                                             textSpan.textContent = fileName;
                                             // Optionnel : changer la couleur du texte si un fichier est là
                                             textSpan.classList.remove('text-gray-400');
                                             textSpan.classList.add('text-white'); // Ou une autre couleur
                                         } else {
                                             // Rétablir le texte par défaut si aucun fichier n'est sélectionné
                                             let defaultText = 'Cliquez pour uploader un fichier'; // Fallback
                                             if (this.id === 'image_path') defaultText = 'Cliquez pour uploader une image';
                                             else if (this.id === 'video_path') defaultText = 'Cliquez pour uploader une vidéo';
                                             else if (this.id === 'pdf_path') defaultText = 'Cliquez pour uploader un PDF';
                                             textSpan.textContent = defaultText;
                                              // Rétablir la couleur du texte par défaut
                                             textSpan.classList.remove('text-white'); // Retirer la couleur de fichier
                                             textSpan.classList.add('text-gray-400'); // Remettre la couleur par défaut
                                         }
                                     }
                                     // Gérer la couleur de l'icône
                                      if (icon) {
                                         if (fileName) {
                                            icon.classList.remove('text-gray-400'); // Retirer la couleur par default
                                            icon.classList.add('text-green-400'); // Mettre une couleur de succès (ajustez la classe)
                                         } else {
                                            icon.classList.remove('text-green-400'); // Retirer la couleur de succès
                                            icon.classList.add('text-gray-400'); // Remettre la couleur par default
                                         }
                                      }
                                 }

                             });
                         });


                     });
                </script>

            </div>

        </div>
    </main>

</body>
</html>