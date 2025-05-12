<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentSubmission extends Model
{
    use HasFactory;

    protected $fillable = [
        'form_id',
        'student_name',
        'phone',
        'date',
        'class',
    ];

    // Relationship: Each submission belongs to a form
    public function form()
    {
        return $this->belongsTo(Form::class);
    }
}
