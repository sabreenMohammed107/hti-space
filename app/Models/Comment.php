<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'comment_date',
        'student_id',
        'comment',
        'post_id',

    ];


    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }
}
