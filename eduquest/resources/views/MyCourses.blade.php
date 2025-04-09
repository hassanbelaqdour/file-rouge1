<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyCourses</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Sniglet&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


    <style>
        body {
            font-family: 'Sniglet', cursive;
        }
    </style>
</head>

<body class="bg-white" style="font-family: 'Sniglet', cursive;">

    <!-- Global Header -->
    <header class="bg-gray-100 py-4 px-6 flex justify-between items-center fixed top-0 left-0 w-full z-10 shadow-md">
    <!-- Logo -->
    <div class="text-2xl font-semibold text-gray-800">EduQuest</div>

    <!-- Navigation Links -->
    <nav class="flex items-center gap-6">
        <!-- All Courses Dropdown -->
<div class="relative group">
    <button class="flex items-center gap-2 py-2 px-4 w-full rounded-md text-gray-700 hover:bg-gray-100 hover:text-gray-900">
        <span class="material-symbols-outlined">menu_book</span>
        All Courses
    </button>
    <div class="absolute left-0 -mt-1 group-hover:block bg-white border hidden border-gray-200 rounded-md shadow-lg z-10 w-48">
        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Tous les cours</a>
        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Populaires</a>
        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Nouveaux cours</a>
    </div>
</div>

<!-- My Courses Dropdown -->
<div class="relative group">
    <button class="flex items-center gap-2 py-2 px-4 w-full rounded-md text-gray-700 hover:bg-gray-100 hover:text-gray-900">
        <span class="material-symbols-outlined">school</span>
        My Courses
    </button>
    <div class="absolute left-0 -mt-1 hidden group-hover:block bg-white border border-gray-200 rounded-md shadow-lg z-10 w-48">
        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Cours en cours</a>
        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Favoris</a>
        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Historique</a>
    </div>
</div>

        <!-- FAQ Dropdown -->
<div class="relative group">
    <button class="flex items-center gap-2 py-2 px-4 w-full rounded-md text-gray-700 hover:bg-gray-100 hover:text-gray-900">
        <span class="material-symbols-outlined">help</span>
        Support & FAQ
    </button>
    <div class="absolute left-0 -mt-1 hidden group-hover:block bg-white border border-gray-200 rounded-md shadow-lg z-10 w-48">
        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Questions générales</a>
        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Paiement</a>
        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Support technique</a>
    </div>
</div>
<!-- Course Categories Dropdown -->
<div class="relative group">
    <button class="flex items-center gap-2 py-2 px-4 w-full rounded-md text-gray-700 hover:bg-gray-100 hover:text-gray-900">
        <span class="material-symbols-outlined">category</span>
        Categories
    </button>
    <div class="absolute left-0 -mt-1 hidden group-hover:block bg-white border border-gray-200 rounded-md shadow-lg z-10 w-48">
        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Développement</a>
        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Design</a>
        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Marketing</a>
        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Management</a>
    </div>
</div>
<!-- Course Types Dropdown -->
<div class="relative group">
    <button class="flex items-center gap-2 py-2 px-4 w-full rounded-md text-gray-700 hover:bg-gray-100 hover:text-gray-900">
        <span class="material-symbols-outlined">local_offer</span>
        Types de Cours
    </button>
    <div class="absolute left-0 -mt-1 hidden group-hover:block bg-white border border-gray-200 rounded-md shadow-lg z-10 w-48">
        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Gratuit</a>
        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Payant</a>
        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Certifié</a>
    </div>
</div>

    </nav>

<!-- Notifications & Profile -->
<div class="flex items-center space-x-4 relative">
    <!-- Bouton de notification -->
    <button
        class="w-10 h-10 flex items-center justify-center rounded-full text-gray-500 hover:text-gray-700 hover:border-gray-700">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 
                   0v.341C7.67 6.165 6 8.388 6 11v3.159c0 
                   .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 
                   3 0 11-6 0v-1m6 0H9" /> 
        </svg>
    </button>

    <!-- Profil + Menu -->
    <div class="relative group">
        <!-- Bouton de profil -->
        <button class="px-2 py-2 w-10 h-10 rounded-full bg-gray-300 focus:outline-none"></button>

        <!-- Menu de profil (visible au hover) -->
        <div
            class="absolute right-0 mt-2 w-48 bg-white shadow-lg rounded-lg border border-gray-200 opacity-0 group-hover:opacity-100 pointer-events-none group-hover:pointer-events-auto transition-all duration-200 z-10">
            <a href="/profile" class="block px-4 py-2 text-gray-700 hover:bg-gray-200">
                <span class="material-icons mr-2">account_circle</span> Voir Profil
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="block w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-200">
                    <span class="material-icons mr-2">logout</span> Logout
                </button>
            </form>
        </div>
    </div>
