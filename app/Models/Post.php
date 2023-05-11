<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
    'title',
    'text',
    'subject_id',
    'post_date',
    'post_type_id',
       'professor_id'

    ];


    public function professor()
    {
        return $this->belongsTo(Professor::class, 'professor_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function type()
    {
        return $this->belongsTo(Post_type::class, 'post_type_id');
    }

      public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
