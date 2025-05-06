<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistiques Administrateur - EduQuest</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- Chart.js CDN (Nécessaire pour les graphiques) --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
    <!-- Font Awesome CDN for icons (required by the new sidebar) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f3f4f6; /* gray-100 */
        }
        /* Style scrollbar (Ajusté pour le thème sombre du nouveau sidebar) */
        ::-webkit-scrollbar { width: 8px; height: 8px;}
        ::-webkit-scrollbar-track { background: #333; border-radius: 10px;} /* Ajusté pour thème sombre */
        ::-webkit-scrollbar-thumb { background: #555; border-radius: 10px;} /* Ajusté pour thème sombre */
        ::-webkit-scrollbar-thumb:hover { background: #777; } /* Ajusté pour thème sombre */
    </style>
</head>
<body class="flex antialiased">

    <!-- Nouveau Panneau Latéral (Sidebar) - Inspiré de Jobsly -->
    <aside class="w-64 h-screen bg-gray-900 text-gray-100 shadow-lg fixed top-0 left-0 z-20 flex flex-col overflow-y-auto">

        <!-- Header Sidebar -->
        <div class="flex justify-between items-center px-5 py-4 border-b border-gray-700">
            <!-- Remplacé le logo SVG par un titre simple -->
            <h1 class="text-2xl font-bold text-white">EduQuest</h1>
            <!-- Icône Menu Hamburger -->
             <i class="fas fa-bars text-xl text-gray-400 cursor-pointer hover:text-white"></i>
        </div>

        <!-- Barre de recherche -->
        <div class="relative px-4 mt-6">
            <input type="text" placeholder="Search..." class="w-full px-4 py-2 pl-10 bg-gray-800 border border-gray-700 rounded-lg text-sm text-gray-300 placeholder-gray-500 focus:outline-none focus:border-blue-600 focus:ring-blue-600">
            <!-- Icône Loupe -->
            <i class="fas fa-magnifying-glass absolute left-7 top-1/2 transform -translate-y-1/2 text-gray-500 text-sm"></i>
        </div>

        <!-- Navigation Principale -->
        <nav class="mt-6 space-y-3 flex-grow px-4">
            {{-- Item Statistiques (Actif pour cette page) --}}
            <a href="{{ route('admin.StatistiqueAdmin') }}" class="flex items-center space-x-3 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-150 ease-in-out
               {{ request()->routeIs('admin.StatistiqueAdmin') ? 'bg-gray-700 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                <!-- Icône Statistiques (Font Awesome) -->
                <i class="fas fa-chart-simple text-lg"></i>
                <span>Statistiques</span>
            </a>

            {{-- Item Utilisateurs --}}
            <a href="{{ route('admin.Users') }}" class="flex items-center space-x-3 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-150 ease-in-out
               {{ request()->routeIs('admin.Users') ? 'bg-gray-700 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                <!-- Icône Utilisateurs (Font Awesome) -->
                 <i class="fas fa-users text-lg"></i>
                 <span>Utilisateurs</span>
            </a>

            {{-- Item Gestion des Cours --}}
             <a href="{{ route('admin.GestionCourses') }}" class="flex items-center space-x-3 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-150 ease-in-out
               {{ request()->routeIs('admin.GestionCourses') ? 'bg-gray-700 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                <!-- Icône Gestion des Cours (Font Awesome) -->
                 <i class="fas fa-book text-lg"></i>
                 <span>Gestion des Cours</span>
            </a>
            {{-- Autres liens admin si nécessaire --}}

        </nav>

        <!-- Séparateur visuel avant le profil -->
        <div class="border-t border-gray-700 mt-auto pt-4 mx-4"></div>

        <!-- Section Profil Utilisateur (Admin) -->
        <div class="px-4 pb-4 pt-2">
             {{-- Utilisation des données d'authentification pour le profil si l'utilisateur est connecté --}}
             @auth
             <div class="flex items-center space-x-3 p-3 bg-gray-800 rounded-lg">
                <!-- Avatar Utilisateur (Utilise les initiales ou un placeholder) -->
                 <div class="w-8 h-8 rounded-full bg-indigo-600 text-white flex items-center justify-center font-semibold text-sm flex-shrink-0 border border-gray-600">
                      {{ strtoupper(substr(Auth::user()->first_name ?? 'A', 0, 1)) }}{{ strtoupper(substr(Auth::user()->last_name ?? 'D', 0, 1)) }}
                 </div>
                <div class="flex-grow">
                    <p class="text-sm font-semibold text-white">{{ Auth::user()->first_name ?? 'Admin' }} {{ Auth::user()->last_name ?? '' }}</p>
                    <p class="text-xs text-gray-400">{{ Auth::user()->email ?? 'admin@example.com' }}</p>
                </div>
                <!-- Icône Plus d'options -->
                <i class="fas fa-ellipsis text-gray-400 text-lg cursor-pointer hover:text-white"></i>
             </div>
             @endauth
             {{-- Logout --}}
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
    <!-- ================================================== -->

    <!-- Contenu Principal -->
    <main class="ml-64 w-full p-6 md:p-8 lg:p-10">
        <div class="max-w-none mx-auto">

            <!-- Titre Page (inchangé) -->
            <div class="mb-8">
                <h1 class="text-2xl md:text-3xl font-bold text-gray-900">Statistiques Administrateur</h1>
                <p class="text-sm text-gray-500 mt-1">Aperçu rapide des données clés de la plateforme.</p>
            </div>

            <!-- Cartes Statistiques Totaux (inchangé) -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                {{-- Carte Total Utilisateurs --}}
                <div class="bg-white p-6 rounded-lg shadow border border-gray-200 flex items-center space-x-4">
                    <div class="p-3 rounded-full bg-indigo-100 text-indigo-600">
                         {{-- Icône Utilisateurs --}}
                         <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" /></svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500">Utilisateurs Totaux</p>
                        <p class="text-2xl font-semibold text-gray-900">{{ $totalUsers ?? 0 }}</p>
                    </div>
                </div>
                 {{-- Carte Total Cours --}}
                <div class="bg-white p-6 rounded-lg shadow border border-gray-200 flex items-center space-x-4">
                    <div class="p-3 rounded-full bg-emerald-100 text-emerald-600">
                        {{-- Icône Cours --}}
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" /> </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500">Cours Totaux</p>
                        <p class="text-2xl font-semibold text-gray-900">{{ $totalCourses ?? 0 }}</p>
                    </div>
                </div>
                {{-- Tu peux ajouter d'autres cartes ici si besoin --}}
            </div>

            <!-- Graphiques (inchangé) -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                {{-- Graphique Statut Utilisateurs --}}
                <div class="bg-white p-6 rounded-lg shadow border border-gray-200">
                    <h2 class="text-lg font-semibold text-gray-800 mb-4">Répartition des Statuts Utilisateurs</h2>
                    <div class="h-64 md:h-80"> {{-- Hauteur fixe pour le conteneur du canvas --}}
                        <canvas id="userStatusChart"></canvas>
                    </div>
                </div>

                {{-- Graphique Statut Cours --}}
                <div class="bg-white p-6 rounded-lg shadow border border-gray-200">
                     <h2 class="text-lg font-semibold text-gray-800 mb-4">Répartition des Statuts Cours</h2>
                     <div class="h-64 md:h-80"> {{-- Hauteur fixe --}}
                        <canvas id="courseStatusChart"></canvas>
                    </div>
                </div>
            </div>

        </div>
    </main>

    {{-- Script pour initialiser les graphiques Chart.js (inchangé) --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // --- Données depuis le contrôleur ---
            const approvedUsers = @json($approvedUsers ?? 0);
            const pendingUsers = @json($pendingUsers ?? 0);
            // const suspendedUsers = @json($suspendedUsers ?? 0); // Décommente si tu as ce statut

            const acceptedCourses = @json($acceptedCourses ?? 0);
            const rejectedCourses = @json($rejectedCourses ?? 0);
            const pendingCourses = @json($pendingCourses ?? 0);

            // --- Configuration Graphique Utilisateurs ---
            const userCtx = document.getElementById('userStatusChart')?.getContext('2d');
            if (userCtx) {
                const userStatusData = {
                    labels: ['Approuvés', 'En attente'], // Ajoute 'Suspendus' si nécessaire
                    datasets: [{
                        label: 'Statut Utilisateur',
                        data: [approvedUsers, pendingUsers], // Ajoute suspendedUsers si nécessaire
                        backgroundColor: [
                            '#10B981', // emerald-500
                            '#F59E0B', // amber-500
                            // '#EF4444'  // red-500 (pour suspendu)
                        ],
                        borderColor: [ // Optionnel: bordures
                             '#ffffff',
                             '#ffffff',
                            // '#ffffff'
                        ],
                        borderWidth: 2, // Optionnel
                        hoverOffset: 4 // Effet au survol
                    }]
                };
                const userStatusConfig = {
                    type: 'doughnut', // Ou 'pie'
                    data: userStatusData,
                    options: {
                        responsive: true,
                        maintainAspectRatio: false, // Important pour contrôler la hauteur via le div parent
                        plugins: {
                            legend: {
                                position: 'bottom', // Position de la légende
                            },
                            title: {
                                display: false, // On a déjà un titre h2
                                // text: 'Répartition des Statuts Utilisateurs'
                            }
                        }
                    }
                };
                new Chart(userCtx, userStatusConfig);
            } else {
                console.error("Canvas 'userStatusChart' non trouvé.");
            }

            // --- Configuration Graphique Cours ---
            const courseCtx = document.getElementById('courseStatusChart')?.getContext('2d');
             if (courseCtx) {
                const courseStatusData = {
                    labels: ['Acceptés', 'Rejetés', 'En attente'], // Ajout de 'En attente'
                    datasets: [{
                        label: 'Statut Cours',
                        data: [acceptedCourses, rejectedCourses, pendingCourses],
                        backgroundColor: [
                            '#22C55E', // green-500
                            '#EF4444', // red-500
                            '#EAB308'  // yellow-500
                        ],
                         borderColor: [ '#ffffff', '#ffffff', '#ffffff'],
                         borderWidth: 2,
                         hoverOffset: 4
                    }]
                };
                 const courseStatusConfig = {
                    type: 'doughnut', // Ou 'pie'
                    data: courseStatusData,
                     options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                position: 'bottom',
                            },
                            title: {
                                display: false,
                                // text: 'Répartition des Statuts Cours'
                            }
                        }
                    }
                };
                new Chart(courseCtx, courseStatusConfig);
            } else {
                 console.error("Canvas 'courseStatusChart' non trouvé.");
            }
        });
    </script>

</body>
</html>