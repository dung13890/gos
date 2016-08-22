<?php

namespace App\Jobs\Room;

use App\Jobs\Job;
use App\Traits\Jobs\UploadableTrait;
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
        $repository->create($this->attributes);
    }
}
