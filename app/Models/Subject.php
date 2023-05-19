<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
    'name',
    'description',
    'image',
    'subject_unit'
    ];
    public function professors()
    {
        return $this->belongsToMany(Professor::class, 'professor_subjects');
    }
    public function materials()
    {
        return $this->hasMany(Subject_material::class);
    }
    public function assignments()
    {
        return $this->hasMany(Subject_assignment::class);
    }
}
