<?php

namespace App\Repositories;

use App\Model\Manufacturer;
use App\Contracts\Repositories\ManufacturerRepository;

class ManufacturerRepositoryEloquent extends AbstractRepositoryEloquent implements ManufacturerRepository
{
    public function __construct(Manufacturer $model)
    {
        parent::__construct($model);
    }
}
