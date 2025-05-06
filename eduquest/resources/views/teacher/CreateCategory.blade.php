<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gérer les Catégories - EduQuest</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        [x-cloak] { display: none !important; }
        /* Styles pour scrollbar (ajusté pour le thème sombre) */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #333; border-radius: 10px; } /* Ajusté pour thème sombre */
        ::-webkit-scrollbar-thumb { background: #555; border-radius: 10px; } /* Ajusté pour thème sombre */
        ::-webkit-scrollbar-thumb:hover { background: #777; } /* Ajusté pour thème sombre */
    </style>
</head>
<body class="bg-gray-100 flex antialiased" x-data="{ isModalOpen: {{ $errors->has('name') && !old('_method') ? 'true' : 'false' }} }">

    
    <aside class="w-64 h-screen bg-gray-900 text-gray-100 shadow-lg fixed top-0 left-0 z-20 flex flex-col overflow-y-auto">

        
        <div class="flex justify-between items-center px-5 py-4 border-b border-gray-700">
            
            <h1 class="text-2xl font-bold text-white">EduQuest</h1>
            
             <i class="fas fa-bars text-xl text-gray-400 cursor-pointer hover:text-white"></i>
        </div>

        
        <div class="relative px-4 mt-6">
            <input type="text" placeholder="Search..." class="w-full px-4 py-2 pl-10 bg-gray-800 border border-gray-700 rounded-lg text-sm text-gray-300 placeholder-gray-500 focus:outline-none focus:border-blue-600 focus:ring-blue-600">
            
            <i class="fas fa-magnifying-glass absolute left-7 top-1/2 transform -translate-y-1/2 text-gray-500 text-sm"></i>
        </div>

        
        <nav class="mt-6 space-y-3 flex-grow px-4">
            
            <a href="{{ route('teacher.StatistiqueTeacher') }}" class="flex items-center space-x-3 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-150 ease-in-out
               {{ request()->routeIs('teacher.StatistiqueTeacher') ? 'bg-gray-700 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                
                <i class="fas fa-chart-simple text-lg"></i>
                <span>Statistiques</span>
            </a>

            
            <a href="{{ route('teacher.courses') }}" class="flex items-center space-x-3 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-150 ease-in-out
               {{ request()->routeIs('teacher.courses') ? 'bg-gray-700 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                
                 <i class="fas fa-book text-lg"></i>
                 <span>Tous les cours</span>
            </a>

            
             <a href="{{ route('categories.index') }}" class="flex items-center space-x-3 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-150 ease-in-out
               {{ request()->routeIs('categories.index') ? 'bg-gray-700 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                
                 <i class="fas fa-tags text-lg"></i>
                 <span>Catégories</span>
            </a>
            

        </nav>

        
        <div class="border-t border-gray-700 mt-auto pt-4 mx-4"></div>

        
        <div class="px-4 pb-4 pt-2">
             
             @auth
             <div class="flex items-center space-x-3 p-3 bg-gray-800 rounded-lg">
                
                 <div class="w-8 h-8 rounded-full bg-indigo-600 text-white flex items-center justify-center font-semibold text-sm flex-shrink-0 border border-gray-600">
                      {{ strtoupper(substr(Auth::user()->first_name ?? 'A', 0, 1)) }}{{ strtoupper(substr(Auth::user()->last_name ?? 'D', 0, 1)) }}
                 </div>
                <div class="flex-grow">
                    <p class="text-sm font-semibold text-white">{{ Auth::user()->first_name ?? 'Admin' }} {{ Auth::user()->last_name ?? '' }}</p>
                    <p class="text-xs text-gray-400">{{ Auth::user()->email ?? 'admin@example.com' }}</p>
                </div>
                
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
    


    
    <main class="ml-64 w-full p-6 md:p-8 lg:p-10">
        <div class="max-w-5xl mx-auto">

            
            <div class="flex items-center justify-between mb-8">
                <h1 class="text-3xl font-bold text-gray-900">Gestion des Catégories</h1>
                <button @click="isModalOpen = true" type="button" class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"> <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" /> </svg>
                    Ajouter une catégorie
                </button>
            </div>

             
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

            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                 @isset($categories)
                    @forelse ($categories as $category)
                        
                        <div x-data="{
                                isEditing: {{ $errors->has('name') && old('_token') && session('edit_category_id') == $category->id ? 'true' : 'false' }},
                                editName: '{{ addslashes(old('name', $category->name)) }}'
                             }"
                             class="bg-white border border-gray-200 rounded-lg shadow-sm p-5 flex flex-col relative hover:shadow-md transition-shadow duration-200">

                            

                            
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

                            
                            <p class="text-sm text-gray-600 mb-4">
                                Créé le : {{ $category->created_at->format('d/m/Y') }}
                            </p>

                            
                            <div class="mt-auto flex items-center justify-between text-xs text-gray-500">
                                
                                <span class="inline-flex items-center" title="ID Créateur: {{ $category->creator->id ?? 'N/A' }}">
                                    <svg class="mr-1 w-3 h-3 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-5.5-2.5a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0zM10 12a5.99 5.99 0 00-4.793 2.39A6.483 6.483 0 0010 16.5a6.483 6.483 0 004.793-2.11A5.99 5.99 0 0010 12z" clip-rule="evenodd" /> </svg>
                                    @if($category->creator)
                                        {{ $category->creator->name }}
                                    @else
                                        <span class="italic">Créateur inconnu</span>
                                    @endif
                                </span>

                                
                                <div class="flex items-center space-x-2">
                                    
                                    <button x-show="!isEditing"
                                            @click.prevent="isEditing = true; $nextTick(() => $refs.editInput{{ $category->id }}.focus())"
                                            type="button"
                                            class="p-1 text-blue-600 hover:bg-blue-100 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" title="Modifier">
                                        <span class="sr-only">Modifier</span>
                                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" /> </svg>
                                    </button>

                                    
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

            </div> 
        </div> 
    </main>

    
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