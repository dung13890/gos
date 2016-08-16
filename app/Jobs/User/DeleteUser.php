<?php

namespace App\Jobs\User;

use App\Jobs\Job;
use App\Contracts\Repositories\UserRepository;
use Illuminate\Database\Eloquent\Model;

class DeleteUser extends Job
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
    public function handle(UserRepository $repository)
    {
        $repository->delete($this->entity);
    }
}
