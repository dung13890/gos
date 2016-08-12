<?php

namespace App\Data\Main;

use Illuminate\Database\Eloquent\Model;
use App\Data\System\User;
use App\Data\System\Area;
use App\Data\Main\Warehouse;
use App\Data\Main\Customer;

class Branch extends Model
{
    protected $fillable = [
        'code',
        'name',
        'phone',
        'address',
        'fax',
        'website',
        'image',
        'status',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function areas()
    {
        return $this->belongsToMany(Area::class);
    }

    public function warehouses()
    {
        $this->hasMany(Warehouse::class);
    }

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }
}
