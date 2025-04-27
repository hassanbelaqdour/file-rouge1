<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Category; // <-- N'oubliez pas d'importer Category
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage; // <-- N'oubliez pas d'importer Storage

class TeacherController extends Controller
{
    /**
     * Affiche la liste des cours et les catégories pour le formulaire.
     */
    public function courses()
    {
        $courses = Course::where('teacher_id', auth()->id())
                         ->with('category') // Eager load
                         ->latest()
                         ->get();

        // Récupérer les catégories pour le formulaire
        $categories = Category::orderBy('name')->get();

        return view('teacher.Courses', compact('courses', 'categories'));
    }

    /**
     * Stocke un nouveau cours soumis via le formulaire.
     */
    public function storeCourse(Request $request)
    {
        // --- **CORRIGÉ**: Validation incluant TOUS les champs requis ---
        // Adaptez 'nullable|image' ou 'required|image' selon votre migration pour image_path
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'level' => 'required|in:beginner,intermediate,advanced',
            'type' => 'required|in:free,paid',
            'price' => 'required_if:type,paid|nullable|numeric|min:0',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validation image (ajuster si requis)
            'category_id' => 'required|exists:categories,id',                   // Validation catégorie (requise)
            'video_path' => 'nullable|file|mimetypes:video/mp4,video/mpeg,video/quicktime,video/avi,video/x-ms-wmv|max:204800',
            'pdf_path' => 'nullable|file|mimes:pdf|max:20480',
        ]);

        // --- **CORRIGÉ**: Gérer le stockage de l'image si elle est présente ---
        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('course_images', 'public');
            if (!$imagePath) {
                return back()->withErrors(['image_path' => 'Server failed to store the image file.'])->withInput();
            }
            $validatedData['image_path'] = $imagePath; // Ajoute le chemin si succès
        } else {
             // Si image_path est nullable dans la DB mais requis dans le form, cette partie est moins pertinente
             // Si image_path est nullable dans la DB ET dans le form, il faut mettre null explicitement.
             // Si image_path est requis dans la DB, la validation 'required|image' l'assure déjà.
             // Assurez-vous que la migration et la validation correspondent.
             // Si nullable dans la migration:
             // $validatedData['image_path'] = null;
        }


        // --- Gérer les fichiers vidéo et PDF optionnels ---
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

        // --- Préparer les données finales ---
        $validatedData['price'] = $validatedData['type'] === 'paid' ? $validatedData['price'] : null;
        $validatedData['teacher_id'] = Auth::id();

        // --- Créer le cours ---
        // $validatedData contient maintenant 'category_id' (validé) et 'image_path' (si uploadé et stocké)
        Course::create($validatedData);

        // --- Rediriger ---
        return redirect()->route('teacher.courses')->with('success', 'Cours ajouté avec succès.');
    }
}