<?php

namespace App\Jobs\Position;

use App\Jobs\Job;
use App\Contracts\Repositories\PositionRepository;


class StorePosition extends Job
{
    protected $attributes;

    public function __construct(array $attributes)
    {
        $this->attributes = $attributes;
    }

    public function handle(PositionRepository $repository)
    {
        $repository->create($this->attributes);
    }
}
