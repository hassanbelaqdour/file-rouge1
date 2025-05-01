<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Category; 
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth;


class StudentController extends Controller
{
    /**
     * Affiche la liste de TOUS les cours disponibles (catalogue),
     * potentiellement filtrée par catégorie.
     *
     * @param  \Illuminate\Http\Request  $request L'objet requête entrant
     * @return \Illuminate\View\View
     */
    public function index(Request $request) 
    {
        
        $categories = Category::orderBy('name')->get();

        
        $selectedCategoryId = $request->query('category'); 

        
        $query = Course::with(['category', 'teacher']) 
                       ->latest();                     

        
        if ($selectedCategoryId && is_numeric($selectedCategoryId) && $selectedCategoryId > 0) {
            $query->where('category_id', $selectedCategoryId);
        }

        
        
        $courses = $query->paginate(9)->appends($request->query());

        
        return view('student.AllCourses', compact(
            'courses',
            'categories',           
            'selectedCategoryId'    
        ));
    }

    
}