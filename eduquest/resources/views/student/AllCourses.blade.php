<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>votre plateforme d'education en ligne</title>
    <script src="https://cdn.tailwindcss.com"></script>

    
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Sniglet&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <style>
        body {
            font-family: 'Sniglet', cursive;
        }

        .group:hover .group-hover\:block {
            display: block;
        }

        .group:hover .group-hover\:opacity-100 {
            opacity: 1;
        }

        .group:hover .group-hover\:pointer-events-auto {
            pointer-events: auto;
        }
    </style>
</head>

<body class="bg-gray-100" style="font-family: 'Sniglet', cursive;">

    
    <header
        class="bg-white py-4 px-6 flex justify-between items-center fixed top-0 left-0 w-full z-20 shadow-md border-b border-gray-200">
        <div class="text-2xl font-semibold text-black">EduQuest</div>
        <nav class="hidden md:flex items-center gap-6">
            
            <div class="relative group">       
            <a href="{{ route('mesfavorites') }}"
                class="flex items-center gap-2 py-2 px-4 w-full rounded-md text-gray-700 hover:bg-gray-100 hover:text-black">
                
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
            
            
            <div class="relative group">
                <button
                    class="flex items-center gap-2 py-2 px-4 w-full rounded-md text-gray-700 hover:bg-gray-100 hover:text-black">
                    <span class="material-symbols-outlined">category</span> Categories
                </button>
                <div
                    class="absolute left-0 -mt-1 hidden group-hover:block bg-white border border-gray-200 rounded-md shadow-lg z-10 w-48">
                    
                    <a href="#" class="block px-4 py-2 text-sm text-green-700 hover:bg-gray-100">Developpement</a>
                    <a href="#" class="block px-4 py-2 text-sm text-green-700 hover:bg-gray-100">Design</a>
                    <a href="#" class="block px-4 py-2 text-sm text-green-700 hover:bg-gray-100">Marketing</a>
                    <a href="#" class="block px-4 py-2 text-sm text-green-700 hover:bg-gray-100">Management</a>
                </div>
            </div>
            
            <div class="relative group">
                <button
                    class="flex items-center gap-2 py-2 px-4 w-full rounded-md text-gray-700 hover:bg-gray-100 hover:text-black">
                    <span class="material-symbols-outlined">local_offer</span> Types de Cours
                </button>
                <div
                    class="absolute left-0 -mt-1 hidden group-hover:block bg-white border border-gray-200 rounded-md shadow-lg z-10 w-48">
                    
                    <a href="#" class="block px-4 py-2 text-sm text-green-700 hover:bg-gray-100">Gratuit</a>
                    <a href="#" class="block px-4 py-2 text-sm text-green-700 hover:bg-gray-100">Payant</a>
                    <a href="#" class="block px-4 py-2 text-sm text-green-700 hover:bg-gray-100">Certifie</a>
                </div>
            </div>
        </nav>
        
        <div class="flex items-center space-x-4 relative">
            <button
                class="w-10 h-10 flex items-center justify-center rounded-full text-gray-500 hover:text-black hover:bg-gray-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                </svg> </button>
            <div class="relative group"> 
                <button
                    class="w-10 h-10 rounded-full bg-gray-200 focus:outline-none flex items-center justify-center text-gray-500">
                    <span class="material-symbols-outlined">person</span> </button>
                                <div class="absolute right-0 -mt-1 w-48 bg-white shadow-lg rounded-lg border border-gray-200 opacity-0 group-hover:opacity-100 pointer-events-none group-hover:pointer-events-auto transition-opacity duration-200 z-10">
                                
                                    
                                    <a href="" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 text-sm">
                                        <span class="material-icons mr-2 align-middle">account_circle</span>
                                        {{ Auth::user()->email ?? 'admin@example.com' }}
                                    </a>

                                
                                    
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf 
                                
                                        <button type="submit" class="block w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">
                                            <span class="material-icons mr-2 align-middle">logout</span>
                                            Logout
                                        </button>
                                    </form>
                                </div>
            </div>
        </div>
    </header>

    
    <div class="flex flex-col min-h-screen pt-16 md:pt-20">

        
        <section class="bg-green-900 text-white py-20 md:py-32">
            <div class="container mx-auto px-6 text-center">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-4 leading-tight"> developpez votre <span
                        class="text-green-400">potentiel</span> </h1>
                <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-8 leading-tight"> avec nos cours en ligne </h2>
                <form class="max-w-2xl mx-auto mt-10 mb-16" action="/recherche" method="get">
                    <div class="flex items-center rounded-md shadow-sm"> <input type="search" name="q" id="search"
                            placeholder="que voulez-vous apprendre ? ex: python, marketing digital..."
                            class="flex-grow px-4 py-3 text-gray-900 rounded-l-md border-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50 outline-none">
                        <button type="submit" aria-label="rechercher"
                            class="bg-green-600 hover:bg-green-700 text-white px-5 py-3 rounded-r-md transition duration-150 ease-in-out">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                            </svg> </button> </div>
                </form>
                <div class="mt-16">
                    <p class="text-sm text-gray-300 mb-6">nos partenaires educatifs :</p>
                    <div class="flex flex-wrap justify-center items-center gap-x-8 gap-y-4"> <img
                            src="https://via.placeholder.com/100x40/ffffff/cccccc?text=logo+1" alt="logo partenaire 1"
                            class="h-8 opacity-80 hover:opacity-100 transition"> <img
                            src="https://via.placeholder.com/100x40/ffffff/cccccc?text=google" alt="logo google"
                            class="h-7 opacity-80 hover:opacity-100 transition"> <img
                            src="https://via.placeholder.com/100x40/ffffff/cccccc?text=coursera" alt="logo coursera"
                            class="h-6 opacity-80 hover:opacity-100 transition"> <img
                            src="https://via.placeholder.com/100x40/ffffff/cccccc?text=edx" alt="logo edx"
                            class="h-8 opacity-80 hover:opacity-100 transition"> <img
                            src="https://via.placeholder.com/100x40/ffffff/cccccc?text=logo+5" alt="logo partenaire 5"
                            class="h-9 opacity-80 hover:opacity-100 transition"> </div>
                </div>
            </div>
        </section>

        
        <section class="bg-white py-16">
            <div class="container mx-auto px-6">
                <div class="grid grid-cols-2 sm:grid-cols-4 lg:grid-cols-8 gap-8 text-center"> <a href="#"
                        class="group flex flex-col items-center text-gray-700 hover:text-green-700 transition">
                        <div class="bg-gray-100 group-hover:bg-green-100 p-4 rounded-full mb-2 transition"> <svg
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-8 h-8">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.25 6.75 22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3-4.5 16.5" />
                            </svg> </div> <span class="text-sm font-medium">developpement web</span>
                    </a> <a href="#"
                        class="group flex flex-col items-center text-gray-700 hover:text-green-700 transition">
                        <div class="bg-gray-100 group-hover:bg-green-100 p-4 rounded-full mb-2 transition"> <svg
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-8 h-8">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.75 3v11.25A2.25 2.25 0 0 0 6 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0 1 18 16.5h-2.25m-7.5 0h7.5m-7.5 0-1 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg> </div> <span class="text-sm font-medium">data science</span>
                    </a> <a href="#"
                        class="group flex flex-col items-center text-gray-700 hover:text-green-700 transition">
                        <div class="bg-gray-100 group-hover:bg-green-100 p-4 rounded-full mb-2 transition"> <svg
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-8 h-8">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M10.5 6a7.5 7.5 0 1 0 7.5 7.5h-7.5V6Z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M13.5 10.5H21A7.5 7.5 0 0 0 13.5 3v7.5Z" />
                            </svg> </div> <span class="text-sm font-medium">marketing digital</span>
                    </a> <a href="#"
                        class="group flex flex-col items-center text-gray-700 hover:text-green-700 transition">
                        <div class="bg-gray-100 group-hover:bg-green-100 p-4 rounded-full mb-2 transition"> <svg
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-8 h-8">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                            </svg> </div> <span class="text-sm font-medium">design graphique</span>
                    </a> <a href="#"
                        class="group flex flex-col items-center text-gray-700 hover:text-green-700 transition">
                        <div class="bg-gray-100 group-hover:bg-green-100 p-4 rounded-full mb-2 transition"> <svg
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-8 h-8">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M10.5 21l5.25-11.25L21 21m-9-3h7.5M3 5.621a48.474 48.474 0 0 1 6-.371m0 0c1.12 0 2.233.038 3.334.114M9 5.25V3m3.334 2.364C13.18 6.061 14.286 6.5 15.457 6.5m0 0v2.25m0 0c1.512 0 2.984.135 4.434.383M19.886 8.636 15.457 6.5m0 0v2.25m0 0c.94 0 1.863.07 2.748.191M15.457 8.751 12.75 10.5m-3.75 0h.008v.015h-.008V10.5Zm0 0a48.667 48.667 0 0 0-7.5 0l-1.098-.003" />
                            </svg> </div> <span class="text-sm font-medium">langues</span>
                    </a> <a href="#"
                        class="group flex flex-col items-center text-gray-700 hover:text-green-700 transition">
                        <div class="bg-gray-100 group-hover:bg-green-100 p-4 rounded-full mb-2 transition"> <svg
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-8 h-8">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.174C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.174 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.5 12.75a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0ZM18.75 10.5h.008v.015h-.008V10.5Z" />
                            </svg> </div> <span class="text-sm font-medium">photographie</span>
                    </a> <a href="#"
                        class="group flex flex-col items-center text-gray-700 hover:text-green-700 transition">
                        <div class="bg-gray-100 group-hover:bg-green-100 p-4 rounded-full mb-2 transition"> <svg
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-8 h-8">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M20.25 14.15v4.07a2.25 2.25 0 0 1-2.25 2.25h-12a2.25 2.25 0 0 1-2.25-2.25v-4.07m16.5 0M20.25 14.15V9.75m0 4.4V11.25m0 2.9V9.75m-16.5 4.4V9.75M3.75 14.15V11.25m0 2.9V9.75m16.5-5.85a2.25 2.25 0 0 0-2.25-2.25h-12a2.25 2.25 0 0 0-2.25 2.25m16.5 0M3.75 8.3h16.5M3.75 8.3V5.75m16.5 2.55V5.75m0 2.55a2.25 2.25 0 0 1-2.25 2.25h-12a2.25 2.25 0 0 1-2.25-2.25" />
                            </svg> </div> <span class="text-sm font-medium">business</span>
                    </a> <a href="#"
                        class="group flex flex-col items-center text-gray-700 hover:text-green-700 transition">
                        <div class="bg-gray-100 group-hover:bg-green-100 p-4 rounded-full mb-2 transition"> <svg
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-8 h-8">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                            </svg> </div> <span class="text-sm font-medium">developpement personnel</span>
                    </a> </div>
            </div>
        </section>

                
                <section class="bg-gray-50 py-4 md:py-5 border-b border-gray-200 top-[73px] md:top-[81px] z-10">
            <div class="container mx-auto px-6">
                 
                 <div class="flex flex-col sm:flex-row sm:items-center gap-4">

                     
                    
                    <form method="GET" action="{{ route('courses.index') }}" class="flex items-center space-x-3 w-full sm:w-auto">
                        <label for="category_filter" class="text-gray-700 font-medium text-sm flex-shrink-0 ubuntu">Catégorie :</label>
                        <select name="category" id="category_filter"
                                class="sm:w-52 md:w-64 px-3 py-2 bg-white border border-gray-300 rounded-md text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-green-500 ubuntu"
                                onchange="this.form.submit()">
                            <option value="">Toutes</option>
                            @isset($categories)
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $selectedCategoryId == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            @endisset
                        </select>
                    </form>

                     
                     <div class="relative group ubuntu w-full sm:w-auto">
                        <button class="flex items-center justify-between w-full sm:w-36 px-3 py-2 bg-white border border-gray-300 rounded-md text-sm text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-green-500">
                             
                            <span class="mr-1">
                                @if($selectedPriceFilter === 'free') Gratuit
                                @elseif($selectedPriceFilter === 'paid') Payant
                                @else Prix @endif
                            </span>
                            <svg class="w-4 h-4 ml-1 text-gray-400 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                        </button>
                        <div class="absolute left-0 -mt-1 w-full sm:w-36 hidden group-hover:block bg-white border border-gray-200 rounded-md shadow-lg z-20"> 
                            
                            <a href="{{ route('courses.index', request()->except(['price_filter', 'page'])) }}"
                               class="block px-4 py-2 text-sm text-gray-700 hover:bg-green-50 hover:text-green-700 {{ !$selectedPriceFilter ? 'font-semibold text-green-700' : '' }}">
                               Tous
                            </a>
                             
                            <a href="{{ route('courses.index', array_merge(request()->except('page'), ['price_filter' => 'free'])) }}"
                               class="block px-4 py-2 text-sm text-gray-700 hover:bg-green-50 hover:text-green-700 {{ $selectedPriceFilter === 'free' ? 'font-semibold text-green-700' : '' }}">
                               Gratuit
                            </a>
                             
                            <a href="{{ route('courses.index', array_merge(request()->except('page'), ['price_filter' => 'paid'])) }}"
                               class="block px-4 py-2 text-sm text-gray-700 hover:bg-green-50 hover:text-green-700 {{ $selectedPriceFilter === 'paid' ? 'font-semibold text-green-700' : '' }}">
                               Payant
                            </a>
                        </div>
                     </div>
                     

                 </div>
            </div>
        </section>
        
        

