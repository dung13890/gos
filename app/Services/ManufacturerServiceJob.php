<?php

namespace App\Services;

use App\Contracts\Services\ManufacturerService;
use Illuminate\Database\Eloquent\Model;
use App\Jobs\Manufacturer\StoreManufacturer;
use App\Jobs\Manufacturer\UpdateManufacturer;
use App\Jobs\Manufacturer\DeleteManufacturer;
use App\Jobs\Manufacturer\DestroyManufacturer;

class ManufacturerServiceJob extends AbstractServiceJob implements ManufacturerService
{
    public function store(array $attributes)
    {
        return $this->dispatch(new StoreManufacturer($attributes));
    }

    public function update(Model $entity, array $attributes)
    {
        return $this->dispatch(new UpdateManufacturer($entity, $attributes));
    }

    public function delete(Model $entity)
    {
        return $this->dispatch(new DeleteManufacturer($entity));
    }

    public function destroy(array $ids)
    {
        return $this->dispatch(new DestroyManufacturer($ids));
    }
}
