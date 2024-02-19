<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $fillable = ['naziv', 'opis', 'cijena', 'SKU', 'published'];

    public function categories()
    {
        return $this->belongsToMany(Categories::class, 'category_product', 'product_id', 'category_id');
    }

    public function priceLists()
    {
        return $this->hasMany(PriceList::class);
    }
}
