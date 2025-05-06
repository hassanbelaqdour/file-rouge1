<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;

class Course extends Model
{
    use HasFactory;

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
        'category_id',
        'teacher_id',
    ];

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function enrollments(): HasMany
    {
        return $this->hasMany(Enrollment::class);
    }

    public function likingUsers()
{
    return $this->belongsToMany(User::class, 'likes', 'course_id', 'user_id');
}


    public function likes(): HasMany
    {
        return $this->hasMany(Like::class);
    }


    public function isLikedByCurrentUser(): bool
    {
        if (!Auth::check()) {
            return false;
        }
        return $this->likingUsers()->where('user_id', Auth::id())->exists();
    }
}