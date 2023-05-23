<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'mobile',
        'address',
        'image',
        'position',
        'stage_id',
        'student_unit'

    ];
    protected static function booted () {
        static::deleting(function(Student $student) { // before delete() method call this
             $student->comments()->delete();
             $student->subjects()->delete();

             // do the rest of the cleanup...
        });
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function stage()
    {
        return $this->belongsTo(Stage::class, 'stage_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function subjects()
    {
        return $this->hasMany(Student_subject::class);
    }

}
