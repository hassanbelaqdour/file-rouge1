<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Support extends Model
{
    use HasFactory;

    /**
     * Les attributs qui peuvent être assignés en masse.
     */
    protected $fillable = [
        'user_id',      
        'teacher_id',   
        'subject',      
        'question',     
        
        
        
    ];

    /**
     * Les attributs qui doivent être convertis en types natifs.
     */
    protected $casts = [
        'answered_at' => 'datetime', 
    ];

    /**
     * Relation: Le ticket appartient à un étudiant (User).
     */
    public function student(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Relation: Le ticket est destiné à un enseignant (User) (optionnel).
     */
    public function teacher(): BelongsTo
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    /**
     * Relation: Le ticket a été répondu par un utilisateur (enseignant/admin) (optionnel).
     */
    public function responder(): BelongsTo
    {
        return $this->belongsTo(User::class, 'answered_by');
    }
}