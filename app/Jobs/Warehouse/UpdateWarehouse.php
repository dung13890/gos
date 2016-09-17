<?php

namespace App\Jobs\Warehouse;

use App\Jobs\Job;
use App\Contracts\Repositories\WarehouseRepository;

class Update extends Job
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
    public function handle()
    {
        $this->entity->update($this->attributes);

        // if (isset($this->attributes['permission_ids']) && count($this->attributes['permission_ids'])) {
        //     $this->entity->permissions()->sync($this->attributes['permission_ids']);
        // }
    }
}