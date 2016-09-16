<?php

namespace App\Jobs\Branch;

use App\Jobs\Job;
use App\Contracts\Repositories\RoomRepository;
use Illuminate\Database\Eloquent\Model;

class UpdateBranch extends Job
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

        if (isset($this->attributes['location_ids']) && count($this->attributes['location_ids'])) {
            $this->entity->locations()->sync($this->attributes['location_ids']);
        }
    }
}
