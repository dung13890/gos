<?php

namespace App\Services;

use App\Contracts\Services\UnitService;
use Illuminate\Database\Eloquent\Model;
use App\Jobs\Unit\StoreUnit;
use App\Jobs\Unit\UpdateUnit;
use App\Jobs\Unit\DeleteUnit;
use App\Jobs\Unit\DestroyUnit;

class UnitServiceJob extends AbstractServiceJob implements UnitService
{
    public function store(array $attributes)
    {
        return $this->dispatch(new StoreUnit($attributes));
    }

    public function update(Model $entity, array $attributes)
    {
        return $this->dispatch(new UpdateUnit($entity, $attributes));
    }

    public function delete(Model $entity)
    {
        return $this->dispatch(new DeleteUnit($entity));
    }

    public function destroy(array $ids)
    {
        return $this->dispatch(new DestroyUnit($ids));
    }
}
