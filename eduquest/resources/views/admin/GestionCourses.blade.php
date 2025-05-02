<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des Cours</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex">

    <!-- SIDEBAR FIXE -->
    <aside class="w-64 h-screen bg-white shadow-lg fixed top-0 left-0 border-r border-gray-200 z-10">
        <div class="p-6 border-b border-gray-100">
            <h1 class="text-2xl font-bold text-black">EduQuest</h1>
        </div>
        <nav class="p-6 space-y-4">
            <a href="{{ route('admin.StatistiqueAdmin') }}" class="block text-gray-700 hover:text-blue-600">Statistique</a>
            <a href="{{ route('admin.GestionUsers') }}" class="block text-gray-700 hover:text-blue-600">Utilisateurs</a>
            <a href="{{ route('admin.GestionCourses') }}" class="block text-gray-700 hover:text-blue-600 font-semibold">Gestion des Cours</a>
            <!-- Ajoute d'autres liens ici si besoin -->

            <!-- Bouton de déconnexion -->
            <form action="{{ route('logout') }}" method="POST" class="pt-6">
                @csrf
                <button type="submit" class="w-full bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Déconnexion</button>
            </form>
        </nav>
    </aside>

    <!-- CONTENU PRINCIPAL -->
    <main class="ml-64 w-full py-10 px-6">

        <div class="max-w-5xl mx-auto mb-6">
            <h1 class="text-3xl font-bold text-gray-800 mb-4">Gestion des Cours</h1>

            <div class="bg-white shadow-md rounded-lg p-6">
                @if ($courses->count() > 0)
                    <table class="w-full table-auto border border-gray-300">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="border px-4 py-2">Titre</th>
                                <th class="border px-4 py-2">Enseignant</th>
                                <th class="border px-4 py-2">Catégorie</th>
                                <th class="border px-4 py-2">Statut</th>
                                <th class="border px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($courses as $course)
                                <tr>
                                    <td class="border px-4 py-2">{{ $course->title }}</td>
                                    <td class="border px-4 py-2">{{ $course->teacher->first_name }} {{ $course->teacher->last_name }}</td>
                                    <td class="border px-4 py-2">{{ $course->category->name }}</td>
                                    <td class="border px-4 py-2">
                                        @if ($course->status === 'accepted')
                                            <span class="text-green-600 font-semibold">Approuvé</span>
                                        @else
                                            <span class="text-red-600 font-semibold">Rejeté</span>
                                        @endif
                                    </td>
                                    <td class="border px-4 py-2 text-center">
                                        @if ($course->status === 'pending')
                                            <form action="{{ route('admin.acceptCourse', $course->id) }}" method="POST" class="inline-block">
                                                @csrf
                                                <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">Accepter</button>
                                            </form>
                                            <form action="{{ route('admin.rejectCourse', $course->id) }}" method="POST" class="inline-block ml-2">
                                                @csrf
                                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Rejeter</button>
                                            </form>
                                        @elseif ($course->status === 'accepted')
                                            <!-- Si déjà accepté, tu peux choisir de rien faire ou afficher un message -->
                                            <span class="text-gray-600">Course already accepted</span>
                                        @elseif ($course->status === 'rejected')
                                            <!-- Si rejeté, tu peux également décider de permettre de le ré-approuver -->
                                            <form action="{{ route('admin.acceptCourse', $course->id) }}" method="POST" class="inline-block ml-2">
                                                @csrf
                                                <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">Ré-approuver</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-center text-gray-600">Aucun cours trouvé.</p>
                @endif
            </div>
        </div>
    </main>

</body>
</html>