</div>


</header>


    <div class="flex min-h-screen pt-16">

<!-- Sidebar -->
<div class="bg-white border-r border-gray-200 w-64 py-4 px-4 space-y-4 fixed left-0 top-16 h-full overflow-y-auto shadow-md">
    <!-- Section des Cours les Plus Consultés -->
    <div>
        <h2 class="text-xl font-semibold text-gray-800 mb-3">Les Cours les Plus Consultés</h2>
        
        <ul class="space-y-1">
            <li><a href="#" class="block py-1 px-3 text-gray-700 rounded-md hover:bg-gray-100">Développement Web</a></li>
            <li><a href="#" class="block py-1 px-3 text-gray-700 rounded-md hover:bg-gray-100">Design</a></li>
            <li><a href="#" class="block py-1 px-3 text-gray-700 rounded-md hover:bg-gray-100">Marketing</a></li>
            <li><a href="#" class="block py-1 px-3 text-gray-700 rounded-md hover:bg-gray-100">Data Science</a></li>
            <li><a href="#" class="block py-1 px-3 text-gray-700 rounded-md hover:bg-gray-100">Gestion</a></li>
        </ul>
    </div>

    <!-- Section des Certificats Existants -->
    <div>
        <h2 class="text-xl font-semibold text-gray-800 mb-3">Certificats Existants</h2>
        
        <ul class="space-y-1">
            <li><a href="#" class="block py-1 px-3 text-gray-700 rounded-md hover:bg-gray-100">Certification Développement Web</a></li>
            <li><a href="#" class="block py-1 px-3 text-gray-700 rounded-md hover:bg-gray-100">Certification Design</a></li>
            <li><a href="#" class="block py-1 px-3 text-gray-700 rounded-md hover:bg-gray-100">Certification Marketing</a></li>
            <li><a href="#" class="block py-1 px-3 text-gray-700 rounded-md hover:bg-gray-100">Certification Data Science</a></li>
            <li><a href="#" class="block py-1 px-3 text-gray-700 rounded-md hover:bg-gray-100">Certification Gestion</a></li>
        </ul>
    </div>
</div>




        <!-- Main Content -->
        <div class="flex-1 p-8 ml-64">

            <!-- Content Header (Search and Filters) -->
<header class="flex justify-between items-center mb-8">
    <!-- Search Bar with Icon -->
    <div class="flex items-center bg-gray-200 rounded-md px-3 py-2 w-full max-w-md mr-4">
        <i class="fas fa-search text-gray-500 mr-2"></i>
        <input type="text" placeholder="Search ..."
            class="w-full bg-gray-200 focus:outline-none text-sm">
    </div>

    <!-- Filters -->
    <div class="flex space-x-2">
        <button
            class="px-4 py-2 rounded-md bg-gray-200 text-gray-700 hover:bg-gray-300 focus:outline-none">Category</button>
        <button
            class="px-4 py-2 rounded-md bg-gray-200 text-gray-700 hover:bg-gray-300 focus:outline-none">Type</button>
    </div>
</header>

