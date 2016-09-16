<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CustomerGroup extends Model
{
    protected $fillable = [
        'code',
        'name',
        'type',
    ];

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }
}
