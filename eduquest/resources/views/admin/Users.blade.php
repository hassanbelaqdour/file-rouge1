<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des utilisateurs - EduQuest</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f3f4f6;
        }
        nav[role="navigation"] span[aria-current="page"] span {
             background-color: #EEF2FF !important; border-color: #6366F1 !important; color: #4338CA !important; font-weight: 600 !important;
        }
        nav[role="navigation"] a:hover { background-color: #f3f4f6 !important; }
        nav[role="navigation"] span[aria-disabled="true"] svg { color: #9ca3af !important; }
        ::-webkit-scrollbar { width: 8px; height: 8px;}
        ::-webkit-scrollbar-track { background: #333; border-radius: 10px;}
        ::-webkit-scrollbar-thumb { background: #555; border-radius: 10px;}
        ::-webkit-scrollbar-thumb:hover { background: #777; }
    </style>
     
     
</head>
<body class="flex antialiased">

    
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
            
            <a href="{{ route('admin.StatistiqueAdmin') }}" class="flex items-center space-x-3 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-150 ease-in-out
               {{ request()->routeIs('admin.StatistiqueAdmin') ? 'bg-gray-700 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                
                <i class="fas fa-chart-simple text-lg"></i>
                <span>Statistiques</span>
            </a>

            
            <a href="{{ route('admin.Users') }}" class="flex items-center space-x-3 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-150 ease-in-out
               {{ request()->routeIs('admin.Users') ? 'bg-gray-700 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                
                 <i class="fas fa-users text-lg"></i>
                 <span>Utilisateurs</span>
            </a>

            
            <a href="{{ route('admin.GestionCourses') }}" class="flex items-center space-x-3 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-150 ease-in-out
               {{ request()->routeIs('admin.GestionCourses') ? 'bg-gray-700 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                
                 <i class="fas fa-book text-lg"></i>
                 <span>Gestion des Cours</span>
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
        <div class="max-w-none mx-auto">

            
            <div class="mb-6">
                <h1 class="text-2xl md:text-3xl font-bold text-gray-900">Gestion des Utilisateurs</h1>
                <p class="text-sm text-gray-500 mt-1">Gérez les comptes utilisateurs et leurs permissions</p>
            </div>

            
            <form method="GET" action="{{ route('admin.Users') }}">
                <div class="flex flex-col md:flex-row items-center justify-between gap-4 mb-6 bg-white p-4 rounded-lg shadow-sm border border-gray-200">
                    

                    
                    <div class="flex items-center space-x-4 w-full md:w-auto md:flex-grow"> 
                        
                        <select name="role" onchange="this.form.submit()" class="px-4 py-2 border border-gray-300 rounded-md bg-white text-sm focus:ring-indigo-500 focus:border-indigo-500 w-full sm:w-auto">
                             <option value="" {{ !$selectedRole ? 'selected' : '' }}>Tous les rôles</option>
                             <option value="admin" {{ $selectedRole == 'admin' ? 'selected' : '' }}>Administrateur</option>
                             <option value="student" {{ $selectedRole == 'student' ? 'selected' : '' }}>Étudiant</option>
                             <option value="teacher" {{ $selectedRole == 'teacher' ? 'selected' : '' }}>Professeur</option>
                        </select>
                        
                        <select name="status" onchange="this.form.submit()" class="px-4 py-2 border border-gray-300 rounded-md bg-white text-sm focus:ring-indigo-500 focus:border-indigo-500 w-full sm:w-auto">
                             <option value="" {{ !$selectedStatus ? 'selected' : '' }}>Tous les statuts</option>
                             <option value="approved" {{ $selectedStatus == 'approved' ? 'selected' : '' }}>Actif</option>
                             <option value="pending" {{ $selectedStatus == 'pending' ? 'selected' : '' }}>En attente</option>
                              
                             <option value="suspended" {{ $selectedStatus == 'suspended' ? 'selected' : '' }}>Suspendu</option>
                        </select>
                        
                       
                    </div>

                </div>
            </form>

            
            @if ($users->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @foreach ($users as $user)
                        
                        <div class="bg-white rounded-lg shadow border border-gray-200 p-5 flex flex-col">
                            
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
                                @else 
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">Suspendu</span>
                                @endif
                            </div>
                            
                            <div class="mt-auto flex items-center space-x-3">
                                
                                @if ($user->account_status === 'approved')
                                    <form action="{{ route('admin.rejectUser', $user->id) }}" method="POST" class="flex-1"> @csrf
                                        <button type="submit" class="w-full inline-flex justify-center items-center px-3 py-2 border border-transparent shadow-sm text-xs font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-red-500">Suspendre</button>
                                    </form>
                                @elseif ($user->account_status === 'pending')
                                    <form action="{{ route('admin.approveUser', $user->id) }}" method="POST" class="flex-1"> @csrf
                                        <button type="submit" class="w-full inline-flex justify-center items-center px-3 py-2 border border-transparent shadow-sm text-xs font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-green-500">Approuver</button>
                                    </form>
                                @else 
                                     <form action="{{ route('admin.approveUser', $user->id) }}" method="POST" class="flex-1"> @csrf
                                        <button type="submit" class="w-full inline-flex justify-center items-center px-3 py-2 border border-transparent shadow-sm text-xs font-medium rounded-md text-white bg-emerald-600 hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-emerald-500">Réactiver</button>
                                    </form>
                                @endif
                                
                              
                            </div>
                        </div>
                    @endforeach
                </div>

                
                <div class="mt-8">
                     @if ($users->hasPages())
                        <div class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6 rounded-b-lg shadow-sm">
                            <div class="flex-1 flex justify-between sm:hidden"> 
                                <a href="{{ $users->previousPageUrl() }}" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 {{ $users->onFirstPage() ? ' opacity-50 cursor-not-allowed' : '' }}"> Précédent </a>
                                <a href="{{ $users->nextPageUrl() }}" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 {{ !$users->hasMorePages() ? ' opacity-50 cursor-not-allowed' : '' }}"> Suivant </a>
                            </div>
                            <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between"> 
                                <div>
                                     <p class="text-sm text-gray-700">
                                         Affichage de <span class="font-medium">{{ $users->firstItem() }}</span> à <span class="font-medium">{{ $users->lastItem() }}</span> sur <span class="font-medium">{{ $users->total() }}</span> résultats
                                     </p>
                                </div>
                                <div>
                                    {{ $users->links() }} 
                                </div>
                           </div>
                        </div>
                     @endif
                 </div>

            @else
                
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
                     
                </div>
            @endif

        </div>
    </main>

</body>
</html>