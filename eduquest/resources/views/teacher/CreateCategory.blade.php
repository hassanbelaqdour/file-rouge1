<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une Catégorie - EduQuest</title>
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- Styles optionnels comme dans l'exemple précédent si vous les souhaitez --}}
    <style>
        /* Custom scrollbar styling (optional) */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; border-radius: 10px; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
    </style>
</head>
<body class="bg-gray-100 flex antialiased">

    {{-- ================================================================ --}}
    {{-- |                 SIDEBAR FIXE (COPIÉE/COLLÉE)                 | --}}
    {{-- ================================================================ --}}
    <aside class="w-64 h-screen bg-white shadow-md fixed top-0 left-0 border-r border-gray-200 z-20 flex flex-col">
        {{-- Sidebar Header --}}
        <div class="p-5 border-b border-gray-200 flex items-center space-x-2">
            <svg class="w-8 h-8 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" /> </svg>
            <h1 class="text-xl font-bold text-gray-800">EduQuest</h1>
        </div>

        {{-- Navigation --}}
        <nav class="flex-grow p-4 space-y-2 overflow-y-auto">
             @php
             // Helper simplifié - Ajoutez des routes si nécessaire
             function isActiveRoute($routeName) {
                 // Basic check, might need refinement based on your actual routes
                 return request()->routeIs($routeName);
             }
             @endphp

            {{-- Lien Statistiques --}}
            <a href="{{ route('teacher.StatistiqueTeacher') }}" class="flex items-center px-3 py-2.5 rounded-md text-sm font-medium transition-colors duration-150 ease-in-out {{ isActiveRoute('teacher.StatistiqueTeacher') ? 'bg-blue-50 text-blue-700' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}">
                {{-- Icône Statistique --}}
                <svg class="w-5 h-5 mr-3 flex-shrink-0 {{ isActiveRoute('teacher.StatistiqueTeacher') ? 'text-blue-500' : 'text-gray-400 group-hover:text-gray-500' }}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75c0 .621-.504 1.125-1.125 1.125h-2.25A1.125 1.125 0 013 21v-7.875zM12.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v12.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM21 4.125c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v17.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" /></svg>
                Statistiques
            </a>
            {{-- Lien Tous les cours --}}
            <a href="{{ route('teacher.courses') }}" class="flex items-center px-3 py-2.5 rounded-md text-sm font-medium transition-colors duration-150 ease-in-out {{ isActiveRoute('teacher.courses') ? 'bg-blue-50 text-blue-700' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}">
                 {{-- Icône Cours --}}
                 <svg class="w-5 h-5 mr-3 flex-shrink-0 {{ isActiveRoute('teacher.courses') ? 'text-blue-500' : 'text-gray-400 group-hover:text-gray-500' }}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"> <path d="M12 18.75a6 6 0 006-6v-1.5m-6 7.5a6 6 0 01-6-6v-1.5m6 7.5v3.75m-3.75 0h7.5M12 15.75a3 3 0 01-3-3V4.5a3 3 0 116 0v8.25a3 3 0 01-3 3z" /></svg>
                Tous les cours
            </a>
             {{-- Lien Catégories (met en évidence si on est sur l'index OU la création) --}}
             <a href="{{ route('categories.index') }}" class="flex items-center px-3 py-2.5 rounded-md text-sm font-medium transition-colors duration-150 ease-in-out {{ isActiveRoute('categories.index') || isActiveRoute('categories.create') ? 'bg-blue-50 text-blue-700' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}">
                 {{-- Icône Catégorie --}}
                <svg class="w-5 h-5 mr-3 flex-shrink-0 {{ isActiveRoute('categories.index') || isActiveRoute('categories.create') ? 'text-blue-500' : 'text-gray-400 group-hover:text-gray-500' }}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" > <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z" /> <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6z" /> </svg>
                Catégories
            </a>
            {{-- Lien Étudiants (si vous l'ajoutez plus tard) --}}
            {{-- <a href="#" class="flex items-center px-3 py-2.5 rounded-md text-sm font-medium transition-colors duration-150 ease-in-out text-gray-600 hover:bg-gray-100 hover:text-gray-900'"> ... Étudiants inscrits ... </a> --}}
        </nav>

        {{-- Logout Button at bottom --}}
        <div class="p-4 mt-auto border-t border-gray-200">
             <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full flex items-center justify-center text-sm font-medium text-red-600 bg-red-50 hover:bg-red-100 px-3 py-2.5 rounded-md transition-colors duration-150 ease-in-out group">
                    {{-- Icône Logout --}}
                    <svg class="w-5 h-5 mr-2 text-red-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" /> </svg>
                    Déconnexion
                </button>
            </form>
        </div>
    </aside>
    {{-- ================================================================ --}}
    {{-- |                       FIN DE LA SIDEBAR                      | --}}
    {{-- ================================================================ --}}


    <!-- CONTENU PRINCIPAL -->
    <main class="ml-64 w-full p-6 md:p-8 lg:p-10">
        {{-- Utilisation d'un container plus étroit pour un formulaire simple --}}
        <div class="max-w-2xl mx-auto">

            <!-- HEADER -->
            <div class="flex items-center justify-between mb-8">
                <h1 class="text-2xl font-bold text-gray-900">Ajouter une Nouvelle Catégorie</h1>
                {{-- Bouton pour retourner à la liste des catégories --}}
                <a href="{{ route('categories.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150 ease-in-out">
                    {{-- Icône Retour --}}
                    <svg class="-ml-1 mr-2 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" /> </svg>
                    Retour à la liste
                </a>
            </div>

             {{-- Affichage des erreurs générales de validation --}}
             @if ($errors->any())
                <div class="mb-6 p-4 border border-red-300 bg-red-50 text-red-700 rounded-md" role="alert">
                    <div class="flex items-center">
                        {{-- Icône Erreur --}}
                        <svg class="h-5 w-5 mr-3 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z" clip-rule="evenodd" /> </svg>
                        <h3 class="text-sm font-semibold">Erreur de validation</h3>
                    </div>
                    <ul class="mt-2 ml-8 list-disc text-sm space-y-1">
                        @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach
                    </ul>
                </div>
            @endif

             {{-- Affichage des messages de succès (si redirigé vers cette page avec succès) --}}
             @if (session('success'))
                 <div class="mb-6 p-4 border border-green-300 bg-green-50 text-green-700 rounded-md" role="alert">
                     <div class="flex items-center">
                         {{-- Icône Succès --}}
                         <svg class="h-5 w-5 mr-3 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" /> </svg>
                         <p class="text-sm font-medium">{{ session('success') }}</p>
                     </div>
                 </div>
             @endif


            <!-- FORMULAIRE D'AJOUT DE CATÉGORIE -->
            <div class="bg-white shadow-lg rounded-lg p-6 md:p-8 border border-gray-200">
                 <form action="{{ route('categories.store') }}" method="POST" class="space-y-6">
                    @csrf

                    {{-- Champ Nom de la catégorie --}}
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                            Nom de la catégorie <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" required
                               class="block w-full shadow-sm sm:text-sm rounded-md border-gray-300 focus:ring-blue-500 focus:border-blue-500 @error('name') border-red-500 ring-1 ring-red-500 @enderror"
                               placeholder="Ex: Développement Web">
                        {{-- Affichage de l'erreur spécifique pour le champ 'name' --}}
                        @error('name')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Section Actions du Formulaire --}}
                    <div class="pt-5 border-t border-gray-200">
                        <div class="flex justify-end space-x-3">
                             {{-- Bouton Annuler (retourne à la liste) --}}
                            <a href="{{ route('categories.index') }}" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150 ease-in-out">
                                Annuler
                            </a>
                             {{-- Bouton Enregistrer --}}
                            <button type="submit" class="inline-flex items-center justify-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                                 {{-- Icône Enregistrer --}}
                                <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" /> </svg>
                                Enregistrer la catégorie
                            </button>
                        </div>
                    </div>
                 </form>
            </div>

        </div>
    </main>

</body>
</html>