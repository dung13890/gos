<?php

namespace App\Jobs\Unit;

use App\Jobs\Job;
use App\Traits\Jobs\UploadableTrait;
use App\Contracts\Repositories\UnitRepository;

class StoreUnit extends Job
{
    use UploadableTrait;

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