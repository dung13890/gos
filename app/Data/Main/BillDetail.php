<?php

namespace App\Data\Main;

use Illuminate\Database\Eloquent\Model;
use App\Data\Main\Bill;

class BillDetail extends Model
{
    protected $fillable = [
        'bill_id',
        'product_id',
        'product_code',
        'product_name',
        'qty',
        'price',
        'promotion',
        'into_money',
        'type',
    ];

    public function bill()
    {
        return $this->belongsTo(Bill::class);
    }
}
