<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Staff;

class Campus extends Model
{
    use HasFactory;

    protected $table = 'Campus';

    protected $fillable = [
        'campus_name',
        'campus_location',
        'campus_phone',
        'campus_email',
        'staff_id',
    ];

    /**
     * Get the staff that owns the campus.
     */
    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }
}
