<?php

namespace App\Models;

use App\Models\Unit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;

    protected $table = 'courses';

    protected $fillable = [
        'course_name',
        'course_code',
    ];

    public function unit()
    {
        return $this->hasMany(Unit::class);
    }
    public function student()
    {
        return $this->hasMany(Student::class);
    }
}
