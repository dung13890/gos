<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Eloquent\DateAMTrait;

class Room extends Model
{
    use DateAMTrait;

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

    public function countUser()
    {
        return $this->users()->selectRaw('count(users.id) as member')->groupBy('user_id');
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);   
    }

    public function setFoundingAttribute($value)
    {
        $this->attributes['founding'] = ($value) ? $this->setDate($value) : null;
    }

    public function getFoundingAttribute ($value)
    {
        return ($value) ? $this->getDate($value) : null;
    }
}
