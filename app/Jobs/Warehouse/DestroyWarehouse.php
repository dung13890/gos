<?php

namespace App\Jobs\Warehouse;

use App\Jobs\Job;
use App\Contracts\Repositories\WarehouseRepository;
use Illuminate\Database\Eloquent\Model;

class Destroy extends Job
{
    protected $warehouse;

    public function __construct(Model $warehouse)
    {
        $this->warehouse = $warehouse;
    }

    public function handle(WarehouseRepository $repository)
    {   
        $repository->delete($this->warehouse);
    }
}
