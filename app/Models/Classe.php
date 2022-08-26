<?php

namespace App\Models;

use App\Models\Subject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Classe extends Model
{
    use HasFactory;

    protected $table = 'Classes';

    protected $fillable = [
        'class_name',
        'class_code',
    ];
    
    public function subject()
    {
        return $this->hasOne(Subject::class);
    }
    
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
