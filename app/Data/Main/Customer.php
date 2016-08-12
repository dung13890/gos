<?php

namespace App\Data\Main;

use Illuminate\Database\Eloquent\Model;
use App\Data\System\User;
use App\Data\Main\Branch;
use App\Data\Main\Area;
use App\Data\Main\Category;
use App\Data\Main\Bill;

class Customer extends Model
{
    protected $fillable = [
        'code',
        'code',
        'name',
        'email',
        'address',
        'phone',
        'image',
        'debt_limit',
        'area_id',
        'branch_id',
        'user_id',
        'type',
        'company_name',
        'trading_address',
        'representative',
        'tax_code',
        'fax_code',
        'receivables',
        'must_pay',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);   
    }

    public function area()
    {
        return $this->belongsTo(Area::class);   
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function bills()
    {
        return $this->hasMany(Bill::class);
    }
}
