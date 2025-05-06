<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Contenu du Cours : {{ $course->title }} - EduQuest</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tailwindcss/typography@0.5.x/dist/typography.min.css"/>

    <style>
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #333; border-radius: 10px; }
        ::-webkit-scrollbar-thumb { background: #555; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #777; }

        video { max-width: 100%; height: auto; border-radius: 0.5rem; /* rounded-lg */ box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1); /* shadow */}
        .aspect-w-16 { position: relative; padding-bottom: 56.25%; /* 16:9 */ }
        .aspect-h-9 { /* Peut être combiné avec aspect-w-16 */ }
        .aspect-w-16 > *, .aspect-h-9 > * { position: absolute; height: 100%; width: 100%; top: 0; right: 0; bottom: 0; left: 0; }
         /* Alerte auto-dismiss (si AlpineJS est utilisé) */
        [x-cloak] { display: none !important; }

         /* Fix Material Symbols icon alignment if needed (though likely not used with FA sidebar) */
         .material-symbols-outlined, .material-icons {
            vertical-align: middle;
         }
    </style>

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-100 flex antialiased">

    
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
            
            <a href="{{ route('teacher.StatistiqueTeacher') }}" class="flex items-center space-x-3 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-150 ease-in-out
               {{ request()->routeIs('teacher.StatistiqueTeacher') ? 'bg-gray-700 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                
                <i class="fas fa-chart-simple text-lg"></i>
                <span>Statistiques</span>
            </a>

            
            <a href="{{ route('teacher.courses') }}" class="flex items-center space-x-3 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-150 ease-in-out
               {{ request()->routeIs('teacher.courses*') ? 'bg-gray-700 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                
                 <i class="fas fa-book text-lg"></i>
                 <span>Tous les cours</span>
            </a>

            
             <a href="{{ route('categories.index') }}" class="flex items-center space-x-3 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-150 ease-in-out
               {{ request()->routeIs('categories.index') ? 'bg-gray-700 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                
                 <i class="fas fa-tags text-lg"></i>
                 <span>Catégories</span>
            </a>
             
             
             

        </nav>

        
        <div class="border-t border-gray-700 mt-auto pt-4 mx-4"></div>

        
        <div class="px-4 pb-4 pt-2">
             
             @auth
             <div class="flex items-center space-x-3 p-3 bg-gray-800 rounded-lg">
                
                 <div class="w-8 h-8 rounded-full bg-indigo-600 text-white flex items-center justify-center font-semibold text-sm flex-shrink-0 border border-gray-600">
                      {{ strtoupper(substr(Auth::user()->first_name ?? 'U', 0, 1)) }}{{ strtoupper(substr(Auth::user()->last_name ?? 's', 0, 1)) }}
                 </div>
                <div class="flex-grow">
                    <p class="text-sm font-semibold text-white">{{ Auth::user()->first_name ?? 'Utilisateur' }} {{ Auth::user()->last_name ?? '' }}</p>
                    <p class="text-xs text-gray-400">{{ Auth::user()->email ?? 'email@exemple.com' }}</p>
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
        <div class="max-w-5xl mx-auto">

            
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-8 pb-4 border-b border-gray-200">
                
                <div>
                    
                    <a href="{{ route('teacher.courses') }}" class="text-sm text-blue-600 hover:underline mb-2 inline-block flex items-center">
                        <svg class="w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" /> </svg>
                        Retour à Mes Cours
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

                
                <div class="flex items-center space-x-2 mt-4 sm:mt-0 flex-shrink-0">
                    <a href="{{ route('teacher.courses.edit', $course->id) }}" class="inline-flex items-center px-3 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <svg class="-ml-1 mr-2 h-4 w-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" /> </svg>
                        Modifier
                    </a>
                     <form method="POST" action="{{ route('teacher.courses.destroy', $course->id) }}" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce cours ?')"> @csrf @method('DELETE')
                        <button type="submit" class="inline-flex items-center px-3 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                             <svg class="-ml-1 mr-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" /> </svg>
                            Supprimer
                        </button>
                    </form>
                </div>
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

    

</body>
</html>