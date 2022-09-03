<?php

namespace App\Models;

use App\Models\Campus;
use App\Models\Classe;
use App\Models\Assiduite;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        'class_id',
    ];

    /**
     * Get the campus that owns the student.
     */
    public function campus()
    {
        return $this->belongsTo(Campus::class);
    }
    /**
     * Get the campus that owns the student.
     */
    public function class()
    {
        return $this->belongsTo(Classe::class);
    }


    public function assiduite()
    {
        return $this->belongsToMany(Assiduite::class);
    }
}
