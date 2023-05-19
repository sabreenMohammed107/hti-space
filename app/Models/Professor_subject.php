<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor_subject extends Model
{
    use HasFactory;
    protected $fillable = [
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
