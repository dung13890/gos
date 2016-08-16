<?php

namespace App\Repositories;

use App\Model\Customer;
use App\Contracts\Repositories\CustomerRepository;

class CustomerRepositoryEloquent extends AbstractRepositoryEloquent implements CustomerRepository
{
    public function __construct(Customer $model)
    {
        parent::__construct($model);
    }
}
