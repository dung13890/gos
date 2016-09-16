<?php

namespace App\Repositories;

use App\Model\Warehouse;
use App\Contracts\Repositories\WarehouseRepository;

class WarehouseRepositoryEloquent extends AbstractRepositoryEloquent implements WarehouseRepository
{
    public function __construct(Warehouse $warehouse)
    {
        parent::__construct($warehouse);
    }
}