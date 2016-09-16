<?php

namespace App\Jobs\Branch;

use App\Jobs\Job;
use App\Traits\Jobs\UploadableTrait;
use App\Contracts\Repositories\BranchRepository;
use Illuminate\Database\Eloquent\Model;

class DeleteBranch extends Job
{
    use UploadableTrait;

    protected $entity;

    public function __construct(Model $entity)
    {
        $this->entity = $entity;
    }

    public function handle(BranchRepository $repository)
    {
        if (!empty($this->entity->image)) {
            $this->destroyFile($this->entity->image);
        }
        
        $repository->delete($this->entity);
    }
}
