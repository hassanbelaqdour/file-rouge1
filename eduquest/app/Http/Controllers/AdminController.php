<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request;



class AdminController extends Controller
{

    public function showUsers(Request $request)
    {
        
        $selectedRole = $request->query('role');
        $selectedStatus = $request->query('status');
        $searchTerm = $request->query('search'); 

        
        $query = User::orderBy('created_at', 'desc');

        
        if ($searchTerm) {
            $query->where(function ($q) use ($searchTerm) {
                $q->where('first_name', 'like', '%' . $searchTerm . '%')
                  ->orWhere('last_name', 'like', '%' . $searchTerm . '%')
                  ->orWhere('email', 'like', '%' . $searchTerm . '%');
            });
        }

        
        if ($selectedRole && in_array($selectedRole, ['student', 'teacher', 'admin'])) {
            $query->where('role', $selectedRole);
        }

        
        
        if ($selectedStatus && in_array($selectedStatus, ['pending', 'approved', 'suspended'])) {
             
             
             

             
             $query->where('account_status', $selectedStatus);
        }

        
        $users = $query->paginate(12)->appends($request->query()); 

        
        
        return view('admin.Users', compact('users', 'selectedRole', 'selectedStatus', /* 'searchTerm' */));
    }

    public function approveUser($id)
    {
        $user = User::findOrFail($id);
        $user->account_status = 'approved';
        $user->save();
        return redirect()->back()->with('success', 'Utilisateur approuvé.');
    }

    public function rejectUser($id) 
    {
        $user = User::findOrFail($id);
        
        
        
        
        $user->account_status = 'pending'; 
        $user->save();
        return redirect()->back()->with('success', 'Statut utilisateur mis à jour.'); 
    }

    public function deleteUser($id)
    {
         $user = User::findOrFail($id);
         
         $user->delete();
         return redirect()->back()->with('success', 'Utilisateur supprimé.');
    }

    public function statistiquesAdmin()
    {
        
        $totalUsers = User::count();
        $pendingUsers = User::where('account_status', 'pending')->count();
        $approvedUsers = User::where('account_status', 'approved')->count();
        
        $totalCourses = Course::count();
        $acceptedCourses = Course::where('status', 'accepted')->count();
        $rejectedCourses = Course::where('status', 'rejected')->count();
        $pendingCourses = Course::where('status', 'pending')->count(); 

        
        return view('admin.StatistiqueAdmin', compact(
            'totalUsers',
            'pendingUsers',
            'approvedUsers',
            

            'totalCourses',
            'acceptedCourses',
            'rejectedCourses',
            'pendingCourses'
        ));
    }

    
    public function gestionCourses()
    {
        
        
        $courses = Course::with(['teacher', 'category'])
                         ->orderBy('created_at', 'desc')
                         ->paginate(12); 

        return view('admin.GestionCourses', compact('courses'));
    }
    

    public function acceptCourse($id)
    {
        $course = Course::findOrFail($id);
        $course->status = 'accepted';
        $course->save();
        return redirect()->back()->with('success', 'Cours accepté.');
    }

    public function rejectCourse($id)
    {
        $course = Course::findOrFail($id);
        
        $course->status = 'rejected'; 
        $course->save();
        return redirect()->back()->with('success', 'Statut du cours mis à jour.');
    }

}