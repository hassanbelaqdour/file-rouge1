<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des utilisateurs - EduQuest</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        /* Styles pagination Tailwind par défaut (si non publiés/configurés) */
        /* Page active */
        nav[role="navigation"] span[aria-current="page"] span {
             background-color: #EEF2FF !important; /* indigo-50 */
             border-color: #6366F1 !important; /* indigo-500 */
             color: #4338CA !important; /* indigo-700 */
             font-weight: 600 !important;
        }
        nav[role="navigation"] a:hover {
             background-color: #f3f4f6 !important; /* gray-100 */
        }
        /* Liens Précédent/Suivant désactivés */
         nav[role="navigation"] span[aria-disabled="true"] svg {
             color: #9ca3af !important; /* gray-400 */
        }

        /* Style scrollbar (optionnel) */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; border-radius: 10px; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
    </style>
</head>
<body class="bg-gray-100 flex antialiased">

    <!-- Sidebar -->
    <aside class="w-64 h-screen bg-white shadow-md fixed top-0 left-0 border-r border-gray-200 z-20 flex flex-col">
        <!-- Header Sidebar -->
        <div class="p-5 border-b border-gray-200 flex items-center space-x-2">
            <svg class="w-8 h-8 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" /> </svg>
            <h1 class="text-xl font-bold text-gray-800">EduQuest</h1>
        </div>
        <!-- Navigation -->
        <nav class="flex-grow p-4 space-y-1 overflow-y-auto">
            {{-- Lien Statistiques --}}
            <a href="{{ route('admin.StatistiqueAdmin') }}" class="flex items-center px-3 py-2.5 rounded-md text-sm font-medium transition-colors duration-150 ease-in-out text-gray-600 hover:bg-gray-100 hover:text-gray-900">
                <svg class="w-5 h-5 mr-3 flex-shrink-0 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75c0 .621-.504 1.125-1.125 1.125h-2.25A1.125 1.125 0 013 21v-7.875zM12.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v12.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM21 4.125c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v17.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" /></svg>
                Statistiques
            </a>
            {{-- Lien Utilisateurs (Actif) --}}
            <a href="{{-- route('admin.users.index') --}}" class="flex items-center px-3 py-2.5 rounded-md text-sm font-medium transition-colors duration-150 ease-in-out bg-indigo-50 text-indigo-700">
                 <svg class="w-5 h-5 mr-3 flex-shrink-0 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" /> </svg>
                Utilisateurs
            </a>
            {{-- Lien Gestion des cours --}}
            <a href="{{ route('admin.GestionCourses') }}" class="flex items-center px-3 py-2.5 rounded-md text-sm font-medium transition-colors duration-150 ease-in-out text-gray-600 hover:bg-gray-100 hover:text-gray-900">
                <svg class="w-5 h-5 mr-3 flex-shrink-0 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m.75 12.75h4.5m-4.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" /> </svg>
                Gestion des cours
            </a>
        </nav>
        <!-- Logout -->
        <div class="p-4 mt-auto border-t border-gray-200">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full flex items-center justify-center text-sm font-medium text-red-600 bg-red-50 hover:bg-red-100 px-3 py-2.5 rounded-md group">
                    <svg class="w-5 h-5 mr-2 text-red-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" /> </svg>
                    Déconnexion
                </button>
            </form>
        </div>
    </aside>

    <!-- Contenu Principal -->
    <main class="ml-64 w-full p-6 md:p-8 lg:p-10">
        <div class="max-w-7xl mx-auto">

            <!-- Titre Page -->
            <h1 class="text-3xl font-bold text-gray-900 mb-6">Gestion des utilisateurs</h1>

            <!-- Filtres et Recherche (Structure conservée, fonctionnalité à implémenter) -->
                        <!-- Filtres et Recherche -->
            {{-- **MODIFIÉ : Formulaire GET pour envoyer les filtres dans l'URL** --}}
            <form method="GET" action="{{-- route('admin.users.index') --}}"> {{-- **IMPORTANT : Mettre la route de ta page ici** --}}
                <div class="flex flex-col md:flex-row items-center justify-between gap-4 mb-6 bg-white p-4 rounded-lg shadow-sm border border-gray-200">

                    {{-- Barre de Recherche --}}
                    <div class="relative w-full md:w-auto md:flex-grow">
                        <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" /> </svg>
                        </span>
                        {{-- **MODIFIÉ : Ajout name="search" et value pour la recherche --}}
                        <input type="search" name="search" value="{{ request('search') }}" placeholder="Rechercher un utilisateur..." class="pl-10 pr-4 py-2 w-full border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 text-sm">
                    </div>

                    {{-- Filtres Dropdown --}}
                    <div class="flex items-center space-x-4 w-full md:w-auto">
                        {{-- **MODIFIÉ : Select pour le Rôle** --}}
                        <select name="role" onchange="this.form.submit()" class="px-4 py-2 border border-gray-300 rounded-md bg-white text-sm focus:ring-indigo-500 focus:border-indigo-500 w-full md:w-auto">
                            <option value="" {{ !$selectedRole ? 'selected' : '' }}>Tous les rôles</option>
                            <option value="student" {{ $selectedRole == 'student' ? 'selected' : '' }}>Étudiant</option>
                            <option value="teacher" {{ $selectedRole == 'teacher' ? 'selected' : '' }}>Professeur</option>
                            <option value="admin" {{ $selectedRole == 'admin' ? 'selected' : '' }}>Admin</option>
                        </select>

                        {{-- **MODIFIÉ : Select pour le Statut** --}}
                        <select name="status" onchange="this.form.submit()" class="px-4 py-2 border border-gray-300 rounded-md bg-white text-sm focus:ring-indigo-500 focus:border-indigo-500 w-full md:w-auto">
                            <option value="" {{ !$selectedStatus ? 'selected' : '' }}>Tous les statuts</option>
                            <option value="approved" {{ $selectedStatus == 'approved' ? 'selected' : '' }}>Approuvé</option>
                            <option value="pending" {{ $selectedStatus == 'pending' ? 'selected' : '' }}>En attente</option>
                        </select>

                    </div>
                     {{-- <button type="submit">Filtrer</button> --}} {{-- Optionnel si on n'utilise pas onchange --}}
                </div>
            </form>
            {{-- FIN MODIFIÉ --}}

            {{-- ... Le reste de ta page (tableau, etc.) ... --}}

            <!-- Tableau des utilisateurs -->
            <div class="bg-white rounded-lg shadow-sm overflow-hidden border border-gray-200">
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm">
                        <thead class="bg-gray-50 border-b border-gray-200">
                            <tr>
                                <th scope="col" class="px-6 py-3 font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                                <th scope="col" class="px-6 py-3 font-medium text-gray-500 uppercase tracking-wider">Prénom</th>
                                <th scope="col" class="px-6 py-3 font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                <th scope="col" class="px-6 py-3 font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                                <th scope="col" class="px-6 py-3 font-medium text-gray-500 uppercase tracking-wider">Rôle</th>
                                <th scope="col" class="px-6 py-3 font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            {{-- Boucle sur les utilisateurs --}}
                            @if ($users->count() > 0)
                                @foreach ($users as $user)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-900">{{ $user->last_name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-gray-600">{{ $user->first_name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-gray-600">{{ $user->email }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{-- Badge Statut --}}
                                            @if ($user->account_status === 'approved')
                                                <span class="px-2.5 py-0.5 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                    Approuvé
                                                </span>
                                            @else
                                                <span class="px-2.5 py-0.5 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                    En attente
                                                </span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-gray-600">{{ $user->role }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            {{-- Boutons d'Action Conditionnels --}}
                                            @if ($user->account_status === 'pending')
                                                <form action="{{ route('admin.approveUser', $user->id) }}" method="POST" class="inline-block">
                                                    @csrf
                                                    <button type="submit" class="text-green-600 hover:text-green-900">Approuver</button>
                                                </form>
                                            @elseif ($user->account_status === 'approved')
                                                <form action="{{ route('admin.rejectUser', $user->id) }}" method="POST" class="inline-block">
                                                    @csrf
                                                    <button type="submit" class="text-orange-600 hover:text-orange-900">Mettre en attente</button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                {{-- Message si aucun utilisateur --}}
                                <tr>
                                    <td colspan="6" class="text-center px-6 py-10 text-gray-500">
                                        Aucun utilisateur trouvé.
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>

                <!-- Pied de tableau : Pagination -->
                <div class="flex flex-col sm:flex-row items-center justify-between px-6 py-3 bg-gray-50 border-t border-gray-200 rounded-b-lg">
                    {{-- **MODIFIÉ : Affichage dynamique des informations de pagination** --}}
                    @if ($users->total() > 0)
                        <p class="text-sm text-gray-700 mb-2 sm:mb-0">
                            Affichage de <span class="font-medium">{{ $users->firstItem() }}</span> à <span class="font-medium">{{ $users->lastItem() }}</span> sur <span class="font-medium">{{ $users->total() }}</span> utilisateurs
                        </p>
                    @else
                         <p class="text-sm text-gray-700 mb-2 sm:mb-0">
                             Aucun utilisateur à afficher.
                         </p>
                    @endif

                    {{-- **MODIFIÉ : Génération automatique des liens de pagination** --}}
                    {{-- S'assure qu'il y a des pages à afficher avant de rendre les liens --}}
                    @if ($users->hasPages())
                        <div class="mt-2 sm:mt-0"> {{-- Ajout d'un div conteneur pour l'espacement --}}
                            {{ $users->links() }}
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </main>

</body>
</html>