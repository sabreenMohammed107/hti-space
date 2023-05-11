<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student_subject extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'subject_id',
        'grade_pct',

    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }
}
