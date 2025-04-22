<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des utilisateurs</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 py-10 px-6">

    <div class="max-w-6xl mx-auto bg-white shadow-md rounded-lg p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-center w-full">Liste des Utilisateurs</h1>

            <form action="{{ route('logout') }}" method="POST" class="absolute top-6 right-6">
                @csrf
                <button type="submit" class="bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-800">
                    Déconnexion
                </button>
            </form>
        </div>

        @php
            use App\Models\User;
        @endphp

        @if ($pendingUsers->count() + $approvedUsers->count() > 0)
            <table class="w-full table-auto border border-gray-300">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border px-4 py-2">Nom</th>
                        <th class="border px-4 py-2">Prénom</th>
                        <th class="border px-4 py-2">Email</th>
                        <th class="border px-4 py-2">Statut</th>
                        <th class="border px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pendingUsers as $user)
                        <tr>
                            <td class="border px-4 py-2">{{ $user->last_name }}</td>
                            <td class="border px-4 py-2">{{ $user->first_name }}</td>
                            <td class="border px-4 py-2">{{ $user->email }}</td>
                            <td class="border px-4 py-2 text-yellow-600">En attente</td>
                            <td class="border px-4 py-2 flex gap-2 justify-center">
                                <form action="{{ route('admin.approveUser', $user->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">Approuver</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    @foreach ($approvedUsers as $user)
                        <tr>
                            <td class="border px-4 py-2">{{ $user->last_name }}</td>
                            <td class="border px-4 py-2">{{ $user->first_name }}</td>
                            <td class="border px-4 py-2">{{ $user->email }}</td>
                            <td class="border px-4 py-2 text-green-600">Approuvé</td>
                            <td class="border px-4 py-2 flex gap-2 justify-center">
                                <form action="{{ route('admin.rejectUser', $user->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Remettre en attente</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-center text-gray-600">Aucun utilisateur enregistré.</p>
        @endif
    </div>

</body>
</html>
