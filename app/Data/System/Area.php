<?php

namespace App\Data\System;

use Illuminate\Database\Eloquent\Model;
use App\Data\Main\Branch;
use App\Data\Main\Customer;

class Area extends Model
{
    protected $fillable = [
        'code',
        'name',
        'description',
    ];

    public function branchs()
    {
        return $this->belongsToMany(Branch::class);
    }

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }
}
