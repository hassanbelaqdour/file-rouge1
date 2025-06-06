<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EduQuest</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Sniglet&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
  <style>
        body {
            font-family: 'Sniglet', cursive;
        }
    </style>
    <style>
        /* Définir l'animation de machine à écrire et d'effacement */
        @keyframes typing {
            0% {
                width: 0;
            }
            50% {
                width: 100%;
            }
            100% {
                width: 0;
            }
        }


        .typing {
            display: inline-block;
            white-space: nowrap;
            overflow: hidden;
            width: 0;
            animation: typing 5s steps(30) infinite;
        }
    </style>
</head>
<body class="bg-white" style="font-family: 'Sniglet', cursive;">

  <header class="bg-white py-4 shadow-md">
  <div class="container mx-auto flex items-center justify-between px-4">
    <a href="#" class="text-gray-800 text-2xl font-bold">EduQuest</a>
    <nav>
      <ul class="flex items-center space-x-6">
        <li><a href="#" class="text-gray-700 hover:text-gray-900">HOME</a></li>
        <li><a href="#" class="text-gray-700 hover:text-gray-900">ABOUT</a></li>
        <li><a href="#" class="text-gray-700 hover:text-gray-900">CONTACT</a></li>
        <li><a href="/login" class="bg-black hover:bg-gray-800 text-white font-bold py-2 px-4 rounded-full">GET START</a></li>
      </ul>
    </nav>
  </div>
</header>

<div class="py-20">
    <div class="container mx-auto px-4 lg:px-16 grid grid-cols-1 lg:grid-cols-2 items-center gap-8">

        
        <div class="text-white lg:text-left">
            
            <h1 class="text-5xl lg:text-6xl text-gray-800 font-bold mb-4">Bienvenue sur EduQuest</h1>
            <p class="text-gray-700 mb-8">Commencez à explorer nos cours variés et apprenez à votre rythme. Accédez à des ressources de qualité, suivez des modules interactifs, et progressez efficacement selon vos objectifs d'apprentissage.</p>
            
            <div class="flex justify-center space-x-12 mt-12">
                <div>
                    <p class="text-3xl font-bold text-gray-800">100K+</p>
                    <p class="text-gray-600">Students</p>
                </div>
                <div>
                    <p class="text-3xl font-bold text-gray-800">1K+</p>
                    <p class="text-gray-600">Indicators</p>
                </div>
                <div>
                    <p class="text-3xl font-bold text-gray-800">10+</p>
                    <p class="text-gray-600">Enseignants</p>
                </div>
            </div>

            
            <div class="flex justify-center space-x-4 mt-8">
                <a href="/login" class="bg-black text-white py-3 px-6 rounded-full inline-block hover:bg-gray-800 transition duration-200">Get Started</a>
                <a href="#" class="bg-white text-black py-3 px-6 rounded-full inline-block hover:bg-gray-200 transition duration-200 border border-black">Learn More</a>
            </div>
        </div>

        
        <div class="h-full flex items-center justify-center">
            <img src="https://harshk8853.github.io/DigitalMarketing/assets/header.png" alt="Man with Laptop" class="max-w-md mx-auto">
        </div>

    </div>
</div>





<div class="container mx-auto py-12 px-4 sm:px-6 lg:px-8">
  <div class="text-center mb-8">
    <h2 class="text-2xl font-semibold text-gray-800">Spécialisations professionnel</h2>
    <p class="text-gray-600">Courses les plus appréciés</p>
    <p class="text-gray-500">Explorez nos programmes les plus populaires et préparez-vous à une carrière en demande.</p>
  </div>

  <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
    
    <div class="rounded-xl shadow-md overflow-hidden bg-white">
      <img src="https://www.simplilearn.com/ice9/free_resources_article_thumb/Data-Science-vs.-Big-Data-vs.jpg" alt="Spécialisation Data Science" class="w-full h-40 object-cover">
      <div class="p-4">
        <h3 class="font-semibold text-gray-700">Data Science</h3>
        <p class="text-gray-500">Maîtrisez l'analyse de données, Python, et le machine learning pour des carrières techniques.</p>
      </div>
    </div>

    
    <div class="rounded-xl shadow-md overflow-hidden bg-white">
      <img src="https://static.ib-formation.fr/content/uploads/2024/04/15110010/tendances-developpement-web-2024-ib-cegos-1.jpg" alt="Spécialisation Développement Web" class="w-full h-40 object-cover">
      <div class="p-4">
        <h3 class="font-semibold text-gray-700">Développement Web</h3>
        <p class="text-gray-500">Créez des sites interactifs avec HTML, CSS, JavaScript, et frameworks modernes.</p>
      </div>
    </div>

    
    <div class="rounded-xl shadow-md overflow-hidden bg-white">
      <img src="https://mvnu.edu/content/uploads/2024/01/mvnu-online-difference-between-admin-and-business-management.jpeg.webp" alt="Spécialisation Business" class="w-full h-40 object-cover">
      <div class="p-4">
        <h3 class="font-semibold text-gray-700">Business & Management</h3>
        <p class="text-gray-500">Développez des compétences en gestion de projet, marketing, et stratégie d’entreprise.</p>
      </div>
    </div>
  </div>

  <div class="text-center mt-8">
    <a href="#" class="bg-black text-white py-3 px-6 rounded-full inline-block hover:bg-gray-800 transition duration-200">Afficher tout →</a>
  </div>
