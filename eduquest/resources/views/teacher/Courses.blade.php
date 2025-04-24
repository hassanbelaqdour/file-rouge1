<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> {{-- Added for responsiveness --}}
    <title>Mes Cours - EduQuest</title>
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- Optional: Add custom Tailwind config or fonts here if needed --}}
    <style>
        /* Simple transition for the alert box */
        .alert-fade-enter-active, .alert-fade-leave-active {
            transition: opacity 0.5s ease;
        }
        .alert-fade-enter-from, .alert-fade-leave-to {
            opacity: 0;
        }
        /* Custom scrollbar styling (optional) */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb {
            background: #cbd5e1; /* gray-300 */
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8; /* gray-400 */
        }
    </style>
</head>
<body class="bg-gray-100 flex antialiased"> {{-- Added antialiased for smoother fonts --}}

    <!-- SIDEBAR FIXE -->
    <aside class="w-64 h-screen bg-white shadow-md fixed top-0 left-0 border-r border-gray-200 z-20 flex flex-col">
        {{-- Sidebar Header --}}
        <div class="p-5 border-b border-gray-200 flex items-center space-x-2">
            {{-- Replace with your actual logo if you have one --}}
            <svg class="w-8 h-8 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
            </svg>
            <h1 class="text-xl font-bold text-gray-800">EduQuest</h1>
        </div>

        {{-- Navigation --}}
        <nav class="flex-grow p-4 space-y-2 overflow-y-auto">
             {{-- Helper function to determine active state (you might need to adjust route names) --}}
             @php
             function isActiveRoute($routeName) {
                 return request()->routeIs($routeName);
             }
             @endphp

            <a href="{{ route('teacher.StatistiqueTeacher') }}" class="flex items-center px-3 py-2.5 rounded-md text-sm font-medium transition-colors duration-150 ease-in-out
                {{ isActiveRoute('teacher.StatistiqueTeacher') ? 'bg-blue-50 text-blue-700' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}">
                 {{-- Heroicon: chart-bar --}}
                <svg class="w-5 h-5 mr-3 flex-shrink-0 {{ isActiveRoute('teacher.StatistiqueTeacher') ? 'text-blue-500' : 'text-gray-400 group-hover:text-gray-500' }}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75c0 .621-.504 1.125-1.125 1.125h-2.25A1.125 1.125 0 013 21v-7.875zM12.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v12.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM21 4.125c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v17.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" />
                </svg>
                Statistiques
            </a>
            <a href="{{ route('teacher.courses') }}" class="flex items-center px-3 py-2.5 rounded-md text-sm font-medium transition-colors duration-150 ease-in-out
                {{ isActiveRoute('teacher.courses') ? 'bg-blue-50 text-blue-700' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}">
                 {{-- Heroicon: academic-cap --}}
                 <svg class="w-5 h-5 mr-3 flex-shrink-0 {{ isActiveRoute('teacher.courses') ? 'text-blue-500' : 'text-gray-400 group-hover:text-gray-500' }}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                     <path d="M12 18.75a6 6 0 006-6v-1.5m-6 7.5a6 6 0 01-6-6v-1.5m6 7.5v3.75m-3.75 0h7.5M12 15.75a3 3 0 01-3-3V4.5a3 3 0 116 0v8.25a3 3 0 01-3 3z" />
                 </svg>
                Tous les cours
            </a>
            {{-- Add route name for étudiants if available --}}
            <a href="#" class="flex items-center px-3 py-2.5 rounded-md text-sm font-medium transition-colors duration-150 ease-in-out
                {{ isActiveRoute('teacher.students') ? 'bg-blue-50 text-blue-700' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}">
                 {{-- Heroicon: users --}}
                <svg class="w-5 h-5 mr-3 flex-shrink-0 {{ isActiveRoute('teacher.students') ? 'text-blue-500' : 'text-gray-400 group-hover:text-gray-500' }}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                </svg>
                Étudiants inscrits
            </a>
        </nav>

        {{-- Logout Button at bottom --}}
        <div class="p-4 mt-auto border-t border-gray-200">
             <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full flex items-center justify-center text-sm font-medium text-red-600 bg-red-50 hover:bg-red-100 px-3 py-2.5 rounded-md transition-colors duration-150 ease-in-out group">
                    {{-- Heroicon: arrow-left-on-rectangle --}}
                    <svg class="w-5 h-5 mr-2 text-red-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                    </svg>
                    Déconnexion
                </button>
            </form>
        </div>
    </aside>

    <!-- CONTENU PRINCIPAL -->
    <main class="ml-64 w-full p-6 md:p-8 lg:p-10"> {{-- Consistent padding --}}
        <div class="max-w-7xl mx-auto"> {{-- Slightly wider max width --}}

            {{-- *** STYLED ALERT BOX (Replaces simple JS alert) *** --}}
            @if (session('success'))
            <div id="success-alert" class="alert-fade-enter-active fixed top-5 right-5 z-50 rounded-md bg-green-50 p-4 shadow-lg border border-green-200" role="alert">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        {{-- Heroicon: check-circle --}}
                        <svg class="h-6 w-6 text-green-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="ml-3 w-0 flex-1 pt-0.5">
                        <p class="text-sm font-medium text-green-800">Réussi!</p>
                        <p class="mt-1 text-sm text-green-700">{{ session('success') }}</p>
                    </div>
                    <div class="ml-4 flex flex-shrink-0">
                        <button type="button" onclick="closeAlert('success-alert')" class="inline-flex rounded-md bg-green-50 p-1.5 text-green-500 hover:bg-green-100 focus:outline-none focus:ring-2 focus:ring-green-600 focus:ring-offset-2 focus:ring-offset-green-50">
                            <span class="sr-only">Fermer</span>
                            {{-- Heroicon: x-mark --}}
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                              <path d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            @endif
            {{-- *** END STYLED ALERT BOX *** --}}


            <!-- HEADER -->
            <div class="flex flex-col md:flex-row items-start md:items-center justify-between mb-8">
                <h1 class="text-3xl font-bold text-gray-900 mb-4 md:mb-0">Mes Cours</h1>
                <button id="toggleFormBtn" class="inline-flex items-center justify-center px-5 py-2.5 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                     {{-- Heroicon: plus-circle --}}
                    <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                      <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.75-11.25a.75.75 0 00-1.5 0v2.5h-2.5a.75.75 0 000 1.5h2.5v2.5a.75.75 0 001.5 0v-2.5h2.5a.75.75 0 000-1.5h-2.5v-2.5z" clip-rule="evenodd" />
                    </svg>
                    Ajouter un cours
                </button>
            </div>

            <!-- FORMULAIRE AJOUT DE COURS (hidden par défaut) -->
            <div id="addCourseForm" class="hidden bg-white shadow-lg rounded-lg p-6 md:p-8 mb-8 border border-gray-200">
                 <h2 class="text-xl font-semibold text-gray-800 mb-6 border-b pb-3">Nouveau Cours</h2>

                {{-- Validation Errors Box --}}
                @if ($errors->any())
                    <div class="mb-6 p-4 border border-red-300 bg-red-50 text-red-700 rounded-md" role="alert">
                        <div class="flex items-center">
                             {{-- Heroicon: x-circle --}}
                            <svg class="h-5 w-5 mr-3 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                              <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z" clip-rule="evenodd" />
                            </svg>
                            <h3 class="text-sm font-semibold">Il y a des erreurs dans votre formulaire :</h3>
                        </div>
                        <ul class="mt-2 ml-8 list-disc text-sm space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


                <form action="{{ route('teacher.courses.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    {{-- Form Grid --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-6">

                        {{-- Column 1 --}}
                        <div class="space-y-6">
                            {{-- Titre --}}
                            <div>
                                <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Titre du cours <span class="text-red-500">*</span></label>
                                <input type="text" name="title" id="title" value="{{ old('title') }}" required
                                       class="block w-full shadow-sm sm:text-sm rounded-md border-gray-300 focus:ring-blue-500 focus:border-blue-500 @error('title') border-red-500 ring-1 ring-red-500 @enderror">
                                @error('title')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                            </div>

                            {{-- Niveau --}}
                            <div>
                                <label for="level" class="block text-sm font-medium text-gray-700 mb-1">Niveau <span class="text-red-500">*</span></label>
                                <select name="level" id="level" required
                                        class="block w-full shadow-sm sm:text-sm rounded-md border-gray-300 focus:ring-blue-500 focus:border-blue-500 @error('level') border-red-500 ring-1 ring-red-500 @enderror">
                                    <option value="beginner" {{ old('level') == 'beginner' ? 'selected' : '' }}>Débutant</option>
                                    <option value="intermediate" {{ old('level') == 'intermediate' ? 'selected' : '' }}>Intermédiaire</option>
                                    <option value="advanced" {{ old('level') == 'advanced' ? 'selected' : '' }}>Avancé</option>
                                </select>
                                @error('level')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                            </div>

                             {{-- Type --}}
                            <div>
                                <label for="type" class="block text-sm font-medium text-gray-700 mb-1">Type <span class="text-red-500">*</span></label>
                                <select name="type" id="type" required
                                        class="block w-full shadow-sm sm:text-sm rounded-md border-gray-300 focus:ring-blue-500 focus:border-blue-500 @error('type') border-red-500 ring-1 ring-red-500 @enderror">
                                    <option value="free" {{ old('type', 'free') == 'free' ? 'selected' : '' }}>Gratuit</option>
                                    <option value="paid" {{ old('type') == 'paid' ? 'selected' : '' }}>Payant</option>
                                </select>
                                @error('type')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                            </div>

                            {{-- Prix (Conditional) --}}
                            <div id="priceField" style="{{ old('type', 'free') == 'paid' ? '' : 'display: none;' }}">
                                <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Prix (€) <span class="text-red-500">*</span></label>
                                <input type="number" step="0.01" min="0" name="price" id="price" value="{{ old('price') }}"
                                       class="block w-full shadow-sm sm:text-sm rounded-md border-gray-300 focus:ring-blue-500 focus:border-blue-500 @error('price') border-red-500 ring-1 ring-red-500 @enderror">
                                @error('price')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                            </div>

                            {{-- Vidéo (Optional) --}}
                            <div>
                                <label for="video_path" class="block text-sm font-medium text-gray-700 mb-1">Vidéo (Optionnel)</label>
                                <input type="file" name="video_path" id="video_path" accept="video/mp4,video/mpeg,video/quicktime"
                                       class="block w-full text-sm text-gray-500 border border-gray-300 rounded-md cursor-pointer bg-gray-50 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 @error('video_path') border-red-500 ring-1 ring-red-500 @enderror">
                                @error('video_path')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                            </div>
                        </div>

                         {{-- Column 2 --}}
                        <div class="space-y-6">
                             {{-- Description --}}
                            <div>
                                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description <span class="text-red-500">*</span></label>
                                <textarea name="description" id="description" rows="4" required
                                          class="block w-full shadow-sm sm:text-sm rounded-md border-gray-300 focus:ring-blue-500 focus:border-blue-500 @error('description') border-red-500 ring-1 ring-red-500 @enderror">{{ old('description') }}</textarea>
                                @error('description')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                            </div>

                             {{-- Catégorie --}}
                            <!-- <div>
                                <label for="category_id" class="block text-sm font-medium text-gray-700 mb-1">Catégorie <span class="text-red-500">*</span></label>
                                <select name="category_id" id="category_id" required
                                        class="block w-full shadow-sm sm:text-sm rounded-md border-gray-300 focus:ring-blue-500 focus:border-blue-500 @error('category_id') border-red-500 ring-1 ring-red-500 @enderror">
                                    <option value="">-- Choisir une catégorie --</option>
                                    @isset($categories) {{-- Check if $categories exists --}}
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    @else
                                        <option value="" disabled>Aucune catégorie trouvée</option>
                                    @endisset
                                </select>
                                @error('category_id')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                            </div> -->

                             {{-- Image (Required) --}}
                            <!-- <div>
                                <label for="image_path" class="block text-sm font-medium text-gray-700 mb-1">Image du cours <span class="text-red-500">*</span></label>
                                <input type="file" name="image_path" id="image_path" required accept="image/*"
                                       class="block w-full text-sm text-gray-500 border border-gray-300 rounded-md cursor-pointer bg-gray-50 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 @error('image_path') border-red-500 ring-1 ring-red-500 @enderror">
                                <p class="mt-1 text-xs text-gray-500">PNG, JPG, GIF jusqu'à 2Mo.</p> {{-- Helper text --}}
                                @error('image_path')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                            </div> -->

                            {{-- PDF (Optional) --}}
                            <div>
                                <label for="pdf_path" class="block text-sm font-medium text-gray-700 mb-1">PDF (Optionnel)</label>
                                <input type="file" name="pdf_path" id="pdf_path" accept=".pdf,application/pdf"
                                       class="block w-full text-sm text-gray-500 border border-gray-300 rounded-md cursor-pointer bg-gray-50 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 @error('pdf_path') border-red-500 ring-1 ring-red-500 @enderror">
                                @error('pdf_path')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                            </div>
                        </div>
                    </div>

                    {{-- Form Actions --}}
                    <div class="pt-5 border-t border-gray-200">
                        <div class="flex justify-end space-x-3">
                            <button type="button" id="cancelFormBtn" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Annuler
                            </button>
                            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                Enregistrer le cours
                            </button>
                        </div>
                    </div>
                </form>

                {{-- Script for conditional price field --}}
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        const typeSelect = document.getElementById('type');
                        const priceField = document.getElementById('priceField');
                        const priceInput = document.getElementById('price');
                        const cancelBtn = document.getElementById('cancelFormBtn');
                        const addCourseForm = document.getElementById('addCourseForm');

                        function togglePriceField() {
                            if (typeSelect.value === 'paid') {
                                priceField.style.display = 'block';
                                priceInput.required = true;
                            } else {
                                priceField.style.display = 'none';
                                priceInput.required = false;
                                priceInput.value = ''; // Clear price if switching to free
                            }
                        }
                        typeSelect.addEventListener('change', togglePriceField);
                        togglePriceField(); // Run on load

                        // Add listener for the cancel button
                        if(cancelBtn && addCourseForm) {
                            cancelBtn.addEventListener('click', function() {
                                addCourseForm.classList.add('hidden');
                                // Optionally reset the form fields here if needed
                                // addCourseForm.querySelector('form').reset();
                                // togglePriceField(); // Re-run price toggle if form reset
                            });
                        }
                    });
                </script>
            </div>

            <!-- COURSES GRID -->
            <div class="bg-transparent"> {{-- Removed card styling from the container --}}
                @if ($courses->count() > 0)
                    {{-- Adjusted grid columns for better spacing --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                        @foreach ($courses as $course)
                            <div class="bg-white border border-gray-200 rounded-xl shadow-sm hover:shadow-lg transition duration-300 ease-in-out flex flex-col overflow-hidden h-full">
                                {{-- Course Image --}}
                                <div class="aspect-w-16 aspect-h-9"> {{-- Enforce aspect ratio --}}
                                    @if($course->image_path)
                                        <img src="{{ Storage::url($course->image_path) }}" alt="Image pour {{ $course->title }}" class="w-full h-full object-cover">
                                    @else
                                        {{-- Placeholder --}}
                                        <div class="w-full h-full bg-gradient-to-br from-gray-200 to-gray-300 flex items-center justify-center">
                                             {{-- Heroicon: photo --}}
                                            <svg class="w-12 h-12 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                            </svg>
                                        </div>
                                    @endif
                                </div>

                                {{-- Card Body --}}
                                <div class="p-5 flex flex-col flex-grow">
                                    {{-- Category Badge --}}
                                    @if($course->category)
                                    <span class="inline-block px-2.5 py-0.5 text-xs font-semibold rounded-full bg-indigo-100 text-indigo-800 mb-2 self-start">
                                        {{ $course->category->name }}
                                    </span>
                                    @endif

                                    {{-- Title --}}
                                    <h2 class="text-lg font-semibold text-gray-800 mb-2 group-hover:text-blue-600 transition duration-150 ease-in-out">
                                        {{-- Make title a link to course details page (if you have one) --}}
                                        <a href="#" class="hover:underline focus:outline-none focus:ring-2 focus:ring-blue-300 rounded"> {{-- Add route later --}}
                                            {{ $course->title }}
                                        </a>
                                    </h2>

                                    {{-- Description --}}
                                    <p class="text-gray-600 text-sm mb-3 flex-grow">{{ Str::limit($course->description, 90) }}</p>

                                    {{-- Level & Type Badges --}}
                                    <div class="flex items-center space-x-2 mb-4">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 capitalize">
                                             {{-- Heroicon: academic-cap (mini) --}}
                                            <svg class="-ml-0.5 mr-1 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"> <path d="M10.362 3.09c.566-.781 1.708-.781 2.275 0l4.916 6.794a1.125 1.125 0 01-.971 1.742H3.42a1.125 1.125 0 01-.971-1.742l4.914-6.794zM10 6.38L8.06 9.117h3.88L10 6.38zM5.603 15.125a.75.75 0 01-.737-.873l.755-4.15H3.75a.75.75 0 010-1.5h12.5a.75.75 0 010 1.5h-1.875l.755 4.15a.75.75 0 01-.737.873H5.603z" /> </svg>
                                            {{ $course->level }}
                                        </span>
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $course->type == 'free' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }} capitalize">
                                             {{-- Heroicon: currency-euro (mini) / gift (mini) --}}
                                            @if($course->type == 'paid')
                                            <svg class="-ml-0.5 mr-1 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1.46-5.173a.75.75 0 01-1.06 0l-2.5-2.5a.75.75 0 010-1.06l5-5a.75.75 0 111.06 1.06L11.56 9.94l1.72 1.72a.75.75 0 11-1.06 1.06l-1.72-1.72-1.22 1.22zm-5.693-5.697a.75.75 0 011.06 0l2.5 2.5a.75.75 0 11-1.06 1.06L6.25 7.69V12.5a.75.75 0 01-1.5 0V6.75a.75.75 0 01.73-.746z" clip-rule="evenodd" /></svg>
                                            {{ number_format($course->price, 2) }} €
                                            @else
                                            <svg class="-ml-0.5 mr-1 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"> <path d="M10 1a7.5 7.5 0 00-7.5 7.5c0 2.682 1.25 4.95 3.126 6.374A10.009 10.009 0 0010 18.5a10.009 10.009 0 004.374-3.626C16.25 13.45 17.5 11.182 17.5 8.5A7.5 7.5 0 0010 1zm-2.873 9.75a.75.75 0 001.06 1.06l1.313-1.314 1.313 1.314a.75.75 0 101.06-1.06L11.06 10l1.814-1.814a.75.75 0 10-1.06-1.06L10 8.94l-1.814-1.814a.75.75 0 00-1.06 1.06L8.94 10l-1.814 1.814a.75.75 0 000 1.06z" /> </svg>
                                            Gratuit
                                            @endif
                                        </span>
                                    </div>

                                    {{-- File Links --}}
                                    <div class="space-y-1 mb-4 text-sm">
                                        @if ($course->video_path)
                                        <a href="{{ Storage::url($course->video_path) }}" target="_blank" class="flex items-center text-blue-600 hover:text-blue-800 hover:underline">
                                            {{-- Heroicon: play-circle (mini) --}}
                                            <svg class="w-4 h-4 mr-1.5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A.75.75 0 008 7.698v4.604a.75.75 0 001.555.53l3.68-2.302a.75.75 0 000-1.06l-3.68-2.302z" clip-rule="evenodd" /></svg>
                                            Voir la vidéo
                                        </a>
                                        @endif
                                        @if ($course->pdf_path)
                                        <a href="{{ Storage::url($course->pdf_path) }}" target="_blank" class="flex items-center text-blue-600 hover:text-blue-800 hover:underline">
                                            {{-- Heroicon: document-text (mini) --}}
                                            <svg class="w-4 h-4 mr-1.5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zM5.75 7.75a.75.75 0 000 1.5h8.5a.75.75 0 000-1.5h-8.5zM5.75 10.75a.75.75 0 000 1.5h8.5a.75.75 0 000-1.5h-8.5zM5.75 13.75a.75.75 0 000 1.5h8.5a.75.75 0 000-1.5h-8.5z" clip-rule="evenodd" /></svg>
                                            Voir le PDF
                                        </a>
                                        @endif
                                    </div>
                                </div>

                                {{-- Card Footer --}}
                                <div class="p-4 border-t border-gray-200 bg-gray-50 rounded-b-xl mt-auto"> {{-- Ensure footer sticks to bottom --}}
                                    <div class="flex items-center justify-between text-xs text-gray-500">
                                        <span>Créé le {{ $course->created_at->format('d/m/Y') }}</span>
                                        @if ($course->teacher)
                                            <span class="font-medium text-gray-600 truncate" title="{{ $course->teacher->first_name ?? ''}} {{ $course->teacher->last_name ?? ''}}">
                                                Par {{ $course->teacher->first_name ?? 'N/A'}}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-12 px-6 bg-white rounded-lg shadow border border-gray-200">
                         {{-- Heroicon: information-circle --}}
                         <svg class="mx-auto h-12 w-12 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                           <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                         </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">Aucun cours trouvé</h3>
                        <p class="mt-1 text-sm text-gray-500">Commencez par ajouter votre premier cours.</p>
                        <div class="mt-6">
                            <button type="button" id="emptyStateAddBtn" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                {{-- Heroicon: plus (mini) --}}
                                <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                  <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                                </svg>
                                Ajouter un cours
                            </button>
                        </div>
                    </div>
                @endif
            </div>

        </div>
    </main>

    <!-- SCRIPT FOR FORM TOGGLE -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const toggleBtn = document.getElementById("toggleFormBtn");
            const emptyStateBtn = document.getElementById("emptyStateAddBtn");
            const addCourseForm = document.getElementById("addCourseForm");

            function showForm() {
                 if (addCourseForm) {
                    addCourseForm.classList.remove("hidden");
                    // Scroll to the form smoothly (optional)
                    addCourseForm.scrollIntoView({ behavior: 'smooth', block: 'start' });
                 }
            }

            if(toggleBtn) {
                toggleBtn.addEventListener("click", showForm);
            }
            if(emptyStateBtn) {
                 emptyStateBtn.addEventListener("click", showForm);
            }

            // Logic to initially hide the form if validation failed AND user didn't just submit
            // Or keep it open if validation failed
            @if(session('success')) // Hide if success
                if (addCourseForm) addCourseForm.classList.add("hidden");
            @elseif ($errors->any()) // Show if errors
                 if (addCourseForm) addCourseForm.classList.remove("hidden");
            @endif

        });
    </script>

    {{-- SCRIPT FOR AUTO-DISMISSING ALERT --}}
    <script>
        function closeAlert(alertId) {
            const alertBox = document.getElementById(alertId);
            if (alertBox) {
                alertBox.classList.add('alert-fade-leave-to');
                setTimeout(() => {
                    if (alertBox.parentNode) {
                        alertBox.parentNode.removeChild(alertBox);
                    }
                }, 500); // Match CSS transition duration
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            const successAlert = document.getElementById('success-alert');
            if (successAlert) {
                // Auto-dismiss after 4 seconds (4000ms)
                setTimeout(() => {
                    closeAlert('success-alert');
                }, 4000);
            }
        });
    </script>

</body>
</html>