<?php

namespace App\Jobs\Location;

use App\Jobs\Job;
use App\Contracts\Repositories\LocationRepository;

class StoreLocation extends Job
{
    protected $attributes;

    public function __construct(array $attributes)
    {
        $this->attributes = $attributes;
    }

    public function handle(LocationRepository $repository)
    {
        $item = $repository->create($this->attributes);
    }
}
