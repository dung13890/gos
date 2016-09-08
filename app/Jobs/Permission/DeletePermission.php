<?php

namespace App\Jobs\Permission;

use App\Jobs\Job;
use App\Model\Permission;
use Illuminate\Database\Eloquent\Model;

class DeletePermission extends Job
{
    protected $entity;

    public function __construct(Model $entity)
    {
        $this->entity = $entity;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->entity->delete();
    }
}
