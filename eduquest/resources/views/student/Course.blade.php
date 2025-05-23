<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contenu du Cours : {{ $course->title }} - EduQuest</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />

    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tailwindcss/typography@0.5.x/dist/typography.min.css"/>

    
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        [x-cloak] { display: none !important; }
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; border-radius: 10px; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }

        video { max-width: 100%; height: auto; border-radius: 0.5rem; box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1); }
        .aspect-w-16 { position: relative; padding-bottom: 56.25%; }
        .aspect-h-9 { /* Combinable */ }
        .aspect-w-16 > *, .aspect-h-9 > * { position: absolute; height: 100%; width: 100%; top: 0; right: 0; bottom: 0; left: 0; }

         .material-symbols-outlined, .material-icons {
            vertical-align: middle;
         }

         body {
             padding-top: 68px;
             display: block;
         }

         header {
             z-index: 20;
         }
    </style>
</head>

<body class="bg-gray-100 antialiased">

    

    
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


    
    
    
    <main class="w-full p-6 md:p-8 lg:p-10">
        <div class="max-w-5xl mx-auto">

            
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-8 pb-4 border-b border-gray-200">
                
                <div>
                    
                    <a href="{{ route('courses.index') }}" class="text-sm text-blue-600 hover:underline mb-2 inline-block flex items-center">
                        <svg class="w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" /> </svg>
                        Retour au Catalogue
                    </a>

                    <h1 class="text-3xl font-bold text-gray-900 leading-tight">{{ $course->title }}</h1>
                    <p class="mt-2 text-sm text-gray-500 space-x-2">
                        @if($course->category)
                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-indigo-100 text-indigo-800"> {{ $course->category->name }} </span>
                            <span class="text-gray-300">|</span>
                        @endif
                        <span class="capitalize">{{ $course->level }}</span>
                        <span class="text-gray-300">|</span>
                        <span class="capitalize font-medium {{ $course->type == 'free' ? 'text-green-600' : 'text-yellow-700' }}"> {{ $course->type == 'paid' && $course->price ? number_format($course->price, 2) . ' €' : 'Gratuit' }} </span>
                    </p>
                </div>

                
                {{--
                <div class="flex items-center space-x-2 mt-4 sm:mt-0 flex-shrink-0">
                    <a>
                    <form>
                </div>
                --}}
            </div>

            
            <div class="bg-white shadow-lg rounded-lg overflow-hidden border border-gray-200">

                 
                 @if($course->image_path)
                    <div class="w-full max-h-[450px] overflow-hidden bg-gray-200">
                         <img src="{{ Storage::url($course->image_path) }}" alt="Image du cours {{ $course->title }}" class="w-full h-full object-cover">
                    </div>
                 @endif

                 
                 <div class="p-6 md:p-8 lg:p-10 space-y-8">

                    
                    @if($course->video_path)
                        <section aria-labelledby="video-heading">
                            <h2 id="video-heading" class="text-2xl font-semibold text-gray-800 mb-4 border-l-4 border-blue-500 pl-3">Vidéo Principale</h2>
                            <div class="bg-black rounded-lg overflow-hidden shadow-md">
                                <video controls controlslist="nodownload" class="w-full" poster="{{ $course->video_path ? Storage::url($course->video_path) : '' }}"> 
                                    <source src="{{ Storage::url($course->video_path) }}" type="{{ Storage::mimeType($course->video_path) ?? 'video/mp4' }}">
                                    Votre navigateur ne supporte pas la balise vidéo.
                                    <a href="{{ Storage::url($course->video_path) }}" download class="text-blue-300 hover:text-blue-100 underline p-4 block">Télécharger la vidéo</a>
                                </video>
                            </div>
                        </section>
                    @endif

                    
                    <section aria-labelledby="description-heading">
                        <h2 id="description-heading" class="text-2xl font-semibold text-gray-800 mb-4 border-l-4 border-blue-500 pl-3">Description du Cours</h2>
                        
                        <article class="prose prose-indigo lg:prose-lg max-w-none text-gray-700">
                            {!! nl2br(e($course->description)) !!} 
                        </article>
                    </section>

                     
                     @if($course->pdf_path)
                        <section aria-labelledby="pdf-heading" class="pt-8 border-t border-gray-200">
                            <h2 id="pdf-heading" class="text-2xl font-semibold text-gray-800 mb-4 border-l-4 border-blue-500 pl-3">Documents Associés</h2>
                            <div class="flex items-center p-4 border border-gray-200 rounded-lg bg-gray-50 hover:bg-gray-100 transition duration-150 ease-in-out">
                                <svg class="w-10 h-10 text-red-500 mr-4 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m.75 12.75h4.5m-4.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" /> </svg>
                                <div class="flex-grow">
                                    <p class="text-sm font-medium text-gray-900">Document PDF</p>
                                    <p class="text-xs text-gray-500">{{ basename($course->pdf_path) }}</p>
                                </div>
                                <a href="{{ Storage::url($course->pdf_path) }}" target="_blank" download="{{ Str::slug($course->title) }}_document.pdf"
                                   class="ml-4 inline-flex items-center px-3 py-1.5 border border-transparent text-xs font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    <svg class="-ml-0.5 mr-1.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" /> </svg>
                                    Voir / Télécharger
                                </a>
                            </div>
                        </section>
                     @endif

                     
                     <section aria-labelledby="info-heading" class="pt-8 border-t border-gray-200">
                        <h3 id="info-heading" class="text-lg font-semibold text-gray-700 mb-3">Informations Clés</h3>
                        <dl class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-3 text-sm">
                            <div class="sm:col-span-1"> <dt class="font-medium text-gray-500">Enseignant</dt> <dd class="mt-1 text-gray-900">{{ $course->teacher->name ?? ($course->teacher->first_name ?? 'N/A') }}</dd> </div>
                            <div class="sm:col-span-1"> <dt class="font-medium text-gray-500">Catégorie</dt> <dd class="mt-1 text-gray-900">{{ $course->category->name ?? 'N/A' }}</dd> </div>
                            <div class="sm:col-span-1"> <dt class="font-medium text-gray-500">Niveau</dt> <dd class="mt-1 text-gray-900 capitalize">{{ $course->level }}</dd> </div>
                            <div class="sm:col-span-1"> <dt class="font-medium text-gray-500">Type</dt> <dd class="mt-1 text-gray-900 capitalize font-medium {{ $course->type == 'free' ? 'text-green-600' : 'text-yellow-700' }}">{{ $course->type == 'paid' && $course->price ? number_format($course->price, 2) . ' €' : 'Gratuit' }}</dd> </div>
                            <div class="sm:col-span-1"> <dt class="font-medium text-gray-500">Créé le</dt> <dd class="mt-1 text-gray-900">{{ $course->created_at->isoFormat('D MMMM YYYY') }}</dd> </div>
                            <div class="sm:col-span-1"> <dt class="font-medium text-gray-500">Dernière mise à jour</dt> <dd class="mt-1 text-gray-900" title="{{ $course->updated_at->isoFormat('LLLL') }}">{{ $course->updated_at->diffForHumans() }}</dd> </div>
                        </dl>
                     </section>
                 </div> 
            </div> 

        </div> 
    </main>

    <script>
        // Scripts JS (inchangés)
    </script>

</body>
</html>