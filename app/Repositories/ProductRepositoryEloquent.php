<?php

namespace App\Repositories;

use App\Model\Product;
use App\Contracts\Repositories\ProductRepository;

class ProductRepositoryEloquent extends AbstractRepositoryEloquent implements ProductRepository
{
    public function __construct(Product $model)
    {
        parent::__construct($model);
    }
}
