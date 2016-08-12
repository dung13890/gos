<?php

namespace App\Data\Main;

use Illuminate\Database\Eloquent\Model;
use App\Data\Main\Product;

class Manufacturer extends Model
{
    protected $fillable = [
        'code',
        'name',
        'description',
        'image',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