</div>

<div class="bg-gray-100 flex flex-col w-full">

  <div class="px-8 py-12 flex items-center w-full">
    
    <!-- Partie images -->
    <div class="grid grid-cols-2 gap-4 flex-1">
      <img src="https://st.depositphotos.com/1017986/2807/i/450/depositphotos_28072165-stock-photo-students-showing-thumbs-up-at.jpg" alt="Étudiant heureux" class="h-32 sm:h-40 md:h-48 w-full object-cover rounded-lg">
      
      <img src="https://www.rbcroyalbank.com/fr-ca/wp-content/uploads/sites/13/2023/09/Untitled-design-2023-08-17T165106.356.jpg?quality=80" alt="Étude en ligne" class="h-32 sm:h-40 md:h-48 w-full object-cover rounded-lg">

      <img src="https://www.welovebuzz.com/wp-content/uploads/2015/03/hhh-1024x682.jpg" alt="Groupe d'étudiants" class="h-32 sm:h-40 md:h-48 w-full object-cover col-span-2 rounded-lg">
    </div>

    <!-- Partie texte -->
    <div class="flex-1 pl-6">
      <h2 class="text-2xl font-bold text-gray-800">Résultats des étudiants sur EduQuest</h2>
      <p class="text-gray-600 mt-2 text-lg">
        77 % des étudiants font état d'avantages en termes de carrière, tels que de nouvelles compétences,
        une augmentation de salaire et de nouvelles possibilités d'emploi.
        <a href="#" class="text-black font-semibold underline">Rapport de 2025 sur les résultats des étudiants EduQuest</a>
      </p>
      <button class="mt-6 bg-black text-white py-3 px-6 rounded-lg hover:bg-gray-800 transition duration-200">
        Inscrivez-vous maintenant
      </button>
    </div>

  </div>
</div>

<div class="bg-white py-12">
  <div class="container mx-auto text-center">
    <h2 class="text-2xl font-semibold text-gray-800 mb-2">Provenant de la communauté EduQuest</h2>
    <p class="text-gray-600 mb-12">Plus de 168 millions de personnes ont déjà rejoint EduQuest</p>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

      <div>
        <img src="http://media.licdn.com/dms/image/v2/D4D03AQHrGxFD1tIM3w/profile-displayphoto-shrink_200_200/B4DZQIYZb_HMAY-/0/1735307402229?e=2147483647&v=beta&t=y-z4OGTfDyGagW_G9juwBzNAiDgLMCboYEbwM4GMddQ" alt="Hamza Atig" class="rounded-full w-64 h-64 mx-auto object-cover">
        <p class="text-gray-700 mt-4 uppercase text-sm">HAMZA ATIG</p>
      </div>

      <div>
        <img src="https://as1.ftcdn.net/jpg/02/95/58/22/1000_F_295582214_IJrBXV3TJeNavfozclGX88TMVESBMWAV.jpg" alt="Kenia Beccer" class="rounded-full w-64 h-64 mx-auto object-cover">
        <p class="text-gray-700 mt-4 uppercase text-sm">KENIA BECCER</p>
      </div>

      <div>
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/48/Outdoors-man-portrait_%28cropped%29.jpg/1200px-Outdoors-man-portrait_%28cropped%29.jpg" alt="James Rodreges" class="rounded-full w-64 h-64 mx-auto object-cover">
        <p class="text-gray-700 mt-4 uppercase text-sm">JAMES RODREGES</p>
      </div>

    </div>
  </div>
</div>



