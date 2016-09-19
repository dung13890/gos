<?php

namespace App\Services;

use App\Contracts\Services\CustomerGroupService;
use Illuminate\Database\Eloquent\Model;

use App\Jobs\CustomerGroup\StoreCustomerGroup;
use App\Jobs\CustomerGroup\UpdateCustomerGroup;
use App\Jobs\CustomerGroup\DestroyCustomerGroup;
use App\Jobs\CustomerGroup\DeleteCustomerGroup;

class CustomerGroupServiceJob extends AbstractServiceJob implements CustomerGroupService
{
     public function store(array $attributes)
    {
        return $this->dispatch(new StoreCustomerGroup($attributes));
    }

    public function update(Model $entity, array $attributes)
    {
        return $this->dispatch(new UpdateCustomerGroup($entity, $attributes));
    }

    public function delete(Model $CustomerGroup)
    {
        return $this->dispatch(new DeleteCustomerGroup($CustomerGroup));
    }

    public function destroy(array $ids)
    {
        return $this->dispatch(new DestroyCustomerGroup($ids));
    }
}
