<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Mes Cours Favoris - EduQuest</title> 
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Sniglet&display=swap" rel="stylesheet">
    <style>
        .sniglet { font-family: 'Sniglet', cursive; }
        /* Ajoutez d'autres styles si nécessaire, comme pour les icones, etc. */
    </style>
</head>
<body class="bg-gray-100">

    
    <div class="container mx-auto px-4 py-8 mt-16"> 
        <h1 class="text-3xl font-bold text-gray-800 mb-8 sniglet">Mes Cours Favoris</h1>

        
        @if (session('status'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                {{ session('status') }}
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                {{ session('error') }}
            </div>
        @endif

        
        @if ($courses && $courses->count() > 0)
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                
                @foreach ($courses as $course)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300 flex flex-col h-full">
                        
                        <div class="h-40 overflow-hidden">
                            @if($course->image_path)
                                <img src="{{ Storage::url($course->image_path) }}" alt="Image {{ $course->title }}" class="w-full h-full object-cover">
                            @else
                                
                                <div class="w-full h-40 bg-gray-200 flex items-center justify-center text-gray-500">Aucune image</div>
                            @endif
                        </div>

                        
                        <div class="p-4 flex flex-col flex-grow">
                             
                            @if($course->category)
                                <p class="text-xs font-medium text-blue-600 uppercase tracking-wide mb-1">
                                    {{ $course->category->name }}
                                </p>
                            @endif

                            
                            <h3 class="font-semibold text-lg text-gray-800 sniglet mb-1">
                                
                                <a href="{{ route('student.courses.show', $course->id) }}" class="hover:text-blue-600">{{ $course->title }}</a>
                            </h3>

                            
                            <p class="text-gray-600 text-sm mt-1 mb-4 flex-grow">{{ Str::limit($course->description, 100) }}</p>

                            
                            <div class="mt-auto flex items-end justify-between pt-3 border-t border-gray-100">
                                <div>
                                    <p class="text-gray-700 font-medium text-sm">Prix :</p>
                                    <p class="text-green-600 font-bold text-lg leading-tight">
                                        {{ $course->type == 'paid' && $course->price > 0 ? number_format($course->price, 2) . '€' : 'Gratuit' }}
                                    </p>
                                </div>

                                <div class="flex space-x-2 items-center">
                                    
                                    
                                    <form action="{{ route('student.courses.like', $course->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        
                                        <button type="submit"
                                                title="Retirer des favoris"
                                                class="p-2 rounded-full text-red-500 bg-red-100 hover:bg-red-200 transition-colors duration-200 ease-in-out">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </form>

                                    
                                     
                                    @php
                                         $isEnrolled = Auth::check() ? \App\Models\Enrollment::where('user_id', Auth::id())->where('course_id', $course->id)->where('status', 'completed')->exists() : false;

                                    @endphp

                                    @if($course->type == 'free' || $course->price <= 0 || $isEnrolled)
                                        <a href="{{ route('student.courses.show', $course->id) }}"
                                           class="px-4 py-2 rounded-md bg-green-600 text-white text-sm hover:bg-green-700">
                                            Accéder
                                        </a>
                                    @else
                                        <a href="{{ route('payment.checkout', $course->id) }}"
                                           class="px-4 py-2 rounded-md bg-blue-600 text-white text-sm hover:bg-blue-700">
                                            S'inscrire ({{ number_format($course->price, 2) }}€)
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        @else
            
            <div class="text-center py-16 px-6 bg-white rounded-lg shadow border">
                <svg class="mx-auto h-12 w-12 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" /> </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900">Vous n'avez pas encore ajouté de cours à vos favoris.</h3>
                <p class="mt-1 text-sm text-gray-500">Explorez notre catalogue pour trouver des cours à aimer !</p>
                
                 <a href="{{ route('courses.index') }}" class="mt-4 inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors">
                    Parcourir les cours
                </a>
            </div>
        @endif

    </div>

    
    

</body>
</html>