<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistiques Administrateur - EduQuest</title>
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- Chart.js CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f3f4f6; /* gray-100 */
        }
        /* Style scrollbar */
        ::-webkit-scrollbar { width: 8px; height: 8px;}
        ::-webkit-scrollbar-track { background: #e5e7eb; border-radius: 10px;}
        ::-webkit-scrollbar-thumb { background: #9ca3af; border-radius: 10px;}
        ::-webkit-scrollbar-thumb:hover { background: #6b7280; }
    </style>
</head>
<body class="flex antialiased">

    <!-- Sidebar (Style sombre) -->
    <aside class="w-64 h-screen bg-gray-800 shadow-lg fixed top-0 left-0 z-20 flex flex-col">
        <!-- Header Sidebar -->
        <div class="p-5 border-b border-gray-700 flex items-center space-x-3">
            <div class="w-8 h-8 bg-indigo-500 rounded-md flex items-center justify-center text-white font-bold text-lg flex-shrink-0">E</div>
            <h1 class="text-xl font-bold text-white">EduQuest</h1>
        </div>
        <!-- Navigation -->
        <nav class="flex-grow p-4 space-y-1 overflow-y-auto">
            {{-- Lien Statistiques (Actif) --}}
            <a href="{{ route('admin.StatistiqueAdmin') }}" class="flex items-center px-3 py-2.5 rounded-md text-sm font-medium transition-colors duration-150 ease-in-out bg-gray-700 text-white group">
                <svg class="w-5 h-5 mr-3 flex-shrink-0 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75c0 .621-.504 1.125-1.125 1.125h-2.25A1.125 1.125 0 013 21v-7.875zM12.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v12.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM21 4.125c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v17.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" /></svg>
                Statistiques
            </a>
            <a href="{{ route('admin.Users') }}" class="flex items-center px-3 py-2.5 rounded-md text-sm font-medium transition-colors duration-150 ease-in-out text-gray-300 hover:bg-gray-700 hover:text-white group">
                 <svg class="w-5 h-5 mr-3 flex-shrink-0 text-gray-400 group-hover:text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" /> </svg>
                Utilisateurs
            </a>
            <a href="{{ route('admin.GestionCourses') }}" class="flex items-center px-3 py-2.5 rounded-md text-sm font-medium transition-colors duration-150 ease-in-out text-gray-300 hover:bg-gray-700 hover:text-white group">
                <svg class="w-5 h-5 mr-3 flex-shrink-0 text-gray-400 group-hover:text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m.75 12.75h4.5m-4.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" /> </svg>
                Gestion des Cours
            </a>
        </nav>
        <!-- Footer Sidebar -->
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

    <!-- Contenu Principal -->
    <main class="ml-64 w-full p-6 md:p-8 lg:p-10">
        <div class="max-w-none mx-auto">

            <!-- Titre Page -->
            <div class="mb-8">
                <h1 class="text-2xl md:text-3xl font-bold text-gray-900">Statistiques Administrateur</h1>
                <p class="text-sm text-gray-500 mt-1">Aperçu rapide des données clés de la plateforme.</p>
            </div>

            <!-- Cartes Statistiques Totaux -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                {{-- Carte Total Utilisateurs --}}
                <div class="bg-white p-6 rounded-lg shadow border border-gray-200 flex items-center space-x-4">
                    <div class="p-3 rounded-full bg-indigo-100 text-indigo-600">
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
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" /> </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500">Cours Totaux</p>
                        <p class="text-2xl font-semibold text-gray-900">{{ $totalCourses ?? 0 }}</p>
                    </div>
                </div>
                {{-- Tu peux ajouter d'autres cartes ici si besoin --}}
            </div>

            <!-- Graphiques -->
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

    {{-- Script pour initialiser les graphiques Chart.js --}}
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
                    labels: ['Acceptés', 'Rejetés', 'En attente'],
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