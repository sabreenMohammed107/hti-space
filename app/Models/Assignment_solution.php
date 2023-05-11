<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment_solution extends Model
{
    use HasFactory;
    protected $fillable = [
        'assignment_id',
    'solution_date',
    'student_id',
    'attach_image',
    'description',
    'degree_pct',

    ];

    public function assignment()
    {
        return $this->belongsTo(Subject_assignment::class, 'assignment_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
