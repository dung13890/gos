<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\User;

class Position extends Model
{
    protected $fillable = [
        'code',
        'name',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