<div class="tag-list w-full max-w-full font-montserrat relative overflow-hidden mx-auto mt-16">
    <div class="inner flex gap-4 animate-loop">
        
        <div class="tag flex items-center gap-1 text-black text-sm bg-white py-3 px-4 rounded-lg border border-black shadow-md hover:bg-gray-200 transition duration-200">
            <span class="text-lg">#education</span>
        </div>
        
        <div class="tag flex items-center gap-1 text-black text-sm bg-white py-3 px-4 rounded-lg border border-black shadow-md hover:bg-gray-200 transition duration-200">
            <span class="text-lg">#learning</span>
        </div>
        
        <div class="tag flex items-center gap-1 text-black text-sm bg-white py-3 px-4 rounded-lg border border-black shadow-md hover:bg-gray-200 transition duration-200">
            <span class="text-lg">#onlinelearning</span>
        </div>
        
        <div class="tag flex items-center gap-1 text-black text-sm bg-white py-3 px-4 rounded-lg border border-black shadow-md hover:bg-gray-200 transition duration-200">
            <span class="text-lg">#eLearning</span>
        </div>
        
        <div class="tag flex items-center gap-1 text-black text-sm bg-white py-3 px-4 rounded-lg border border-black shadow-md hover:bg-gray-200 transition duration-200">
            <span class="text-lg">#study</span>
        </div>
        <div class="tag flex items-center gap-1 text-black text-sm bg-white py-3 px-4 rounded-lg border border-black shadow-md hover:bg-gray-200 transition duration-200">
            <span class="text-lg">#teaching</span>
        </div>
        <div class="tag flex items-center gap-1 text-black text-sm bg-white py-3 px-4 rounded-lg border border-black shadow-md hover:bg-gray-200 transition duration-200">
            <span class="text-lg">#course</span>
        </div>
        <div class="tag flex items-center gap-1 text-black text-sm bg-white py-3 px-4 rounded-lg border border-black shadow-md hover:bg-gray-200 transition duration-200">
            <span class="text-lg">#coding</span>
        </div>
        <div class="tag flex items-center gap-1 text-black text-sm bg-white py-3 px-4 rounded-lg border border-black shadow-md hover:bg-gray-200 transition duration-200">
            <span class="text-lg">#programming</span>
        </div>
        <div class="tag flex items-center gap-1 text-black text-sm bg-white py-3 px-4 rounded-lg border border-black shadow-md hover:bg-gray-200 transition duration-200">
            <span class="text-lg">#technology</span>
        </div>
        <div class="tag flex items-center gap-1 text-black text-sm bg-white py-3 px-4 rounded-lg border border-black shadow-md hover:bg-gray-200 transition duration-200">
            <span class="text-lg">#skills</span>
        </div>
        <div class="tag flex items-center gap-1 text-black text-sm bg-white py-3 px-4 rounded-lg border border-black shadow-md hover:bg-gray-200 transition duration-200">
            <span class="text-lg">#tutorials</span>
        </div>
        <div class="tag flex items-center gap-1 text-black text-sm bg-white py-3 px-4 rounded-lg border border-black shadow-md hover:bg-gray-200 transition duration-200">
            <span class="text-lg">#lessons</span>
        </div>
        <div class="tag flex items-center gap-1 text-black text-sm bg-white py-3 px-4 rounded-lg border border-black shadow-md hover:bg-gray-200 transition duration-200">
            <span class="text-lg">#coursework</span>
        </div>
        <div class="tag flex items-center gap-1 text-black text-sm bg-white py-3 px-4 rounded-lg border border-black shadow-md hover:bg-gray-200 transition duration-200">
            <span class="text-lg">#virtualclassroom</span>
        </div>
        <div class="tag flex items-center gap-1 text-black text-sm bg-white py-3 px-4 rounded-lg border border-black shadow-md hover:bg-gray-200 transition duration-200">
            <span class="text-lg">#studentlife</span>
        </div>
        <div class="tag flex items-center gap-1 text-black text-sm bg-white py-3 px-4 rounded-lg border border-black shadow-md hover:bg-gray-200 transition duration-200">
            <span class="text-lg">#academic</span>
        </div>
        <div class="tag flex items-center gap-1 text-black text-sm bg-white py-3 px-4 rounded-lg border border-black shadow-md hover:bg-gray-200 transition duration-200">
            <span class="text-lg">#teacherlife</span>
        </div>
        <div class="tag flex items-center gap-1 text-black text-sm bg-white py-3 px-4 rounded-lg border border-black shadow-md hover:bg-gray-200 transition duration-200">
            <span class="text-lg">#training</span>
        </div>
        <div class="tag flex items-center gap-1 text-black text-sm bg-white py-3 px-4 rounded-lg border border-black shadow-md hover:bg-gray-200 transition duration-200">
            <span class="text-lg">#studyhard</span>
        </div>
        <div class="tag flex items-center gap-1 text-black text-sm bg-white py-3 px-4 rounded-lg border border-black shadow-md hover:bg-gray-200 transition duration-200">
            <span class="text-lg">#javascript</span>
        </div>
        <div class="tag flex items-center gap-1 text-black text-sm bg-white py-3 px-4 rounded-lg border border-black shadow-md hover:bg-gray-200 transition duration-200">
            <span class="text-lg">#htmlcss</span>
        </div>
        <div class="tag flex items-center gap-1 text-black text-sm bg-white py-3 px-4 rounded-lg border border-black shadow-md hover:bg-gray-200 transition duration-200">
            <span class="text-lg">#python</span>
        </div>
        <div class="tag flex items-center gap-1 text-black text-sm bg-white py-3 px-4 rounded-lg border border-black shadow-md hover:bg-gray-200 transition duration-200">
            <span class="text-lg">#certification</span>
        </div>
        <div class="tag flex items-center gap-1 text-black text-sm bg-white py-3 px-4 rounded-lg border border-black shadow-md hover:bg-gray-200 transition duration-200">
            <span class="text-lg">#math</span>
        </div>
        <div class="tag flex items-center gap-1 text-black text-sm bg-white py-3 px-4 rounded-lg border border-black shadow-md hover:bg-gray-200 transition duration-200">
            <span class="text-lg">#sciences</span>
        </div>
        <div class="tag flex items-center gap-1 text-black text-sm bg-white py-3 px-4 rounded-lg border border-black shadow-md hover:bg-gray-200 transition duration-200">
            <span class="text-lg">#history</span>
        </div>
        <div class="tag flex items-center gap-1 text-black text-sm bg-white py-3 px-4 rounded-lg border border-black shadow-md hover:bg-gray-200 transition duration-200">
            <span class="text-lg">#literature</span>
        </div>
        <div class="tag flex items-center gap-1 text-black text-sm bg-white py-3 px-4 rounded-lg border border-black shadow-md hover:bg-gray-200 transition duration-200">
            <span class="text-lg">#engineering</span>
        </div>
        <div class="tag flex items-center gap-1 text-black text-sm bg-white py-3 px-4 rounded-lg border border-black shadow-md hover:bg-gray-200 transition duration-200">
            <span class="text-lg">#artificialintelligence</span>
        </div>
        <div class="tag flex items-center gap-1 text-black text-sm bg-white py-3 px-4 rounded-lg border border-black shadow-md hover:bg-gray-200 transition duration-200">
            <span class="text-lg">#machinelearning</span>
        </div>
        <div class="tag flex items-center gap-1 text-black text-sm bg-white py-3 px-4 rounded-lg border border-black shadow-md hover:bg-gray-200 transition duration-200">
            <span class="text-lg">#datascience</span>
        </div>
        <div class="tag flex items-center gap-1 text-black text-sm bg-white py-3 px-4 rounded-lg border border-black shadow-md hover:bg-gray-200 transition duration-200">
            <span class="text-lg">#uxdesign</span>
        </div>
        <div class="tag flex items-center gap-1 text-black text-sm bg-white py-3 px-4 rounded-lg border border-black shadow-md hover:bg-gray-200 transition duration-200">
            <span class="text-lg">#productivity</span>
        </div>
        <div class="tag flex items-center gap-1 text-black text-sm bg-white py-3 px-4 rounded-lg border border-black shadow-md hover:bg-gray-200 transition duration-200">
            <span class="text-lg">#skillsdevelopment</span>
        </div>
        <div class="tag flex items-center gap-1 text-black text-sm bg-white py-3 px-4 rounded-lg border border-black shadow-md hover:bg-gray-200 transition duration-200">
            <span class="text-lg">#codingbootcamp</span>
        </div>
        <div class="tag flex items-center gap-1 text-black text-sm bg-white py-3 px-4 rounded-lg border border-black shadow-md hover:bg-gray-200 transition duration-200">
            <span class="text-lg">#techskills</span>
        </div>
        <div class="tag flex items-center gap-1 text-black text-sm bg-white py-3 px-4 rounded-lg border border-black shadow-md hover:bg-gray-200 transition duration-200">
            <span class="text-lg">#selftaught</span>
        </div>
        <div class="tag flex items-center gap-1 text-black text-sm bg-white py-3 px-4 rounded-lg border border-black shadow-md hover:bg-gray-200 transition duration-200">
            <span class="text-lg">#learnfromhome</span>
        </div>
        <div class="tag flex items-center gap-1 text-black text-sm bg-white py-3 px-4 rounded-lg border border-black shadow-md hover:bg-gray-200 transition duration-200">
            <span class="text-lg">#academiclife</span>
        </div>
        <div class="tag flex items-center gap-1 text-black text-sm bg-white py-3 px-4 rounded-lg border border-black shadow-md hover:bg-gray-200 transition duration-200">
            <span class="text-lg">#school</span>
        </div>
        <div class="tag flex items-center gap-1 text-black text-sm bg-white py-3 px-4 rounded-lg border border-black shadow-md hover:bg-gray-200 transition duration-200">
            <span class="text-lg">#student</span>
        </div>
        <div class="tag flex items-center gap-1 text-black text-sm bg-white py-3 px-4 rounded-lg border border-black shadow-md hover:bg-gray-200 transition duration-200">
            <span class="text-lg">#college</span>
        </div>
        <div class="tag flex items-center gap-1 text-black text-sm bg-white py-3 px-4 rounded-lg border border-black shadow-md hover:bg-gray-200 transition duration-200">
            <span class="text-lg">#university</span>
        </div>
        <div class="tag flex items-center gap-1 text-black text-sm bg-white py-3 px-4 rounded-lg border border-black shadow-md hover:bg-gray-200 transition duration-200">
            <span class="text-lg">#studygram</span>
        </div>
        <div class="tag flex items-center gap-1 text-black text-sm bg-white py-3 px-4 rounded-lg border border-black shadow-md hover:bg-gray-200 transition duration-200">
            <span class="text-lg">#learningtools</span>
        </div>
        <div class="tag flex items-center gap-1 text-black text-sm bg-white py-3 px-4 rounded-lg border border-black shadow-md hover:bg-gray-200 transition duration-200">
            <span class="text-lg">#onlinelearningplatform</span>
        </div>
        <div class="tag flex items-center gap-1 text-black text-sm bg-white py-3 px-4 rounded-lg border border-black shadow-md hover:bg-gray-200 transition duration-200">
            <span class="text-lg">#virtuallearning</span>
        </div>
        <div class="tag flex items-center gap-1 text-black text-sm bg-white py-3 px-4 rounded-lg border border-black shadow-md hover:bg-gray-200 transition duration-200">
            <span class="text-lg">#selfeducation</span>
        </div>
        <div class="tag flex items-center gap-1 text-black text-sm bg-white py-3 px-4 rounded-lg border border-black shadow-md hover:bg-gray-200 transition duration-200">
            <span class="text-lg">#educationforall</span>
        </div>
        <div class="tag flex items-center gap-1 text-black text-sm bg-white py-3 px-4 rounded-lg border border-black shadow-md hover:bg-gray-200 transition duration-200">
            <span class="text-lg">#edtech</span>
        </div>
        <div class="tag flex items-center gap-1 text-black text-sm bg-white py-3 px-4 rounded-lg border border-black shadow-md hover:bg-gray-200 transition duration-200">
            <span class="text-lg">#exams</span>
        </div>
    </div>
    
    <div class="fade absolute bg-gradient-to-r from-black to-transparent inset-0 pointer-events-none"></div>
