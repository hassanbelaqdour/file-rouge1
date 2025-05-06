<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mes Cours Favoris - EduQuest</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Material Symbols CDN (pour les icônes du header) -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />

    <link href="https://fonts.googleapis.com/css2?family=Sniglet&display=swap" rel="stylesheet">

    <style>
        .sniglet { font-family: 'Sniglet', cursive; }

        /* Styles scrollbar (conservés) */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; border-radius: 10px; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }

         /* Fix Material Symbols icon alignment if needed */
         .material-symbols-outlined, .material-icons {
            vertical-align: middle;
         }

         /* Add padding to the body equal to header height to prevent content overlap */
         /* Estimate header height based on py-4 and content, roughly 64px (4rem) + border/shadow */
         /* Adjust this value if the header height changes */
         body {
             padding-top: 68px;
             /* This page didn't have 'flex' on body, so no need to remove it */
         }

         /* Ensure fixed header stays on top */
         header {
             z-index: 20;
         }
    </style>
     {{-- Aucun AlpineJS n'était dans le code fourni pour cette page, donc pas besoin de le laisser ou de le supprimer. --}}
     {{-- <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script> --}}
</head>
{{-- Removed flex antialiased from body class (it wasn't there anyway) --}}
<body class="bg-gray-100 antialiased">

    <!-- Header Global -->
    <header
        class="bg-white py-4 px-6 flex justify-between items-center fixed top-0 left-0 w-full z-20 shadow-md border-b border-gray-200">
        <div class="text-2xl font-semibold text-black">EduQuest</div>
        <nav class="hidden md:flex items-center gap-6">
            <!-- All Courses Dropdown -->
            <div class="relative group">       
            <a href="{{ route('mesfavorites') }}"
                class="flex items-center gap-2 py-2 px-4 w-full rounded-md text-gray-700 hover:bg-gray-100 hover:text-black">
                {{-- Icône pour les favoris (par exemple, 'favorite' ou 'heart_plus') --}}
                <span class="material-symbols-outlined">favorite</span> 
                Mes cours favoris
            </a>
            </div> 
            <div class="relative group">
                <a href="{{ route('courses.index') }}"
                    class="flex items-center gap-2 py-2 px-4 rounded-md text-gray-700 hover:bg-gray-100 hover:text-black">
                    <span class="material-symbols-outlined">menu_book</span> All Courses
                </a>
            </div>
            
            <!-- Course Categories Dropdown -->
            <div class="relative group">
                <button
                    class="flex items-center gap-2 py-2 px-4 w-full rounded-md text-gray-700 hover:bg-gray-100 hover:text-black">
                    <span class="material-symbols-outlined">category</span> Categories
                </button>
                <div
                    class="absolute left-0 -mt-1 hidden group-hover:block bg-white border border-gray-200 rounded-md shadow-lg z-10 w-48">
                    <!-- Liens dropdown header en vert -->
                    <a href="#" class="block px-4 py-2 text-sm text-green-700 hover:bg-gray-100">Developpement</a>
                    <a href="#" class="block px-4 py-2 text-sm text-green-700 hover:bg-gray-100">Design</a>
                    <a href="#" class="block px-4 py-2 text-sm text-green-700 hover:bg-gray-100">Marketing</a>
                    <a href="#" class="block px-4 py-2 text-sm text-green-700 hover:bg-gray-100">Management</a>
                </div>
            </div>
            <!-- Course Types Dropdown -->
            <div class="relative group">
                <button
                    class="flex items-center gap-2 py-2 px-4 w-full rounded-md text-gray-700 hover:bg-gray-100 hover:text-black">
                    <span class="material-symbols-outlined">local_offer</span> Types de Cours
                </button>
                <div
                    class="absolute left-0 -mt-1 hidden group-hover:block bg-white border border-gray-200 rounded-md shadow-lg z-10 w-48">
                    <!-- Liens dropdown header en vert -->
                    <a href="#" class="block px-4 py-2 text-sm text-green-700 hover:bg-gray-100">Gratuit</a>
                    <a href="#" class="block px-4 py-2 text-sm text-green-700 hover:bg-gray-100">Payant</a>
                    <a href="#" class="block px-4 py-2 text-sm text-green-700 hover:bg-gray-100">Certifie</a>
                </div>
            </div>
        </nav>
        <!-- Notifications & Profile -->
        <div class="flex items-center space-x-4 relative">
            <button
                class="w-10 h-10 flex items-center justify-center rounded-full text-gray-500 hover:text-black hover:bg-gray-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                </svg> </button>
            <div class="relative group"> <button
                    class="w-10 h-10 rounded-full bg-gray-200 focus:outline-none flex items-center justify-center text-gray-500">
                    <span class="material-symbols-outlined">person</span> </button>
                                <div class="absolute right-0 -mt-1 w-48 bg-white shadow-lg rounded-lg border border-gray-200 opacity-0 group-hover:opacity-100 pointer-events-none group-hover:pointer-events-auto transition-opacity duration-200 z-10">
                                
                                    {{-- Lien vers le profil (Adaptez le href si vous avez une route nommee) --}}
                                    <a href="{{-- route('profile.show') --}}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                                        <span class="material-icons mr-2 align-middle">account_circle</span> Voir Profil
                                    </a>
                                
                                    {{-- Formulaire de deconnexion Laravel --}}
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf {{-- Directive Blade pour la protection CSRF --}}
                                
                                        <button type="submit" class="block w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">
                                            <span class="material-icons mr-2 align-middle">logout</span>
                                            Logout
                                        </button>
                                    </form>
                                </div>
            </div>
        </div>
    </header>


    {{-- Contenu Principal --}}
    {{-- Retiré le ml-64 et le mt-16, le padding-top sur le body gère l'espace sous le header fixe --}}
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-8 sniglet">Mes Cours Favoris</h1>

        {{-- Messages flash (Identique) --}}
        @if (session('status'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                {{ session('status') }}
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                {{ session('error') }}
            </div>
        @endif

        {{-- GRILLE DES COURS FAVORIS (Identique) --}}
        @if ($courses && $courses->count() > 0)

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                @foreach ($courses as $course)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300 flex flex-col h-full">

                        <div class="h-40 overflow-hidden">
                            @if($course->image_path)
                                <img src="{{ Storage::url($course->image_path) }}" alt="Image {{ $course->title }}" class="w-full h-full object-cover">
                            @else

                                <div class="w-full h-40 bg-gray-200 flex items-center justify-center text-gray-500">Aucune image</div>
                            @endif
                        </div>


                        <div class="p-4 flex flex-col flex-grow">

                            @if($course->category)
                                <p class="text-xs font-medium text-blue-600 uppercase tracking-wide mb-1">
                                    {{ $course->category->name }}
                                </p>
                            @endif


                            <h3 class="font-semibold text-lg text-gray-800 sniglet mb-1">

                                <a href="{{ route('student.courses.show', $course->id) }}" class="hover:text-blue-600">{{ $course->title }}</a>
                            </h3>


                            <p class="text-gray-600 text-sm mt-1 mb-4 flex-grow">{{ Str::limit($course->description, 100) }}</p>


                            <div class="mt-auto flex items-end justify-between pt-3 border-t border-gray-100">
                                <div>
                                    <p class="text-gray-700 font-medium text-sm">Prix :</p>
                                    <p class="text-green-600 font-bold text-lg leading-tight">
                                        {{ $course->type == 'paid' && $course->price > 0 ? number_format($course->price, 2) . '€' : 'Gratuit' }}
                                    </p>
                                </div>

                                <div class="flex space-x-2 items-center">


                                    <form action="{{ route('student.courses.like', $course->id) }}" method="POST" class="inline-block">
                                        @csrf

                                        <button type="submit"
                                                title="Retirer des favoris"
                                                class="p-2 rounded-full text-red-500 bg-red-100 hover:bg-red-200 transition-colors duration-200 ease-in-out">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </form>


                                    @php
                                         $isEnrolled = Auth::check() ? \App\Models\Enrollment::where('user_id', Auth::id())->where('course_id', $course->id)->where('status', 'completed')->exists() : false;

                                    @endphp

                                    @if($course->type == 'free' || $course->price <= 0 || $isEnrolled)
                                        <a href="{{ route('student.courses.show', $course->id) }}"
                                           class="px-4 py-2 rounded-md bg-green-600 text-white text-sm hover:bg-green-700">
                                            Accéder
                                        </a>
                                    @else
                                        <a href="{{ route('payment.checkout', $course->id) }}"
                                           class="px-4 py-2 rounded-md bg-blue-600 text-white text-sm hover:bg-blue-700">
                                            S'inscrire ({{ number_format($course->price, 2) }}€)
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        @else

            <div class="text-center py-16 px-6 bg-white rounded-lg shadow border">
                <svg class="mx-auto h-12 w-12 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" /> </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900">Vous n'avez pas encore ajouté de cours à vos favoris.</h3>
                <p class="mt-1 text-sm text-gray-500">Explorez notre catalogue pour trouver des cours à aimer !</p>

                 <a href="{{ route('courses.index') }}" class="mt-4 inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors">
                    Parcourir les cours
                </a>
            </div>
        @endif

    </div>


</body>
</html>