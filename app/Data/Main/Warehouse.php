<?php

namespace App\Data\Main;

use Illuminate\Database\Eloquent\Model;
use App\Data\Main\Branch;
use App\Data\Main\Bill;
use App\Data\System\User;

class Warehouse extends Model
{
    protected $fillable = [
        'code',
        'name',
        'address',
        'user_id',
        'branch_id',
    ];

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function bills()
    {
        return $this->hasMany(Bill::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
