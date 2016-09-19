<?php

namespace App\Jobs\Location;

use App\Jobs\Job;
use Illuminate\Database\Eloquent\Model;
use App\Contracts\Repositories\LocationRepository;

class UpdateLocation extends Job
{
    protected $object;
    protected $attributes;

    public function __construct(Model $object, array $attributes)
    {
        $this->object = $object;
        $this->attributes = $attributes;
    }

    public function handle(LocationRepository $repository)
    {
        $repository->update($this->object, $this->attributes);

        if (isset($this->attributes['branch_ids'])) {
            $this->object->branches()->sync($this->attributes['branch_ids']);
        }
    }
}
