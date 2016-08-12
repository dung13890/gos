<?php

namespace App\Data\System;

use Illuminate\Database\Eloquent\Model;
use App\Data\Main\Product;

class Unit extends Model
{
    protected $fillable = [
        'name',
        'short_name',
        'description',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
