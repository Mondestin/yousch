<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Campus;

class Staff extends Model
{
    use HasFactory;

    protected $table = 'Staffs';

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

    /**
     * Get the user associated with the staff.
     */

    // public function user()
    // {
    //     return $this->hasOne(User::class);
    // }
}
