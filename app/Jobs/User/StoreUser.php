<?php

namespace App\Jobs\User;

use App\Jobs\Job;
use App\Traits\Jobs\UploadableTrait;
use App\Contracts\Repositories\UserRepository;

class StoreUser extends Job
{
    use UploadableTrait;

    protected $attributes;

    public function __construct(array $attributes)
    {
        $this->attributes = $attributes;
    }

    public function handle(UserRepository $repository)
    {   
        //dd($this->attributes);
        $path = strtolower(class_basename($repository->getModel()));
        if (isset($this->attributes['image']) && $this->attributes['image']) {
            $this->attributes['image'] = $this->uploadFile($this->attributes['image'], $path);
        }

        $this->attributes['password'] = bcrypt($this->attributes['password']);
        $this->attributes['code'] = str_random(11);
        
        $user = $repository->create($this->attributes);

        $user->permissions()->sync(json_decode($this->attributes['permission_ids']));
        $user->rooms()->sync(json_decode($this->attributes['room_ids']));
        $user->roles()->sync(json_decode($this->attributes['role_ids']));

    }
}
