<?php

namespace App\Repositories;

use App\Model\Unit;
use App\Contracts\Repositories\UnitRepository;

class UnitRepositoryEloquent extends AbstractRepositoryEloquent implements UnitRepository
{
    public function __construct(Unit $model)
    {
        parent::__construct($model);
    }
}
