<?php

namespace App\Jobs\Warehouse;

use App\Jobs\Job;
use App\Contracts\Repositories\WarehouseRepository;
use Illuminate\Database\Eloquent\Model;

class Store extends Job
{
    protected $attributes;

    public function __construct(array $attributes)
    {
        $this->attributes = $attributes;
    }

    public function handle(WarehouseRepository $repository)
    {
        $item = $repository->create($this->attributes);
        // if (isset($this->attributes['location_ids']) && count($this->attributes['location_ids'])) {
        //     $item->locations()->sync($this->attributes['location_ids']);
        // }
    }
}
