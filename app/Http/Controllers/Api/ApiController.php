<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\AbstractController;
use Illuminate\Database\Eloquent\Model;

abstract class ApiController extends AbstractController
{
    protected $guard = 'backend';
}