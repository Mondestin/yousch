<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'avatar','student_code','student_name',
        'student_surname','student_dob','student_pob',
        'student_adress','student_phone','student_email'
    ];
}
