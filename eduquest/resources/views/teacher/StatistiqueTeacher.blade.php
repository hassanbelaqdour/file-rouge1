<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistiques Enseignant - EduQuest</title>
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
    </style>
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
             <div class="flex items-center space-x-3 p-3 bg-gray-800 rounded-lg">
                <!-- Avatar Utilisateur (Utilise un placeholder) -->
                <img src="https://via.placeholder.com/32/ffffff/000000?text=U" alt="User Avatar" class="w-8 h-8 rounded-full object-cover border border-gray-600">
                <div class="flex-grow">
                    <!-- Remplacez par le nom et l'email de l'utilisateur connecté si disponible -->
                    <p class="text-sm font-semibold text-white">Nom Utilisateur</p>
                    <p class="text-xs text-gray-400">email@exemple.com</p>
                </div>
                <!-- Icône Plus d'options -->
                <i class="fas fa-ellipsis text-gray-400 text-lg cursor-pointer hover:text-white"></i>
             </div>
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
        <div class="max-w-7xl mx-auto">

            <!-- Header Page (inchangé) -->
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900">Tableau de Bord & Statistiques</h1>
                <p class="mt-1 text-sm text-gray-600">Aperçu de votre activité d'enseignant.</p>
            </div>

            <!-- Grille de Statistiques (inchangé) -->
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
                                         {{-- Cette donnée doit être remplie par votre contrôleur --}}
                                        {{ $totalStudents ?? 0 }}
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