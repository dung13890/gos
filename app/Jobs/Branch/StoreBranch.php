<?php

namespace App\Jobs\Branch;

use App\Jobs\Job;
use App\Contracts\Repositories\BranchRepository;

class StoreBranch extends Job
{
    protected $attributes;

    public function __construct(array $attributes)
    {
        $this->attributes = $attributes;
    }

    public function handle(BranchRepository $repository)
    {
        $item = $repository->create($this->attributes);

        if (isset($this->attributes['location_ids']) && count($this->attributes['location_ids'])) {
            $item->locations()->sync($this->attributes['location_ids']);
        }
    }
}
