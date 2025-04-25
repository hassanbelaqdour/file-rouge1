<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{
    public function courses()
    {
        $courses = Course::where('teacher_id', auth()->id())->latest()->get();
        return view('teacher.Courses', compact('courses'));
    }

    public function storeCourse(Request $request)
{
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'level' => 'required|in:beginner,intermediate,advanced',
        'type' => 'required|in:free,paid',
        'price' => 'required_if:type,paid|nullable|numeric|min:0',
        'video_path' => 'nullable|file|mimetypes:video/mp4,video/mpeg,video/quicktime,video/avi,video/x-ms-wmv|max:204800',
        'pdf_path' => 'nullable|file|mimes:pdf|max:20480',
    ]);


    if ($request->hasFile('video_path')) {
        $validatedData['video_path'] = $request->file('video_path')->store('videos', 'public');
        if (!$validatedData['video_path']) {
             return back()->withErrors(['video_path' => 'Server failed to store the video file.'])->withInput();
        }
    } else {
         $validatedData['video_path'] = null;
    }

    if ($request->hasFile('pdf_path')) {
        $validatedData['pdf_path'] = $request->file('pdf_path')->store('pdf', 'public');
         if (!$validatedData['pdf_path']) {
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
}