<div class="bg-gray-50 flex-1 p-8 pt-0 md:pt-8"> 
    
    <div class="container mx-auto">

        
        @if ($courses->count() > 0)
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6"> 
                @foreach ($courses as $course)
                    
                    <div class="rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-shadow duration-300 bg-white flex flex-col h-full">
                        
                        <div class="h-40 flex-shrink-0">
                            @if($course->image_path)
                                <img src="{{ Storage::url($course->image_path) }}" alt="Image {{ $course->title }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full bg-gray-200 flex items-center justify-center"> <span class="text-gray-400 text-sm">Image Cours</span> </div>
                            @endif
                        </div>
                        
                        <div class="p-4 flex flex-col flex-grow">
                            
                             @if($course->category)
                            <p class="text-xs font-medium text-blue-600 uppercase tracking-wide mb-1">
                                {{ $course->category->name }}
                            </p>
                            @endif
                            
                            <h3 class="font-semibold text-lg text-green-800 sniglet mb-1">
                                <a href="#" class="hover:text-green-600">{{ $course->title }}</a> 
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
                                <form action="{{ route('student.courses.like', $course->id) }}" method="POST" class="inline-block align-middle">
                                        @csrf
                                        <button type="submit"
                                                title="{{ $course->isLikedByCurrentUser() ? 'Ne plus aimer ce cours' : 'Aimer ce cours' }}"
                                                class="p-2 rounded-full transition-colors duration-200 ease-in-out {{ $course->isLikedByCurrentUser() ? 'text-red-500 bg-red-100 hover:bg-red-200' : 'text-gray-400 hover:text-red-500 hover:bg-gray-100' }}">
                                            
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </form>
                                <div>
    @if($course->type == 'free' || $course->price <= 0)
        <a href="{{ route('student.courses.show', $course->id) }}" 
           class="px-4 py-2 rounded-md bg-green-600 text-white text-sm hover:bg-green-700">
            Accéder au Cours
        </a>
        @elseif(optional($course->enrollments->first())->status === 'completed')
    <a href="{{ route('student.courses.show', $course->id) }}" 
       class="px-4 py-2 rounded-md bg-green-600 text-white text-sm hover:bg-green-700">
        Accéder au Cours
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
                    </div>
                @endforeach
            </div> 
            
            <div class="mt-10">
                {{ $courses->links() }} 
            </div>

        
        @else
            
            <div class="col-span-full text-center py-16 px-6 bg-white rounded-lg shadow border">
                
                <svg class="mx-auto h-12 w-12 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m6.75 12.75h4.5m-4.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" /> </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900">Aucun cours disponible pour le moment.</h3>
                <p class="mt-1 text-sm text-gray-500">Revenez bientôt !</p>
            </div>
        @endif
         

    </div> 
