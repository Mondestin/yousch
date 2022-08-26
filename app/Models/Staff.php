<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Campus;

class Staff extends Model
{
    use HasFactory;

    protected $table = 'staffs';

    protected $fillable = [
        'avatar',
        'staff_code',
        'staff_name',
        'staff_surname',
        'staff_dob',
        'staff_pob',
        'staff_adress',
        'staff_phone',
        'staff_email',
        'staff_ville',
        'staff_postal',
        'staff_sexe',
        'staff_country'
    ];

}
