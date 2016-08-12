<?php

namespace App\Data\System;

use Illuminate\Database\Eloquent\Model;
use App\Data\System\Room;

class Room extends Model
{
    protected $fillable = [
        'code',
        'name',
        'description',
        'organizational',
        'manager',
        'member',
        'founding',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
