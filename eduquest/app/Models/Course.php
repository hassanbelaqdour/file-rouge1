<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'level',
        'teacher_id',
    ];

    // Relation : un cours appartient à un enseignant (user)
    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }
}
