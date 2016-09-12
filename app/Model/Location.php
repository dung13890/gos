<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Branch;

class Location extends Model
{
    protected $fillable = [
        'code',
        'name',
        'description',
    ];

    public function branches()
    {
        return $this->belongsToMany(Branch::class);
    }
}
