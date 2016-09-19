<?php

namespace App\Jobs\Category;

use App\Jobs\Job;
use Illuminate\Database\Eloquent\Model;

class DeleteCategory
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
