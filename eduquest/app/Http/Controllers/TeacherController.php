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


}
