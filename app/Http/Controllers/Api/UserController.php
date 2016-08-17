<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Repositories\UserRepository;

class UserController extends ApiController
{
    public function __construct(UserRepository $user)
    {
        parent::__construct($user);
    }

    public function profile()
    {
    	return $this->user;
    }
}
