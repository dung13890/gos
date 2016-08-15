<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    protected $fillable = [
        'code',
        'name',
        'description',
        'image',
    ];
}
