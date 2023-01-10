<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Domaci;

class Predmet extends Model
{
    use HasFactory;
    protected $fillable = [
        'naziv',
        'opis',
        'ESPB',
        'sef_katedre'
    ];

    public function domaci()
    {
        return $this->hasMany(Domaci::class);
    }
}
