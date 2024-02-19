<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PriceList extends Model
{
    protected $fillable = ['naziv', 'cijena', 'sku'];

    public function product()
    {
        return $this->belongsTo(Products::class);
    }
}
