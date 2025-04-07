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
                    <li><a href="#" class="hover:text-gray-600">
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

                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="email" class="block mb-2">email address</label>
                        <input type="email" name="email" id="email" class="w-full border border-gray-300 rounded-md p-2"
                            value="{{ old('email') }}" required>
                        @error('email')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password" class="block mb-2">password</label>
                        <input type="password" name="password" id="password"
                            class="w-full border border-gray-300 rounded-md p-2" required>
                        @error('password')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-between items-center mb-6">
                        <button type="submit" class="bg-black text-white px-8 py-2 rounded-full">login</button>
                        <a href="#" class="text-blue-500 hover:underline">forgot password?</a>
                    </div>
                </form>
                <div class="text-center mb-4">
                    <p class="text-gray-600">connecte-toi avec</p>
                </div>

                <div class="flex gap-4 mb-8">
                    <button class="w-1/2 border border-gray-300 rounded-md py-3 flex justify-center">google</button>
                    <button class="w-1/2 border border-gray-300 rounded-md py-3 flex justify-center">github</button>
                </div>

                <div class="text-center mb-4">
                    <p class="text-gray-600">pas encore inscrit ? <a href="{{ route('register') }}"
                            class="text-gray-600 hover:underline">inscrivez-vous</a></p>
                </div>
            </div>
        </div>
    </main>
</body>

</html>