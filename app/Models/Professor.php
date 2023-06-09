<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'mobile',
        'address',
        'image',
        'position',

    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    /**
     * The subjects that belong to the professor.
     */
    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'professor_subjects');
    }
}
