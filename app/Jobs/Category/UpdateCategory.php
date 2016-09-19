<?php

namespace App\Jobs\Category;

use App\Jobs\Job;
use Illuminate\Database\Eloquent\Model;

class UpdateCategory extends Job
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
    }
}
