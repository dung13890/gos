<?php

namespace App\Repositories;

use App\Model\Branch;
use App\Contracts\Repositories\BranchRepository;

class BranchRepositoryEloquent extends AbstractRepositoryEloquent implements BranchRepository
{
    public function __construct(Branch $model)
    {
        parent::__construct($model);
    }
}
