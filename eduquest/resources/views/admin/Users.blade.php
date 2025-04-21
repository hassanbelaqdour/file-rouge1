<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gestion des utilisateurs</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900 p-6">

    <h1 class="text-3xl font-bold mb-6">Gestion des Utilisateurs</h1>

    <!-- Utilisateurs en attente -->
    <h2 class="text-2xl font-semibold mb-2">En attente de validation</h2>
    <table class="w-full mb-8 border">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-2">Nom</th>
                <th class="p-2">Email</th>
                <th class="p-2">Rôle</th>
                <th class="p-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pendingUsers as $user)
                <tr class="bg-white border-t">
                    <td class="p-2">{{ $user->first_name }} {{ $user->last_name }}</td>
                    <td class="p-2">{{ $user->email }}</td>
                    <td class="p-2">{{ $user->role }}</td>
                    <td class="p-2 space-x-2">
                        <form action="{{ route('admin.approveUser', $user->id) }}" method="POST" class="inline">
                            @csrf
                            <button class="bg-green-500 text-white px-3 py-1 rounded">Approuver</button>
                        </form>
                        <form action="{{ route('admin.rejectUser', $user->id) }}" method="POST" class="inline">
                            @csrf
                            <button class="bg-yellow-500 text-white px-3 py-1 rounded">Rejeter</button>
                        </form>
                        <form action="{{ route('admin.deleteUser', $user->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-500 text-white px-3 py-1 rounded">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center p-2 text-gray-500">Aucun utilisateur en attente.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Utilisateurs approuvés -->
    <h2 class="text-2xl font-semibold mb-2">Utilisateurs approuvés</h2>
    <table class="w-full border">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-2">Nom</th>
                <th class="p-2">Email</th>
                <th class="p-2">Rôle</th>
                <th class="p-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($approvedUsers as $user)
                <tr class="bg-white border-t">
                    <td class="p-2">{{ $user->first_name }} {{ $user->last_name }}</td>
                    <td class="p-2">{{ $user->email }}</td>
                    <td class="p-2">{{ $user->role }}</td>
                    <td class="p-2">
                        <form action="{{ route('admin.deleteUser', $user->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-500 text-white px-3 py-1 rounded">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center p-2 text-gray-500">Aucun utilisateur approuvé.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>
