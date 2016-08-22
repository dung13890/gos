<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Location;
use App\Model\User;

class Branch extends Model
{
    protected $fillable = [
        'code',
        'name',
        'phone',
        'email',
        'address',
        'fax',
        'website',
        'image',
        'status',
    ];

    public static function all($columns = [])
    {
        if ($columns != null) {
            return self::select($columns)->get();
        } else {
            return self::all();
        }
    }

    public function locations()
    {
        return $this->belongsToMany(Location::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
