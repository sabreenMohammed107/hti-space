<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject_material extends Model
{
    use HasFactory;
    protected $fillable = [
        'file_path',
        'professor_id',
        'upload_date',
        'file_type_id',
        'description',
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
