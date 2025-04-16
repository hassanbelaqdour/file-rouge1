<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduQuest - Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link
        href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Sniglet&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Sniglet', cursive;
        }
    </style>
</head>

<body class="h-screen overflow-hidden bg-white">
    <!-- header -->
    <header class="border-b border-gray-200">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <div class="flex items-center">
                <h1 class="text-2xl font-bold">EduQuest</h1>
            </div>
            <nav>
                <ul class="flex space-x-8">
                    <li><a href="{{ route('home') }}" class="hover:text-gray-600"> {{-- Lien vers l'accueil --}}
                            <!-- Icône Home Font Awesome -->
                            <i class="fas fa-home text-lg"></i>
                        </a></li>
                </ul>
            </nav>
        </div>
    </header>
    <!-- main content -->
    <main class="container mx-auto px-4 py-4 flex items-center justify-center">
        <div class="flex flex-col md:flex-row gap-8">
            <!-- left side - placeholder area -->
            <div class="w-full md:w-1/2 bg-gray-100 rounded-lg flex">
                <img src="https://cdn.leonardo.ai/users/5087e2c4-de41-4a88-becc-108a49d3f1f4/generations/d0fa2136-ebba-41e1-8e81-2470e8c8ac5d/Leonardo_Lightning_XL_Image_inspirante_dun_tudiant_moderne_et_0.jpg"
                    alt="Image montrant un étudiant garçon souriant" class="w-full h-full object-cover rounded-lg">
            </div>
            <!-- right side - login form -->
            <div class="w-full md:w-1/2 border border-gray-200 rounded-lg p-8 overflow-hidden">
                <h2 class="text-2xl font-bold text-center mb-2">éveille ton savoir. relève le défi</h2>
                <p class="text-center text-gray-600 mb-8">connecte-toi à eduquest et commence ton aventure
                    d'apprentissage.</p>

                {{-- Affichage du message de statut (ex: après inscription) --}}
                @if (session('status'))
                    <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                        role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                {{-- Affichage des erreurs générales (optionnel, si $errors->any() existe mais pas spécifique à un
                champ) --}}
                @if ($errors->any() && !$errors->has('email') && !$errors->has('password'))
                    <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        Une erreur inattendue est survenue. Veuillez réessayer.
                    </div>
                @endif

                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="email" class="block mb-2">Adresse Email</label> {{-- Traduit --}}
                        <input type="email" name="email" id="email"
                            class="w-full border border-gray-300 rounded-md p-2 @error('email') border-red-500 @enderror"
                            value="{{ old('email') }}" required autocomplete="email" autofocus> {{-- Ajout
                        autocomplete/autofocus --}}
                        {{-- L'erreur 'auth.failed' sera affichée ici car mappée sur 'email' dans le controller --}}
                        @error('email')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p> {{-- text-xs italic mt-2 pour
                            style commun --}}
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password" class="block mb-2">Mot de passe</label> {{-- Traduit --}}
                        <input type="password" name="password" id="password"
                            class="w-full border border-gray-300 rounded-md p-2 @error('password') border-red-500 @enderror"
                            required autocomplete="current-password"> {{-- Ajout autocomplete --}}
                        @error('password')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Case "Se souvenir de moi" --}}
                    <div class="block mb-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox"
                                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                name="remember">
                            <span class="ml-2 text-sm text-gray-600">Se souvenir de moi</span>
                        </label>
                    </div>

                    <div class="flex justify-between items-center mb-6">
                        <button type="submit" class="bg-black text-white px-8 py-2 rounded-full hover:bg-gray-800">Se
                            connecter</button> {{-- Traduit + hover --}}
                        {{-- Mettre à jour ce lien si/quand la fonctionnalité est implémentée --}}
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-sm text-blue-500 hover:underline">Mot de
                                passe oublié ?</a> {{-- Traduit + text-sm --}}
                        @endif
                    </div>
                </form>
                {{-- Section connexion sociale (à implémenter séparément) --}}
                <div class="text-center mb-4">
                    <p class="text-gray-600">connecte-toi avec</p>
                </div>
                <div class="flex gap-4 mb-8">
                    <a href="/google/redirect"
                        class="w-1/2 border border-gray-300 rounded-md py-3 flex justify-center hover:bg-gray-50">Google</a>
                    <button
                        class="w-1/2 border border-gray-300 rounded-md py-3 flex justify-center hover:bg-gray-50">GitHub</button>
                </div>

                <div class="text-center mb-4">
                    <p class="text-gray-600">Pas encore inscrit ? <a href="{{ route('register') }}"
                            class="text-blue-500 hover:underline">Inscrivez-vous</a></p> {{-- Traduit + text-blue --}}
                </div>
            </div>
        </div>
    </main>
</body>

</html>