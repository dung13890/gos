<?php

namespace App\Repositories;

use App\Model\Category;
use App\Contracts\Repositories\CategoryRepository;

class CategoryRepositoryEloquent extends AbstractRepositoryEloquent implements CategoryRepository
{
    public function __construct(Category $model)
    {
        parent::__construct($model);
    }
}
