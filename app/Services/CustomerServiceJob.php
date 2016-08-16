<?php

namespace App\Services;

use App\Contracts\Services\CustomerService;
use Illuminate\Database\Eloquent\Model;
use App\Jobs\Customer\StoreCustomer;
use App\Jobs\Customer\UpdateCustomer;
use App\Jobs\Customer\DeleteCustomer;
use App\Jobs\Customer\DestroyCustomer;

class CustomerServiceJob extends AbstractServiceJob implements CustomerService
{
    public function store(array $attributes)
    {
        return $this->dispatch(new StoreCustomer($attributes));
    }

    public function update(Model $entity, array $attributes)
    {
        return $this->dispatch(new UpdateCustomer($entity, $attributes));
    }

    public function delete(Model $entity)
    {
        return $this->dispatch(new DeleteCustomer($entity));
    }

    public function destroy(array $ids)
    {
        return $this->dispatch(new DestroyCustomer($ids));
    }
}
