<?php

namespace App\Jobs\Room;

use App\Jobs\Job;
use App\Contracts\Repositories\RoomRepository;

class StoreRoom extends Job
{

    protected $attributes;

    public function __construct(array $attributes)
    {
        $this->attributes = $attributes;
    }

    public function handle(RoomRepository $repository)
    {
        $item = $repository->create($this->attributes);

        $item->permissions()->sync($this->attributes['permission_ids']);
    }
}
