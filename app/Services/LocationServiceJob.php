<?php

namespace App\Services;

use App\Contracts\Services\LocationService;
use Illuminate\Database\Eloquent\Model;
use App\Jobs\Location\StoreLocation;
use App\Jobs\Location\UpdateLocation;
use App\Jobs\Location\DeleteLocation;
use App\Jobs\Location\DestroyLocation;

class LocationServiceJob extends AbstractServiceJob implements LocationService
{
    public function store(array $attributes)
    {
        return $this->dispatch(new StoreLocation($attributes));
    }

    public function update(Model $entity, array $attributes)
    {
        return $this->dispatch(new UpdateLocation($entity, $attributes));
    }

    public function delete(Model $entity)
    {
        return $this->dispatch(new DeleteLocation($entity));
    }

    public function destroy(array $ids)
    {
        return $this->dispatch(new DestroyLocation($ids));
    }
}
