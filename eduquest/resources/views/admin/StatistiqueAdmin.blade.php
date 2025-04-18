<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- Dans une vraie app, le titre pourrait être dynamique : <title>{{ $pageTitle ?? 'Dashboard Admin' }} - EduQuest</title> --}}
    <title>Dashboard - EduQuest Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Sniglet&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <style>
        body { font-family: 'Ubuntu', sans-serif; }
        /* La classe 'active' devra être ajoutée dynamiquement côté serveur ou via JS en fonction de la page actuelle */
        .sidebar-link.active, /* Pour la sidebar */
        .navbar-link.active /* Pour le header nav (si vous ajoutez une classe spécifique) */
        {
            background-color: #f3f4f6; /* gray-100 */
            color: #059669; /* green-700 */
            font-weight: 600;
        }
        .sidebar-link.active .material-icons { color: #059669; } /* green-700 */

        .group:hover .group-hover\:block { display: block; }
        .group:hover .group-hover\:opacity-100 { opacity: 1; }
        .group:hover .group-hover\:pointer-events-auto { pointer-events: auto; }
        .material-icons, .material-symbols-outlined { vertical-align: middle; }
    </style>
</head>

<body class="bg-gray-100">

<header class="bg-white py-4 px-6 flex justify-between items-center fixed top-0 left-0 w-full z-20 shadow-md border-b border-gray-200">
    {{-- Nom du site --}}
    <div class="text-2xl font-semibold text-black">EduQuest</div>

    {{-- Barre de navigation principale --}}
    <nav class="hidden md:flex items-center gap-4 lg:gap-6">
        {{-- Utiliser route() helper pour les liens : href="{{ route('admin.dashboard') }}" --}}
        <a href="/admin/dashboard" class="navbar-link flex items-center gap-2 py-2 px-3 lg:px-4 rounded-md text-gray-700 hover:bg-gray-100 hover:text-black transition-colors duration-150
           {{-- Classe active pour le lien du header --}}
           {{ request()->is('admin/StatistiqueAdmin') ? 'active' : '' }}
           ">
            <span class="material-icons text-base">dashboard</span>
            <span class="text-sm font-medium">Tableau de bord</span>
        </a>
        {{-- Utiliser route() helper : href="{{ route('admin.users.index') }}" --}}
        <a href="/admin/users" class="navbar-link flex items-center gap-2 py-2 px-3 lg:px-4 rounded-md text-gray-700 hover:bg-gray-100 hover:text-black transition-colors duration-150
           {{-- Classe active pour le lien du header --}}
           {{ request()->is('admin/users*') ? 'active' : '' }}
           ">
            <span class="material-icons text-base">group</span>
            <span class="text-sm font-medium">Gestion Users</span>
        </a>
         {{-- Utiliser route() helper : href="{{ route('admin.courses.index') }}" --}}
        <a href="/admin/courses" class="navbar-link flex items-center gap-2 py-2 px-3 lg:px-4 rounded-md text-gray-700 hover:bg-gray-100 hover:text-black transition-colors duration-150
           {{-- Classe active pour le lien du header --}}
           {{ request()->is('admin/courses*') ? 'active' : '' }}
           ">
            <span class="material-icons text-base">school</span>
            <span class="text-sm font-medium">Gestion Courses</span>
        </a>
    </nav>

    {{-- Icônes de droite (Notifications et Profil) --}}
    <div class="flex items-center space-x-4 relative">
         <button class="w-10 h-10 flex items-center justify-center rounded-full text-gray-500 hover:text-black hover:bg-gray-100">
             <span class="material-symbols-outlined text-lg">notifications</span>
             {{-- Logique pour afficher badge notification ici --}}
         </button>
         <div class="relative group">
             <button class="w-10 h-10 rounded-full bg-gray-200 focus:outline-none flex items-center justify-center text-gray-500">
                 {{-- Remplacer par l'avatar de l'admin si disponible, sinon icône par défaut --}}
                 {{-- @if(Auth::user() && Auth::user()->avatar_url) <img src="{{ Auth::user()->avatar_url }}" class="w-full h-full rounded-full object-cover"> @else ... @endif --}}
                 <span class="material-symbols-outlined text-lg">admin_panel_settings</span>
             </button>
             <div class="absolute right-0 mt-1 w-48 bg-white shadow-lg rounded-lg border border-gray-200 opacity-0 group-hover:opacity-100 pointer-events-none group-hover:pointer-events-auto transition-opacity duration-200 z-10">
                 <div class="px-4 py-3 text-sm text-gray-600">
                     {{-- Données de l'utilisateur connecté (Admin) --}}
                     <p class="font-medium text-gray-900">{{ Auth::user()->name ?? 'Admin EduQuest' }}</p>
                     <p class="truncate">{{ Auth::user()->email ?? 'admin@eduquest.com' }}</p>
                 </div>
                 <hr class="border-gray-200">
                 {{-- Utiliser route() helper : href="{{ route('admin.settings') }}" --}}
                 <a href="/admin/settings" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                     <span class="material-icons mr-2 align-middle text-sm">settings</span> Paramètres
                 </a>
                 {{-- Utiliser route() helper : action="{{ route('logout') }}" --}}
                 <form method="POST" action="{{ route('logout') }}">
                    @csrf {{-- !! Important pour la sécurité !! --}}
                     <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                         <span class="material-icons mr-2 align-middle text-sm">logout</span> Déconnexion
                     </button>
                 </form>
             </div>
        </div>
    </div>
</header>

    {{-- Conteneur Flex principal (Sidebar + Contenu) --}}
    <div class="flex pt-16 md:pt-20 min-h-screen">

        {{-- Sidebar --}}
        <aside class="w-64 bg-white shadow-lg flex-shrink-0 hidden md:block border-r border-gray-200">
            <div class="py-6 px-4 h-full flex flex-col">
                <div class="flex flex-col items-center mb-6 pb-6 border-b border-gray-200">
                    {{-- Remplacer par l'avatar réel de l'admin --}}
                    <img src="https://via.placeholder.com/96/4b5563/ffffff?text=ADM" alt="Admin Avatar" class="w-16 h-16 rounded-full object-cover border-2 border-gray-300 mb-2">
                    <h4 class="font-semibold text-gray-800 text-sm">{{ Auth::user()->name ?? 'Admin EduQuest' }}</h4>
                    <p class="text-xs text-gray-500 mt-1">Administrateur</p> {{-- Ou rôle dynamique --}}
                </div>
                <nav id="sidebarNav" class="flex-grow">
                    <ul class="space-y-1">
                        <li>
                            {{-- Utiliser route() helper : href="{{ route('admin.dashboard') }}" --}}
                            <a href="/admin.dashboard" class="sidebar-link flex items-center px-3 py-2 rounded-md text-sm text-gray-700 hover:bg-gray-100 hover:text-green-700 {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                                <span class="material-icons text-base mr-3 text-gray-500">bar_chart</span> Tableau de Bord
                            </a>
                        </li>
                        <li>
                            {{-- Utiliser route() helper : href="{{ route('admin.users.index') }}" (supposant une route ressource) --}}
                            <a href="/admin.users.index" class="sidebar-link flex items-center px-3 py-2 rounded-md text-sm text-gray-700 hover:bg-gray-100 hover:text-green-700 {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                                <span class="material-icons text-base mr-3 text-gray-500">group</span> Utilisateurs
                            </a>
                        </li>
                        <li>
                            {{-- Utiliser route() helper : href="{{ route('admin.courses.index') }}" (supposant une route ressource) --}}
                            <a href="/admin.courses.index" class="sidebar-link flex items-center px-3 py-2 rounded-md text-sm text-gray-700 hover:bg-gray-100 hover:text-green-700 {{ request()->routeIs('admin.courses.*') ? 'active' : '' }}">
                                <span class="material-icons text-base mr-3 text-gray-500">school</span> Cours
                            </a>
                        </li>
                        {{-- Ajouter d'autres liens de sidebar si nécessaire --}}
                    </ul>
                </nav>
                <div class="mt-auto pt-4 border-t border-gray-200">
                     {{-- Utiliser route() helper : action="{{ route('logout') }}" --}}
                    <form method="POST" action="{{ route('logout') }}">
                         @csrf {{-- !! Important pour la sécurité !! --}}
                        <button type="submit" class="w-full flex items-center px-3 py-2 rounded-md text-sm text-gray-700 hover:bg-red-50 hover:text-red-700">
                            <span class="material-icons text-base mr-3">logout</span> Déconnexion
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        {{-- Contenu Principal --}}
        <main class="flex-grow p-6 md:p-8 lg:p-10 bg-gray-100 overflow-y-auto">
            <h1 class="text-2xl font-semibold text-gray-800 mb-6">Tableau de Bord</h1>

            {{-- Cartes Statistiques --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                <div class="bg-white p-6 rounded-lg shadow-md flex items-center space-x-4">
                    <div class="p-3 rounded-full bg-green-100 text-green-600">
                        <span class="material-icons">group</span>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Étudiants Inscrits</p>
                        {{-- Remplacer par la variable du contrôleur: {{ $studentCount ?? 0 }} --}}
                        <p class="text-2xl font-bold text-gray-900">{{ $studentCount ?? '1,250' }}</p>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md flex items-center space-x-4">
                    <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                        <span class="material-icons">school</span>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Cours Publiés</p>
                         {{-- Remplacer par la variable du contrôleur: {{ $publishedCoursesCount ?? 0 }} --}}
                        <p class="text-2xl font-bold text-gray-900">{{ $publishedCoursesCount ?? '85' }}</p>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md flex items-center space-x-4">
                    <div class="p-3 rounded-full bg-yellow-100 text-yellow-600">
                        <span class="material-icons">pending_actions</span>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Cours en Attente</p>
                        {{-- Remplacer par la variable du contrôleur: {{ $pendingCoursesCount ?? 0 }} --}}
                        <p class="text-2xl font-bold text-gray-900">{{ $pendingCoursesCount ?? '12' }}</p>
                    </div>
                </div>
            </div>

            {{-- Section Activité Récente --}}
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Activité Récente</h3>
                {{-- Ici, vous pourriez boucler sur des données d'activité récente passées par le contrôleur --}}
                @isset($recentActivities)
                    @if($recentActivities->count() > 0)
                        <ul class="space-y-2">
                        @foreach($recentActivities as $activity)
                            <li class="text-sm text-gray-600 border-b border-gray-100 pb-1">
                                {{-- Adapter l'affichage selon la structure de $activity --}}
                                {{ $activity->description ?? 'Action non décrite' }}
                                <span class="text-xs text-gray-400 float-right">{{ $activity->created_at ? $activity->created_at->diffForHumans() : '' }}</span>
                            </li>
                        @endforeach
                        </ul>
                    @else
                        <p class="text-gray-500">Aucune activité récente à afficher.</p>
                    @endif
                @else
                    <p class="text-gray-600">(Placeholder - Aucune donnée d'activité récente fournie)</p>
                @endisset

            </div>
        </main>
    </div>

    {{-- Scripts JS globaux ou spécifiques à la page pourraient être chargés ici --}}
    {{-- Exemple : <script src="{{ asset('js/admin-dashboard.js') }}"></script> --}}
    @stack('scripts') {{-- Permet d'injecter des scripts depuis le contrôleur ou d'autres vues si besoin --}}
</body>
</html>