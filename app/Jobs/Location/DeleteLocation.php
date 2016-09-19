<?php

namespace App\Jobs\Location;

use App\Jobs\Job;
use Illuminate\Database\Eloquent\Model;
use App\Contracts\Repositories\LocationRepository;

class DeleteLocation extends Job
{
    protected $object;

    public function __construct(Model $object)
    {
        $this->object = $object;
    }

    public function handle(LocationRepository $repository)
    {
        $repository->delete($this->object);
    }
}
