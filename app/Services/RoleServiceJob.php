<?php

namespace App\Services;

use App\Contracts\Services\RoleService;
use Illuminate\Database\Eloquent\Model;
use App\Jobs\Role\StoreRole;
use App\Jobs\Role\UpdateRole;
use App\Jobs\Role\DeleteRole;
use App\Jobs\Role\DestroyRole;

class RoleServiceJob extends AbstractServiceJob implements RoleService
{
    public function store(array $attributes)
    {
        return $this->dispatch(new StoreRole($attributes));
    }

    public function update(Model $entity, array $attributes)
    {
        return $this->dispatch(new UpdateRole($entity, $attributes));
    }

    public function delete(Model $entity)
    {
        return $this->dispatch(new DeleteRole($entity));
    }

    public function destroy(array $ids)
    {
        return $this->dispatch(new DestroyRole($ids));
    }
}