</div> 
<footer class="bg-gray-800 text-white py-8 mt-20">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">

            
            <div>
                <h3 class="text-xl font-bold mb-4">EduQuest</h3>
                <p class="text-gray-400">Votre plateforme d'apprentissage en ligne pour un avenir meilleur.</p>
            </div>

            
            <div>
                <h3 class="text-xl font-bold mb-4">Liens Rapides</h3>
                <ul class="list-none pl-0">
                    <li><a href="#" class="text-gray-300 hover:text-white">Accueil</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white">Cours</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white">À Propos</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white">Contact</a></li>
                </ul>
            </div>

            
            <div>
                <h3 class="text-xl font-bold mb-4">Ressources</h3>
                <ul class="list-none pl-0">
                    <li><a href="#" class="text-gray-300 hover:text-white">Blog</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white">FAQ</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white">Conditions d'utilisation</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white">Politique de confidentialité</a></li>
                </ul>
            </div>

            
            <div>
                <h3 class="text-xl font-bold mb-4">Abonnez-vous à notre Newsletter</h3>
                <p class="text-gray-400 mb-2">Recevez les dernières nouvelles et mises à jour.</p>
                <div class="flex">
                    <input type="email" placeholder="Votre adresse e-mail"
                        class="bg-gray-700 text-white py-2 px-4 rounded-l-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded-r-md">S'abonner</button>
                </div>
            </div>

        </div>

        <div class="mt-8 text-center text-gray-500">
            <p>© 2024 EduQuest. Tous droits réservés.</p>
        </div>
    </div>
</footer>
    </div>

</body>

</html>