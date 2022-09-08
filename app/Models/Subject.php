<?php

namespace App\Models;

use App\Models\Unit;
use App\Models\Classe;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subject extends Model
{
    use HasFactory;

    protected $table = 'subjects';

    protected $fillable = [
        'subject_name',
        'subject_code',
        'semester',
        'class_id',
        'unit_id',
        'credits'
    ];

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
    public function class()
    {
        return $this->belongsTo(Classe::class);
    }
    public function note()
    {
        return $this->hasOne(Note::class);
    }
}
