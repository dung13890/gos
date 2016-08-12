<?php

namespace App\Data\Main;

use Illuminate\Database\Eloquent\Model;
use App\Data\Main\Bill;
use App\Data\System\Unit;
use App\Data\Main\Category;

class Product extends Model
{
    protected $fillable = [
        'code',
        'name',
        'model',
        'price_in',
        'price_out',
        'description',
        'made_in',
        'year_of_production',
        'expir_date',
        'category_id',
        'unit_id',
        'manufacturer_id',
    ];

    public function bills()
    {
        return $this->hasMany(Bill::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
