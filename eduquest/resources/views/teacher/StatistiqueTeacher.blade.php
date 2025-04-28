<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistiques Enseignant - EduQuest</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Styles optionnels */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; border-radius: 10px; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
    </style>
</head>
<body class="bg-gray-100 flex antialiased">

    <!-- ================================================== -->
    <!--                      SIDEBAR                       -->
    <!-- ================================================== -->
    <aside class="w-64 h-screen bg-white shadow-md fixed top-0 left-0 border-r border-gray-200 z-20 flex flex-col">
        {{-- Header Sidebar --}}
        <div class="p-5 border-b border-gray-200 flex items-center space-x-2">
            <svg class="w-8 h-8 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" /> </svg>
            <h1 class="text-xl font-bold text-gray-800">EduQuest</h1>
        </div>
        {{-- Navigation --}}
        <nav class="flex-grow p-4 space-y-2 overflow-y-auto">
            {{-- Liens Sidebar - Marque 'Statistiques' comme actif --}}
            <a href="{{ route('teacher.StatistiqueTeacher') }}" class="flex items-center px-3 py-2.5 rounded-md text-sm font-medium transition-colors duration-150 ease-in-out {{ request()->routeIs('teacher.StatistiqueTeacher') ? 'bg-blue-50 text-blue-700' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}"> <svg class="w-5 h-5 mr-3 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75c0 .621-.504 1.125-1.125 1.125h-2.25A1.125 1.125 0 013 21v-7.875zM12.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v12.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM21 4.125c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v17.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" /></svg> Statistiques </a>
            <a href="{{ route('teacher.courses') }}" class="flex items-center px-3 py-2.5 rounded-md text-sm font-medium transition-colors duration-150 ease-in-out {{ request()->routeIs('teacher.courses*') ? 'bg-blue-50 text-blue-700' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}"> <svg class="w-5 h-5 mr-3 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"> <path d="M12 18.75a6 6 0 006-6v-1.5m-6 7.5a6 6 0 01-6-6v-1.5m6 7.5v3.75m-3.75 0h7.5M12 15.75a3 3 0 01-3-3V4.5a3 3 0 116 0v8.25a3 3 0 01-3 3z" /></svg> Tous les cours </a>
            <a href="{{ route('categories.index') }}" class="flex items-center px-3 py-2.5 rounded-md text-sm font-medium transition-colors duration-150 ease-in-out {{ request()->routeIs('categories.index') ? 'bg-blue-50 text-blue-700' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}"> <svg class="w-5 h-5 mr-3 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" > <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z" /> <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6z" /> </svg> Catégories </a>
            {{-- Lien Etudiants ... --}}
        </nav>
        {{-- Logout --}}
        <div class="p-4 mt-auto border-t border-gray-200"> <form action="{{ route('logout') }}" method="POST"> @csrf <button type="submit" class="w-full flex items-center justify-center text-sm font-medium text-red-600 bg-red-50 hover:bg-red-100 px-3 py-2.5 rounded-md group"> <svg class="w-5 h-5 mr-2 text-red-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" /> </svg> Déconnexion </button> </form> </div>
    </aside>
    <!-- ================================================== -->

    <!-- CONTENU PRINCIPAL -->
    <main class="ml-64 w-full p-6 md:p-8 lg:p-10">
        <div class="max-w-7xl mx-auto">

            <!-- Header Page -->
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900">Tableau de Bord & Statistiques</h1>
                <p class="mt-1 text-sm text-gray-600">Aperçu de votre activité d'enseignant.</p>
            </div>

            <!-- Grille de Statistiques -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                {{-- Carte : Nombre de Cours --}}
                <div class="bg-white overflow-hidden shadow rounded-lg border border-gray-200">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                {{-- Icône Cours --}}
                                <svg class="h-8 w-8 text-white bg-blue-500 rounded-lg p-1.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                     <path d="M12 18.75a6 6 0 006-6v-1.5m-6 7.5a6 6 0 01-6-6v-1.5m6 7.5v3.75m-3.75 0h7.5M12 15.75a3 3 0 01-3-3V4.5a3 3 0 116 0v8.25a3 3 0 01-3 3z" />
                                </svg>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">
                                        Nombre de Cours Créés
                                    </dt>
                                    <dd class="text-3xl font-semibold text-gray-900">
                                        {{ $totalCourses ?? 0 }}
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-5 py-3">
                        <div class="text-sm">
                            <a href="{{ route('teacher.courses') }}" class="font-medium text-blue-700 hover:text-blue-900">
                                Voir tous les cours →
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Carte : Nombre d'Étudiants Inscrits --}}
                <div class="bg-white overflow-hidden shadow rounded-lg border border-gray-200">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                 {{-- Icône Utilisateurs --}}
                                <svg class="h-8 w-8 text-white bg-green-500 rounded-lg p-1.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                                </svg>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">
                                        Étudiants Inscrits (Total)
                                    </dt>
                                    <dd class="text-3xl font-semibold text-gray-900">
                                        
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                     <div class="bg-gray-50 px-5 py-3">
                        <div class="text-sm">
                            {{-- Mettez ici le lien vers la liste des étudiants si vous en avez une --}}
                            {{-- <a href="{{ route('teacher.students') }}" class="font-medium text-green-700 hover:text-green-900"> Gérer les étudiants → </a> --}}
                             <span class="text-gray-500">(Tous cours confondus)</span>
                        </div>
                    </div>
                </div>

                {{-- Ajoutez d'autres cartes de statistiques ici si nécessaire --}}
                {{-- Exemple : Revenus, Cours les plus populaires, etc. --}}
                 <div class="bg-white overflow-hidden shadow rounded-lg border border-gray-200">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <svg class="h-8 w-8 text-white bg-yellow-500 rounded-lg p-1.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818l.879.536a2.25 2.25 0 002.242 0l.879-.536M12 6V5.25A2.25 2.25 0 0114.25 3h1.5A2.25 2.25 0 0118 5.25V8.25A2.25 2.25 0 0115.75 10.5h-1.5a2.25 2.25 0 00-2.25 2.25v1.5m-3 0l-.879.536a2.25 2.25 0 01-2.242 0l-.879-.536M12 6h-1.5A2.25 2.25 0 008.25 5.25V8.25A2.25 2.25 0 006 10.5H4.5a2.25 2.25 0 00-2.25 2.25v1.5m15.75-3l-.879.536a2.25 2.25 0 01-2.242 0l-.879-.536m0 0V6.75" /> </svg>
                            </div>
                            <div class="ml-5 w-0 flex-1"> <dl> <dt class="text-sm font-medium text-gray-500 truncate"> Autre Statistique </dt> <dd class="text-3xl font-semibold text-gray-900"> À définir </dd> </dl> </div>
                        </div>
                    </div>
                     <div class="bg-gray-50 px-5 py-3"> <div class="text-sm"> <span class="text-gray-500">Détails à venir...</span> </div> </div>
                </div>

            </div>

            {{-- Section Supplémentaire (optionnelle) --}}
            {{-- Par exemple, un tableau avec les cours et le nombre d'inscrits par cours --}}
            {{-- <div class="mt-10 bg-white shadow rounded-lg border border-gray-200"> ... </div> --}}

        </div>
    </main>

    {{-- Scripts JS (si nécessaire, par ex. pour des graphiques) --}}

</body>
</html>