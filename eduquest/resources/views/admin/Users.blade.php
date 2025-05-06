<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des utilisateurs - EduQuest</title>
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
        /* Styles pagination Tailwind par défaut (inchangés) */
        nav[role="navigation"] span[aria-current="page"] span {
             background-color: #EEF2FF !important; border-color: #6366F1 !important; color: #4338CA !important; font-weight: 600 !important;
        }
        nav[role="navigation"] a:hover { background-color: #f3f4f6 !important; }
        nav[role="navigation"] span[aria-disabled="true"] svg { color: #9ca3af !important; }
        /* Style scrollbar (Ajusté pour le thème sombre du nouveau sidebar) */
        ::-webkit-scrollbar { width: 8px; height: 8px;}
        ::-webkit-scrollbar-track { background: #333; border-radius: 10px;} /* Ajusté pour thème sombre */
        ::-webkit-scrollbar-thumb { background: #555; border-radius: 10px;} /* Ajusté pour thème sombre */
        ::-webkit-scrollbar-thumb:hover { background: #777; } /* Ajusté pour thème sombre */
    </style>
     {{-- AlpineJS n'est pas strictement nécessaire pour cette page si on utilise JS standard --}}
     {{-- <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script> --}}
</head>
<body class="flex antialiased">

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

            {{-- Item Utilisateurs (Actif pour cette page) --}}
            <a href="{{ route('admin.Users') }}" class="flex items-center space-x-3 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-150 ease-in-out
               {{ request()->routeIs('admin.Users') ? 'bg-gray-700 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                <!-- Icône Utilisateurs (Font Awesome) -->
                 <i class="fas fa-users text-lg"></i>
                 <span>Utilisateurs</span>
            </a>

            {{-- Item Gestion des Cours --}}
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

    <!-- Contenu Principal -->
    <main class="ml-64 w-full p-6 md:p-8 lg:p-10">
        <div class="max-w-none mx-auto">

            <!-- Header Page (inchangé) -->
            <div class="mb-6">
                <h1 class="text-2xl md:text-3xl font-bold text-gray-900">Gestion des Utilisateurs</h1>
                <p class="text-sm text-gray-500 mt-1">Gérez les comptes utilisateurs et leurs permissions</p>
            </div>

            <!-- Filtres et Actions (inchangé) -->
            <form method="GET" action="{{ route('admin.Users') }}">
                <div class="flex flex-col md:flex-row items-center justify-between gap-4 mb-6 bg-white p-4 rounded-lg shadow-sm border border-gray-200">
                    {{-- **SUPPRIMÉ : Barre de Recherche était ici** --}}
                    {{--
                    <div class="relative w-full md:w-auto md:flex-grow"> ... input search ... </div>
                    --}}

                    {{-- **MODIFIÉ : Filtres Dropdown prennent plus de place / s'alignent à gauche** --}}
                    <div class="flex items-center space-x-4 w-full md:w-auto md:flex-grow"> {{-- flex-grow ajouté --}}
                        {{-- Filtre Rôle --}}
                        <select name="role" onchange="this.form.submit()" class="px-4 py-2 border border-gray-300 rounded-md bg-white text-sm focus:ring-indigo-500 focus:border-indigo-500 w-full sm:w-auto">
                             <option value="" {{ !$selectedRole ? 'selected' : '' }}>Tous les rôles</option>
                             <option value="admin" {{ $selectedRole == 'admin' ? 'selected' : '' }}>Administrateur</option>
                             <option value="student" {{ $selectedRole == 'student' ? 'selected' : '' }}>Étudiant</option>
                             <option value="teacher" {{ $selectedRole == 'teacher' ? 'selected' : '' }}>Professeur</option>
                        </select>
                        {{-- Filtre Statut --}}
                        <select name="status" onchange="this.form.submit()" class="px-4 py-2 border border-gray-300 rounded-md bg-white text-sm focus:ring-indigo-500 focus:border-indigo-500 w-full sm:w-auto">
                             <option value="" {{ !$selectedStatus ? 'selected' : '' }}>Tous les statuts</option>
                             <option value="approved" {{ $selectedStatus == 'approved' ? 'selected' : '' }}>Actif</option>
                             <option value="pending" {{ $selectedStatus == 'pending' ? 'selected' : '' }}>En attente</option>
                              {{-- Ajouté le statut 'suspended' s'il existe dans votre logique --}}
                             <option value="suspended" {{ $selectedStatus == 'suspended' ? 'selected' : '' }}>Suspendu</option>
                        </select>
                        {{-- **SUPPRIMÉ : Lien Réinitialiser était ici** --}}
                        {{--
                        @if(request()->has('search') || request()->has('role') || request()->has('status'))
                            <a href="{{ route('admin.Users') }}" class="text-sm text-indigo-600 hover:underline whitespace-nowrap">Réinitialiser</a>
                        @endif
                        --}}
                    </div>

                </div>
            </form>

            <!-- Grille des Utilisateurs (inchangé) -->
            @if ($users->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @foreach ($users as $user)
                        {{-- La carte utilisateur reste inchangée --}}
                        <div class="bg-white rounded-lg shadow border border-gray-200 p-5 flex flex-col">
                            {{-- Header Carte --}}
                            <div class="flex items-center mb-4">
                                <div class="w-12 h-12 rounded-full bg-cyan-500 text-white flex items-center justify-center font-semibold mr-4 flex-shrink-0 text-lg">
                                    @php
                                        $initials = '';
                                        if($user->first_name) $initials .= strtoupper(substr($user->first_name, 0, 1));
                                        if($user->last_name) $initials .= strtoupper(substr($user->last_name, 0, 1));
                                        if(!$initials) $initials = 'U';
                                    @endphp
                                    {{ $initials }}
                                </div>
                                <div>
                                    <h3 class="text-base font-semibold text-gray-800 truncate">{{ $user->first_name }} {{ $user->last_name }}</h3>
                                    <p class="text-xs text-gray-500 truncate">{{ $user->email }}</p>
                                </div>
                            </div>
                            {{-- Badges Rôle et Statut --}}
                            <div class="flex items-center space-x-2 mb-5">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                    @if($user->role == 'admin') bg-blue-100 text-blue-800
                                    @elseif($user->role == 'teacher') bg-teal-100 text-teal-800
                                    @else bg-purple-100 text-purple-800 @endif">
                                    {{ $user->role == 'admin' ? 'Administrateur' : ($user->role == 'teacher' ? 'Professeur' : 'Étudiant') }}
                                </span>
                                @if($user->account_status == 'approved')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">Actif</span>
                                @elseif($user->account_status == 'pending')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">En attente</span>
                                @else {{-- Assuming any other status is 'suspended' or similar inactive state --}}
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">Suspendu</span>
                                @endif
                            </div>
                            {{-- Boutons d'Action --}}
                            <div class="mt-auto flex items-center space-x-3">
                                {{-- Logique des boutons approuver/suspendre/réactiver basée sur le statut actuel --}}
                                @if ($user->account_status === 'approved')
                                    <form action="{{ route('admin.rejectUser', $user->id) }}" method="POST" class="flex-1"> @csrf
                                        <button type="submit" class="w-full inline-flex justify-center items-center px-3 py-2 border border-transparent shadow-sm text-xs font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-red-500">Suspendre</button>
                                    </form>
                                @elseif ($user->account_status === 'pending')
                                    <form action="{{ route('admin.approveUser', $user->id) }}" method="POST" class="flex-1"> @csrf
                                        <button type="submit" class="w-full inline-flex justify-center items-center px-3 py-2 border border-transparent shadow-sm text-xs font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-green-500">Approuver</button>
                                    </form>
                                @else {{-- Assuming status is 'suspended' or needs reactivation --}}
                                     <form action="{{ route('admin.approveUser', $user->id) }}" method="POST" class="flex-1"> @csrf
                                        <button type="submit" class="w-full inline-flex justify-center items-center px-3 py-2 border border-transparent shadow-sm text-xs font-medium rounded-md text-white bg-emerald-600 hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-emerald-500">Réactiver</button>
                                    </form>
                                @endif
                                {{-- Ajoutez un bouton de suppression si nécessaire, avec une confirmation JS --}}
                                {{--
                                <form action="{{ route('admin.deleteUser', $user->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ? Cette action est irréversible.');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 text-gray-400 hover:text-red-600 focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-red-500 rounded-md">
                                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" /></svg>
                                    </button>
                                </form>
                                --}}
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination (inchangé) -->
                <div class="mt-8">
                     @if ($users->hasPages())
                        <div class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6 rounded-b-lg shadow-sm">
                            <div class="flex-1 flex justify-between sm:hidden"> {{-- Mobile --}}
                                <a href="{{ $users->previousPageUrl() }}" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 {{ $users->onFirstPage() ? ' opacity-50 cursor-not-allowed' : '' }}"> Précédent </a>
                                <a href="{{ $users->nextPageUrl() }}" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 {{ !$users->hasMorePages() ? ' opacity-50 cursor-not-allowed' : '' }}"> Suivant </a>
                            </div>
                            <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between"> {{-- Desktop --}}
                                <div>
                                     <p class="text-sm text-gray-700">
                                         Affichage de <span class="font-medium">{{ $users->firstItem() }}</span> à <span class="font-medium">{{ $users->lastItem() }}</span> sur <span class="font-medium">{{ $users->total() }}</span> résultats
                                     </p>
                                </div>
                                <div>
                                    {{ $users->links() }} {{-- Utilise les liens Laravel --}}
                                </div>
                           </div>
                        </div>
                     @endif
                 </div>

            @else
                {{-- État Vide (inchangé) --}}
                <div class="text-center py-16 px-6 bg-white rounded-lg shadow border border-gray-200">
                    <svg class="mx-auto h-12 w-12 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" /> </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900">Aucun utilisateur trouvé</h3>
                    <p class="mt-1 text-sm text-gray-500">
                         @if(request()->has('role') || request()->has('status'))
                             Essayez d'ajuster vos filtres.
                         @else
                             Commencez par ajouter un nouvel utilisateur.
                         @endif
                    </p>
                     {{-- Le bouton réinitialiser n'est plus nécessaire ici car il a été supprimé des filtres --}}
                </div>
            @endif

        </div>
    </main>

</body>
</html>