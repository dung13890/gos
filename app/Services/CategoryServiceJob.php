<?php

namespace App\Services;

use App\Contracts\Services\CategoryService;
use Illuminate\Database\Eloquent\Model;
use App\Jobs\Category\StoreCategory;
use App\Jobs\Category\UpdateCategory;
use App\Jobs\Category\DeleteCategory;
use App\Jobs\Category\DestroyCategory;

class CategoryServiceJob extends AbstractServiceJob implements CategoryService
{
    public function store(array $attributes)
    {
        return $this->dispatch(new StoreCategory($attributes));
    }

    public function update(Model $entity, array $attributes)
    {
        return $this->dispatch(new UpdateCategory($entity, $attributes));
    }

    public function delete(Model $entity)
    {
        return $this->dispatch(new DeleteCategory($entity));
    }

    public function destroy(array $ids)
    {
        return $this->dispatch(new DestroyCategory($ids));
    }
}
