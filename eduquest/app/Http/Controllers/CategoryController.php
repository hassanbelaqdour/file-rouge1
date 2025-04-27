<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request; 

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('name')->get();
        // Retourne LA SEULE vue pour les catégories
        return view('teacher.CreateCategory', compact('categories'));
    }

    public function create()
    {
        
        return view('teacher.CreateCategory');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
        ]);

        Category::create($validatedData);

        // Redirige vers la page de gestion (index) avec un message de succès
        return redirect()->route('categories.index')
                         ->with('success', 'Catégorie "' . $validatedData['name'] . '" ajoutée avec succès !');
    }

    public function show(Category $category)
    {
        abort(404);
    }


    public function edit(Category $category)
    {

         abort(404);
    }

    public function update(Request $request, Category $category)
    {
        
         abort(404);
    }


    public function destroy(Category $category)
    {   
         abort(404);
    }
}