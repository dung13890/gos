<?php

namespace App\Model;

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
    protected $fillable = [
        'name',
        'description',
    ];
}
