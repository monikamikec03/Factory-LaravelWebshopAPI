<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    protected $fillable = ['naziv', 'opis', 'parent_id'];

    public function products()
    {
        return $this->belongsToMany(Products::class, 'category_product', 'category_id', 'product_id');
    }

    public function parent()
    {
        return $this->belongsTo(Categories::class, 'parent_id', 'id');
    }

    public function children()
    {
        return $this->hasMany(Categories::class, 'parent_id', 'id');
    }
}
