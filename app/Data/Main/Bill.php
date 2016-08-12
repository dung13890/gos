<?php

namespace App\Data\Main;

use Illuminate\Database\Eloquent\Model;
use App\Data\Main\Customer;
use App\Data\Main\Warehouse;
use App\Data\System\User;
use App\Data\Main\BillDetail;
use App\Data\Main\Product;

class Bill extends Model
{
    protected $fillable = [
        'code',
        'date',
        'user_id',
        'customer_id',
        'warehouse_id',
        'type',
        'note',
        'total',
        'tax_amount',
        'promotion',
        'grand_total',
        'status',
        'seller_name',
        'company_name',
        'company_address',
        'tax_code',
        'fax_number',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function billDetails()
    {
        return $this->hasMany(BillDetail::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
