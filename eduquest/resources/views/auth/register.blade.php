<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduQuest - Sign Up</title>
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

<body class="bg-white min-h-screen">
    <!-- header -->
    <header class="border-b border-gray-200">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <div class="flex items-center">
                <h1 class="text-2xl font-bold">EduQuest</h1>
            </div>
            <nav>
                <ul class="flex space-x-8">
                    <li><a href="{{ route('home') }}" class="hover:text-gray-600"> {{-- Lien vers l'accueil --}}
                            <i class="fas fa-home text-lg"></i>
                        </a></li>
                </ul>
            </nav>
        </div>
    </header>
    <!-- main content -->
    <main class="container mx-auto px-4 py-4 flex items-center justify-center">
        <div class="flex flex-col md:flex-row gap-6 w-full max-w-7xl">
            <div class="w-full md:w-1/2 rounded-lg">
                <img src="https://cdn.leonardo.ai/users/5087e2c4-de41-4a88-becc-108a49d3f1f4/generations/e8310116-26c6-44f8-9b62-0ad48bf854ab/Leonardo_Lightning_XL_Image_montrant_un_tudiant_garcon_sourian_2.jpg"
                    alt="Image montrant un étudiant garçon souriant" class="w-full h-full object-cover rounded-lg">
            </div>
            <div class="w-full md:w-1/2 bg-white border border-gray-200 rounded-lg p-4">
                <h2 class="text-2xl font-bold text-center mb-2">Rejoins EduQuest</h2>
                <p class="text-center text-gray-600 mb-4">Crée un compte pour commencer à explorer le savoir.</p>

                {{-- Affichage des erreurs générales --}}
                @if ($errors->any() && !$errors->has('first_name') && !$errors->has('last_name') && !$errors->has('email') && !$errors->has('password'))
                    <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        Une erreur est survenue. Veuillez vérifier vos informations.
                    </div>
                @endif

                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    {{-- CHAMP PRÉNOM (first_name) --}}
                    <div class="mb-4">
                        <label for="first_name" class="block mb-2">Prénom</label>
                        <input type="text" name="first_name" id="first_name"
                            class="w-full border border-gray-300 rounded-md p-2 @error('first_name') border-red-500 @enderror"
                            value="{{ old('first_name') }}" required autocomplete="given-name" autofocus>
                        @error('first_name')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- CHAMP NOM DE FAMILLE (last_name) --}}
                    <div class="mb-4">
                        <label for="last_name" class="block mb-2">Nom de famille</label>
                        <input type="text" name="last_name" id="last_name"
                            class="w-full border border-gray-300 rounded-md p-2 @error('last_name') border-red-500 @enderror"
                            value="{{ old('last_name') }}" required autocomplete="family-name">
                        @error('last_name')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- CHAMP EMAIL --}}
                    <div class="mb-4">
                        <label for="email" class="block mb-2">Email</label>
                        <input type="email" name="email" id="email"
                            class="w-full border border-gray-300 rounded-md p-2 @error('email') border-red-500 @enderror"
                            value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- CHAMP MOT DE PASSE --}}
                    <div class="mb-4">
                        <label for="password" class="block mb-2">Mot de passe</label>
                        <input type="password" name="password" id="password"
                            class="w-full border border-gray-300 rounded-md p-2 @error('password') border-red-500 @enderror"
                            required autocomplete="new-password">
                        {{-- Les erreurs de confirmation s'affichent souvent ici --}}
                        @error('password')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- CHAMP CONFIRMATION MOT DE PASSE --}}
                    <div class="mb-4">
                        <label for="password_confirmation" class="block mb-2">Confirmer le mot de passe</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            class="w-full border border-gray-300 rounded-md p-2" required autocomplete="new-password">
                        {{-- Pas besoin d'@error ici en général, l'erreur est sur 'password' --}}
                    </div>

                    <button type="submit"
                        class="w-full bg-black text-white py-2 rounded-full hover:bg-gray-800">S'inscrire</button>
                </form>

                <div class="text-center mt-4">
                    <p class="text-gray-600">Vous avez déjà un compte ? <a href="{{ route('login') }}"
                            class="text-blue-500 hover:underline">Connectez-vous ici</a></p>
                </div>
            </div>
        </div>
    </main>
</body>

</html>