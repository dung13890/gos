<?php

namespace App\Data\System;

use Illuminate\Database\Eloquent\Model;
use App\Data\System\User;

class Role extends Model
{
    protected $fillable = [
        'name',
        'description',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
