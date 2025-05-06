<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Cours - EduQuest</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome CDN for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* Styles pour l'alerte (inchangés) */
        .alert-fade-leave-active { transition: opacity 0.5s ease; }
        .alert-fade-leave-to { opacity: 0; }
        /* Styles pour scrollbar (peut-être ajuster pour le thème sombre) */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #333; border-radius: 10px; } /* Ajusté pour thème sombre */
        ::-webkit-scrollbar-thumb { background: #555; border-radius: 10px; } /* Ajusté pour thème sombre */
        ::-webkit-scrollbar-thumb:hover { background: #777; } /* Ajusté pour thème sombre */
        /* Assurer que le conteneur d'image respecte l'aspect ratio (inchangé) */
        .aspect-w-16 { position: relative; padding-bottom: 56.25%; /* 16:9 */ }
        .aspect-w-16 > * { position: absolute; height: 100%; width: 100%; top: 0; right: 0; bottom: 0; left: 0; }
        /* Style pour formulaire caché (inchangé) */
         #addCourseForm.hidden { display: none; } /* Simple display none pour JS toggle */
    </style>
    {{-- AlpineJS n'est pas strictement nécessaire pour cette page si on utilise JS standard --}}
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
               {{ request()->routeIs('teacher.courses') ? 'bg-gray-700 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
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
    <!-- Assurez-vous que la marge à gauche (ml-64) correspond à la largeur de la sidebar -->
    <main class="ml-64 w-full p-6 md:p-8 lg:p-10">
        <div class="max-w-7xl mx-auto">

            {{-- Alerte Succès --}}
            @if (session('success'))
            <div id="success-alert" x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show" x-transition.opacity.duration.500ms class="fixed top-5 right-5 z-50 rounded-md bg-green-50 p-4 shadow-lg border border-green-200" role="alert">
                <div class="flex items-start">
                    <div class="flex-shrink-0"><svg class="h-6 w-6 text-green-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg></div>
                    <div class="ml-3 w-0 flex-1 pt-0.5"><p class="text-sm font-medium text-green-800">Réussi!</p><p class="mt-1 text-sm text-green-700">{{ session('success') }}</p></div>
                    <div class="ml-4 flex flex-shrink-0"><button type="button" @click="show = false" onclick="closeAlert('success-alert')" class="inline-flex rounded-md bg-green-50 p-1.5 text-green-500 hover:bg-green-100 focus:outline-none focus:ring-2 focus:ring-green-600 focus:ring-offset-2 focus:ring-offset-green-50"><span class="sr-only">Fermer</span><svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" /></svg></button></div>
                </div>
            </div>
            @endif

            <!-- Header Page -->
            <div class="flex flex-col md:flex-row items-start md:items-center justify-between mb-8">
                <h1 class="text-3xl font-bold text-gray-900 mb-4 md:mb-0">Mes Cours</h1>
                <button id="toggleFormBtn" class="inline-flex items-center justify-center px-5 py-2.5 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.75-11.25a.75.75 0 00-1.5 0v2.5h-2.5a.75.75 0 000 1.5h2.5v2.5a.75.75 0 001.5 0v-2.5h2.5a.75.75 0 000-1.5h-2.5v-2.5z" clip-rule="evenodd" /> </svg>
                    Ajouter un cours
                </button>
            </div>

            <!-- Formulaire Ajout Cours (Caché initialement) -->
            <div id="addCourseForm" class="hidden bg-white shadow-lg rounded-lg p-6 md:p-8 mb-8 border border-gray-200">
                 <h2 class="text-xl font-semibold text-gray-800 mb-6 border-b pb-3">Nouveau Cours</h2>
                 {{-- Boîte Erreurs Validation --}}
                 @if ($errors->any() && old('_token')) {{-- Ajouté condition pour ne montrer les erreurs qu'après soumission du formulaire --}}
                    <div class="mb-6 p-4 border border-red-300 bg-red-50 text-red-700 rounded-md">
                        <div class="flex items-center"><svg class="h-5 w-5 mr-3 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z" clip-rule="evenodd" /></svg><h3 class="text-sm font-semibold">Erreurs:</h3></div>
                        <ul class="mt-2 ml-8 list-disc text-sm space-y-1"> @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach </ul>
                    </div>
                 @endif
                 {{-- Le formulaire lui-même --}}
                 <form action="{{ route('teacher.courses.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                     @csrf
                     <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-6">
                         {{-- Colonne 1 --}}
                         <div class="space-y-6">
                             <div> <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Titre <span class="text-red-500">*</span></label> <input type="text" name="title" id="title" value="{{ old('title') }}" required class="block w-full shadow-sm sm:text-sm rounded-md border-gray-300 focus:ring-blue-500 focus:border-blue-500 @error('title') border-red-500 @enderror"> @error('title')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror </div>
                             <div> <label for="level" class="block text-sm font-medium text-gray-700 mb-1">Niveau <span class="text-red-500">*</span></label> <select name="level" id="level" required class="block w-full shadow-sm sm:text-sm rounded-md border-gray-300 focus:ring-blue-500 focus:border-blue-500 @error('level') border-red-500 @enderror"> <option value="beginner" {{ old('level') == 'beginner' ? 'selected' : '' }}>Débutant</option> <option value="intermediate" {{ old('level') == 'intermediate' ? 'selected' : '' }}>Intermédiaire</option> <option value="advanced" {{ old('level') == 'advanced' ? 'selected' : '' }}>Avancé</option> </select> @error('level')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror </div>
                             <div> <label for="type" class="block text-sm font-medium text-gray-700 mb-1">Type <span class="text-red-500">*</span></label> <select name="type" id="type" required class="block w-full shadow-sm sm:text-sm rounded-md border-gray-300 focus:ring-blue-500 focus:border-blue-500 @error('type') border-red-500 @enderror"> <option value="free" {{ old('type', 'free') == 'free' ? 'selected' : '' }}>Gratuit</option> <option value="paid" {{ old('type') == 'paid' ? 'selected' : '' }}>Payant</option> </select> @error('type')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror </div>
                             <div id="priceField" style="{{ old('type', 'free') == 'paid' ? '' : 'display: none;' }}"> <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Prix (€) <span class="text-red-500">*</span></label> <input type="number" step="0.01" min="0" name="price" id="price" value="{{ old('price') }}" class="block w-full shadow-sm sm:text-sm rounded-md border-gray-300 focus:ring-blue-500 focus:border-blue-500 @error('price') border-red-500 @enderror"> @error('price')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror </div>
                             <div> <label for="video_path" class="block text-sm font-medium text-gray-700 mb-1">Vidéo (Optionnel)</label> <input type="file" name="video_path" id="video_path" accept="video/*" class="block w-full text-sm text-gray-500 border border-gray-300 rounded-md cursor-pointer bg-gray-50 focus:outline-none file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 @error('video_path') border-red-500 @enderror"> @error('video_path')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror </div>
                         </div>
                         {{-- Colonne 2 --}}
                         <div class="space-y-6">
                             <div> <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description <span class="text-red-500">*</span></label> <textarea name="description" id="description" rows="4" required class="block w-full shadow-sm sm:text-sm rounded-md border-gray-300 focus:ring-blue-500 focus:border-blue-500 @error('description') border-red-500 @enderror">{{ old('description') }}</textarea> @error('description')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror </div>
                             <div> <label for="category_id" class="block text-sm font-medium text-gray-700 mb-1">Catégorie <span class="text-red-500">*</span></label> <select name="category_id" id="category_id" required class="block w-full shadow-sm sm:text-sm rounded-md border-gray-300 focus:ring-blue-500 focus:border-blue-500 @error('category_id') border-red-500 @enderror"> <option value="">-- Choisir --</option> @isset($categories) @foreach ($categories as $category) <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}> {{ $category->name }} </option> @endforeach @else <option value="" disabled>Chargement...</option> @endisset </select> @error('category_id')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror </div>
                             <div> <label for="image_path" class="block text-sm font-medium text-gray-700 mb-1">Image <span class="text-red-500">*</span></label> <input type="file" name="image_path" id="image_path" required accept="image/*" class="block w-full text-sm text-gray-500 border border-gray-300 rounded-md cursor-pointer bg-gray-50 focus:outline-none file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 @error('image_path') border-red-500 @enderror"> @error('image_path')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror </div>
                             <div> <label for="pdf_path" class="block text-sm font-medium text-gray-700 mb-1">PDF (Optionnel)</label> <input type="file" name="pdf_path" id="pdf_path" accept=".pdf,application/pdf" class="block w-full text-sm text-gray-500 border border-gray-300 rounded-md cursor-pointer bg-gray-50 focus:outline-none file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 @error('pdf_path') border-red-500 @enderror"> @error('pdf_path')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror </div>
                         </div>
                     </div>
                     {{-- Actions Formulaire --}}
                     <div class="pt-5 border-t"><div class="flex justify-end space-x-3"> <button type="button" id="cancelFormBtn" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50">Annuler</button> <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700">Enregistrer le cours</button> </div></div>
                 </form>
                 {{-- Script prix conditionnel --}}
                 <script> document.addEventListener('DOMContentLoaded', function () { const typeSelect=document.getElementById('type'), priceField=document.getElementById('priceField'), priceInput=document.getElementById('price'); function t(){priceField.style.display=typeSelect.value==='paid'?'block':'none'; priceInput.required=typeSelect.value==='paid'; if(typeSelect.value!=='paid')priceInput.value=''} typeSelect.addEventListener('change',t); t(); }); </script>
            </div>

            <!-- =============================================== -->
            <!--            GRILLE DES COURS EXISTANTS          -->
            <!-- =============================================== -->
            <div class="bg-transparent">
    @if ($courses->count() > 0)
        {{-- Grille (ajustez les colonnes selon vos besoins, ex: lg:grid-cols-3) --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($courses as $course)
                {{-- Carte de cours --}}
                <div class="bg-white rounded-xl shadow-lg overflow-hidden flex flex-col h-full group transform hover:-translate-y-1 transition-all duration-300 ease-out">

                    {{-- Section Image/Placeholder --}}
                    <div class="h-48 relative bg-gradient-to-br from-blue-400 to-teal-400 rounded-t-xl flex items-center justify-center overflow-hidden">
                        {{-- Placeholder avec icône (si pas d'image de cours) --}}
                        @if(!$course->image_path)
                            {{-- Effet vague subtil (optionnel, nécessite potentiellement plus de CSS ou SVG) --}}
                            {{-- <div class="absolute inset-0 opacity-20 bg-[url('wave_pattern.svg')] bg-cover"></div> --}}
                            <svg class="w-16 h-16 text-white z-10" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25A2.25 2.25 0 015.25 3h13.5A2.25 2.25 0 0121 5.25z" />
                            </svg>
                        @else
                            {{-- Image réelle du cours --}}
                            <img src="{{ Storage::url($course->image_path) }}" alt="Image pour {{ $course->title }}" class="w-full h-full object-cover">
                        @endif
                    </div>

                    {{-- Section Contenu --}}
                    <div class="p-6 flex flex-col flex-grow">

                        {{-- Badges Catégorie / Niveau --}}
                        <div class="flex items-center space-x-2 mb-3">
                             @if($course->category)
                                {{-- Catégorie (style inspiré de l'image) --}}
                                <span class="inline-block px-3 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-700">
                                    {{ $course->category->name }}
                                </span>
                             @endif
                             {{-- Niveau (style inspiré de l'image) --}}
                             <span class="inline-block px-3 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-700 capitalize">
                                 {{ $course->level }} {{-- Assurez-vous que $course->level contient 'Débutant', 'Intermédiaire', etc. --}}
                             </span>
                        </div>

                        {{-- Titre du cours --}}
                        <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-teal-600 transition-colors duration-200">
                           <a href="{{ route('teacher.courses.show', $course->id) }}" class="focus:outline-none focus:ring-2 focus:ring-teal-300 focus:ring-offset-2 rounded">
                               {{ $course->title }}
                           </a>
                        </h3>

                        {{-- Description du cours --}}
                        <p class="text-sm text-gray-600 mb-4 flex-grow">
                             {{ Str::limit($course->description, 140) }} {{-- Ajustez la limite de caractères si besoin --}}
                        </p>

                        {{-- Prix du cours --}}
                        <div class="mb-6">
                             <p class="text-lg font-bold text-gray-900">
                                @if($course->type == 'paid' && $course->price > 0)
                                    {{ number_format($course->price, 2) }} €
                                @else
                                    <span class="text-teal-600">Free</span> {{-- Ou Gratuit --}}
                                @endif
                            </p>
                        </div>

                        {{-- Section Actions (Pied de carte) --}}
                        <div class="mt-auto flex items-center justify-between"> {{-- mt-auto pousse ce div vers le bas --}}

                            {{-- Icônes Modifier / Supprimer (style inspiré de l'image) --}}
                            <div class="flex items-center space-x-2">
                                {{-- Bouton Modifier (Icône) --}}
                                <a href="{{ route('teacher.courses.edit', $course->id) }}" title="Modifier le cours" class="p-2 rounded-full bg-purple-50 text-orange-500 hover:bg-purple-100 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-purple-300 focus:ring-offset-1">
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                      <path d="M2.695 14.763l-1.262 3.154a.5.5 0 00.65.65l3.155-1.262a4 4 0 001.343-.885L17.5 5.5a2.121 2.121 0 00-3-3L3.58 13.42a4 4 0 00-.885 1.343z" />
                                    </svg>
                                </a>

                                {{-- Bouton Supprimer (Icône) --}}
                                <form method="POST" action="{{ route('teacher.courses.destroy', $course->id) }}" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer le cours \'{{ addslashes($course->title) }}\' ?')" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" title="Supprimer le cours" class="p-2 rounded-full bg-red-50 text-gray-500 hover:bg-red-100 hover:text-red-600 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-red-300 focus:ring-offset-1">
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                          <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>
                                    </button>
                                </form>
                            </div>

                            {{-- Bouton "En savoir plus" (style inspiré de l'image) --}}
                            <a href="{{ route('teacher.courses.show', $course->id) }}"
                               class="inline-flex items-center px-5 py-2 rounded-full bg-teal-500 text-white text-sm font-semibold hover:bg-teal-600 focus:outline-none focus:ring-2 focus:ring-teal-400 focus:ring-offset-2 transition-colors duration-200">
                                En savoir plus
                                {{-- Icône Plus pour "En savoir plus" (pourrait être une flèche aussi) --}}
                                <svg class="ml-1.5 w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                  <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                                </svg>
                            </a>

                        </div>
                    </div> {{-- Fin p-6 --}}
                </div> {{-- Fin Carte --}}
            @endforeach
        </div> {{-- Fin Grille --}}
    @else
         {{-- État vide --}}
         <div class="text-center py-16 px-6 bg-white rounded-lg shadow-md border border-gray-200 col-span-full"> {{-- col-span-full pour prendre toute la largeur si la grille est définie --}}
            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
            </svg>
            <h3 class="mt-2 text-sm font-medium text-gray-900">Aucun cours trouvé</h3>
            <p class="mt-1 text-sm text-gray-500">Commencez par ajouter un nouveau cours.</p>
         </div>
    @endif
</div>

        </div>
    </main>


    <script>
        // Script pour la gestion du formulaire (inchangé)
        document.addEventListener('DOMContentLoaded', function () {
            const toggleBtn = document.getElementById("toggleFormBtn");
            // emptyStateAddBtn n'est pas dans la version actuelle du code fourni, commenté si besoin
            // const emptyStateBtn = document.getElementById("emptyStateAddBtn"); 
            const addCourseForm = document.getElementById("addCourseForm");
            const cancelBtn = document.getElementById('cancelFormBtn');

            function showForm() {
                 if (addCourseForm) {
                     addCourseForm.style.display = 'block';
                     // Fait défiler vers le formulaire pour une meilleure UX
                     addCourseForm.scrollIntoView({ behavior: 'smooth', block: 'start' });
                 }
            }
            function hideForm() {
                 if (addCourseForm) {
                    addCourseForm.style.display = 'none';
                 }
            }

            if(toggleBtn) toggleBtn.addEventListener("click", () => {
                if (addCourseForm.style.display === 'none' || !addCourseForm.style.display || addCourseForm.style.display === '') { // Ajout de '' pour gérer l'état initial
                    showForm();
                } else {
                    hideForm();
                }
            });
            // if(emptyStateBtn) emptyStateBtn.addEventListener("click", showForm); // Commenté car emptyStateAddBtn non trouvé
            if(cancelBtn) cancelBtn.addEventListener("click", hideForm);

            // Montre le formulaire si validation échoue après soumission
             @if ($errors->any() && old('_token'))
                 showForm();
             @endif
        });

        // Script pour les alertes (inchangé)
        function closeAlert(alertId) {
            const alertBox = document.getElementById(alertId);
            if (alertBox) {
                alertBox.style.opacity = '0';
                setTimeout(() => {
                    if (alertBox.parentNode) { alertBox.parentNode.removeChild(alertBox); }
                }, 500);
            }
        }
        document.addEventListener('DOMContentLoaded', function() {
            const successAlert = document.getElementById('success-alert');
            if (successAlert) {
                // Utilise la fonction closeAlert pour déclencher la transition et la suppression
                setTimeout(() => { closeAlert('success-alert'); }, 4000);
            }
        });
    </script>
    {{-- Script conditionnel pour le prix (inchangé) --}}
    <script> document.addEventListener('DOMContentLoaded', function () { const typeSelect=document.getElementById('type'), priceField=document.getElementById('priceField'), priceInput=document.getElementById('price'); function t(){priceField.style.display=typeSelect.value==='paid'?'block':'none'; priceInput.required=typeSelect.value==='paid'; if(typeSelect.value!=='paid')priceInput.value=''} typeSelect.addEventListener('change',t); t(); }); </script>


</body>
</html>