<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gérer les Catégories - EduQuest</title>
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- Alpine JS pour l'interactivité --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        /* Style pour cacher/montrer le formulaire d'ajout avec une transition */
        .add-form-container.hidden { max-height: 0; opacity: 0; padding-top: 0; padding-bottom: 0; margin-bottom: 0; overflow: hidden; transition: all 0.3s ease-out; pointer-events: none; }
        .add-form-container { max-height: 500px; opacity: 1; transition: all 0.5s ease-in; }
        /* Style pour les boutons d'action dans la liste */
        .category-row:hover .action-buttons { opacity: 1; }
        .action-buttons { opacity: 0; transition: opacity 0.15s ease-in-out; }
        .category-row:hover { background-color: #f9fafb; } /* bg-gray-50 */
        [x-cloak] { display: none !important; } /* Masquer avant initialisation Alpine */
    </style>
</head>
<body class="bg-gray-100 flex antialiased">

    {{-- ================================================================ --}}
    {{-- |                          SIDEBAR                             | --}}
    {{-- ================================================================ --}}
    <aside class="w-64 h-screen bg-white shadow-md fixed top-0 left-0 border-r border-gray-200 z-20 flex flex-col">
        <div class="p-5 border-b border-gray-200 flex items-center space-x-2">
            <svg class="w-8 h-8 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" /> </svg>
            <h1 class="text-xl font-bold text-gray-800">EduQuest</h1>
        </div>
        <nav class="flex-grow p-4 space-y-2 overflow-y-auto">
            {{-- Liens de navigation - Utilisez request()->routeIs pour la simplicité --}}
            <a href="{{ route('teacher.StatistiqueTeacher') }}" class="flex items-center px-3 py-2.5 rounded-md text-sm font-medium transition-colors duration-150 ease-in-out {{ request()->routeIs('teacher.StatistiqueTeacher') ? 'bg-blue-50 text-blue-700' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}">
                <svg class="w-5 h-5 mr-3 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75c0 .621-.504 1.125-1.125 1.125h-2.25A1.125 1.125 0 013 21v-7.875zM12.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v12.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM21 4.125c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v17.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" /></svg>
                Statistiques
            </a>
            <a href="{{ route('teacher.courses') }}" class="flex items-center px-3 py-2.5 rounded-md text-sm font-medium transition-colors duration-150 ease-in-out {{ request()->routeIs('teacher.courses') ? 'bg-blue-50 text-blue-700' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}">
                 <svg class="w-5 h-5 mr-3 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"> <path d="M12 18.75a6 6 0 006-6v-1.5m-6 7.5a6 6 0 01-6-6v-1.5m6 7.5v3.75m-3.75 0h7.5M12 15.75a3 3 0 01-3-3V4.5a3 3 0 116 0v8.25a3 3 0 01-3 3z" /></svg>
                Tous les cours
            </a>
             {{-- Lien vers cette page de gestion des catégories --}}
             <a href="{{ route('categories.index') }}" class="flex items-center px-3 py-2.5 rounded-md text-sm font-medium transition-colors duration-150 ease-in-out {{ request()->routeIs('categories.index') ? 'bg-blue-50 text-blue-700' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}">
                <svg class="w-5 h-5 mr-3 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" > <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z" /> <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6z" /> </svg>
                Catégories
            </a>
        </nav>
        <div class="p-4 mt-auto border-t border-gray-200">
             <form action="{{ route('logout') }}" method="POST"> @csrf
                <button type="submit" class="w-full flex items-center justify-center text-sm font-medium text-red-600 bg-red-50 hover:bg-red-100 px-3 py-2.5 rounded-md transition-colors duration-150 ease-in-out group">
                    <svg class="w-5 h-5 mr-2 text-red-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" /> </svg>
                    Déconnexion
                </button>
             </form>
        </div>
    </aside>
    {{-- ================================================================ --}}

    <!-- CONTENU PRINCIPAL -->
    {{-- Initialise Alpine : showAddForm est true si le formulaire d'ajout a des erreurs --}}
    <main class="ml-64 w-full p-6 md:p-8 lg:p-10" x-data="{ showAddForm: {{ $errors->any() ? 'true' : 'false' }} }">
        <div class="max-w-4xl mx-auto">

            <!-- HEADER -->
            <div class="flex items-center justify-between mb-6">
                <h1 class="text-2xl font-bold text-gray-900">Gestion des Catégories</h1>
                <button @click="showAddForm = !showAddForm" type="button" class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"> <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" /> </svg>
                    <span x-text="showAddForm ? 'Masquer Formulaire' : 'Ajouter Catégorie'"></span>
                </button>
            </div>

             {{-- Messages Flash (Succès / Erreur de suppression) --}}
             @if (session('success'))
                 <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show" x-transition.opacity.duration.500ms
                      class="mb-4 p-4 border border-green-300 bg-green-50 text-green-700 rounded-md" role="alert">
                     <p class="text-sm font-medium">{{ session('success') }}</p>
                 </div>
             @endif
             @error('delete_error')
                 <div class="mb-4 p-4 border border-red-300 bg-red-50 text-red-700 rounded-md" role="alert">
                    <p class="text-sm font-medium">{{ $message }}</p>
                 </div>
             @enderror

            <!-- FORMULAIRE D'AJOUT (contrôlé par Alpine.js) -->
            {{-- La classe 'hidden' est gérée par x-show, mais on l'ajoute au cas où JS est désactivé initialement --}}
            {{-- On force l'affichage s'il y a des erreurs via la condition dans x-data --}}
            <div x-show="showAddForm" class="add-form-container {{ $errors->any() ? '' : 'hidden' }} bg-white shadow rounded-lg p-6 mb-6 border border-gray-200" x-cloak>
                 <h2 class="text-lg font-semibold text-gray-700 mb-4">Ajouter une nouvelle catégorie</h2>
                 <form id="add-category-form" action="{{ route('categories.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label for="add-name" class="block text-sm font-medium text-gray-700 mb-1">Nom <span class="text-red-500">*</span></label>
                        <input type="text" name="name" id="add-name" value="{{ old('name') }}" required
                               class="block w-full shadow-sm sm:text-sm rounded-md border-gray-300 focus:ring-blue-500 focus:border-blue-500 @error('name') border-red-500 ring-1 ring-red-500 @enderror"
                               placeholder="Nom de la nouvelle catégorie...">
                        {{-- Affiche l'erreur 'name' seulement si elle vient du formulaire d'AJOUT --}}
                        {{-- On vérifie que l'erreur existe ET qu'il n'y a pas de vieille valeur (ce qui indiquerait une erreur sur UPDATE)
                            C'est une heuristique, car Laravel ne sépare pas les erreurs par formulaire facilement. --}}
                        @error('name')
                            @if(!old('_method')) {{-- Si pas de _method=PUT, c'est probablement l'ajout --}}
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @endif
                        @enderror
                    </div>
                    <div class="flex justify-end space-x-3">
                        <button type="button" @click="showAddForm = false" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Annuler
                        </button>
                        <button type="submit" class="inline-flex items-center justify-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Enregistrer
                        </button>
                    </div>
                 </form>
            </div>

            <!-- LISTE DES CATÉGORIES EXISTANTES -->
            <div class="bg-white shadow rounded-lg border border-gray-200 overflow-x-auto"> {{-- overflow-x-auto pour petites tables --}}
                <h2 class="text-lg font-semibold text-gray-700 px-4 py-3 border-b bg-gray-50">Catégories existantes</h2>
                 @isset($categories)
                     @if($categories->count() > 0)
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                                    <th scope="col" class="relative px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($categories as $category)
                                    {{-- Alpine.js pour gérer l'état d'édition de chaque ligne --}}
                                    <tr class="category-row" x-data="{ editing: false, categoryName: '{{ addslashes($category->name) }}' }">
                                        {{-- Cellule Nom ou Champ d'édition --}}
                                        <td class="px-4 py-3 whitespace-nowrap">
                                            {{-- Affichage Normal : Double-clic pour éditer --}}
                                            <div x-show="!editing" @dblclick="editing = true; $nextTick(() => $refs.editInput{{ $category->id }}.select())"
                                                 class="text-sm font-medium text-gray-800 truncate cursor-pointer py-1" title="Double-cliquer pour modifier">
                                                {{ $category->name }}
                                            </div>
                                            {{-- Formulaire d'Édition (caché) --}}
                                            <form x-show="editing" x-cloak @submit.prevent="$el.submit()" @keydown.escape.window="editing = false"
                                                  method="POST" action="{{ route('categories.update', $category->id) }}"
                                                  class="relative w-full">
                                                  @csrf
                                                  @method('PUT')
                                                <label for="edit-name-{{ $category->id }}" class="sr-only">Modifier nom</label>
                                                <input type="text" name="name" id="edit-name-{{ $category->id }}"
                                                       x-ref="editInput{{ $category->id }}" x-model="categoryName"
                                                       class="block w-full shadow-sm sm:text-sm rounded-md border-gray-300 focus:ring-1 focus:ring-blue-500 focus:border-blue-500 pr-16 py-1 @error('name') border-red-500 ring-1 ring-red-500 @enderror"
                                                       required>
                                                <div class="absolute inset-y-0 right-0 flex items-center pr-1 space-x-1">
                                                     <button type="button" @click="editing = false" class="p-1 text-gray-400 hover:text-gray-600 rounded-full focus:outline-none focus:ring-2 focus:ring-gray-400" title="Annuler">
                                                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /> </svg>
                                                     </button>
                                                     <button type="submit" class="p-1 text-blue-600 hover:text-blue-800 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500" title="Enregistrer">
                                                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" /> </svg>
                                                     </button>
                                                 </div>
                                                {{-- Afficher l'erreur d'update sous l'input --}}
                                                @if($errors->has('name') && old('_method') === 'PUT')
                                                    <p class="mt-1 text-xs text-red-600">{{ $errors->first('name') }}</p>
                                                @endif
                                            </form>
                                        </td>
                                        {{-- Cellule Actions --}}
                                        <td class="px-4 py-3 whitespace-nowrap text-right text-sm font-medium">
                                            <div class="action-buttons flex items-center justify-end space-x-2" :class="{ 'opacity-100': editing }">
                                                {{-- Bouton Éditer --}}
                                                <button x-show="!editing" @click="editing = true; $nextTick(() => $refs.editInput{{ $category->id }}.select())" type="button" title="Modifier"
                                                        class="p-1 text-blue-600 hover:text-blue-800 focus:outline-none">
                                                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" /> </svg>
                                                </button>
                                                {{-- Bouton Supprimer --}}
                                                <form x-show="!editing" method="POST" action="{{ route('categories.destroy', $category->id) }}"
                                                    onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer la catégorie \'{{ addslashes($category->name) }}\' ?\nCette action ne peut pas être annulée.')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" title="Supprimer" class="p-1 text-red-600 hover:text-red-800 focus:outline-none">
                                                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" /> </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                     @else
                        <p class="text-center text-gray-500 py-6 px-4">Aucune catégorie n'a été ajoutée.</p>
                     @endif
                 @else
                      <p class="text-center text-gray-500 py-6 px-4">Chargement...</p>
                 @endisset
            </div>

        </div>
    </main>

</body>
</html>