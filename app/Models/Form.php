<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Form extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'uuid',
        'max_submissions',
        'date_options',
    ];

    // Automatically generate a UUID when creating the form
    protected static function booted()
    {
        static::creating(function ($form) {
            $form->uuid = Str::uuid();
        });
    }

    // Relationship: Form belongs to a User (teacher)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship: Form has many student submissions
    public function submissions()
    {
        return $this->hasMany(StudentSubmission::class);
    }
    protected $casts = [
    'date_options' => 'array',
];
}
