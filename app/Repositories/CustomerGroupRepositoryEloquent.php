<?php

namespace App\Repositories;

use App\Model\CustomerGroup;
use App\Contracts\Repositories\CustomerGroupRepository;

class CustomerGroupRepositoryEloquent extends AbstractRepositoryEloquent implements CustomerGroupRepository
{
    public function __construct(CustomerGroup $customerGroup)
    {
        parent::__construct($customerGroup);
    }

    public function datatables($columns = ['*'], $type = '')
    {
    	return $this->model->where('type', $type)
    		->orderBy('id', 'desc')->get($columns);
    }
}