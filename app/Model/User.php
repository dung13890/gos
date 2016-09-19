<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Traits\Eloquent\GetImageTrait;
use App\Traits\Eloquent\DateAMTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use GetImageTrait, SoftDeletes, DateAMTrait, Notifiable;

    protected $fillable = [
        'code',
        'fullname',
        'username',
        'password',
        'email',
        'phone',
        'address',
        'image',
        'gender',
        'branch_id',
        'birthday',
        'position_id',
    ];

    protected $appends = ['image_thumbnail'];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $dates = ['deleted_at'];

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

    public function setBirthdayAttribute($value)
    {
        $this->attributes['birthday'] = ($value) ? $this->setDate($value) : null;
    }

    public function getBirthdayAttribute ($value)
    {
        return ($value) ? $this->getDate($value) : null;
    }
}
