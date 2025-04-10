<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>votre plateforme d'education en ligne</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Liens Head (partie ajoutee) -->
    <link
        href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Sniglet&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <style>
        /* Style Head (partie ajoutee) */
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

    <!-- Header Global (partie ajoutee - reste en noir et blanc comme demande precedemment) -->
    <header
        class="bg-white py-4 px-6 flex justify-between items-center fixed top-0 left-0 w-full z-20 shadow-md border-b border-gray-200">
        <!-- Logo -->
        <div class="text-2xl font-semibold text-black">EduQuest</div>
        <!-- Navigation Links -->
        <nav class="hidden md:flex items-center gap-6">
            <!-- ... (liens de navigation du header restent ici) ... -->
            <div class="relative group"> <button
                    class="flex items-center gap-2 py-2 px-4 w-full rounded-md text-gray-700 hover:bg-gray-100 hover:text-black">
                    <span class="material-symbols-outlined">menu_book</span> All Courses </button>
                <div
                    class="absolute left-0 mt-1 hidden group-hover:block bg-white border border-gray-200 rounded-md shadow-lg z-10 w-48">
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Tous les cours</a> <a
                        href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Populaires</a> <a
                        href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Nouveaux cours</a>
                </div>
            </div>
            <div class="relative group"> <button
                    class="flex items-center gap-2 py-2 px-4 w-full rounded-md text-gray-700 hover:bg-gray-100 hover:text-black">
                    <span class="material-symbols-outlined">school</span> My Courses </button>
                <div
                    class="absolute left-0 mt-1 hidden group-hover:block bg-white border border-gray-200 rounded-md shadow-lg z-10 w-48">
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Cours en cours</a> <a
                        href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Favoris</a> <a href="#"
                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Historique</a> </div>
            </div>
            <div class="relative group"> <button
                    class="flex items-center gap-2 py-2 px-4 w-full rounded-md text-gray-700 hover:bg-gray-100 hover:text-black">
                    <span class="material-symbols-outlined">help</span> Support & FAQ </button>
                <div
                    class="absolute left-0 mt-1 hidden group-hover:block bg-white border border-gray-200 rounded-md shadow-lg z-10 w-48">
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Questions generales</a>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Paiement</a> <a href="#"
                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Support technique</a> </div>
            </div>
            <div class="relative group"> <button
                    class="flex items-center gap-2 py-2 px-4 w-full rounded-md text-gray-700 hover:bg-gray-100 hover:text-black">
                    <span class="material-symbols-outlined">category</span> Categories </button>
                <div
                    class="absolute left-0 mt-1 hidden group-hover:block bg-white border border-gray-200 rounded-md shadow-lg z-10 w-48">
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Developpement</a> <a
                        href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Design</a> <a href="#"
                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Marketing</a> <a href="#"
                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Management</a> </div>
            </div>
            <div class="relative group"> <button
                    class="flex items-center gap-2 py-2 px-4 w-full rounded-md text-gray-700 hover:bg-gray-100 hover:text-black">
                    <span class="material-symbols-outlined">local_offer</span> Types de Cours </button>
                <div
                    class="absolute left-0 mt-1 hidden group-hover:block bg-white border border-gray-200 rounded-md shadow-lg z-10 w-48">
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Gratuit</a> <a href="#"
                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Payant</a> <a href="#"
                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Certifie</a> </div>
            </div>
        </nav>
        <!-- Notifications & Profile -->
        <div class="flex items-center space-x-4 relative">
            <!-- ... (icones notification et profil restent ici) ... -->
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
                <div
                    class="absolute right-0 mt-1 w-48 bg-white shadow-lg rounded-lg border border-gray-200 opacity-0 group-hover:opacity-100 pointer-events-none group-hover:pointer-events-auto transition-opacity duration-200 z-10">
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100"> <span
                            class="material-icons mr-2 align-middle">account_circle</span> Voir Profil </a>
                    <form method="POST" action="#"> <button type="submit"
                            class="block w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100"> <span
                                class="material-icons mr-2 align-middle">logout</span> Logout </button> </form>
                </div>
            </div>
        </div>
    </header>

    <!-- Contenu Principal -->
    <div class="flex flex-col min-h-screen pt-16 md:pt-20">

        <!-- Section Heros (CODE ORIGINAL - Theme Vert) -->
        <section class="bg-green-900 text-white py-20 md:py-32">
            <!-- ... (contenu hero vert reste ici) ... -->
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

        <!-- Section Categories de Cours (CODE ORIGINAL - Theme Vert/Blanc) -->
        <section class="bg-white py-16">
            <!-- ... (contenu categories vert/blanc reste ici) ... -->
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

        <!-- Section Grille de Cours (partie ajoutee - MAINTENANT THEME VERT) -->
        <div class="bg-gray-50 flex-1 p-8">
            <div class="container mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <!-- Premiere carte -->
                <div class="rounded-md overflow-hidden shadow-md bg-white">
                    <div class="h-40"> <img
                            src="https://www.simplilearn.com/ice9/free_resources_article_thumb/is_web_development_good_career.jpg"
                            alt="Image Developpement" class="w-full h-full object-cover"> </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-lg text-green-800">Developpement Web Moderne</h3>
                        <!-- Titre en vert fonce -->
                        <p class="text-gray-600 text-sm mt-1">Apprenez les bases du html, css, javascript et explorez
                            les frameworks modernes comme react et vue.</p>
                        <div class="mt-4 flex items-center justify-between">
                            <div>
                                <p class="text-gray-700 font-medium">Prix : <span
                                        class="text-green-600 font-bold">99€</span></p> <!-- Prix en vert -->
                                <p class="text-gray-500 text-sm">35 personnes inscrites</p>
                            </div>
                            <!-- Bouton vert -->
                            <button
                                class="px-6 py-2 rounded-md bg-green-600 text-white hover:bg-green-700 focus:outline-none transition duration-150 ease-in-out">
                                En savoir plus </button>
                        </div>
                    </div>
                </div>
                <!-- Deuxieme carte -->
                <div class="rounded-md overflow-hidden shadow-md bg-white">
                    <div class="h-40"> <img
                            src="https://m.media-amazon.com/images/I/51iWIWLhfVL._AC_UF1000,1000_QL80_.jpg"
                            alt="Image Python" class="w-full h-full object-cover"> </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-lg text-green-800">Python pour Debutants</h3>
                        <!-- Titre en vert fonce -->
                        <p class="text-gray-600 text-sm mt-1">Decouvrez les bases de la programmation avec python, le
                            langage de programmation polyvalent et populaire.</p>
                        <div class="mt-4 flex items-center justify-between">
                            <div>
                                <p class="text-gray-700 font-medium">Prix : <span
                                        class="text-green-600 font-bold">79€</span></p> <!-- Prix en vert -->
                                <p class="text-gray-500 text-sm">50 personnes inscrites</p>
                            </div>
                            <!-- Bouton vert -->
                            <button
                                class="px-6 py-2 rounded-md bg-green-600 text-white hover:bg-green-700 focus:outline-none transition duration-150 ease-in-out">
                                En savoir plus </button>
                        </div>
                    </div>
                </div>
                <!-- Troisieme carte -->
                <div class="rounded-md overflow-hidden shadow-md bg-white">
                    <div class="h-40"> <img
                            src="http://assets.isu.pub/document-structure/230610095304-44b2e9bc1109c9c48bbc6ae77f3c995a/v1/5953debf9c67fe69c432e12630fdad4f.jpeg"
                            alt="Image Data Science" class="w-full h-full object-cover"> </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-lg text-green-800">Introduction a la Data Science</h3>
                        <!-- Titre en vert fonce -->
                        <p class="text-gray-600 text-sm mt-1">Explorez les concepts de base de la data science et
                            apprenez a analyser des donnees avec des outils comme python et r.</p>
                        <div class="mt-4 flex items-center justify-between">
                            <div>
                                <p class="text-gray-700 font-medium">Prix : <span
                                        class="text-green-600 font-bold">119€</span></p> <!-- Prix en vert -->
                                <p class="text-gray-500 text-sm">60 personnes inscrites</p>
                            </div>
                            <!-- Bouton vert -->
                            <button
                                class="px-6 py-2 rounded-md bg-green-600 text-white hover:bg-green-700 focus:outline-none transition duration-150 ease-in-out">
                                En savoir plus </button>
                        </div>
                    </div>
                </div>
                <!-- Quatrieme carte -->
                <div class="rounded-md overflow-hidden shadow-md bg-white">
                    <div class="h-40"> <img
                            src="https://moncoachdata.com/wp-content/uploads/2018/04/data-science-methode.jpg"
                            alt="Image Data Science" class="w-full h-full object-cover"> </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-lg text-green-800">Data Science pour Debutants</h3>
                        <!-- Titre en vert fonce -->
                        <p class="text-gray-600 text-sm mt-1">Apprenez les bases de l'analyse de donnees, de
                            l'apprentissage automatique et des outils comme python et r.</p>
                        <div class="mt-4 flex items-center justify-between">
                            <div>
                                <p class="text-gray-700 font-medium">Prix : <span
                                        class="text-green-600 font-bold">150€</span></p> <!-- Prix en vert -->
                                <p class="text-gray-500 text-sm">120 personnes inscrites</p>
                            </div>
                            <!-- Bouton vert -->
                            <button
                                class="px-6 py-2 rounded-md bg-green-600 text-white hover:bg-green-700 focus:outline-none transition duration-150 ease-in-out">
                                En savoir plus </button>
                        </div>
                    </div>
                </div>
                <!-- Cinquieme carte -->
                <div class="rounded-md overflow-hidden shadow-md bg-white">
                    <div class="h-40"> <img
                            src="https://cdn.prod.website-files.com/66153b9f3cb891501ecbf45d/667c02946b3ae9b49f406d3a_UX-UI-Design-web.jpg"
                            alt="Image UI/UX" class="w-full h-full object-cover"> </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-lg text-green-800">Design UI/UX</h3> <!-- Titre en vert fonce -->
                        <p class="text-gray-600 text-sm mt-1">Maitrisez les concepts de l'experience utilisateur et du
                            design d'interface avec des outils comme sketch et figma.</p>
                        <div class="mt-4 flex items-center justify-between">
                            <div>
                                <p class="text-gray-700 font-medium">Prix : <span
                                        class="text-green-600 font-bold">80€</span></p> <!-- Prix en vert -->
                                <p class="text-gray-500 text-sm">200 personnes inscrites</p>
                            </div>
                            <!-- Bouton vert -->
                            <button
                                class="px-6 py-2 rounded-md bg-green-600 text-white hover:bg-green-700 focus:outline-none transition duration-150 ease-in-out">
                                En savoir plus </button>
                        </div>
                    </div>
                </div>
                <!-- Sixieme carte (Placeholder) -->
                <div class="rounded-md overflow-hidden shadow-md bg-white">
                    <div class="h-40 bg-gray-200 flex items-center justify-center"> <span class="text-gray-400">Image
                            Cours</span> </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-lg text-green-800">Autre Cours</h3> <!-- Titre en vert fonce -->
                        <p class="text-gray-600 text-sm mt-1">Description de cet autre cours passionnant.</p>
                        <div class="mt-4 flex items-center justify-between">
                            <div>
                                <p class="text-gray-700 font-medium">Prix : <span
                                        class="text-green-600 font-bold">XX€</span></p> <!-- Prix en vert -->
                                <p class="text-gray-500 text-sm">XX personnes inscrites</p>
                            </div>
                            <!-- Bouton vert -->
                            <button
                                class="px-6 py-2 rounded-md bg-green-600 text-white hover:bg-green-700 focus:outline-none transition duration-150 ease-in-out">
                                En savoir plus </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fin Section Grille de Cours (MAINTENANT THEME VERT) -->

    </div>

</body>

</html>