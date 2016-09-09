<?php

namespace App\Jobs\Permission;

use App\Jobs\Job;
use App\Model\Permission;

class StorePermission extends Job
{

    protected $attributes;

    public function __construct(array $attributes)
    {
        $this->attributes = $attributes;
    }

    public function handle(Permission $repository)
    {
        $repository->create($this->attributes);
    }
}
