<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Predmet;
use App\Models\Student;

class Domaci extends Model
{
    use HasFactory;

    protected $fillable = [
        'opis',
        'datum',
        'predmet_id',
        'student_id'
    ];

    public function predmet()
    {
        return $this->belongsTo(Predmet::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
