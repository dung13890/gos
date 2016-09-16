<?php

namespace App\Services;

use App\Contracts\Services\WarehouseService;
use Illuminate\Database\Eloquent\Model;

class WarehouseServiceJob extends AbstractServiceJob implements WarehouseService
{
    public function store(array $attributes)
    {
        return $this->dispatch(new Store($attributes));
    }
}
