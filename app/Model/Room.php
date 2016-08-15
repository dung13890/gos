<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\User;

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
        'branch_id',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
