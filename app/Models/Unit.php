<?php

namespace App\Models;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $fillable = [
        'unit_name',
        'unit_code',
        'course_id',
    ];

    // une unité d'enseignement peut avoir une multitude de cours

    /**
     * Get the courses for the units.
     */

    public function course()
    {
        return $this->hasMany(Course::class);
    }
}
