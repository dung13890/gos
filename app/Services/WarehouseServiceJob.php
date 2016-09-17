<?php

namespace App\Services;

use App\Contracts\Services\WarehouseService;
use Illuminate\Database\Eloquent\Model;
use App\Jobs\Warehouse\DestroyWarehouse;
use App\Jobs\Warehouse\DeleteWarehouse;
use App\Jobs\Warehouse\StoreWarehouse;

class WarehouseServiceJob extends AbstractServiceJob implements WarehouseService
{
     public function store(array $attributes)
    {
        return $this->dispatch(new Store($attributes));
    }

    public function update(Model $entity, array $attributes)
    {
        return $this->dispatch(new UpdateBranch($entity, $attributes));
    }

    public function delete(Model $warehouse)
    {
        return $this->dispatch(new DeleteWarehouse($warehouse));
    }

    public function destroy(array $ids)
    {
        return $this->dispatch(new Destroy($ids));
    }
}
