<?php

namespace App\Jobs\Unit;

use App\Jobs\Job;
use App\Contracts\Repositories\UnitRepository;

class StoreUnit extends Job
{
    protected $attributes;

    public function __construct(array $attributes)
    {
        $this->attributes = $attributes;
    }

    public function handle(UnitRepository $repository)
    {
        $repository->create($this->attributes);
    }
}