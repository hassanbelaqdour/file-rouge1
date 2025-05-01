<?php

namespace App\Http\Controllers;

use App\Models\Course;     
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Auth;



class StudentController extends Controller
{
    /**
     * Affiche la liste de TOUS les cours disponibles (catalogue).
     * Version simplifiée sans logique d'inscription dans le contrôleur.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $courses = Course::with(['category', 'teacher'])
                         ->latest()                     
                         ->paginate(9);                 

        return view('student.AllCourses', compact('courses'));
    }

}