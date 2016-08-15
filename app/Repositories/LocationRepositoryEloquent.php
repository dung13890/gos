<?php

namespace App\Repositories;

use App\Model\Location;
use App\Contracts\Repositories\LocationRepository;

class LocationRepositoryEloquent extends AbstractRepositoryEloquent implements LocationRepository
{
    public function __construct(Location $model)
    {
        parent::__construct($model);
    }
}
