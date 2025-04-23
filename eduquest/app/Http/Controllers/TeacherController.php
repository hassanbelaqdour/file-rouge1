<?php

namespace App\Http\Controllers;

use App\Model\User;
use App\Models\Course;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function courses()
    {
        $courses = Course::where('teacher_id', auth()->id())->get();
        return view('teacher.Courses', compact('courses'));
    }

    public function storeCourse(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'level' => 'required|in:beginner,intermediate,advanced',
        'type' => 'required|in:free,paid',
        'price' => 'nullable|numeric',
        'video_path' => 'nullable|file|mimes:mp4,mov,avi',
        'pdf_path' => 'nullable|file|mimes:pdf',
    ]);

    // Stockage des fichiers
    $videoPath = $request->hasFile('video_path') ? $request->file('video_path')->store('videos', 'public') : null;
    $pdfPath = $request->hasFile('pdf_path') ? $request->file('pdf_path')->store('pdfs', 'public') : null;

    Course::create([
        'title' => $request->title,
        'description' => $request->description,
        'level' => $request->level,
        'type' => $request->type,
        'price' => $request->type === 'paid' ? $request->price : null,
        'video_path' => $videoPath,
        'pdf_path' => $pdfPath,
        'teacher_id' => auth()->id(),
    ]);

    return redirect()->route('teacher.courses')->with('success', 'Cours ajouté avec succès.');
}


}
