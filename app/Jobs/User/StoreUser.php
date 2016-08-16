<?php

namespace App\Jobs\User;

use App\Jobs\Job;
use App\Contracts\Repositories\UserRepository;

class StoreUser extends Job
{
    protected $attributes;

    public function __construct(array $attributes)
    {
        $this->attributes = $attributes;
    }

    public function handle(UserRepository $repository)
    {
        $this->attributes['password'] = bcrypt($this->attributes['password']);
        $repository->create($this->attributes);
    }
}
