<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasFactory, Notifiable;


    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'role',
        'account_status',
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    public function courses(): HasMany
    {
        return $this->hasMany(Course::class, 'teacher_id');
    }


    public function enrolledCourses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class, 'enrollments')
            ->withPivot('status', 'completed_at') 
            ->withTimestamps();
    }



    public function likedCourses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class, 'likes', 'user_id', 'course_id')
            ->withTimestamps();
    }

    public function likes(): HasMany
    {
        return $this->hasMany(Like::class);
    }


    public function isTeacher(): bool
    {
        return $this->role === 'teacher'; 
    }


    public function isStudent(): bool
    {
        return $this->role === 'student'; 
    }
}