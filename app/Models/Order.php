<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'total_price',
        'products',
        'stopa_poreza',
        'popust',
        'ime_prezime',
        'email',
        'broj_telefona',
        'adresa',
        'grad',
        'drzava',
        'created_at',
        'updated_at',
    ];
}
