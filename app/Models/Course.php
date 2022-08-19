<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = 'Courses';

    protected $fillable = [
        'course_name',
        'course_code',
    ];

    // un cours ne peut appartenir qu'à une seule unité d'enseignement
}
