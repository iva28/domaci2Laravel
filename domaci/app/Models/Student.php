<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Domaci;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'ime',
        'prezime',
        'indeks'
    ];

    public function domaci()
    {
        return $this->hasMany(Domaci::class);
    }
}
