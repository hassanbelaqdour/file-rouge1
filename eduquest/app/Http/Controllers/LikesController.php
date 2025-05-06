<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikesController extends Controller
{
    /**
     * Ajoute ou retire un like pour un cours donné par l'utilisateur connecté.
     */
    public function toggleLike($courseId)  // Modifié pour accepter l'ID directement
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }

        // Récupération sécurisée du cours
        $course = Course::findOrFail($courseId);

        $likeExists = $user->likedCourses()->where('course_id', $course->id)->exists();

        if ($likeExists) {
            $user->likedCourses()->detach($course->id);
            $message = 'Cours retiré de vos favoris.';
        } else {
            $user->likedCourses()->attach($course->id);
            $message = 'Cours ajouté à vos favoris !';
        }

        return back()->with('status', $message);
    }

    /**
     * Affiche la page des cours favoris.
     */
    public function showFavorites()
{
    
    $user = Auth::user();
    
    
    $likedCourses = $user->likedCourses;

    return view('student.MesFavorites', ['courses' => $likedCourses ]);
}
}