<?php

namespace App\Repositories;

use App\Model\Position;
use App\Contracts\Repositories\PositionRepository;

class PositionRepositoryEloquent extends AbstractRepositoryEloquent implements PositionRepository
{
    public function __construct(Position $model)
    {
        parent::__construct($model);
    }
}
