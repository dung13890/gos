<?php

namespace App\Jobs\Permission;

use App\Jobs\Job;
use App\Model\Permission;
use Illuminate\Database\Eloquent\Model;

class UpdatePermission extends Job
{
    protected $attributes;

    protected $entity;

    public function __construct(Model $entity, array $attributes)
    {
        $this->attributes = $attributes;
        $this->entity = $entity;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Permission $repository)
    {
        $this->entity->update($this->attributes);
    }
}
