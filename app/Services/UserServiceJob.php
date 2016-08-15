<?php

namespace App\Services;

use App\Contracts\Services\UserService;
use Illuminate\Database\Eloquent\Model;
use App\Jobs\User\StoreUser;
use App\Jobs\User\UpdateUser;
use App\Jobs\User\DeleteUser;
use App\Jobs\User\DestroyUser;

class UserServiceJob extends AbstractServiceJob implements UserService
{
    public function store(array $attributes)
    {
        return $this->dispatch(new StoreUser($attributes));
    }

    public function update(Model $entity, array $attributes)
    {
        return $this->dispatch(new UpdateUser($entity, $attributes));
    }

    public function delete(Model $entity)
    {
        return $this->dispatch(new DeleteUser($entity));
    }

    public function destroy(array $ids)
    {
        return $this->dispatch(new DestroyUser($ids));
    }
}