</div>

<style>
    @keyframes loop {
        0% {
            transform: translateX(0);
        }
        100% {
            transform: translateX(-50%);
        }
    }

    .animate-loop {
        animation: loop 10s linear infinite;
    }

    .fade {
        background: linear-gradient(to right, rgba(179, 179, 179, 0.7), rgba(0, 0, 0, 0));
    }
</style>

<div class="flex flex-wrap justify-center py-10 px-30 pt-56">
    

    
    <div class="w-full sm:w-1/2 md:w-1/3 px-4 mb-4 text-center transform transition-all duration-300 hover:scale-105">
        <div class="text-gray-500 text-5xl">
            <i class="fas fa-user-graduate"></i>
        </div>
        <h3 class="text-gray-800 text-lg font-bold mt-4">Apprentissage interactif</h3>
        <p class="text-gray-600 text-l pt-5 leading-relaxed">
            Inscription facile avec suivi des cours et progression. Accédez aux vidéos, quiz et certificats.
        </p>
    </div>
    <div class="w-full sm:w-1/2 md:w-1/3 px-4 mb-4 text-center transform transition-all duration-300 hover:scale-105 border-l border-gray-300">
        <div class="text-gray-500 text-5xl">
            <i class="fas fa-book-open"></i>
        </div>
        <h3 class="text-gray-800 text-lg font-bold mt-4">Catalogue de cours</h3>
        <p class="text-gray-600 text-l pt-5 leading-relaxed">
            Parcourez et filtrez les cours par catégorie, niveau et description détaillée.
        </p>
    </div>
    <div class="w-full sm:w-1/2 md:w-1/3 px-4 mb-4 text-center transform transition-all duration-300 hover:scale-105 border-l border-gray-300">
        <div class="text-gray-500 text-5xl">
            <i class="fas fa-tasks"></i>
        </div>
        <h3 class="text-gray-800 text-lg font-bold mt-4">Suivi de progression</h3>
        <p class="text-gray-600 text-l pt-5 leading-relaxed">
            Visualisez votre avancement avec des barres de progression et accédez à un espace FAQ.
        </p>
    </div>

    
    <div class="w-full h-14"></div>

    
    <div class="w-full sm:w-1/2 md:w-1/3 px-4 mb-4 text-center transform transition-all duration-300 hover:scale-105 border-l border-gray-300">
        <div class="text-gray-500 text-5xl">
            <i class="fas fa-chalkboard-teacher"></i>
        </div>
        <h3 class="text-gray-800 text-lg font-bold mt-4">Gestion des cours</h3>
        <p class="text-gray-600 text-l pt-5 leading-relaxed">
            Créez, modifiez et supprimez des cours facilement avec des contenus pédagogiques variés.
        </p>
    </div>
    <div class="w-full sm:w-1/2 md:w-1/3 px-4 mb-4 text-center transform transition-all duration-300 hover:scale-105 border-l border-gray-300">
        <div class="text-gray-500 text-5xl">
            <i class="fas fa-users"></i>
        </div>
        <h3 class="text-gray-800 text-lg font-bold mt-4">Gestion des étudiants</h3>
        <p class="text-gray-600 text-l pt-5 leading-relaxed">
            Consultez la liste des étudiants, suivez leurs progrès et donnez des retours sur les devoirs.
        </p>
    </div>
    <div class="w-full sm:w-1/2 md:w-1/3 px-4 mb-4 text-center transform transition-all duration-300 hover:scale-105 border-l border-gray-300">
        <div class="text-gray-500 text-5xl">
            <i class="fas fa-chart-line"></i>
        </div>
        <h3 class="text-gray-800 text-lg font-bold mt-4">Statistiques</h3>
        <p class="text-gray-600 text-l pt-5 leading-relaxed">
            Analysez les performances des étudiants et les contenus les plus consultés.
        </p>
    </div>

    
    <div class="w-full h-14"></div>

    
    <div class="w-full sm:w-1/2 md:w-1/3 px-4 mb-4 text-center transform transition-all duration-300 hover:scale-105 border-l border-gray-300">
        <div class="text-gray-500 text-5xl">
            <i class="fas fa-user-shield"></i>
        </div>
        <h3 class="text-gray-800 text-lg font-bold mt-4">Gestion des utilisateurs</h3>
        <p class="text-gray-600 text-l pt-5 leading-relaxed">
            Ajoutez, validez ou supprimez des comptes et attribuez des rôles spécifiques.
        </p>
    </div>
    <div class="w-full sm:w-1/2 md:w-1/3 px-4 mb-4 text-center transform transition-all duration-300 hover:scale-105 border-l border-gray-300">
        <div class="text-gray-500 text-5xl">
            <i class="fas fa-check-circle"></i>
        </div>
        <h3 class="text-gray-800 text-lg font-bold mt-4">Validation des cours</h3>
        <p class="text-gray-600 text-l pt-5 leading-relaxed">
            Examinez et approuvez les cours avant leur publication sur la plateforme.
        </p>
    </div>
    <div class="w-full sm:w-1/2 md:w-1/3 px-4 mb-4 text-center transform transition-all duration-300 hover:scale-105 border-l border-gray-300">
        <div class="text-gray-500 text-5xl">
            <i class="fas fa-chart-pie"></i>
        </div>
        <h3 class="text-gray-800 text-lg font-bold mt-4">Statistiques avancées</h3>
        <p class="text-gray-600 text-l pt-5 leading-relaxed">
            Visualisez le nombre total d'étudiants inscrits et les cours publiés.
        </p>
    </div>
