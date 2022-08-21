<?php

namespace App\Models;

use App\Models\Unit;
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
        'unit_id',
    ];

    // une matière ne peut appartenir qu'à une seule unité d'enseignement ( relation oneToMany inversé)

    /**
     * Get the unit that owns the subject.
     */
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
    
    /**
     * Get the unit that owns the subject.
     */
    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }
}
