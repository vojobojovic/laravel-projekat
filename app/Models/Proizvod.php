<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proizvod extends Model
{
    // Definisanje koje kolone mogu biti masovno dodeljene
    protected $fillable = [
        'naziv', 
        'opis',
        'cena', 
        'tip', 
        'slika', 
        'featured'
    ];

    // Opcionalno: Definisanje tipa za cenu ako je potrebno
    protected $casts = [
        'cena' => 'decimal:2',  // Pretvaranje cene u decimalni broj sa 2 decimale
    ];
}
