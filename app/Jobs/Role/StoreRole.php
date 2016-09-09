<?php

namespace App\Jobs\Role;

use App\Jobs\Job;
use App\Model\Role;

class StoreRole extends Job
{

    protected $attributes;

    public function __construct(array $attributes)
    {
        $this->attributes = $attributes;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Role $repository)
    {
        $role = $repository->create($this->attributes);

        if (isset($this->attributes['permissions_checked']) && count($this->attributes['permissions_checked'])) {
            $role->permissions()->sync($this->attributes['permissions_checked']);
        }
    }
}
