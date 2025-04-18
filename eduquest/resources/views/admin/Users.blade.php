<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Sniglet&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <style>
        body {
            font-family: 'Ubuntu', sans-serif;
        }

        .sidebar-link.active {
            background-color: #e5e7eb;
            color: #059669;
            font-weight: 600;
        }

        .sidebar-link.active .material-icons {
            color: #059669;
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

        .material-icons,
        .material-symbols-outlined {
            vertical-align: middle;
        }
    </style>
</head>

<body class="bg-gray-100">

    <header
        class="bg-white py-4 px-6 flex justify-between items-center fixed top-0 left-0 w-full z-20 shadow-md border-b border-gray-200">
        <div class="text-2xl font-semibold text-black">EduQuest</div>

        <nav class="hidden md:flex items-center gap-4 lg:gap-6">
            <a href=""
                class="flex items-center gap-2 py-2 px-3 lg:px-4 rounded-md text-gray-700 hover:bg-gray-100 hover:text-black transition-colors duration-150">
                <span class="material-icons text-base">dashboard</span>
                <span class="text-sm font-medium">Tableau de bord</span>
            </a>
            <a href=""
                class="flex items-center gap-2 py-2 px-3 lg:px-4 rounded-md bg-gray-100 text-green-700 font-semibold">
                <span class="material-icons text-base">group</span>
                <span class="text-sm font-medium">Gestion Users</span>
            </a>
            <a href=""
                class="flex items-center gap-2 py-2 px-3 lg:px-4 rounded-md text-gray-700 hover:bg-gray-100 hover:text-black transition-colors duration-150">
                <span class="material-icons text-base">school</span>
                <span class="text-sm font-medium">Gestion Courses</span>
            </a>
        </nav>

        <div class="flex items-center space-x-4 relative">
            <button
                class="w-10 h-10 flex items-center justify-center rounded-full text-gray-500 hover:text-black hover:bg-gray-100">
                <span class="material-symbols-outlined text-lg">notifications</span>
            </button>
            <div class="relative group">
                <button class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-500">
                    <span class="material-symbols-outlined text-lg">admin_panel_settings</span>
                </button>
                <div
                    class="absolute right-0 mt-1 w-48 bg-white shadow-lg rounded-lg border border-gray-200 opacity-0 group-hover:opacity-100 pointer-events-none group-hover:pointer-events-auto transition-opacity duration-200 z-10">
                    <div class="px-4 py-3 text-sm text-gray-600">
                        <p class="font-medium text-gray-900">Admin EduQuest</p>
                        <p class="truncate">admin@eduquest.com</p>
                    </div>
                    <hr class="border-gray-200">
                    <a href=""
                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                        <span class="material-icons mr-2 align-middle text-sm">settings</span> Paramètres
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            <span class="material-icons mr-2 align-middle text-sm">logout</span> Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </header>

    <div class="flex pt-16 md:pt-20 min-h-screen">
        <main class="flex-grow p-6 md:p-8 lg:p-10 bg-gray-100 overflow-y-auto">
            <h1 class="text-2xl font-semibold text-gray-800 mb-6">Gestion des Utilisateurs</h1>

            <div class="mb-4 flex justify-between items-center">
                <input type="text" placeholder="Rechercher un utilisateur..."
                    class="px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm w-1/3">
                <a href=""
                    class="px-4 py-2 bg-green-600 border border-transparent rounded-md shadow-sm text-sm font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 inline-flex items-center">
                    <span class="material-icons text-sm mr-1">add</span> Ajouter Utilisateur
                </a>
            </div>

            <div class="bg-white shadow-lg rounded-lg overflow-x-auto">
                <table class="w-full table-auto">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nom</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Email</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Rôle</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Statut</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach(\app\Models\User::all() as $user)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $user->name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->email }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->role }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                    {{ $user->status === 'Actif' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ $user->status }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                                    <a href="/admin.users.edit/{$user->id}"
                                        class="text-blue-600 hover:text-blue-900">
                                        <span class="material-icons text-sm">edit</span>
                                    </a>
                                    <form action="/admin.users.destroy/{$user->id}" method="POST"
                                        class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900">
                                            <span class="material-icons text-sm">delete</span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
{{-- 
            <div class="mt-4 text-sm text-gray-500">
                {{ $users->links() }}
            </div> --}}
        </main>
    </div>
    
</body>

</html>