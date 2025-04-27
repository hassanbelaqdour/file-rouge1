<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request; 

class CategoryController extends Controller
{
    public function index()
    {
        // Récupère toutes les catégories, triées par nom
        $categories = Category::orderBy('name')->get();

        // Retourne la vue unique qui gère tout
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


        return redirect()->route('categories.create')->with('success', 'Catégorie ajoutée avec succès !');
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