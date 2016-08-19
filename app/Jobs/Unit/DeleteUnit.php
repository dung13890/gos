<?php

namespace App\Jobs\Unit;

use App\Jobs\Job;
use App\Contracts\Repositories\UnitRepository;
use Illuminate\Database\Eloquent\Model;

class DeleteUnit extends Job
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
    public function handle(UnitRepository $repository)
    {
        $repository->delete($this->entity);
    }
}