<div class="container mx-auto p-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
    <!-- Première carte -->
    <div class="rounded-md overflow-hidden shadow-md">
        <div class="h-40">
            <img src="https://www.simplilearn.com/ice9/free_resources_article_thumb/is_web_development_good_career.jpg" alt="Image Développement" class="w-full h-full object-cover">
        </div>
        <div class="bg-white p-4">
            <h3 class="font-semibold text-lg text-gray-800">Développement Web Moderne</h3>
            <p class="text-gray-600 text-sm hover:text-blue-400 transition-colors duration-300">Apprenez les bases du HTML, CSS, JavaScript et explorez les frameworks modernes comme React et Vue.</p>
            <!-- Button Inscrire -->
            <div class="mt-4 flex items-center justify-between">
                <div>
                    <p class="text-gray-800 font-medium">Prix : <span class="text-blue-600">99€</span></p>
                    <p class="text-gray-600 text-sm">35 personnes inscrites</p>
                </div>
                <button class="px-6 py-2 rounded-md bg-blue-500 text-white hover:bg-blue-600 focus:outline-none">
                    En savoir plus
                </button>
            </div>
        </div>
    </div>

    <!-- Deuxième carte -->
    <div class="rounded-md overflow-hidden shadow-md">
        <div class="h-40">
            <img src="https://m.media-amazon.com/images/I/51iWIWLhfVL._AC_UF1000,1000_QL80_.jpg" alt="Image Python" class="w-full h-full object-cover">
        </div>
        <div class="bg-white p-4">
            <h3 class="font-semibold text-lg text-gray-800">Python pour Débutants</h3>
            <p class="text-gray-600 text-sm hover:text-blue-400 transition-colors duration-300">Découvrez les bases de la programmation avec Python, le langage de programmation polyvalent et populaire.</p>
            <!-- Button Inscrire -->
            <div class="mt-4 flex items-center justify-between">
                <div>
                    <p class="text-gray-800 font-medium">Prix : <span class="text-blue-600">79€</span></p>
                    <p class="text-gray-600 text-sm">50 personnes inscrites</p>
                </div>
                <button class="px-6 py-2 rounded-md bg-blue-500 text-white hover:bg-blue-600 focus:outline-none">
                    En savoir plus
                </button>
            </div>
        </div>
    </div>

    <!-- Troisième carte -->
    <div class="rounded-md overflow-hidden shadow-md">
        <div class="h-40">
            <img src="http://assets.isu.pub/document-structure/230610095304-44b2e9bc1109c9c48bbc6ae77f3c995a/v1/5953debf9c67fe69c432e12630fdad4f.jpeg" alt="Image Data Science" class="w-full h-full object-cover">
        </div>
        <div class="bg-white p-4">
            <h3 class="font-semibold text-lg text-gray-800">Introduction à la Data Science</h3>
            <p class="text-gray-600 text-sm hover:text-blue-400 transition-colors duration-300">Explorez les concepts de base de la Data Science et apprenez à analyser des données avec des outils comme Python et R.</p>
            <!-- Button Inscrire -->
            <div class="mt-4 flex items-center justify-between">
                <div>
                    <p class="text-gray-800 font-medium">Prix : <span class="text-blue-600">119€</span></p>
                    <p class="text-gray-600 text-sm">60 personnes inscrites</p>
                </div>
                <button class="px-6 py-2 rounded-md bg-blue-500 text-white hover:bg-blue-600 focus:outline-none">
                    En savoir plus
                </button>
            </div>
        </div>
    </div>

    <!-- Quatrième carte -->
    <div class="rounded-md overflow-hidden shadow-md">
        <div class="h-40">
            <img src="https://moncoachdata.com/wp-content/uploads/2018/04/data-science-methode.jpg" alt="Image Data Science" class="w-full h-full object-cover">
        </div>
        <div class="bg-white p-4">
            <h3 class="font-semibold text-lg text-gray-800">Data Science pour Débutants</h3>
            <p class="text-gray-600 text-sm hover:text-blue-400 transition-colors duration-300">Apprenez les bases de l'analyse de données, de l'apprentissage automatique et des outils comme Python et R.</p>
            <div class="mt-4 flex items-center justify-between">
                <div>
                    <p class="text-gray-800 font-medium">Prix : <span class="text-blue-600">150€</span></p>
                    <p class="text-gray-600 text-sm">120 personnes inscrites</p>
                </div>
                <button class="px-6 py-2 rounded-md bg-blue-500 text-white hover:bg-blue-600 focus:outline-none">
                    En savoir plus
                </button>
            </div>
        </div>
    </div>

    <!-- Cinquième carte -->
    <div class="rounded-md overflow-hidden shadow-md">
        <div class="h-40">
            <img src="https://cdn.prod.website-files.com/66153b9f3cb891501ecbf45d/667c02946b3ae9b49f406d3a_UX-UI-Design-web.jpg" alt="Image UI/UX" class="w-full h-full object-cover">
        </div>
        <div class="bg-white p-4">
            <h3 class="font-semibold text-lg text-gray-800">Design UI/UX</h3>
            <p class="text-gray-600 text-sm hover:text-blue-400 transition-colors duration-300">Maîtrisez les concepts de l'expérience utilisateur et du design d'interface avec des outils comme Sketch et Figma.</p>
            <div class="mt-4 flex items-center justify-between">
                <div>
                    <p class="text-gray-800 font-medium">Prix : <span class="text-blue-600">80€</span></p>
                    <p class="text-gray-600 text-sm">200 personnes inscrites</p>
                </div>
                <button class="px-6 py-2 rounded-md bg-blue-500 text-white hover:bg-blue-600 focus:outline-none">
                    En savoir plus
                </button>
            </div>
        </div>
    </div>
</div>



        </div>
    </div>
</body>
</html>
