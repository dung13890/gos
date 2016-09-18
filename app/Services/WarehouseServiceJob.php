<?php

namespace App\Services;

use App\Contracts\Services\WarehouseService;
use Illuminate\Database\Eloquent\Model;

use App\Jobs\Warehouse\StoreWarehouse;
use App\Jobs\Warehouse\UpdateWarehouse;
use App\Jobs\Warehouse\DestroyWarehouse;
use App\Jobs\Warehouse\DeleteWarehouse;

class WarehouseServiceJob extends AbstractServiceJob implements WarehouseService
{
     public function store(array $attributes)
    {
        return $this->dispatch(new StoreWarehouse($attributes));
    }

    public function update(Model $entity, array $attributes)
    {
        return $this->dispatch(new UpdateWarehouse($entity, $attributes));
    }

    public function delete(Model $warehouse)
    {
        return $this->dispatch(new DeleteWarehouse($warehouse));
    }

    public function destroy(array $ids)
    {
        return $this->dispatch(new DestroyWarehouse($ids));
    }
}
