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
        'user_id',      // L'ID de l'étudiant qui pose la question
        'teacher_id',   // L'ID de l'enseignant destinataire (ou null si pour admin)
        'subject',      // Le sujet de la question
        'question',     // Le contenu de la question
        // Les champs 'answer', 'answered_at', 'answered_by' et 'status'
        // seront généralement remplis lors de la réponse, pas à la création initiale.
        // 'status' aura une valeur par défaut définie dans la migration.
    ];

    /**
     * Les attributs qui doivent être convertis en types natifs.
     */
    protected $casts = [
        'answered_at' => 'datetime', // Convertit la date de réponse en objet Carbon
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