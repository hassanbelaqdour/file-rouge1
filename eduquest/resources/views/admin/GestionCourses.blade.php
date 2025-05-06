<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Cours - EduQuest</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome CDN for icons (required by the new sidebar) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f3f4f6; /* gray-100 */
        }
        /* Styles pagination, scrollbar... (Ajusté pour le thème sombre du nouveau sidebar) */
        nav[role="navigation"] span[aria-current="page"] span {
             background-color: #EEF2FF !important; border-color: #6366F1 !important; color: #4338CA !important; font-weight: 600 !important;
        }
        nav[role="navigation"] a:hover { background-color: #f3f4f6 !important; }
        nav[role="navigation"] span[aria-disabled="true"] svg { color: #9ca3af !important; }
        ::-webkit-scrollbar { width: 8px; height: 8px;}
        ::-webkit-scrollbar-track { background: #333; border-radius: 10px;} /* Ajusté pour thème sombre */
        ::-webkit-scrollbar-thumb { background: #555; border-radius: 10px;} /* Ajusté pour thème sombre */
        ::-webkit-scrollbar-thumb:hover { background: #777; } /* Ajusté pour thème sombre */

        /* Styles spécifiques au contenu principal (inchangés) */
        .aspect-video { position: relative; padding-bottom: 56.25%; }
        .aspect-video > * { position: absolute; height: 100%; width: 100%; top: 0; right: 0; bottom: 0; left: 0; }
    </style>
</head>
<body class="bg-gray-100 flex antialiased">

    <!-- Nouveau Panneau Latéral (Sidebar) - Inspiré de Jobsly -->
    <aside class="w-64 h-screen bg-gray-900 text-gray-100 shadow-lg fixed top-0 left-0 z-20 flex flex-col overflow-y-auto">

        <!-- Header Sidebar -->
        <div class="flex justify-between items-center px-5 py-4 border-b border-gray-700">
            <!-- Remplacé le logo SVG/Initiales par un titre simple -->
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
            <a href="{{ route('admin.StatistiqueAdmin') }}" class="flex items-center space-x-3 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-150 ease-in-out
               {{ request()->routeIs('admin.StatistiqueAdmin') ? 'bg-gray-700 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                <!-- Icône Statistiques (Font Awesome) -->
                <i class="fas fa-chart-simple text-lg"></i>
                <span>Statistiques</span>
            </a>

            {{-- Item Utilisateurs --}}
             <a href="{{ route('admin.Users') }}" class="flex items-center space-x-3 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-150 ease-in-out
               {{ request()->routeIs('admin.Users') ? 'bg-gray-700 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                <!-- Icône Utilisateurs (Font Awesome) -->
                 <i class="fas fa-users text-lg"></i>
                 <span>Utilisateurs</span>
            </a>

            {{-- Item Gestion des Cours (Actif pour cette page) --}}
             <a href="{{ route('admin.GestionCourses') }}" class="flex items-center space-x-3 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-150 ease-in-out
               {{ request()->routeIs('admin.GestionCourses') ? 'bg-gray-700 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                <!-- Icône Gestion des Cours (Font Awesome) -->
                 <i class="fas fa-book text-lg"></i>
                 <span>Gestion des Cours</span>
            </a>
            {{-- Autres liens admin si nécessaire --}}

        </nav>

        <!-- Séparateur visuel avant le profil -->
        <div class="border-t border-gray-700 mt-auto pt-4 mx-4"></div>

        <!-- Section Profil Utilisateur (Admin) -->
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

    <!-- CONTENU PRINCIPAL -->
    <main class="ml-64 w-full p-6 md:p-8 lg:p-10">
        <div class="max-w-none mx-auto">

            <!-- Header Page (inchangé) -->
             <div class="flex flex-col md:flex-row items-center justify-between gap-4 mb-6">
                <div>
                    <h1 class="text-2xl md:text-3xl font-bold text-gray-900">Gestion des Cours</h1>
                    <p class="text-sm text-gray-500 mt-1">Approuvez ou rejetez les cours soumis.</p>
                </div>

             </div>

            {{-- Ici, tu peux ajouter des filtres pour les cours si nécessaire --}}
            {{-- <form method="GET" action="{{ route('admin.GestionCourses') }}"> ... filtres ... </form> --}}

            <!-- Grille des Cours (inchangé) -->
            @if ($courses->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @foreach ($courses as $course) {{-- La boucle commence ICI --}}

                        {{-- Carte de cours (Code de la carte individuelle) --}}
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden flex flex-col h-full group transform hover:-translate-y-1 transition-all duration-300 ease-out">

                            {{-- Section Image/Placeholder --}}
                            <div class="aspect-video bg-gray-200 rounded-t-lg flex items-center justify-center text-gray-400 overflow-hidden">
                                {{-- UTILISATION DE $course (singulier) --}}
                                @if($course->image_path)
                                    <img src="{{ Storage::url($course->image_path) }}" alt="Image pour {{ $course->title }}" class="w-full h-full object-cover">
                                @else
                                    <svg class="w-12 h-12" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                                    </svg>
                                @endif
                            </div>

                            {{-- Section Contenu --}}
                            <div class="p-5 flex flex-col flex-grow">

                                {{-- Titre --}}
                                <h3 class="text-base font-semibold text-gray-800 truncate mb-1">{{ $course->title }}</h3>
                                {{-- Enseignant --}}
                                <p class="text-xs text-gray-500 mb-3">
                                    Par {{ $course->teacher->first_name ?? 'N/A' }} {{ $course->teacher->last_name ?? '' }}
                                </p>

                                {{-- Badges --}}
                                <div class="flex items-center flex-wrap gap-2 mb-4"> {{-- flex-wrap ajouté --}}
                                    @if($course->category)
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800">
                                        {{ $course->category->name }}
                                    </span>
                                    @endif
                                    @if ($course->status === 'accepted')
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">Approuvé</span>
                                    @elseif ($course->status === 'rejected')
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">Rejeté</span>
                                    @else
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">En attente</span>
                                    @endif
                                     <span class="inline-block px-2.5 py-0.5 text-xs font-semibold rounded-full bg-blue-100 text-blue-700 capitalize">
                                         {{ $course->level }}
                                     </span>
                                </div>

                                {{-- Boutons d'Action --}}
                                <div class="mt-auto flex items-center space-x-2">
                                    {{-- UTILISATION DE $course (singulier) pour les routes et la logique --}}
                                    @if ($course->status === 'pending')
                                        <form action="{{ route('admin.acceptCourse', $course->id) }}" method="POST" class="flex-1">
                                            @csrf
                                            <button type="submit" class="w-full inline-flex justify-center items-center px-3 py-2 border border-transparent shadow-sm text-xs font-medium rounded-md text-white bg-emerald-600 hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-emerald-500">Accepter</button>
                                        </form>
                                        <form action="{{ route('admin.rejectCourse', $course->id) }}" method="POST" class="flex-1">
                                            @csrf
                                            <button type="submit" class="w-full inline-flex justify-center items-center px-3 py-2 border border-transparent shadow-sm text-xs font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-red-500">Rejeter</button>
                                        </form>
                                    @elseif ($course->status === 'accepted')
                                        <form action="{{ route('admin.rejectCourse', $course->id) }}" method="POST" class="flex-1">
                                            @csrf
                                            <button type="submit" class="w-full inline-flex justify-center items-center px-3 py-2 border border-transparent shadow-sm text-xs font-medium rounded-md text-white bg-yellow-500 hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-yellow-400">Mettre en attente</button>
                                        </form>
                                    @elseif ($course->status === 'rejected')
                                        <form action="{{ route('admin.acceptCourse', $course->id) }}" method="POST" class="flex-1">
                                            @csrf
                                            <button type="submit" class="w-full inline-flex justify-center items-center px-3 py-2 border border-transparent shadow-sm text-xs font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-green-500">Ré-approuver</button>
                                        </form>
                                    @endif
                                    {{-- Optionnel : Bouton "Voir Détails" --}}
                                    {{-- <a href="{{ route('admin.courses.show', $course->id) }}" class="flex-1 inline-flex justify-center items-center px-3 py-2 border border-gray-300 shadow-sm text-xs font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50"> Détails </a> --}}
                                </div>
                            </div>
                        </div>
                        {{-- Fin de la carte --}}

                    @endforeach {{-- La boucle se termine ICI --}}
                </div>

                <!-- Pagination (inchangé) -->
                <div class="mt-8">
                     @if ($courses->hasPages())
                        <div class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6 rounded-lg shadow-sm">
                           <div class="flex-1 flex justify-between sm:hidden">
                                <a href="{{ $courses->previousPageUrl() }}" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 {{ $courses->onFirstPage() ? ' opacity-50 cursor-not-allowed' : '' }}"> Précédent </a>
                                <a href="{{ $courses->nextPageUrl() }}" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 {{ !$courses->hasMorePages() ? ' opacity-50 cursor-not-allowed' : '' }}"> Suivant </a>
                            </div>
                            <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                                <div>
                                     <p class="text-sm text-gray-700">
                                         Affichage de <span class="font-medium">{{ $courses->firstItem() }}</span> à <span class="font-medium">{{ $courses->lastItem() }}</span> sur <span class="font-medium">{{ $courses->total() }}</span> résultats
                                     </p>
                                </div>
                                <div>
                                    {{ $courses->links() }}
                                </div>
                           </div>
                        </div>
                     @endif
                 </div>

            @else
                {{-- État Vide (inchangé) --}}
                <div class="text-center py-16 px-6 bg-white rounded-lg shadow border border-gray-200">
                    <svg class="mx-auto h-12 w-12 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" /> </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900">Aucun cours trouvé</h3>
                    <p class="mt-1 text-sm text-gray-500">Aucun cours n'est actuellement en attente ou géré.</p>
                </div>
            @endif
        </div>
    </main>

</body>
</html>