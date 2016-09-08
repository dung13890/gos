<?php

namespace App\Services;

use App\Contracts\Services\PermissionService;
use Illuminate\Database\Eloquent\Model;
use App\Jobs\Permission\StorePermission;
use App\Jobs\Permission\UpdatePermission;
use App\Jobs\Permission\DeletePermission;
use App\Jobs\Permission\DestroyPermission;

class PermissionServiceJob extends AbstractServiceJob implements PermissionService
{
    public function store(array $attributes)
    {
        return $this->dispatch(new StorePermission($attributes));
    }

    public function update(Model $entity, array $attributes)
    {
        return $this->dispatch(new UpdatePermission($entity, $attributes));
    }

    public function delete(Model $entity)
    {
        return $this->dispatch(new DeletePermission($entity));
    }

    public function destroy(array $ids)
    {
        return $this->dispatch(new DestroyPermission($ids));
    }
}
