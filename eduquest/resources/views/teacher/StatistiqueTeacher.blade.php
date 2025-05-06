<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistiques Enseignant - EduQuest</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #333; border-radius: 10px; } /* Ajusté pour thème sombre */
        ::-webkit-scrollbar-thumb { background: #555; border-radius: 10px; } /* Ajusté pour thème sombre */
        ::-webkit-scrollbar-thumb:hover { background: #777; } /* Ajusté pour thème sombre */
    </style>
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
        <div class="max-w-7xl mx-auto">

            
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900">Tableau de Bord & Statistiques</h1>
                <p class="mt-1 text-sm text-gray-600">Aperçu de votre activité d'enseignant.</p>
            </div>

            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8"> 

                
                <div class="bg-white p-6 rounded-lg shadow border border-gray-200 flex items-center space-x-4">
                    <div class="flex-shrink-0 p-3 rounded-full bg-blue-100 text-blue-600"> 
                        
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                             <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500">Nombre de Cours Créés</p>
                        <p class="text-2xl font-semibold text-gray-900">{{ $totalCourses ?? 0 }} Courses</p>
                    </div>
                </div>

                
                <div class="bg-white p-6 rounded-lg shadow border border-gray-200 flex items-center space-x-4">
                     <div class="flex-shrink-0 p-3 rounded-full bg-red-100 text-red-600"> 
                         
                         <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                         </svg>
                     </div>
                     <div>
                         <p class="text-sm font-medium text-gray-500">Likes Totaux sur vos Cours</p>
                         <p class="text-2xl font-semibold text-gray-900">{{ $totalLikes ?? 0 }} Likes</p>
                     </div>
                </div>


            </div>

            
            <div class="mt-10 bg-white overflow-hidden shadow rounded-lg border border-gray-200 p-6">
                <h2 class="text-xl font-semibold text-gray-900 mb-4">Nombre de Cours Créés par Jour (Simulation)</h2>
                <div class="chart-container" style="position: relative; height: 400px; width: 100%;">
                     <canvas id="coursesPerDayChart"></canvas> 
                </div>
            </div>

            
             <div class="mt-10 bg-white overflow-hidden shadow rounded-lg border border-gray-200 p-6">
                 <h2 class="text-xl font-semibold text-gray-900 mb-4">Proportion Likes Totaux vs Cours Totaux (Simulation)</h2>
                 <div class="chart-container" style="position: relative; height: 300px; width: 100%;">
                      <canvas id="likesPercentageChart"></canvas> 
                 </div>
             </div>


        </div>
    </main>

    
    <script>
        // Attendre que le DOM soit complètement chargé
        document.addEventListener('DOMContentLoaded', function() {

            // --- Graphique 1: Nombre de Cours par Jour (Fake Data) ---
            const coursesPerDayCtx = document.getElementById('coursesPerDayChart');
            if (coursesPerDayCtx) {
                // Fake data for courses per day
                const fakeDates = ['2023-10-25', '2023-10-26', '2023-10-27', '2023-10-28', '2023-10-29', '2023-10-30', '2023-10-31'];
                const fakeCourseCounts = [2, 1, 3, 0, 2, 4, 1]; // Nombre de cours créés chaque jour

                new Chart(coursesPerDayCtx, {
                    type: 'bar', // Type de graphique : barres
                    data: {
                        labels: fakeDates, // Les dates sur l'axe X
                        datasets: [{
                            label: 'Cours Créés', // Légende du dataset
                            data: fakeCourseCounts, // Les nombres de cours sur l'axe Y
                            backgroundColor: 'rgba(54, 162, 235, 0.7)', // Couleur des barres bleues
                            borderColor: 'rgb(54, 162, 235)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false, // Permet de mieux contrôler la taille
                        scales: {
                            y: {
                                beginAtZero: true, // L'axe Y commence à 0
                                ticks: {
                                     callback: function(value) {
                                         if (Number.isInteger(value)) {
                                             return value; // Afficher uniquement les nombres entiers
                                         }
                                     }
                                },
                                title: {
                                    display: true,
                                    text: 'Nombre de Cours' // Titre de l'axe Y
                                }
                            },
                            x: {
                                title: {
                                    display: true,
                                    text: 'Date' // Titre de l'axe X
                                }
                            }
                        },
                         plugins: {
                            title: {
                                display: true,
                                text: 'Simulation: Nombre de Cours Créés par Jour', // Titre du graphique
                                font: {
                                    size: 16
                                }
                            },
                             legend: {
                                 display: true // Afficher la légende
                             }
                         }
                    }
                });
            } else {
                console.error("Canvas element with ID 'coursesPerDayChart' not found.");
            }

             // --- Graphique 2: Pourcentage de Likes par rapport aux Cours (Fake Data) ---
             const likesPercentageCtx = document.getElementById('likesPercentageChart');
             if (likesPercentageCtx) {
                 // Fake data for likes percentage
                 // Cette visualisation montre la proportion entre un total de likes et un total de cours
                 // Ce n'est pas un pourcentage 'de' cours, mais une comparaison de deux totaux.
                 const fakeTotalCourses = 50; // Votre nombre total de cours simulé
                 const fakeTotalLikes = 350; // Votre nombre total de likes simulé

                 // Les données pour le graphique (Total Likes vs Total Courses)
                 const chartData = [fakeTotalLikes, fakeTotalCourses];
                 const chartLabels = ['Likes Totaux Simulés', 'Cours Totaux Simulés']; // Labels pour les sections du graphique

                 new Chart(likesPercentageCtx, {
                     type: 'doughnut', // Type de graphique : anneau
                     data: {
                         labels: chartLabels,
                         datasets: [{
                             label: 'Comparaison Likes vs Cours', // Légende (apparaît dans le tooltip)
                             data: chartData, // Les deux valeurs à comparer
                             backgroundColor: [ // Couleurs pour chaque section
                                 'rgba(255, 99, 132, 0.8)', // Couleur pour les likes (rouge)
                                 'rgba(54, 162, 235, 0.8)'  // Couleur pour les cours (bleu)
                             ],
                             borderColor: [
                                 'rgb(255, 99, 132)',
                                 'rgb(54, 162, 235)'
                             ],
                             borderWidth: 1
                         }]
                     },
                     options: {
                         responsive: true,
                         maintainAspectRatio: false, // Permet de mieux contrôler la taille
                         plugins: {
                             title: {
                                 display: true,
                                 text: 'Simulation: Proportion Likes Totaux vs Cours Totaux', // Titre du graphique
                                 font: {
                                     size: 16
                                 }
                             },
                             tooltip: {
                                 callbacks: {
                                     label: function(tooltipItem) {
                                         // Calculer le pourcentage pour le tooltip
                                         const total = tooltipItem.dataset.data.reduce((sum, val) => sum + val, 0);
                                         const currentValue = tooltipItem.raw;
                                         // Éviter la division par zéro si total est 0
                                         const percentage = total === 0 ? 0 : parseFloat(((currentValue / total) * 100).toFixed(1));
                                         return tooltipItem.label + ': ' + currentValue + ' (' + percentage + '%)';
                                     }
                                 }
                             },
                             legend: {
                                  position: 'top', // Position de la légende
                             }
                         }
                     }
                 });
             } else {
                 console.error("Canvas element with ID 'likesPercentageChart' not found.");
             }

        }); // End DOMContentLoaded
    </script>

</body>
</html>