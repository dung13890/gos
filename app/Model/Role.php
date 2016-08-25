<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name',
        'description',
    ];

    public function Perms()
    {
        return $this->belongsToMany(Permission::class);
    }
}
