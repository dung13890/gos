<?php

namespace App\Services;

use App\Contracts\Services\PositionService;
use Illuminate\Database\Eloquent\Model;
use App\Jobs\Position\StorePosition;
use App\Jobs\Position\UpdatePosition;
use App\Jobs\Position\DeletePosition;
use App\Jobs\Position\DestroyPosition;

class PositionServiceJob extends AbstractServiceJob implements PositionService
{
    public function store(array $attributes)
    {
        return $this->dispatch(new StorePosition($attributes));
    }

    public function update(Model $entity, array $attributes)
    {
        return $this->dispatch(new UpdatePosition($entity, $attributes));
    }

    public function delete(Model $entity)
    {
        return $this->dispatch(new DeletePosition($entity));
    }

    public function destroy(array $ids)
    {
        return $this->dispatch(new DestroyPosition($ids));
    }
}
