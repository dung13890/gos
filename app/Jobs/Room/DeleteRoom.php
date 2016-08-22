<?php

namespace App\Jobs\Room;

use App\Jobs\Job;
use App\Traits\Jobs\UploadableTrait;
use App\Contracts\Repositories\RoomRepository;
use Illuminate\Database\Eloquent\Model;

class DeleteRoom extends Job
{
    use UploadableTrait;

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
    public function handle(RoomRepository $repository)
    {
        $repository->delete($this->entity);
    }
}
