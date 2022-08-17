<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $table = 'Subjects';

    protected $fillable = [
        'subject_name',
        'subject_code',
        'semester',
        'class_id',
    ];
}
