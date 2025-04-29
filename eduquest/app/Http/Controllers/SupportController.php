<?php

namespace App\Http\Controllers;

use App\Models\Support; 
use App\Models\User;    
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 

class SupportController extends Controller
{
    /**
     * Affiche le formulaire pour poser une question (côté étudiant).
     * Correspond à la route 'support.create'.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        
        if (Auth::user()->role !== 'student') {
             abort(403, 'Seuls les étudiants peuvent poser des questions.');
        }

        
        $teachers = User::where('role', 'teacher')
                        ->orderBy('first_name') 
                        ->orderBy('last_name')
                        ->get(['id', 'first_name', 'last_name', 'name']); 

        
        return view('student.Support', compact('teachers'));
    }

    /**
     * Enregistre une nouvelle question de support venant d'un étudiant.
     * Correspond à la route 'support.store'.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
         
         if (Auth::user()->role !== 'student') {
             abort(403, 'Action non autorisée.');
        }

        
        
        $validatedData = $request->validate([
            'teacher_id' => 'nullable|exists:users,id',
            'subject' => 'required|string|max:255',
            'question' => 'required|string|min:10',
        ]);
        

        
        $supportData = [
            'user_id' => Auth::id(), 
            'teacher_id' => $validatedData['teacher_id'] ?? null, 
            'subject' => $validatedData['subject'],
            'question' => $validatedData['question'],
            
        ];

        
        Support::create($supportData);

        
        return redirect()->route('support.create') 
                         ->with('success', 'Votre question a été envoyée avec succès ! Nous vous répondrons bientôt.');
    }

    
    
}