<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assiduite extends Model
{
    use HasFactory;

    protected $table = 'Assiduites';

    // protected $cast = ['justificatif' => 'array'];

    protected $fillable = [
        'justificatif',
        'date',
        'time',
    ];
}
