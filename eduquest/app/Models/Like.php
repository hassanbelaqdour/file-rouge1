<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Like extends Model
{
    use HasFactory;

    /**
     * Les attributs qui peuvent être assignés en masse.
     * Attention : Normalement géré via les relations BelongsToMany.
     * Mettre ici si vous créez des 'Like' manuellement via Like::create().
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'course_id',
    ];

    /**
     * La table associée au modèle.
     * Laravel devrait le deviner, mais on peut le spécifier pour être sûr.
     *
     * @var string
     */
    protected $table = 'likes';

    /**
     * Récupère l'utilisateur qui a donné le like.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Récupère le cours qui a reçu le like.
     */
    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }
}