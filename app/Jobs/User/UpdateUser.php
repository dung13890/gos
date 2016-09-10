<?php

namespace App\Jobs\User;

use App\Jobs\Job;
use App\Traits\Jobs\UploadableTrait;
use App\Contracts\Repositories\UserRepository;
use Illuminate\Database\Eloquent\Model;

class UpdateUser extends Job
{
    use UploadableTrait;

    protected $attributes;

    protected $entity;

    public function __construct(Model $entity, array $attributes)
    {
        $this->attributes = $attributes;
        $this->entity = $entity;
    }

    public function handle(UserRepository $repository)
    {

        $path = strtolower(class_basename($repository->getModel()));
        if (isset($this->attributes['password'])) {
            $this->attributes['password'] = bcrypt($this->attributes['password']);
        }
        if (isset($this->attributes['image']) && $this->attributes['image']) {
            if (!empty($this->entity->image)) {
                $this->destroyFile($this->entity->image);
            }
            $this->attributes['image'] = $this->uploadFile($this->attributes['image'], $path);
        }
        $this->attributes['image'] = '';


        if (isset($this->attributes['role_ids'])) {
            $this->entity->roles()->sync($this->attributes['role_ids']);
        }

        if (isset($this->attributes['permission_ids'])) {
            $this->entity->permissions()->sync($this->attributes['permission_ids']);
        }

        if (isset($this->attributes['room_ids'])) {
            $this->entity->rooms()->sync($this->attributes['room_ids']);
        }
    }
}