</div>



<div class="bg-gray-50 py-12 pr-26 pl-26">
    <div class="container mx-auto px-4 pt-32">
        <h1 class="text-6xl font-bold text-center text-black mb-4 font-sniglet mt-20">
            Démarrez
            votre apprentissage dès aujourd'hui !</h1>
        <p class="text-center text-gray-800 mb-8 font-sniglet mt-16">EduQuest propose des
            options adaptées à tous les profils, que vous soyez étudiant, enseignant ou administrateur.</p>

        <div class="flex flex-col gap-6 justify-center md:flex-row pt-22 mt-20">
            
            <div class="bg-white rounded-2xl shadow-md p-6 w-full">
                <h2 class="text-2xl font-bold text-center text-black mb-2 font-sniglet">
                    Étudiant (Essentiel)</h2>
                <p class="text-center text-gray-800 mb-4 font-sniglet">Idéal pour découvrir EduQuest et accéder aux
                    bases de l'apprentissage interactif.</p>
                <div class="text-center relative">
                    <div class="text-4xl font-bold text-black mb-6 font-sniglet">Gratuit</div>
                    <div class="absolute top-0 right-0 line-through text-gray-500 font-sniglet">Avant: 9,99€</div>
                </div>
                <ul class="list-none space-y-3">
                    <li class="flex items-center text-gray-700 font-sniglet">
                        <svg class="w-5 h-5 mr-2 text-gray-700" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                        Inscription et connexion sécurisées
                    </li>
                    <li class="flex items-center text-gray-700 font-sniglet">
                        <svg class="w-5 h-5 mr-2 text-gray-700" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                        Visualisation des cours suivis
                    </li>
                    <li class="flex items-center text-gray-700 font-sniglet">
                        <svg class="w-5 h-5 mr-2 text-gray-700" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                        Accès limité au catalogue de cours
                    </li>
                    <li class="flex items-center text-gray-700 font-sniglet">
                        <svg class="w-5 h-5 mr-2 text-gray-700" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                        Support via FAQ
                    </li>
                    <li>
            <p class="text-gray-600 text-xs font-sniglet mt-2">Essayez notre plan de base !</p>
        </li>
                </ul>
                <button class="mt-4 bg-black text-white py-2 px-4 rounded-lg font-sniglet">Démarrez gratuitement</button>

            </div>

            
            <div class="bg-gray-100 rounded-2xl shadow-md p-6 w-full relative">
                <div class="absolute top-4 right-4 bg-black text-white text-xs font-bold py-1 px-2 rounded">
                    Recommandé
                </div>
                <h2 class="text-2xl font-bold text-center text-black mb-2 font-sniglet">
                    Enseignant (Complet)</h2>
                <p class="text-center text-gray-800 mb-4 font-sniglet">Créez et gérez vos cours, interagissez avec
                    vos étudiants et suivez leurs progrès.</p>
                    <div class="text-center relative">
                        <div class="text-4xl font-bold text-black mb-2 font-sniglet">
                            49.99€/mois
                        </div>
                        <div class="absolute top-0 right-0 line-through text-gray-500 font-sniglet">Avant: 99,99€</div>
                    </div>

                <ul class="list-none space-y-3">
                    <li class="flex items-center text-gray-700 font-sniglet">
                        <svg class="w-5 h-5 mr-2 text-gray-700" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                        Tableau de bord enseignant personnalisé
                    </li>
                    <li class="flex items-center text-gray-700 font-sniglet">
                        <svg class="w-5 h-5 mr-2 text-gray-700" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                        Gestion complète des contenus pédagogiques
                    </li>
                    <li class="flex items-center text-gray-700 font-sniglet">
                        <svg class="w-5 h-5 mr-2 text-gray-700" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                        Liste des étudiants inscrits
                    </li>
                    <li class="flex items-center text-gray-700 font-sniglet">
                        <svg class="w-5 h-5 mr-2 text-gray-700" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                        Fournir des retours sur les devoirs
                    </li>
                    <li class="flex items-center text-gray-700 font-sniglet">
                        <svg class="w-5 h-5 mr-2 text-gray-700" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                        Statistiques et performances des étudiants
                    </li>
                </ul>
                <button class="mt-4 bg-black text-white py-2 px-4 rounded-lg font-sniglet">Commencer l'essai gratuit</button>
                <li>
            <p class="text-gray-600 text-xs font-sniglet mt-2">Débloquez les fonctionnalités et devenez un excellent pédagogue !</p>
        </li>
            </div>
        </div>
    </div>
