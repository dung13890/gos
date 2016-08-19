<?php

namespace App\Services;

use App\Contracts\Services\RoomService;
use Illuminate\Database\Eloquent\Model;
use App\Jobs\Room\StoreRoom;
use App\Jobs\Room\UpdateRoom;
use App\Jobs\Room\DeleteRoom;
use App\Jobs\Room\DestroyRoom;

class RoomServiceJob extends AbstractServiceJob implements RoomService
{
    public function store(array $attributes)
    {
        return $this->dispatch(new StoreRoom($attributes));
    }

    public function update(Model $entity, array $attributes)
    {
        return $this->dispatch(new UpdateRoom($entity, $attributes));
    }

    public function delete(Model $entity)
    {
        return $this->dispatch(new DeleteRoom($entity));
    }

    public function destroy(array $ids)
    {
        return $this->dispatch(new DestroyRoom($ids));
    }
}
