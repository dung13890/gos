<?php

namespace App\Data\Main;

use Illuminate\Database\Eloquent\Model;
use App\Data\Main\Customer;
use App\Data\Main\Product;

class Category extends Model
{
    protected $fillable = [
        'code',
        'name',
        'description',
        'image',
        'type',
    ];

    public function customers()
    {
        return $this->belongsToMany(Customer::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
