<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Cours - EduQuest</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome CDN for icons (required by the sidebar and file inputs) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* Styles pour l'alerte (inchangés) */
        .alert-fade-leave-active { transition: opacity 0.5s ease; }
        .alert-fade-leave-to { opacity: 0; }
        /* Styles pour scrollbar (ajusté pour le thème sombre) */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #333; border-radius: 10px; } /* Ajusté pour thème sombre */
        ::-webkit-scrollbar-thumb { background: #555; border-radius: 10px; } /* Ajusté pour thème sombre */
        ::-webkit-scrollbar-thumb:hover { background: #777; } /* Ajusté pour thème sombre */
        /* Assurer que le conteneur d'image respecte l'aspect ratio (inchangé) */
        .aspect-w-16 { position: relative; padding-bottom: 56.25%; /* 16:9 */ }
        .aspect-w-16 > * { position: absolute; height: 100%; width: 100%; top: 0; right: 0; bottom: 0; left: 0; }
        /* Style pour formulaire caché (inchangé) */
         #addCourseForm.hidden { display: none; } /* Simple display none pour JS toggle */

        /* Custom gradient for the button from the "Create New Lesson" style */
        .btn-gradient {
            background-image: linear-gradient(to right, #8a2be2, #4b0082); /* Example purple/indigo gradient */
        }
        .btn-gradient:hover {
             background-image: linear-gradient(to right, #9333ea, #6d28d9); /* Slightly different hover state */
        }

        /* Fix Material Symbols icon alignment if needed (though likely not used) */
         .material-symbols-outlined, .material-icons {
            vertical-align: middle;
         }
    </style>
    
    
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
            
            <a href="{{ route('teacher.StatistiqueTeacher') }}" class="flex items-center space-x-3 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-150 ease-in-out
               {{ request()->routeIs('teacher.StatistiqueTeacher') ? 'bg-gray-700 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                <!-- Icône Statistiques (Font Awesome) -->
                <i class="fas fa-chart-simple text-lg"></i>
                <span>Statistiques</span>
            </a>

            
            <a href="{{ route('teacher.courses') }}" class="flex items-center space-x-3 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-150 ease-in-out
               {{ request()->routeIs('teacher.courses*') ? 'bg-gray-700 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                <!-- Icône Tous les cours (Font Awesome) -->
                 <i class="fas fa-book text-lg"></i>
                 <span>Tous les cours</span>
            </a>

            
             <a href="{{ route('categories.index') }}" class="flex items-center space-x-3 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-150 ease-in-out
               {{ request()->routeIs('categories.index') ? 'bg-gray-700 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                <!-- Icône Catégories (Font Awesome) -->
                 <i class="fas fa-tags text-lg"></i>
                 <span>Catégories</span>
            </a>
            

        </nav>

        <!-- Séparateur visuel avant le profil -->
        <div class="border-t border-gray-700 mt-auto pt-4 mx-4"></div>

        <!-- Section Profil Utilisateur -->
        <div class="px-4 pb-4 pt-2">
             
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

    <!-- CONTENU PRINCIPAL -->
    <!-- Assurez-vous que la marge à gauche (ml-64) correspond à la largeur de la sidebar -->
    <main class="ml-64 w-full p-6 md:p-8 lg:p-10">
        <div class="max-w-7xl mx-auto">

            
            

            <!-- Header Page (inchangé) -->
            <div class="flex flex-col md:flex-row items-start md:items-center justify-between mb-8">
                <h1 class="text-3xl font-bold text-gray-900 mb-4 md:mb-0">Mes Cours</h1>
                <button id="toggleFormBtn" class="inline-flex items-center justify-center px-5 py-2.5 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.75-11.25a.75.75 0 00-1.5 0v2.5h-2.5a.75.75 0 000 1.5h2.5v2.5a.75.75 0 001.5 0v-2.5h2.5a.75.75 0 000-1.5h-2.5v-2.5z" clip-rule="evenodd" /> </svg>
                    Ajouter un cours
                </button>
            </div>

            <!-- Formulaire Ajout Cours (Style sombre, champs d'origine, inputs file stylisés, 2 colonnes) -->
            
            <div id="addCourseForm" class="hidden w-full p-6 bg-gray-800 rounded-lg shadow-xl mb-8">

                 
                 @if ($errors->any() && old('_token'))
                    
                    <div class="mb-6 p-4 border border-red-600 bg-red-900 text-red-200 rounded-md">
                        <div class="flex items-center"><svg class="h-5 w-5 mr-3 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z" clip-rule="evenodd" /></svg><h3 class="text-sm font-semibold">Erreurs de Validation:</h3></div>
                        <ul class="mt-2 ml-8 list-disc text-sm space-y-1"> @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach </ul>
                    </div>
                 @endif

                
                <div class="text-center mb-6">
                    <h1 class="text-2xl font-bold text-white mb-2">Nouveau Cours</h1> 
                    <p class="text-gray-400 text-sm">Ajoutez un nouveau cours à votre liste</p> 
                </div>

                
                <form action="{{ route('teacher.courses.store') }}" method="POST" enctype="multipart/form-data"> 
                     @csrf

                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        
                        <div class="space-y-6">
                             <div class="mb-4 md:mb-0"> 
                                 <label for="title" class="block text-gray-400 text-sm font-medium text-center mb-2">
                                    Titre <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="title" name="title" value="{{ old('title') }}" required
                                       class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md text-white placeholder-gray-500 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('title') border-red-500 ring-1 ring-red-500 @enderror" placeholder="">
                                @error('title')<p class="mt-1 text-xs text-red-400">{{ $message }}</p>@enderror
                             </div>

                             <div class="mb-4 md:mb-0">
                                 <label for="description" class="block text-gray-400 text-sm font-medium text-center mb-2">
                                    Description <span class="text-red-500">*</span>
                                </label>
                                 <textarea id="description" name="description" rows="4" required
                                           class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md text-white placeholder-gray-500 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('description') border-red-500 ring-1 ring-red-500 @enderror" placeholder=""></textarea>
                                 @error('description')<p class="mt-1 text-xs text-red-400">{{ $message }}</p>@enderror
                             </div>

                             <div class="mb-4 md:mb-0 relative">
                                 <label for="level" class="block text-gray-400 text-sm font-medium text-center mb-2">
                                    Niveau <span class="text-red-500">*</span>
                                </label>
                                 <select name="level" id="level" required
                                         class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 appearance-none pr-8 @error('level') border-red-500 ring-1 ring-red-500 @enderror">
                                     <option value="">-- Choisir --</option>
                                     <option value="beginner" {{ old('level') == 'beginner' ? 'selected' : '' }}>Débutant</option>
                                     <option value="intermediate" {{ old('level') == 'intermediate' ? 'selected' : '' }}>Intermédiaire</option>
                                     <option value="advanced" {{ old('level') == 'advanced' ? 'selected' : '' }}>Avancé</option>
                                 </select>
                                  
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
                                     <option value="free" {{ old('type', 'free') == 'free' ? 'selected' : '' }}>Gratuit</option>
                                     <option value="paid" {{ old('type') == 'paid' ? 'selected' : '' }}>Payant</option>
                                 </select>
                                  
                                 <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-400 mt-3">
                                     <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                 </div>
                                 @error('type')<p class="mt-1 text-xs text-red-400">{{ $message }}</p>@enderror
                             </div>

                             
                             <div id="priceField" style="{{ old('type', 'free') == 'paid' ? '' : 'display: none;' }}">
                                 <label for="price" class="block text-gray-400 text-sm font-medium text-center mb-2">
                                    Prix (€) <span class="text-red-500">*</span>
                                </label>
                                 <input type="number" step="0.01" min="0" name="price" id="price" value="{{ old('price') }}"
                                        class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md text-white placeholder-gray-500 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('price') border-red-500 ring-1 ring-red-500 @enderror">
                                 @error('price')<p class="mt-1 text-xs text-red-400">{{ $message }}</p>@enderror
                             </div>

                             

                        </div>

                        
                        <div class="space-y-6">
                             
                             <div class="mb-4 md:mb-0 relative">
                                 <label for="category_id" class="block text-gray-400 text-sm font-medium text-center mb-2">
                                     Catégorie <span class="text-red-500">*</span>
                                 </label>
                                 <select name="category_id" id="category_id" required
                                         class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 appearance-none pr-8 @error('category_id') border-red-500 ring-1 ring-red-500 @enderror">
                                     <option value="">-- Choisir --</option>
                                      @isset($categories)
                                         @foreach ($categories as $category)
                                             <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                 {{ $category->name }}
                                             </option>
                                         @endforeach
                                     @else
                                         <option value="" disabled>Chargement...</option>
                                     @endisset
                                 </select>
                                  
                                 <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-400 mt-3">
                                     <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                 </div>
                                 @error('category_id')<p class="mt-1 text-xs text-red-400">{{ $message }}</p>@enderror
                             </div>

                             
                             <div class="mb-4 md:mb-0">
                                 <label for="image_path" class="block text-gray-400 text-sm font-medium text-center mb-2">
                                     Image du cours <span class="text-red-500">*</span>
                                 </label>
                                 
                                 <div class="w-full px-4 py-6 bg-gray-700 border border-gray-600 rounded-md text-gray-400 text-center cursor-pointer hover:bg-gray-600 transition-colors duration-200 @error('image_path') border-red-500 ring-1 ring-red-500 @enderror">
                                     
                                     <input type="file" id="image_path" name="image_path" accept="image/*" required class="hidden">
                                     
                                    <label for="image_path" class="flex flex-col items-center justify-center">
                                        
                                        <i class="fas fa-image w-8 h-8 mb-2 text-gray-400"></i>
                                        <span class="text-sm text-gray-400">Cliquez pour uploader une image</span>
                                    </label>
                                </div>
                                @error('image_path')<p class="mt-1 text-xs text-red-400">{{ $message }}</p>@enderror
                            </div>

                             
                             <div class="mb-4 md:mb-0">
                                <label for="video_path" class="block text-gray-400 text-sm font-medium text-center mb-2">
                                    Vidéo du cours (Optionnel)
                                </label>
                                 
                                <div class="w-full px-4 py-6 bg-gray-700 border border-gray-600 rounded-md text-gray-400 text-center cursor-pointer hover:bg-gray-600 transition-colors duration-200 @error('video_path') border-red-500 ring-1 ring-red-500 @enderror">
                                    
                                    <input type="file" id="video_path" name="video_path" accept="video/*" class="hidden">
                                    
                                    <label for="video_path" class="flex flex-col items-center justify-center">
                                        
                                        <i class="fas fa-video w-8 h-8 mb-2 text-gray-400"></i>
                                        <span class="text-sm text-gray-400">Cliquez pour uploader une vidéo</span>
                                    </label>
                                </div>
                                 @error('video_path')<p class="mt-1 text-xs text-red-400">{{ $message }}</p>@enderror
                            </div>

                            
                            <div> 
                                <label for="pdf_path" class="block text-gray-400 text-sm font-medium text-center mb-2">
                                    PDF (Optionnel)
                                </label>
                                 
                                <div class="w-full px-4 py-6 bg-gray-700 border border-gray-600 rounded-md text-gray-400 text-center cursor-pointer hover:bg-gray-600 transition-colors duration-200 @error('pdf_path') border-red-500 ring-1 ring-red-500 @enderror">
                                    
                                    <input type="file" id="pdf_path" name="pdf_path" accept=".pdf,application/pdf" class="hidden">
                                    
                                    <label for="pdf_path" class="flex flex-col items-center justify-center">
                                        
                                        <i class="fas fa-file-pdf w-8 h-8 mb-2 text-gray-400"></i>
                                        <span class="text-sm text-gray-400">Cliquez pour uploader un PDF</span>
                                    </label>
                                </div>
                                 @error('pdf_path')<p class="mt-1 text-xs text-red-400">{{ $message }}</p>@enderror
                            </div>

                        </div>

                    </div> 


                    
                    <div class="pt-5 border-t border-gray-700 mt-6 flex justify-end space-x-3">
                         
                         <button type="button" id="cancelFormBtn"
                                 class="bg-gray-700 py-2 px-4 border border-gray-600 rounded-md shadow-sm text-sm font-medium text-gray-300 hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                             Annuler
                         </button>
                        
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white btn-gradient focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Créer le Cours 
                        </button>
                    </div>
                </form>

                
                <script>
                     document.addEventListener('DOMContentLoaded', function () {
                         const typeSelect = document.getElementById('type');
                         const priceField = document.getElementById('priceField');
                         const priceInput = document.getElementById('price');

                         function togglePriceField() {
                             
                             if (!typeSelect) return;

                             const isPaid = typeSelect.value === 'paid';
                             if (priceField) { 
                                 priceField.style.display = isPaid ? 'block' : 'none';
                             }
                             if (priceInput) { 
                                 priceInput.required = isPaid;
                                 
                                 if (!isPaid) {
                                     priceInput.value = '';
                                 }
                             }


                             
                             const priceLabel = priceField?.querySelector('label'); 
                             if (priceLabel) {
                                 let requiredSpan = priceLabel.querySelector('span.text-red-500');
                                 if (isPaid) {
                                     if (!requiredSpan) { 
                                         requiredSpan = document.createElement('span');
                                         requiredSpan.className = 'text-red-500';
                                         requiredSpan.textContent = ' *';
                                         priceLabel.appendChild(requiredSpan);
                                     }
                                 } else {
                                     if (requiredSpan) { 
                                         requiredSpan.remove();
                                     }
                                 }
                             }
                         }
                         
                         if (typeSelect) {
                             typeSelect.addEventListener('change', togglePriceField);
                         }
                         
                         if (typeSelect && priceField && priceInput) {
                            togglePriceField();
                         }


                         
                         
                         const fileInputs = document.querySelectorAll('#addCourseForm input[type="file"].hidden');
                         fileInputs.forEach(input => {
                             input.addEventListener('change', function() {
                                 const fileName = this.files[0] ? this.files[0].name : ''; 
                                 
                                 const clickableDiv = this.closest('.w-full.bg-gray-700');
                                 if (!clickableDiv) return; 

                                 const label = clickableDiv.querySelector('label'); 
                                 if (label) {
                                     const textSpan = label.querySelector('span.text-sm'); 
                                     const icon = label.querySelector('i'); 
                                     if (textSpan) {
                                         if (fileName) {
                                             textSpan.textContent = fileName;
                                             
                                             textSpan.classList.remove('text-gray-400');
                                             textSpan.classList.add('text-white'); 
                                         } else {
                                             
                                             let defaultText = 'Cliquez pour uploader un fichier'; 
                                             if (this.id === 'image_path') defaultText = 'Cliquez pour uploader une image';
                                             else if (this.id === 'video_path') defaultText = 'Cliquez pour uploader une vidéo';
                                             else if (this.id === 'pdf_path') defaultText = 'Cliquez pour uploader un PDF';
                                             textSpan.textContent = defaultText;
                                              
                                             textSpan.classList.remove('text-white'); 
                                             textSpan.classList.add('text-gray-400'); 
                                         }
                                     }
                                     
                                      if (icon) {
                                         if (fileName) {
                                            icon.classList.remove('text-gray-400'); 
                                            icon.classList.add('text-green-400'); 
                                          } else {
                                            icon.classList.remove('text-green-400'); 
                                            icon.classList.add('text-gray-400'); 
                                         }
                                      }
                                 }

                             });
                         });


                     });
                </script>


            </div>

            <!-- Grille des Cours Existants (inchangée) -->
            <div class="bg-transparent">
                 
    @if ($courses->count() > 0)
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($courses as $course)
                
                <div class="bg-white rounded-xl shadow-lg overflow-hidden flex flex-col h-full group transform hover:-translate-y-1 transition-all duration-300 ease-out">

                    
                    <div class="h-48 relative bg-gradient-to-br from-blue-400 to-teal-400 rounded-t-xl flex items-center justify-center overflow-hidden">
                        @if(!$course->image_path)
                            <svg class="w-16 h-16 text-white z-10" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25A2.25 2.25 0 015.25 3h13.5A2.25 2.25 0 0121 5.25z" />
                            </svg>
                        @else
                            <img src="{{ Storage::url($course->image_path) }}" alt="Image pour {{ $course->title }}" class="w-full h-full object-cover">
                        @endif
                    </div>

                    
                    <div class="p-6 flex flex-col flex-grow">

                        
                        <div class="flex items-center space-x-2 mb-3">
                             @if($course->category)
                                <span class="inline-block px-3 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-700">
                                    {{ $course->category->name }}
                                </span>
                             @endif
                             <span class="inline-block px-3 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-700 capitalize">
                                 {{ $course->level }}
                             </span>
                        </div>

                        
                        <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-teal-600 transition-colors duration-200">
                           <a href="{{ route('teacher.courses.show', $course->id) }}" class="focus:outline-none focus:ring-2 focus:ring-teal-300 focus:ring-offset-2 rounded">
                               {{ $course->title }}
                           </a>
                        </h3>

                        
                        <p class="text-sm text-gray-600 mb-4 flex-grow">
                             {{ Str::limit($course->description, 140) }}
                        </p>

                        
                        <div class="mb-6">
                             <p class="text-lg font-bold text-gray-900">
                                @if($course->type == 'paid' && $course->price > 0)
                                    {{ number_format($course->price, 2) }} €
                                @else
                                    <span class="text-teal-600">Free</span>
                                @endif
                            </p>
                        </div>

                        
                        <div class="mt-auto flex items-center justify-between">

                            
                            <div class="flex items-center space-x-2">
                                
                                <a href="{{ route('teacher.courses.edit', $course->id) }}" title="Modifier le cours" class="p-2 rounded-full bg-purple-50 text-orange-500 hover:bg-purple-100 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-purple-300 focus:ring-offset-1">
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                      <path d="M2.695 14.763l-1.262 3.154a.5.5 0 00.65.65l3.155-1.262a4 4 0 001.343-.885L17.5 5.5a2.121 2.121 0 00-3-3L3.58 13.42a4 4 0 00-.885 1.343z" />
                                    </svg>
                                </a>

                                
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

                                        
                                        <a href="{{ route('teacher.courses.show', $course->id) }}"
                                           class="inline-flex items-center px-5 py-2 rounded-full bg-teal-500 text-white text-sm font-semibold hover:bg-teal-600 focus:outline-none focus:ring-2 focus:ring-teal-400 focus:ring-offset-2 transition-colors duration-200">
                                            En savoir plus
                                            <svg class="ml-1.5 w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                              <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                                            </svg>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                     <div class="text-center py-16 px-6 bg-white rounded-lg shadow-md border border-gray-200 col-span-full">
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
        
        document.addEventListener('DOMContentLoaded', function () {
            const toggleBtn = document.getElementById("toggleFormBtn");
            const addCourseForm = document.getElementById("addCourseForm"); 
            const cancelBtn = document.getElementById('cancelFormBtn'); 

            function showForm() {
                 if (addCourseForm) {
                     addCourseForm.style.display = 'block';
                     addCourseForm.scrollIntoView({ behavior: 'smooth', block: 'start' });
                 }
            }
            function hideForm() {
                 if (addCourseForm) {
                    addCourseForm.style.display = 'none';
                 }
            }

            if(toggleBtn) toggleBtn.addEventListener("click", () => {
                if (addCourseForm.style.display === 'none' || !addCourseForm.style.display || addCourseForm.style.display === '') {
                    showForm();
                } else {
                    hideForm();
                }
            });

            if(cancelBtn) cancelBtn.addEventListener("click", hideForm);

            
             @if ($errors->any() && old('_token'))
                 showForm();
             @endif
        });

        
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
                setTimeout(() => { closeAlert('success-alert'); }, 4000);
            }
        });
    </script>
    
    <script>
         document.addEventListener('DOMContentLoaded', function () {
             const typeSelect = document.getElementById('type');
             const priceField = document.getElementById('priceField');
             const priceInput = document.getElementById('price');

             function togglePriceField() {
                 
                 if (!typeSelect) return;

                 const isPaid = typeSelect.value === 'paid';
                 if (priceField) { 
                     priceField.style.display = isPaid ? 'block' : 'none';
                 }
                 if (priceInput) { 
                     priceInput.required = isPaid;
                     
                     if (!isPaid) {
                         priceInput.value = '';
                     }
                 }


                 
                 const priceLabel = priceField?.querySelector('label'); 
                 if (priceLabel) {
                     let requiredSpan = priceLabel.querySelector('span.text-red-500');
                     if (isPaid) {
                         if (!requiredSpan) { 
                             requiredSpan = document.createElement('span');
                             requiredSpan.className = 'text-red-500';
                             requiredSpan.textContent = ' *';
                             priceLabel.appendChild(requiredSpan);
                         }
                     } else {
                         if (requiredSpan) { 
                             requiredSpan.remove();
                         }
                     }
                 }
             }
             
             if (typeSelect) {
                 typeSelect.addEventListener('change', togglePriceField);
             }
             
             if (typeSelect && priceField && priceInput) {
                togglePriceField();
             }


             
             
             const fileInputs = document.querySelectorAll('#addCourseForm input[type="file"].hidden');
             fileInputs.forEach(input => {
                 input.addEventListener('change', function() {
                     const fileName = this.files[0] ? this.files[0].name : ''; 
                     
                     const clickableDiv = this.closest('.w-full.bg-gray-700');
                     if (!clickableDiv) return; 

                     const label = clickableDiv.querySelector('label'); 
                     if (label) {
                         const textSpan = label.querySelector('span.text-sm'); 
                         const icon = label.querySelector('i'); 
                         if (textSpan) {
                             if (fileName) {
                                 textSpan.textContent = fileName;
                                 
                                 textSpan.classList.remove('text-gray-400');
                                 textSpan.classList.add('text-white'); 
                             } else {
                                 
                                 let defaultText = 'Cliquez pour uploader un fichier'; 
                                 if (this.id === 'image_path') defaultText = 'Cliquez pour uploader une image';
                                 else if (this.id === 'video_path') defaultText = 'Cliquez pour uploader une vidéo';
                                 else if (this.id === 'pdf_path') defaultText = 'Cliquez pour uploader un PDF';
                                 textSpan.textContent = defaultText;
                                  
                                 textSpan.classList.remove('text-white'); 
                                 textSpan.classList.add('text-gray-400'); 
                             }
                         }
                         
                          if (icon) {
                             if (fileName) {
                                icon.classList.remove('text-gray-400'); 
                                icon.classList.add('text-green-400'); 
                           } else {
                                icon.classList.remove('text-green-400'); 
                                icon.classList.add('text-gray-400'); 
                            }
                          }

                     });
                 });
             });


    </script>


</body>
</html>