</div>
<div class="bg-white py-12 pt-32">
    <div class="container mx-auto px-4">
        <h2 class="text-6xl font-bold text-center text-gray-800 mb-8" style="font-family: 'Sniglet', serif;">
            Comment utiliser EduQuest ?
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 pt-16">
            
            <div class="text-center">
                <div class="mx-auto w-16 h-16 text-indigo-700">
                    <img src="https://cdn-icons-png.flaticon.com/512/3037/3037366.png" alt="Navigateur Web">
                </div>
                <h3 class="text-xl font-semibold text-gray-700 mt-4" style="font-family: 'Sniglet', serif;">
                    Navigateur web
                </h3>
                <p class="text-gray-600 mt-8" style="font-family: 'Sniglet', serif;">
                    Accédez à EduQuest depuis n'importe quel navigateur et commencez votre apprentissage en quelques clics.
                </p>
            </div>

            
            <div class="text-center">
                <div class="mx-auto w-16 h-16">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/f/fa/Apple_logo_black.svg" alt="Logo Apple">
                </div>
                <h3 class="text-lg font-semibold text-gray-700 mt-4" style="font-family: 'Sniglet', serif;">iOS</h3>
                
                <button type="button"
                    class="flex items-center justify-center w-60 mt-3 text-white bg-black h-18 rounded-2xl mx-auto">
                    <div class="mr-3 mt-3 mb-3">
                        <svg viewBox="0 0 384 512" width="30">
                            <path fill="currentColor"
                                d="M318.7 268.7c-.2-36.7 16.4-64.4 50-84.8-18.8-26.9-47.2-41.7-84.7-44.6-35.5-2.8-74.3 20.7-88.5 20.7-15 0-49.4-19.7-76.4-19.7C63.3 141.2 4 184.8 4 273.5q0 39.3 14.4 81.2c12.8 36.7 59 126.7 107.2 125.2 25.2-.6 43-17.9 75.8-17.9 31.8 0 48.3 17.9 76.4 17.9 48.6-.7 90.4-82.5 102.6-119.3-65.2-30.7-61.7-90-61.7-91.9zm-56.6-164.2c27.3-32.4 24.8-61.9 24-72.5-24.1 1.4-52 16.4-67.9 34.9-17.5 19.8-27.8 44.3-25.6 71.9 26.1 2 49.9-11.4 69.5-34.3z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <div class="text-xs" style="font-family: 'Sniglet', serif;">
                            Télécharger sur
                        </div>
                        <div class="-mt-1 font-sans text-xl font-semibold" style="font-family: 'Sniglet', serif;">
                            l'App Store
                        </div>
                    </div>
                </button>
            </div>

            
            <div class="text-center">
                <div class="mx-auto w-16 h-16">
                    <img src="https://cdn-icons-png.flaticon.com/512/61/61120.png" alt="Android Logo">
                </div>
                <h3 class="text-lg font-semibold text-gray-700 mt-4" style="font-family: 'Sniglet', serif;">Android</h3>

                <button type="button"
                    class="flex items-center justify-center w-60 mt-3 text-white bg-black rounded-2xl h-18 mx-auto">
                    <div class="mr-3 mt-3 mb-3">
                        <svg viewBox="30 336.7 120.9 129.2" width="30">
                            <path fill="#FFD400"
                                d="M119.2,421.2c15.3-8.4,27-14.8,28-15.3c3.2-1.7,6.5-6.2,0-9.7  c-2.1-1.1-13.4-7.3-28-15.3l-20.1,20.2L119.2,421.2z">
                            </path>
                            <path fill="#FF3333"
                                d="M99.1,401.1l-64.2,64.7c1.5,0.2,3.2-0.2,5.2-1.3  c4.2-2.3,48.8-26.7,79.1-43.3L99.1,401.1L99.1,401.1z">
                            </path>
                            <path fill="#48FF48"
                                d="M99.1,401.1l20.1-20.2c0,0-74.6-40.7-79.1-43.1  c-1.7-1-3.6-1.3-5.3-1L99.1,401.1z">
                            </path>
                            <path fill="#3BCCFF"
                                d="M99.1,401.1l-64.3-64.3c-2.6,0.6-4.8,2.9-4.8,7.6  c0,7.5,0,107.5,0,113.8c0,4.3,1.7,7.4,4.9,7.7L99.1,401.1z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <div class="text-xs" style="font-family: 'Sniglet', serif;">
                            Disponible sur
                        </div>
                        <div class="-mt-1 font-sans text-xl font-semibold" style="font-family: 'Sniglet', serif;">
                            Google Play
                        </div>
                    </div>
                </button>
            </div>
        </div>
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
          <input type="email" placeholder="Votre adresse e-mail" class="bg-gray-700 text-white py-2 px-4 rounded-l-md focus:outline-none focus:ring-2 focus:ring-blue-500">
          <button class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded-r-md">S'abonner</button>
        </div>
      </div>

    </div>

    <div class="mt-8 text-center text-gray-500">
      <p>© 2024 EduQuest. Tous droits réservés.</p>
    </div>
  </div>
</footer>
</body>

</html>