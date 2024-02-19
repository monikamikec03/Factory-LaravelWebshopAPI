<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContractList extends Model
{
    protected $fillable = ['cijena', 'sku'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
