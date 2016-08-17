<?php

namespace App\Repositories;

use App\Model\Customer;
use App\Contracts\Repositories\ProviderRepository;

class ProviderRepositoryEloquent extends AbstractRepositoryEloquent implements ProviderRepository
{
    public function __construct(Customer $model)
    {
        parent::__construct($model);
    }
}
