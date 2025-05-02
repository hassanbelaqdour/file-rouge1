<?php

namespace App\Models; // Vérifiez ce namespace

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // Assurez-vous d'importer BelongsTo

class Course extends Model
{
    use HasFactory;

    /**
     * Les attributs qui sont assignables en masse.
     */
    protected $fillable = [
        'title',
        'description',
        'level',
        'type',
        'status',
        'price',
        'image_path',
        'video_path',
        'pdf_path',
        'category_id', // Doit être ici
        'teacher_id',
    ];

    /**
     * Relation avec l'enseignant (User).
     */
    public function teacher(): BelongsTo
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    /**
     * Relation avec la catégorie.
     * ASSUREZ-VOUS QUE CETTE MÉTHODE EXISTE EXACTEMENT COMME CECI.
     */
    public function category(): BelongsTo
    {
        // 'Category::class' doit pointer vers votre modèle Category.
        // Vérifiez que le modèle Category existe bien dans App\Models\Category.
        return $this->belongsTo(Category::class);
    }
}