<?php

namespace App\Http\Controllers;

use App\Models\Category;       
use Illuminate\Http\Request;    
use Illuminate\Validation\Rule; 

class CategoryController extends Controller
{
    /**
     * Affiche la page principale de gestion des catégories.
     * Cette méthode est appelée par la route GET /categories (categories.index).
     * Elle récupère toutes les catégories et les passe à la vue unique.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        
        $categories = Category::orderBy('name')->get();

        
        
        return view('teacher.CreateCategory', compact('categories'));
        
    }

    /**
     * Enregistre une nouvelle catégorie soumise via le formulaire d'ajout.
     * Cette méthode est appelée par la route POST /categories (categories.store).
     *
     * @param  \Illuminate\Http\Request  $request L'objet requête contenant les données du formulaire.
     * @return \Illuminate\Http\RedirectResponse Redirige vers la page de gestion avec un message.
     */
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            
            
            'name' => 'required|string|max:255|unique:categories,name',
        ], [
            
            'name.required' => 'Le nom de la catégorie est obligatoire.',
            'name.unique'   => 'Ce nom de catégorie existe déjà.',
            'name.max'      => 'Le nom ne doit pas dépasser 255 caractères.',
        ]);

        
        Category::create($validatedData); 

        
        
        return redirect()->route('categories.index')
                         ->with('success', 'Catégorie "' . $validatedData['name'] . '" ajoutée avec succès !');
    }

    
    public function update(Request $request, Category $category)
    {
        
        $validatedData = $request->validate([
            
            
            
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('categories', 'name')->ignore($category->id),
            ],
        ], [
            
            'name.required' => 'Le nom de la catégorie est obligatoire.',
            'name.unique'   => 'Ce nom de catégorie existe déjà.',
            'name.max'      => 'Le nom ne doit pas dépasser 255 caractères.',
        ]);

        
        $category->update($validatedData);

        
        
        return redirect()->route('categories.index')
                         ->with('success', 'Catégorie mise à jour avec succès !');
    }

    
    public function destroy(Category $category)
    {
        
        $categoryName = $category->name;

        
        
        
        
        $category->delete();

        
        
        return redirect()->route('categories.index')
                         ->with('success', 'Catégorie "' . $categoryName . '" supprimée avec succès !');
    }



}