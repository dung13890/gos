<?php

namespace App\Services;

use App\Contracts\Services\ProductService;
use Illuminate\Database\Eloquent\Model;
use App\Jobs\Product\StoreProduct;
use App\Jobs\Product\UpdateProduct;
use App\Jobs\Product\DeleteProduct;
use App\Jobs\Product\DestroyProduct;

class ProductServiceJob extends AbstractServiceJob implements ProductService
{
    public function store(array $attributes)
    {
        return $this->dispatch(new StoreProduct($attributes));
    }

    public function update(Model $entity, array $attributes)
    {
        return $this->dispatch(new UpdateProduct($entity, $attributes));
    }

    public function delete(Model $entity)
    {
        return $this->dispatch(new DeleteProduct($entity));
    }

    public function destroy(array $ids)
    {
        return $this->dispatch(new DestroyProduct($ids));
    }
}
