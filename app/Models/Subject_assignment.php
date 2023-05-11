<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject_assignment extends Model
{

    use HasFactory;

    protected $fillable = [
        'title',
        'assignment',
        'image',
        'file_attach',
        'assignment_date',
        'deadline_date',
        'professor_id',
        'subject_id',

    ];


    public function professor()
    {
        return $this->belongsTo(Professor::class, 'professor_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }
}
