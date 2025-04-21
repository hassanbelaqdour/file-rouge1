<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Afficher les utilisateurs
    public function showPendingUsers()
    {
        $users = User::all();
        return view('admin.Users', compact('users'));
    }
}
