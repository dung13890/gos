<?php

namespace App\Services;

use App\Contracts\Services\BranchService;
use Illuminate\Database\Eloquent\Model;
use App\Jobs\Branch\StoreBranch;
use App\Jobs\Branch\UpdateBranch;
use App\Jobs\Branch\DeleteBranch;
use App\Jobs\Branch\DestroyBranch;

class BranchServiceJob extends AbstractServiceJob implements BranchService
{
    public function store(array $attributes)
    {
        return $this->dispatch(new StoreBranch($attributes));
    }

    public function update(Model $entity, array $attributes)
    {
        return $this->dispatch(new UpdateBranch($entity, $attributes));
    }

    public function delete(Model $entity)
    {
        return $this->dispatch(new DeleteBranch($entity));
    }

    public function destroy(array $ids)
    {
        return $this->dispatch(new DestroyBranch($ids));
    }
}
