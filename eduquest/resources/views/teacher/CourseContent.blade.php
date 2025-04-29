<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- Le titre inclut le nom du cours pour référence --}}
    <title>Contenu du Cours : {{ $course->title }} - EduQuest</title>
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- Plugin Tailwind Typography pour un meilleur rendu du texte long --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tailwindcss/typography@0.5.x/dist/typography.min.css"/>
    <style>
        /* Styles scrollbar (optionnel) */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; border-radius: 10px; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
        /* Assurer que la vidéo prend la largeur et style de base */
        video { max-width: 100%; height: auto; border-radius: 0.5rem; /* rounded-lg */ box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1); /* shadow */}
         /* Styles pour l'aspect ratio (si non inclus dans Tailwind par défaut) */
        .aspect-w-16 { position: relative; padding-bottom: 56.25%; /* 16:9 */ }
        .aspect-h-9 { /* Peut être combiné avec aspect-w-16 */ }
        .aspect-w-16 > *, .aspect-h-9 > * { position: absolute; height: 100%; width: 100%; top: 0; right: 0; bottom: 0; left: 0; }
         /* Alerte auto-dismiss (si AlpineJS est utilisé) */
        [x-cloak] { display: none !important; }
    </style>
    {{-- Alpine JS (optionnel, utile pour l'alerte) --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-100 flex antialiased">

    <!-- ================================================== -->
    <!--                      SIDEBAR                       -->
    <!-- ================================================== -->
    <aside class="w-64 h-screen bg-white shadow-md fixed top-0 left-0 border-r border-gray-200 z-20 flex flex-col">
        {{-- Header Sidebar --}}
        <div class="p-5 border-b border-gray-200 flex items-center space-x-2"> <svg class="w-8 h-8 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" /> </svg> <h1 class="text-xl font-bold text-gray-800">EduQuest</h1> </div>
        {{-- Navigation --}}
        <nav class="flex-grow p-4 space-y-2 overflow-y-auto">
            <a href="{{ route('teacher.StatistiqueTeacher') }}" class="flex items-center px-3 py-2.5 rounded-md text-sm font-medium transition-colors duration-150 ease-in-out {{ request()->routeIs('teacher.StatistiqueTeacher') ? 'bg-blue-50 text-blue-700' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}"> <svg class="w-5 h-5 mr-3 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75c0 .621-.504 1.125-1.125 1.125h-2.25A1.125 1.125 0 013 21v-7.875zM12.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v12.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM21 4.125c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v17.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" /></svg> Statistiques </a>
            {{-- Marque 'Tous les cours' comme actif sur la page de contenu ou d'édition --}}
            <a href="{{ route('teacher.courses') }}" class="flex items-center px-3 py-2.5 rounded-md text-sm font-medium transition-colors duration-150 ease-in-out {{ request()->routeIs('teacher.courses*') ? 'bg-blue-50 text-blue-700' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}"> <svg class="w-5 h-5 mr-3 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"> <path d="M12 18.75a6 6 0 006-6v-1.5m-6 7.5a6 6 0 01-6-6v-1.5m6 7.5v3.75m-3.75 0h7.5M12 15.75a3 3 0 01-3-3V4.5a3 3 0 116 0v8.25a3 3 0 01-3 3z" /></svg> Tous les cours </a>
            <a href="{{ route('categories.index') }}" class="flex items-center px-3 py-2.5 rounded-md text-sm font-medium transition-colors duration-150 ease-in-out {{ request()->routeIs('categories.index') ? 'bg-blue-50 text-blue-700' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}"> <svg class="w-5 h-5 mr-3 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" > <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z" /> <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6z" /> </svg> Catégories </a>
        </nav>
        {{-- Logout --}}
        <div class="p-4 mt-auto border-t border-gray-200"> <form action="{{ route('logout') }}" method="POST"> @csrf <button type="submit" class="w-full flex items-center justify-center text-sm font-medium text-red-600 bg-red-50 hover:bg-red-100 px-3 py-2.5 rounded-md group"> <svg class="w-5 h-5 mr-2 text-red-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" /> </svg> Déconnexion </button> </form> </div>
    </aside>
    <!-- ================================================== -->

    <!-- CONTENU PRINCIPAL -->
    <main class="ml-64 w-full p-6 md:p-8 lg:p-10">
        <div class="max-w-5xl mx-auto">

            <!-- Header avec titre et boutons d'action -->
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-8 pb-4 border-b border-gray-200">
                {{-- Titre et Métadonnées --}}
                <div>
                    {{-- Lien Retour --}}
                    <a href="{{ route('teacher.courses') }}" class="text-sm text-blue-600 hover:underline mb-2 inline-block flex items-center">
                        <svg class="w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" /> </svg>
                        Retour à Mes Cours
                    </a>
                    {{-- Titre du cours --}}
                    <h1 class="text-3xl font-bold text-gray-900 leading-tight">{{ $course->title }}</h1>
                    {{-- Métadonnées rapides --}}
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
                {{-- Boutons d'action pour CE cours --}}
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

            <!-- Contenu Principal du Cours -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden border border-gray-200">

                 {{-- Image Principale --}}
                 @if($course->image_path)
                    <div class="w-full max-h-[450px] overflow-hidden bg-gray-200"> {{-- Limite la hauteur max --}}
                         <img src="{{ Storage::url($course->image_path) }}" alt="Image du cours {{ $course->title }}" class="w-full h-full object-cover">
                    </div>
                 @endif

                 {{-- Contenu texte et médias --}}
                 <div class="p-6 md:p-8 lg:p-10 space-y-8">

                    {{-- Section Vidéo (si existe) --}}
                    @if($course->video_path)
                        <section aria-labelledby="video-heading">
                            <h2 id="video-heading" class="text-2xl font-semibold text-gray-800 mb-4 border-l-4 border-blue-500 pl-3">Vidéo Principale</h2>
                            <div class="bg-black rounded-lg overflow-hidden shadow-md"> {{-- Fond noir pour lecteur vidéo --}}
                                <video controls controlslist="nodownload" class="w-full" poster="{{ $course->image_path ? Storage::url($course->image_path) : '' }}">
                                    <source src="{{ Storage::url($course->video_path) }}" type="{{ Storage::mimeType($course->video_path) ?? 'video/mp4' }}"> {{-- Tente de deviner le MimeType --}}
                                    Votre navigateur ne supporte pas la balise vidéo.
                                    <a href="{{ Storage::url($course->video_path) }}" download class="text-blue-300 hover:text-blue-100 underline p-4 block">Télécharger la vidéo</a>
                                </video>
                            </div>
                        </section>
                    @endif

                    {{-- Section Description --}}
                    <section aria-labelledby="description-heading">
                        <h2 id="description-heading" class="text-2xl font-semibold text-gray-800 mb-4 border-l-4 border-blue-500 pl-3">Description du Cours</h2>
                        {{-- Classe 'prose' pour styliser le contenu texte --}}
                        <article class="prose prose-indigo lg:prose-lg max-w-none text-gray-700">
                            {!! nl2br(e($course->description)) !!}
                        </article>
                    </section>

                     {{-- Section PDF (si existe) --}}
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

                     {{-- Section Infos supplémentaires --}}
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
                 </div> {{-- Fin p-6 md:p-8 lg:p-10 --}}
            </div> {{-- Fin bg-white --}}

        </div>
    </main>

    {{-- AlpineJS pour l'alerte si besoin --}}
    {{-- <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script> --}}
    {{-- Script alerte auto-dismiss --}}
    <script>
        // Votre script closeAlert et son initialisation ici...
        // function closeAlert(alertId) { ... }
        // document.addEventListener('DOMContentLoaded', function() { ... });
    </script>

</body>
</html>