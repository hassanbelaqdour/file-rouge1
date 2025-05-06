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

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'role',
        'account_status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Relationship with courses taught by this user (as teacher).
     */
    public function courses(): HasMany
    {
        return $this->hasMany(Course::class, 'teacher_id');
    }

    /**
     * Relationship with courses enrolled in (as student).
     */
    public function enrolledCourses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class, 'enrollments')
            ->withPivot('status', 'completed_at') // If you track these in enrollments
            ->withTimestamps();
    }

    /**
     * Relationship with liked courses (many-to-many through likes table).
     */
    // In App\Models\User.php
// In App\Models\User.php
public function likedCourses(): BelongsToMany
{
    return $this->belongsToMany(Course::class, 'likes', 'user_id', 'course_id')
        ->withTimestamps();
}
    /**
     * Relationship with like records.
     */
    public function likes(): HasMany
    {
        return $this->hasMany(Like::class);
    }

    /**
     * Check if user is a teacher.
     */
    public function isTeacher(): bool
    {
        return $this->role === 'teacher'; // Adjust according to your role system
    }

    /**
     * Check if user is a student.
     */
    public function isStudent(): bool
    {
        return $this->role === 'student'; // Adjust according to your role system
    }
}