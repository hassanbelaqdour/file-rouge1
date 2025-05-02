<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Cours - EduQuest</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f3f4f6; /* gray-100 */
        }
        /* Styles pagination, scrollbar... */
        nav[role="navigation"] span[aria-current="page"] span {
             background-color: #EEF2FF !important; border-color: #6366F1 !important; color: #4338CA !important; font-weight: 600 !important;
        }
        nav[role="navigation"] a:hover { background-color: #f3f4f6 !important; }
        nav[role="navigation"] span[aria-disabled="true"] svg { color: #9ca3af !important; }
        ::-webkit-scrollbar { width: 8px; height: 8px;}
        ::-webkit-scrollbar-track { background: #e5e7eb; border-radius: 10px;}
        ::-webkit-scrollbar-thumb { background: #9ca3af; border-radius: 10px;}
        ::-webkit-scrollbar-thumb:hover { background: #6b7280; }
        .aspect-video { position: relative; padding-bottom: 56.25%; }
        .aspect-video > * { position: absolute; height: 100%; width: 100%; top: 0; right: 0; bottom: 0; left: 0; }
    </style>
</head>
<body class="bg-gray-100 flex antialiased">

    <!-- SIDEBAR FIXE -->
    <aside class="w-64 h-screen bg-gray-800 shadow-lg fixed top-0 left-0 z-20 flex flex-col">
        <div class="p-5 border-b border-gray-700 flex items-center space-x-3">
            <div class="w-8 h-8 bg-indigo-500 rounded-md flex items-center justify-center text-white font-bold text-lg flex-shrink-0">E</div>
            <h1 class="text-xl font-bold text-white">EduQuest</h1>
        </div>
        <nav class="flex-grow p-4 space-y-1 overflow-y-auto">
            <a href="{{ route('admin.StatistiqueAdmin') }}" class="flex items-center px-3 py-2.5 rounded-md text-sm font-medium transition-colors duration-150 ease-in-out text-gray-300 hover:bg-gray-700 hover:text-white group">
                <svg class="w-5 h-5 mr-3 flex-shrink-0 text-gray-400 group-hover:text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75c0 .621-.504 1.125-1.125 1.125h-2.25A1.125 1.125 0 013 21v-7.875zM12.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v12.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM21 4.125c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v17.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" /></svg>
                Statistiques
            </a>
            <a href="{{ route('admin.Users') }}" class="flex items-center px-3 py-2.5 rounded-md text-sm font-medium transition-colors duration-150 ease-in-out text-gray-300 hover:bg-gray-700 hover:text-white group">
                 <svg class="w-5 h-5 mr-3 flex-shrink-0 text-gray-400 group-hover:text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" /> </svg>
                Utilisateurs
            </a>
            {{-- Lien Gestion des Cours (Actif) --}}
            <a href="{{ route('admin.GestionCourses') }}" class="flex items-center px-3 py-2.5 rounded-md text-sm font-medium transition-colors duration-150 ease-in-out bg-gray-700 text-white group">
                <svg class="w-5 h-5 mr-3 flex-shrink-0 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m.75 12.75h4.5m-4.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" /> </svg>
                Gestion des Cours
            </a>
        </nav>
        <div class="p-4 mt-auto border-t border-gray-700">
             @auth
             <div class="flex items-center mb-4">
                 <div class="w-10 h-10 rounded-full bg-emerald-500 text-white flex items-center justify-center font-semibold mr-3 flex-shrink-0">
                      {{ strtoupper(substr(Auth::user()->first_name ?? 'A', 0, 1)) }}{{ strtoupper(substr(Auth::user()->last_name ?? 'D', 0, 1)) }}
                 </div>
                 <div>
                     <p class="text-sm font-medium text-white">{{ Auth::user()->first_name ?? 'Admin' }} {{ Auth::user()->last_name ?? '' }}</p>
                     <p class="text-xs text-gray-400">{{ Auth::user()->email ?? 'admin@example.com' }}</p>
                 </div>
            </div>
            @endauth
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full flex items-center justify-center text-sm font-medium text-red-400 bg-gray-700 hover:bg-red-600 hover:text-white px-3 py-2.5 rounded-md group transition-colors duration-150">
                    <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" /> </svg>
                    Déconnexion
                </button>
            </form>
        </div>
    </aside>

    <!-- CONTENU PRINCIPAL -->
    <main class="ml-64 w-full p-6 md:p-8 lg:p-10">
        <div class="max-w-none mx-auto">

            <!-- Header Page -->
             <div class="flex flex-col md:flex-row items-center justify-between gap-4 mb-6">
                <div>
                    <h1 class="text-2xl md:text-3xl font-bold text-gray-900">Gestion des Cours</h1>
                    <p class="text-sm text-gray-500 mt-1">Approuvez ou rejetez les cours soumis.</p>
                </div>
                
             </div>

            {{-- Ici, tu peux ajouter des filtres pour les cours si nécessaire --}}
            {{-- <form method="GET" action="{{ route('admin.GestionCourses') }}"> ... filtres ... </form> --}}

            <!-- Grille des Cours -->
            {{-- **CORRIGÉ : Ajout de la condition et de la boucle @foreach** --}}
            @if ($courses->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @foreach ($courses as $course) {{-- **La boucle commence ICI** --}}

                        {{-- Carte de cours (Code de la carte individuelle) --}}
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden flex flex-col h-full group transform hover:-translate-y-1 transition-all duration-300 ease-out">

                            {{-- Section Image/Placeholder --}}
                            <div class="aspect-video bg-gray-200 rounded-t-lg flex items-center justify-center text-gray-400 overflow-hidden">
                                {{-- **UTILISATION DE $course (singulier)** --}}
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
                                    {{-- **UTILISATION DE $course (singulier) pour les routes et la logique** --}}
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
                                </div>
                            </div>
                        </div>
                        {{-- Fin de la carte --}}

                    @endforeach {{-- **La boucle se termine ICI** --}}
                </div>

                <!-- Pagination -->
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
                {{-- État Vide --}}
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