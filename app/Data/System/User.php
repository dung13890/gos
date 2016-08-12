<?php

namespace App\Data\System;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Data\System\Role;
use App\Data\System\Room;
use App\Data\Main\Branch;
use App\Data\Main\Customer;
use App\Data\Main\Bill;
use App\Data\Main\Warehouse;

class User extends Authenticatable
{
    protected $fillable = [
        'code',
        'username',
        'password',
        'email',
        'phone',
        'address',
        'image',
        'gender',
        'branch_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function rooms()
    {
        return $this->belongsToMany(Room::class);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }

    public function bills()
    {
        return $this->hasMany(Bill::class);
    }

    public function warehouses()
    {
        return $this->hasMany(Warehouse::class);
    }
}
