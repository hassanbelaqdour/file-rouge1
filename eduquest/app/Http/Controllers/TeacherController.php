<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Category; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage; 

class TeacherController extends Controller
{
    /**
     * Affiche la liste des cours et les catégories pour le formulaire.
     */
    public function courses()
    {
        $courses = Course::where('teacher_id', auth()->id())
                         ->with('category') 
                         ->latest()
                         ->get();

        
        $categories = Category::orderBy('name')->get();

        return view('teacher.Courses', compact('courses', 'categories'));
    }

    /**
     * Stocke un nouveau cours soumis via le formulaire.
     */
    public function storeCourse(Request $request)
    {
        
        
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'level' => 'required|in:beginner,intermediate,advanced',
            'type' => 'required|in:free,paid',
            'price' => 'required_if:type,paid|nullable|numeric|min:0',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
            'category_id' => 'required|exists:categories,id',                   
            'video_path' => 'nullable|file|mimetypes:video/mp4,video/mpeg,video/quicktime,video/avi,video/x-ms-wmv|max:204800',
            'pdf_path' => 'nullable|file|mimes:pdf|max:20480',
        ]);

        
        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('course_images', 'public');
            if (!$imagePath) {
                return back()->withErrors(['image_path' => 'Server failed to store the image file.'])->withInput();
            }
            $validatedData['image_path'] = $imagePath; 
        } else {
             
             
             
             
             
             
        }


        
        if ($request->hasFile('video_path')) {
            $validatedData['video_path'] = $request->file('video_path')->store('videos', 'public');
            if (!$validatedData['video_path']) {
                 if(isset($validatedData['image_path'])) Storage::disk('public')->delete($validatedData['image_path']);
                 return back()->withErrors(['video_path' => 'Server failed to store the video file.'])->withInput();
            }
        } else {
             $validatedData['video_path'] = null;
        }

        if ($request->hasFile('pdf_path')) {
            $validatedData['pdf_path'] = $request->file('pdf_path')->store('pdf', 'public');
             if (!$validatedData['pdf_path']) {
                if(isset($validatedData['image_path'])) Storage::disk('public')->delete($validatedData['image_path']);
                if(isset($validatedData['video_path'])) Storage::disk('public')->delete($validatedData['video_path']);
                return back()->withErrors(['pdf_path' => 'Server failed to store the PDF file.'])->withInput();
            }
        } else {
            $validatedData['pdf_path'] = null;
        }

        
        $validatedData['price'] = $validatedData['type'] === 'paid' ? $validatedData['price'] : null;
        $validatedData['teacher_id'] = Auth::id();

        
        
        Course::create($validatedData);

        
        return redirect()->route('teacher.courses')->with('success', 'Cours ajouté avec succès.');
    }

    public function edit(Course $course)
    {
        
        if (Auth::id() !== $course->teacher_id) {
            abort(403, 'Accès non autorisé.'); 
        }

        
        $categories = Category::orderBy('name')->get();

        
        return view('teacher.EditCourse', compact('course', 'categories'));
    }

    public function destroy(Course $course)
    {
        
        if (Auth::id() !== $course->teacher_id) {
            abort(403, 'Accès non autorisé.');
        }

        
        if ($course->image_path) {
            Storage::disk('public')->delete($course->image_path);
        }
        if ($course->video_path) {
            Storage::disk('public')->delete($course->video_path);
        }
        if ($course->pdf_path) {
            Storage::disk('public')->delete($course->pdf_path);
        }

        
        
        
        $course->delete();

        
        return redirect()->route('teacher.courses')->with('success', 'Cours supprimé avec succès.');
    }
    public function statistics() // Ou renommez en 'statistiques' si utilisé dans vos routes
    {
        // Récupère l'ID de l'enseignant connecté
        $teacherId = Auth::id();

        // 1. Nombre total de cours créés par cet enseignant
        $totalCourses = Course::where('teacher_id', $teacherId)->count();

        // 2. Nombre total d'étudiants inscrits aux cours de cet enseignant
        //    Cela nécessite une relation Many-to-Many entre Course et User (étudiants)
        //    Supposons une table pivot nommée 'course_user' avec les colonnes 'course_id' et 'user_id'.
        //    Nous comptons les étudiants uniques inscrits à AU MOINS UN cours de cet enseignant.

        // D'abord, obtenir les IDs des cours de cet enseignant
        $teacherCourseIds = Course::where('teacher_id', $teacherId)->pluck('id');

        // Ensuite, compter les étudiants distincts inscrits à ces cours via la table pivot
        // Assurez-vous que le nom de la table pivot ('course_user') est correct.
        // $totalEnrolledStudents = DB::table('course_user')
        //                             ->whereIn('course_id', $teacherCourseIds)
        //                             ->distinct('user_id') // Compter chaque étudiant une seule fois
        //                             ->count('user_id');

        // Vous pourriez aussi vouloir des statistiques plus détaillées par cours,
        // mais pour l'instant, tenons-nous aux totaux demandés.

        // Passe les données à la vue
        return view('teacher.StatistiqueTeacher', compact(
            'totalCourses',
            // 'totalEnrolledStudents'
        ));
    }

    // ... (si vous avez une méthode 'statistiques', assurez-vous qu'elle fait la même chose ou appelez celle-ci)
     public function statistiques() // Gardé pour correspondre à votre route existante
     {
        return $this->statistics(); // Appelle la méthode principale
     }
    
    

}