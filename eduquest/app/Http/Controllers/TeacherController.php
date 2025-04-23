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
        ]);

        Course::create([
            'title' => $request->title,
            'description' => $request->description,
            'level' => $request->level,
            'teacher_id' => auth()->id(),
        ]);

        return redirect()->route('teacher.courses')->with('success', 'Cours ajouté avec succès.');
    }

}
