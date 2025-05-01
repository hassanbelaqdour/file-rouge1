<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gérer les Catégories - EduQuest</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        [x-cloak] { display: none !important; }
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; border-radius: 10px; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
    </style>
</head>
<body class="bg-gray-100 flex antialiased" x-data="{ isModalOpen: {{ $errors->has('name') && !old('_method') ? 'true' : 'false' }} }">

    {{-- Sidebar (Identique) --}}
    <aside class="w-64 h-screen bg-white shadow-md fixed top-0 left-0 border-r border-gray-200 z-20 flex flex-col">
        <div class="p-5 border-b border-gray-200 flex items-center space-x-2">
            <svg class="w-8 h-8 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" /> </svg>
            <h1 class="text-xl font-bold text-gray-800">EduQuest</h1>
        </div>
        <nav class="flex-grow p-4 space-y-2 overflow-y-auto">
             <a href="{{ route('teacher.StatistiqueTeacher') }}" class="flex items-center px-3 py-2.5 rounded-md text-sm font-medium transition-colors duration-150 ease-in-out {{ request()->routeIs('teacher.StatistiqueTeacher') ? 'bg-blue-50 text-blue-700' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}"> <svg class="w-5 h-5 mr-3 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75c0 .621-.504 1.125-1.125 1.125h-2.25A1.125 1.125 0 013 21v-7.875zM12.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v12.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM21 4.125c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v17.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" /></svg> Statistiques </a>
             <a href="{{ route('teacher.courses') }}" class="flex items-center px-3 py-2.5 rounded-md text-sm font-medium transition-colors duration-150 ease-in-out {{ request()->routeIs('teacher.courses') ? 'bg-blue-50 text-blue-700' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}"> <svg class="w-5 h-5 mr-3 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"> <path d="M12 18.75a6 6 0 006-6v-1.5m-6 7.5a6 6 0 01-6-6v-1.5m6 7.5v3.75m-3.75 0h7.5M12 15.75a3 3 0 01-3-3V4.5a3 3 0 116 0v8.25a3 3 0 01-3 3z" /></svg> Tous les cours </a>
             <a href="{{ route('categories.index') }}" class="flex items-center px-3 py-2.5 rounded-md text-sm font-medium transition-colors duration-150 ease-in-out {{ request()->routeIs('categories.index') ? 'bg-blue-50 text-blue-700' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}"> <svg class="w-5 h-5 mr-3 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" > <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z" /> <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6z" /> </svg> Catégories </a>
        </nav>
        <div class="p-4 mt-auto border-t border-gray-200">
             <form action="{{ route('logout') }}" method="POST"> @csrf <button type="submit" class="w-full flex items-center justify-center text-sm font-medium text-red-600 bg-red-50 hover:bg-red-100 px-3 py-2.5 rounded-md group"> <svg class="w-5 h-5 mr-2 text-red-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" /> </svg> Déconnexion </button> </form>
        </div>
    </aside>

    {{-- Contenu Principal --}}
    <main class="ml-64 w-full p-6 md:p-8 lg:p-10">
        <div class="max-w-5xl mx-auto">

            {{-- Header de la page (Identique) --}}
            <div class="flex items-center justify-between mb-8">
                <h1 class="text-3xl font-bold text-gray-900">Gestion des Catégories</h1>
                <button @click="isModalOpen = true" type="button" class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"> <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" /> </svg>
                    Ajouter une catégorie
                </button>
            </div>

             {{-- Messages flash (Identique) --}}
             @if (session('success'))
                 <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show" x-transition.opacity.duration.500ms class="mb-4 p-4 border border-green-300 bg-green-50 text-green-700 rounded-md"> <p class="text-sm font-medium">{{ session('success') }}</p> </div>
             @endif
             @error('delete_error')
                 <div class="mb-4 p-4 border border-red-300 bg-red-50 text-red-700 rounded-md"> <p class="text-sm font-medium">{{ $message }}</p> </div>
             @enderror
             @error('name')
                @if(old('_method') === 'PUT')
                    <div class="mb-4 p-4 border border-red-300 bg-red-50 text-red-700 rounded-md"> <p class="text-sm font-medium">{{ $message }}</p> </div>
                @endif
             @enderror

            {{-- GRILLE DES CATÉGORIES EXISTANTES --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                 @isset($categories)
                    @forelse ($categories as $category)
                        {{-- Suppression de isDropdownOpen dans x-data --}}
                        <div x-data="{
                                isEditing: {{ $errors->has('name') && old('_token') && session('edit_category_id') == $category->id ? 'true' : 'false' }},
                                editName: '{{ addslashes(old('name', $category->name)) }}'
                             }"
                             class="bg-white border border-gray-200 rounded-lg shadow-sm p-5 flex flex-col relative hover:shadow-md transition-shadow duration-200">

                            {{-- SUPPRESSION du dropdown menu et du bouton 3 points --}}

                            {{-- Affichage Titre OU Formulaire d'édition --}}
                            <div class="mb-1">
                                <h2 x-show="!isEditing"
                                    class="text-lg font-semibold text-gray-800">
                                    {{ $category->name }}
                                </h2>
                                <form x-show="isEditing" x-cloak method="POST" action="{{ route('categories.update', $category->id) }}" @submit.prevent="$el.submit()" @keydown.escape.window="isEditing = false; editName = '{{ addslashes($category->name) }}'" class="mt-1">
                                    @csrf @method('PUT')
                                    <label for="edit-name-{{ $category->id }}" class="sr-only">Modifier le nom</label>
                                    <div class="flex items-center space-x-2">
                                        <input type="text" name="name" id="edit-name-{{ $category->id }}" x-ref="editInput{{ $category->id }}" x-model="editName" required class="block w-full shadow-sm sm:text-sm rounded-md border-gray-300 focus:ring-blue-500 focus:border-blue-500 py-1 px-2 flex-grow @error('name') {{ session('edit_category_id') == $category->id ? 'border-red-500 ring-red-500 focus:ring-red-500 focus:border-red-500' : 'border-gray-300' }} @enderror">
                                        <button type="button" @click="isEditing = false; editName = '{{ addslashes($category->name) }}'" class="p-1 text-gray-500 hover:text-gray-700 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-400" title="Annuler"> <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /> </svg> </button>
                                        <button type="submit" class="p-1 text-blue-600 hover:text-blue-800 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" title="Enregistrer"> <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" /> </svg> </button>
                                    </div>
                                     @error('name')
                                        @if(session('edit_category_id') == $category->id) <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @endif
                                     @enderror
                                </form>
                            </div>

                            {{-- Date de création --}}
                            <p class="text-sm text-gray-600 mb-4">
                                Créé le : {{ $category->created_at->format('d/m/Y') }}
                            </p>

                            {{-- MODIFICATION: Ligne inférieure avec Créateur et Icônes Edit/Delete --}}
                            <div class="mt-auto flex items-center justify-between text-xs text-gray-500">
                                {{-- Affichage du nom du créateur (à gauche) --}}
                                <span class="inline-flex items-center" title="ID Créateur: {{ $category->creator->id ?? 'N/A' }}">
                                    <svg class="mr-1 w-3 h-3 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-5.5-2.5a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0zM10 12a5.99 5.99 0 00-4.793 2.39A6.483 6.483 0 0010 16.5a6.483 6.483 0 004.793-2.11A5.99 5.99 0 0010 12z" clip-rule="evenodd" /> </svg>
                                    @if($category->creator)
                                        {{ $category->creator->name }}
                                    @else
                                        <span class="italic">Créateur inconnu</span>
                                    @endif
                                </span>

                                {{-- Conteneur pour les icônes d'action (à droite) --}}
                                <div class="flex items-center space-x-2">
                                    {{-- Icône Modifier (visible si PAS en édition) --}}
                                    <button x-show="!isEditing"
                                            @click.prevent="isEditing = true; $nextTick(() => $refs.editInput{{ $category->id }}.focus())"
                                            type="button"
                                            class="p-1 text-blue-600 hover:bg-blue-100 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" title="Modifier">
                                        <span class="sr-only">Modifier</span>
                                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" /> </svg>
                                    </button>

                                    {{-- Icône Supprimer (Formulaire, visible si PAS en édition) --}}
                                    <form x-show="!isEditing"
                                          method="POST" action="{{ route('categories.destroy', $category->id) }}"
                                          onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer la catégorie \'{{ addslashes($category->name) }}\' ?\nCette action ne peut pas être annulée.')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="p-1 text-red-600 hover:bg-red-100 rounded-md focus:outline-none focus:ring-2 focus:ring-red-400" title="Supprimer">
                                            <span class="sr-only">Supprimer</span>
                                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" /> </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-center text-gray-500 py-6 px-4 col-span-full">Aucune catégorie n'a été ajoutée.</p>
                    @endforelse
                 @else
                    <p class="text-center text-gray-500 py-6 px-4 col-span-full">Chargement des catégories...</p>
                 @endisset

            </div> {{-- Fin de la grille --}}
        </div> {{-- Fin max-w --}}
    </main>

    {{-- Modal d'ajout de catégorie (Identique) --}}
    <div x-show="isModalOpen" x-cloak @keydown.escape.window="isModalOpen = false" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 p-4" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div @click.outside="isModalOpen = false" x-show="isModalOpen" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-95" x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-95" class="bg-white rounded-lg shadow-xl w-full max-w-md p-6 relative">
            <div class="flex justify-between items-center mb-6">
                <h2 id="modal-title" class="text-xl font-semibold text-gray-900">Ajouter une catégorie</h2>
                <button @click="isModalOpen = false" type="button" class="p-1 text-gray-400 hover:text-gray-600 rounded-full focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2">
                    <span class="sr-only">Fermer</span>
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /> </svg>
                </button>
            </div>
            <form action="{{ route('categories.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="modal-category-name" class="block text-sm font-medium text-gray-700 mb-1">Nom de la catégorie</label>
                    <input type="text" name="name" id="modal-category-name" value="{{ old('name') }}" required
                           class="block w-full shadow-sm sm:text-sm rounded-md border-gray-300 focus:ring-blue-500 focus:border-blue-500 @error('name') {{ !old('_method') ? 'border-red-500 ring-red-500' : 'border-gray-300' }} @enderror"
                           placeholder="Ex: Mathématiques">
                      @error('name')
                        @if(!old('_method')) <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @endif
                      @enderror
                </div>
                <div class="pt-4 flex justify-end">
                    <button type="submit" class="inline-flex items-center justify-center px-5 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Valider
                    </button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>