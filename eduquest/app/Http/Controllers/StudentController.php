<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Category;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class StudentController extends Controller
{
    /**
     * Affiche la liste de TOUS les cours disponibles (catalogue),
     * potentiellement filtrée par catégorie et/ou prix.
     *
     * @param  \Illuminate\Http\Request  $request L'objet requête entrant
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
{
    $categories = Category::orderBy('name')->get();
    $selectedCategoryId = $request->query('category');
    $selectedPriceFilter = $request->query('price_filter'); 

    $query = Course::with(['category', 'teacher', 'enrollments'])
                   ->latest();

    
    if ($selectedCategoryId && is_numeric($selectedCategoryId) && $selectedCategoryId > 0) {
        $query->where('category_id', $selectedCategoryId);
    }

    
    if ($selectedPriceFilter === 'free') {
        $query->where(function ($q) {
            $q->where('type', 'free')
              ->orWhere(function ($subQ) {
                  $subQ->where('type', 'paid')
                       ->where('price', '<=', 0);
              });
        });
    } elseif ($selectedPriceFilter === 'paid') {
        $query->where('type', 'paid')->where('price', '>', 0);
    }

    
    $query->where('status', 'accepted');

    $courses = $query->paginate(9)->appends($request->query());

    return view('student.AllCourses', compact(
        'courses',
        'categories',
        'selectedCategoryId',
        'selectedPriceFilter' 
    ));
}

public function showCourse(Course $course)
{
    $course->load(['category', 'teacher']);

    // Vérifier si l'utilisateur a accès au cours
    $hasAccess = false;

    if (Auth::check()) {
        // Cours gratuit = accès direct
        if ($course->type == 'free' || $course->price <= 0) {
            $hasAccess = true;
        } else {
            // Vérifier si l'utilisateur a payé
            $hasAccess = Enrollment::where('user_id', Auth::id())
                ->where('course_id', $course->id)
                ->where('status', 'completed')
                ->exists();
        }
    }

    return view('student.Course', compact('course', 'hasAccess'));
}

}