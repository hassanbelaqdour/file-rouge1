<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Modifier le Cours : {{ $course->title }} - EduQuest</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Styles optionnels (scrollbar, etc.) */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; border-radius: 10px; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
    </style>
</head>
<body class="bg-gray-100 flex antialiased">

  
    <aside class="w-64 h-screen bg-white shadow-md fixed top-0 left-0 border-r border-gray-200 z-20 flex flex-col">
        
        <div class="p-5 border-b border-gray-200 flex items-center space-x-2">
            <svg class="w-8 h-8 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" /> </svg>
            <h1 class="text-xl font-bold text-gray-800">EduQuest</h1>
        </div>
        
        <nav class="flex-grow p-4 space-y-2 overflow-y-auto">
             
            <a href="{{ route('teacher.StatistiqueTeacher') }}" class="flex items-center px-3 py-2.5 rounded-md text-sm font-medium transition-colors duration-150 ease-in-out {{ request()->routeIs('teacher.StatistiqueTeacher') ? 'bg-blue-50 text-blue-700' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}"> <svg class="w-5 h-5 mr-3 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75c0 .621-.504 1.125-1.125 1.125h-2.25A1.125 1.125 0 013 21v-7.875zM12.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v12.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM21 4.125c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v17.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" /></svg> Statistiques </a>
            <a href="{{ route('teacher.courses') }}" class="flex items-center px-3 py-2.5 rounded-md text-sm font-medium transition-colors duration-150 ease-in-out {{ request()->routeIs('teacher.courses*') ? 'bg-blue-50 text-blue-700' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}"> <svg class="w-5 h-5 mr-3 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"> <path d="M12 18.75a6 6 0 006-6v-1.5m-6 7.5a6 6 0 01-6-6v-1.5m6 7.5v3.75m-3.75 0h7.5M12 15.75a3 3 0 01-3-3V4.5a3 3 0 116 0v8.25a3 3 0 01-3 3z" /></svg> Tous les cours </a>
            <a href="{{ route('categories.index') }}" class="flex items-center px-3 py-2.5 rounded-md text-sm font-medium transition-colors duration-150 ease-in-out {{ request()->routeIs('categories.index') ? 'bg-blue-50 text-blue-700' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}"> <svg class="w-5 h-5 mr-3 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" > <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z" /> <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6z" /> </svg> Catégories </a>
            
        </nav>
        
        <div class="p-4 mt-auto border-t border-gray-200"> <form action="{{ route('logout') }}" method="POST"> @csrf <button type="submit" class="w-full flex items-center justify-center text-sm font-medium text-red-600 bg-red-50 hover:bg-red-100 px-3 py-2.5 rounded-md group"> <svg class="w-5 h-5 mr-2 text-red-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" /> </svg> Déconnexion </button> </form> </div>
    </aside>
    <!-- ================================================== -->

    <!-- CONTENU PRINCIPAL -->
    <main class="ml-64 w-full p-6 md:p-8 lg:p-10">
        <div class="max-w-4xl mx-auto">

            <!-- Header Page -->
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">Modifier le Cours</h1>
                    <p class="mt-1 text-sm text-gray-600">Mise à jour de : <span class="font-medium">{{ $course->title }}</span></p>
                </div>
                 <a href="{{ route('teacher.courses') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <svg class="-ml-1 mr-2 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" /> </svg>
                    Retour aux cours
                </a>
            </div>

            <!-- Formulaire de Modification -->
            <div class="bg-white shadow-lg rounded-lg p-6 md:p-8 border border-gray-200">
                 
                 @if ($errors->any())
                    <div class="mb-6 p-4 border border-red-300 bg-red-50 text-red-700 rounded-md">
                        <div class="flex items-center"><svg class="h-5 w-5 mr-3 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z" clip-rule="evenodd" /></svg><h3 class="text-sm font-semibold">Erreurs:</h3></div>
                        <ul class="mt-2 ml-8 list-disc text-sm space-y-1"> @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach </ul>
                    </div>
                 @endif

                 
                 <form action="{{ route('teacher.courses.update', $course->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf       
                    @method('PUT') 

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-6">
                        
                        <div class="space-y-6">
                            
                            <div>
                                <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Titre <span class="text-red-500">*</span></label>
                                
                                <input type="text" name="title" id="title" value="{{ old('title', $course->title) }}" required
                                       class="block w-full shadow-sm sm:text-sm rounded-md border-gray-300 focus:ring-blue-500 focus:border-blue-500 @error('title') border-red-500 ring-1 ring-red-500 @enderror">
                                @error('title')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                            </div>

                            
                            <div>
                                <label for="level" class="block text-sm font-medium text-gray-700 mb-1">Niveau <span class="text-red-500">*</span></label>
                                <select name="level" id="level" required class="block w-full shadow-sm sm:text-sm rounded-md border-gray-300 focus:ring-blue-500 focus:border-blue-500 @error('level') border-red-500 ring-1 ring-red-500 @enderror">
                                    
                                    <option value="beginner" {{ old('level', $course->level) == 'beginner' ? 'selected' : '' }}>Débutant</option>
                                    <option value="intermediate" {{ old('level', $course->level) == 'intermediate' ? 'selected' : '' }}>Intermédiaire</option>
                                    <option value="advanced" {{ old('level', $course->level) == 'advanced' ? 'selected' : '' }}>Avancé</option>
                                </select>
                                @error('level')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                            </div>

                             
                            <div>
                                <label for="type" class="block text-sm font-medium text-gray-700 mb-1">Type <span class="text-red-500">*</span></label>
                                <select name="type" id="type" required class="block w-full shadow-sm sm:text-sm rounded-md border-gray-300 focus:ring-blue-500 focus:border-blue-500 @error('type') border-red-500 ring-1 ring-red-500 @enderror">
                                    <option value="free" {{ old('type', $course->type) == 'free' ? 'selected' : '' }}>Gratuit</option>
                                    <option value="paid" {{ old('type', $course->type) == 'paid' ? 'selected' : '' }}>Payant</option>
                                </select>
                                @error('type')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                            </div>

                            
                            <div id="priceField" style="{{ old('type', $course->type) == 'paid' ? '' : 'display: none;' }}">
                                <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Prix (€) @if(old('type', $course->type) == 'paid')<span class="text-red-500">*</span>@endif</label>
                                <input type="number" step="0.01" min="0" name="price" id="price" value="{{ old('price', $course->price) }}"
                                       class="block w-full shadow-sm sm:text-sm rounded-md border-gray-300 focus:ring-blue-500 focus:border-blue-500 @error('price') border-red-500 ring-1 ring-red-500 @enderror">
                                @error('price')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                            </div>

                             
                             <div>
                                <label for="video_path" class="block text-sm font-medium text-gray-700 mb-1">Vidéo (Optionnel)</label>
                                <input type="file" name="video_path" id="video_path" accept="video/*"
                                       class="block w-full text-sm text-gray-500 border border-gray-300 rounded-md cursor-pointer bg-gray-50 focus:outline-none file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 @error('video_path') border-red-500 ring-1 ring-red-500 @enderror">
                                <p class="mt-1 text-xs text-gray-500">Laissez vide pour conserver la vidéo actuelle.</p>
                                
                                @if($course->video_path)
                                <div class="mt-2 text-xs text-gray-600">
                                    Vidéo actuelle : <a href="{{ Storage::url($course->video_path) }}" target="_blank" class="text-blue-600 hover:underline">{{ basename($course->video_path) }}</a>
                                </div>
                                @endif
                                @error('video_path')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                            </div>

                        </div>

                         
                        <div class="space-y-6">
                             
                            <div>
                                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description <span class="text-red-500">*</span></label>
                                <textarea name="description" id="description" rows="4" required class="block w-full shadow-sm sm:text-sm rounded-md border-gray-300 focus:ring-blue-500 focus:border-blue-500 @error('description') border-red-500 ring-1 ring-red-500 @enderror">{{ old('description', $course->description) }}</textarea>
                                @error('description')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                            </div>

                             
                            <div>
                                <label for="category_id" class="block text-sm font-medium text-gray-700 mb-1">Catégorie <span class="text-red-500">*</span></label>
                                <select name="category_id" id="category_id" required class="block w-full shadow-sm sm:text-sm rounded-md border-gray-300 focus:ring-blue-500 focus:border-blue-500 @error('category_id') border-red-500 ring-1 ring-red-500 @enderror">
                                    <option value="">-- Choisir --</option>
                                    
                                    @isset($categories)
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ old('category_id', $course->category_id) == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    @else
                                        <option value="" disabled>Chargement...</option>
                                    @endisset
                                </select>
                                @error('category_id')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                            </div>

                             
                             <div>
                                 <label for="image_path" class="block text-sm font-medium text-gray-700 mb-1">
                                     Image du cours <span class="text-xs text-gray-500">(Optionnel si déjà existante)</span>
                                 </label>
                                 
                                 @if ($course->image_path)
                                 <div class="mb-2">
                                     <img src="{{ Storage::url($course->image_path) }}" alt="Image actuelle" class="h-24 w-auto rounded border object-cover">
                                 </div>
                                 @endif
                                 <input type="file" name="image_path" id="image_path" accept="image/*"
                                        class="block w-full text-sm text-gray-500 border border-gray-300 rounded-md cursor-pointer bg-gray-50 focus:outline-none file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 @error('image_path') border-red-500 ring-1 ring-red-500 @enderror">
                                 <p class="mt-1 text-xs text-gray-500">Laissez vide pour conserver l'image actuelle.</p>
                                 @error('image_path')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                             </div>

                            
                            <div>
                                <label for="pdf_path" class="block text-sm font-medium text-gray-700 mb-1">PDF (Optionnel)</label>
                                <input type="file" name="pdf_path" id="pdf_path" accept=".pdf,application/pdf"
                                       class="block w-full text-sm text-gray-500 border border-gray-300 rounded-md cursor-pointer bg-gray-50 focus:outline-none file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 @error('pdf_path') border-red-500 ring-1 ring-red-500 @enderror">
                                <p class="mt-1 text-xs text-gray-500">Laissez vide pour conserver le PDF actuel.</p>
                                 
                                 @if($course->pdf_path)
                                <div class="mt-2 text-xs text-gray-600">
                                    PDF actuel : <a href="{{ Storage::url($course->pdf_path) }}" target="_blank" class="text-blue-600 hover:underline">{{ basename($course->pdf_path) }}</a>
                                </div>
                                @endif
                                @error('pdf_path')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                            </div>

                        </div>
                    </div>

                    
                    <div class="pt-5 border-t border-gray-200">
                        <div class="flex justify-end space-x-3">
                            <a href="{{ route('teacher.courses') }}" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Annuler
                            </a>
                            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                Mettre à jour le cours
                            </button>
                        </div>
                    </div>
                 </form>

                
                <script>
                     document.addEventListener('DOMContentLoaded', function () {
                         const typeSelect = document.getElementById('type');
                         const priceField = document.getElementById('priceField');
                         const priceInput = document.getElementById('price');
                         const priceLabel = priceField.querySelector('label');

                         function togglePriceField() {
                             const isPaid = typeSelect.value === 'paid';
                             priceField.style.display = isPaid ? 'block' : 'none';
                             priceInput.required = isPaid;
                              if (priceLabel) {
                                 const requiredSpan = priceLabel.querySelector('span.text-red-500');
                                 if (isPaid && !requiredSpan) {
                                     const newSpan = document.createElement('span'); newSpan.className = 'text-red-500'; newSpan.textContent = ' *'; priceLabel.appendChild(newSpan);
                                 } else if (!isPaid && requiredSpan) { requiredSpan.remove(); }
                             }
                             if (!isPaid) { priceInput.value = ''; }
                         }
                         typeSelect.addEventListener('change', togglePriceField);
                         togglePriceField(); // Exécute au chargement
                     });
                </script>

            </div>

        </div>
    </main>

</body>
</html>