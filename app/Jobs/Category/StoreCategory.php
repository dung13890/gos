<?php

namespace App\Jobs\Category;

use App\Jobs\Job;
use App\Contracts\Repositories\CategoryRepository;

class StoreCategory extends Job
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
    public function handle(CategoryRepository $repository)
    {
        $repository->create($this->attributes);
    }
}
