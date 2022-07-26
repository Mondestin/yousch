<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Staff extends Model
{
    use HasFactory;

    protected $table = 'Staffs';

    protected $fillable = [
        'staff_name',
        'staff_surname',
        'staff_phone',
        'staff_email',
        'staff_avatar',
        'staff_adress',
        'staff_code',
        'user_id',
    ];

    /**
     * Get the user associated with the staff.
     */

    public function user()
    {
        return $this->hasOne(User::class)->withDefault(['name' => 'Aucun']);
    }
}
