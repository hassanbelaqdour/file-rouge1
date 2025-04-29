<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poser une Question - EduQuest</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style> /* Styles optionnels */ </style>
</head>
<body class="bg-gray-100 flex antialiased">

    <!-- ================================================== -->
    <!--        SIDEBAR ÉTUDIANT (à adapter/inclure)        -->
    <!-- ================================================== -->
    <aside class="w-64 h-screen bg-white shadow-md fixed top-0 left-0 border-r border-gray-200 z-20 flex flex-col">
        {{-- Incluez ici votre sidebar étudiant standard --}}
        <div class="p-5 border-b border-gray-200 flex items-center space-x-2"> <svg><!-- logo --></svg> <h1 class="text-xl font-bold text-gray-800">EduQuest</h1> </div>
        <nav class="flex-grow p-4 space-y-2 overflow-y-auto">
            <a href="#" class="flex items-center px-3 py-2.5 rounded-md text-sm font-medium text-gray-600 hover:bg-gray-100 hover:text-gray-900">Tableau de bord</a>
            <a href="{{ route('student.my_courses') }}" class="flex items-center px-3 py-2.5 rounded-md text-sm font-medium text-gray-600 hover:bg-gray-100 hover:text-gray-900">Mes Cours</a>
            {{-- Lien Support actif --}}
            <a href="{{ route('support.create') }}" class="flex items-center px-3 py-2.5 rounded-md text-sm font-medium bg-blue-50 text-blue-700"> <svg class="w-5 h-5 mr-3 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" /></svg> Support </a>
        </nav>
        <div class="p-4 mt-auto border-t border-gray-200"> <form action="{{ route('logout') }}" method="POST"> @csrf <button type="submit" class="w-full flex items-center justify-center text-sm font-medium text-red-600 bg-red-50 hover:bg-red-100 px-3 py-2.5 rounded-md group"> <svg><!-- icon --></svg> Déconnexion </button> </form> </div>
    </aside>
    <!-- ================================================== -->

    <!-- CONTENU PRINCIPAL -->
    <main class="ml-64 w-full p-6 md:p-8 lg:p-10">
        <div class="max-w-3xl mx-auto">

            <!-- Header Page -->
            <div class="mb-8">
                <h1 class="text-2xl font-bold text-gray-900">Poser une Question</h1>
                <p class="mt-1 text-sm text-gray-600">Besoin d'aide ? Adressez votre question à un enseignant ou à l'administration.</p>
            </div>

            {{-- Message de succès après envoi --}}
            @if (session('success'))
                 <div class="mb-6 p-4 border border-green-300 bg-green-50 text-green-700 rounded-md" role="alert">
                     <p class="text-sm font-medium">{{ session('success') }}</p>
                 </div>
            @endif

            {{-- Affichage des erreurs de validation --}}
            @if ($errors->any())
                <div class="mb-6 p-4 border border-red-300 bg-red-50 text-red-700 rounded-md" role="alert">
                    <p class="text-sm font-medium mb-1">Veuillez corriger les erreurs suivantes :</p>
                    <ul class="list-disc list-inside text-sm">
                        @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach
                    </ul>
                </div>
            @endif

            <!-- Formulaire de Question -->
            <div class="bg-white shadow-lg rounded-lg p-6 md:p-8 border border-gray-200">
                 <form action="{{ route('support.store') }}" method="POST" class="space-y-6">
                    @csrf

                    {{-- Destinataire --}}
                    <div>
                        <label for="teacher_id" class="block text-sm font-medium text-gray-700 mb-1">
                            Destinataire <span class="text-xs text-gray-500">(Laissez vide pour l'administration)</span>
                        </label>
                        <select name="teacher_id" id="teacher_id" class="block w-full shadow-sm sm:text-sm rounded-md border-gray-300 focus:ring-blue-500 focus:border-blue-500 @error('teacher_id') border-red-500 @enderror">
                            <option value="">-- Administration --</option>
                            {{-- La variable $teachers est passée par le contrôleur --}}
                            @isset($teachers)
                                @foreach ($teachers as $teacher)
                                    {{-- Adaptez l'affichage du nom si nécessaire --}}
                                    <option value="{{ $teacher->id }}" {{ old('teacher_id') == $teacher->id ? 'selected' : '' }}>
                                        {{ $teacher->first_name ?? '' }} {{ $teacher->last_name ?? $teacher->name }}
                                    </option>
                                @endforeach
                            @endisset
                        </select>
                        @error('teacher_id')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                    </div>

                    {{-- Sujet --}}
                    <div>
                        <label for="subject" class="block text-sm font-medium text-gray-700 mb-1">
                            Sujet <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="subject" id="subject" value="{{ old('subject') }}" required maxlength="255"
                               class="block w-full shadow-sm sm:text-sm rounded-md border-gray-300 focus:ring-blue-500 focus:border-blue-500 @error('subject') border-red-500 @enderror"
                               placeholder="Ex: Problème avec la vidéo du cours...">
                        @error('subject')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                    </div>

                     {{-- Question --}}
                    <div>
                        <label for="question" class="block text-sm font-medium text-gray-700 mb-1">
                            Votre Question <span class="text-red-500">*</span>
                        </label>
                        <textarea name="question" id="question" rows="6" required minlength="10"
                                  class="block w-full shadow-sm sm:text-sm rounded-md border-gray-300 focus:ring-blue-500 focus:border-blue-500 @error('question') border-red-500 @enderror"
                                  placeholder="Décrivez précisément votre question ou le problème rencontré...">{{ old('question') }}</textarea>
                         <p class="mt-1 text-xs text-gray-500">Minimum 10 caractères.</p>
                        @error('question')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                    </div>

                    {{-- Bouton Envoyer --}}
                    <div class="pt-5 border-t border-gray-200">
                        <div class="flex justify-end">
                            <button type="submit" class="inline-flex items-center justify-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                <svg class="w-5 h-5 mr-2 -ml-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" /> </svg>
                                Envoyer la question
                            </button>
                        </div>
                    </div>
                 </form>
            </div>

             {{-- Lien optionnel vers "Mes tickets" (si vous créez cette page) --}}
             {{-- <div class="mt-6 text-center">
                 <a href="{{ route('student.my_tickets') }}" class="text-sm text-blue-600 hover:underline">Voir mes questions précédentes</a>
             </div> --}}

        </div>
    </main>

</body>
</html>