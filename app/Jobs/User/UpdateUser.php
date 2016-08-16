<?php

namespace App\Jobs\User;

use App\Jobs\Job;
use App\Contracts\Repositories\UserRepository;
use Illuminate\Database\Eloquent\Model;

class UpdateUser extends Job
{
    protected $attributes;

    protected $entity;

    public function __construct(Model $entity, array $attributes)
    {
        $this->attributes = $attributes;
        $this->entity = $entity;
    }

    public function handle(UserRepository $repository)
    {
        if (isset($this->attributes['password'])) {
            $this->attributes['password'] = bcrypt($this->attributes['password']);
        }

        $repository->update($this->entity, $this->attributes);
    }
}
