<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'avatar',
        'student_code',
        'student_name',
        'student_surname',
        'student_dob',
        'student_pob',
        'student_adress',
        'student_phone',
        'student_email',
        'student_ville',
        'student_postal',
        'student_sexe',
        'student_country',
        'campus_id',
    ];

    /**
     * Get the campus that owns the student.
     */
    public function campus()
    {
        return $this->belongsTo(Campus::class);
    }
}
