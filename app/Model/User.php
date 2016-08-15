<?php

namespace App\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Traits\Eloquent\GetImageTrait;

class User extends Authenticatable
{
    use GetImageTrait;

    protected $fillable = [
        'code',
        'username',
        'password',
        'email',
        'phone',
        'address',
        'image',
        'gender',
        'branch_id',
        'birthday',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function rooms()
    {
        return $this->belongsToMany(Room::class);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);   
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }
}
