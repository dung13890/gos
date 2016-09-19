<?php

namespace App\Jobs\CustomerGroup;

use App\Jobs\Job;
use App\Contracts\Repositories\CustomerGroupRepository;
use Illuminate\Database\Eloquent\Model;

class StoreCustomerGroup extends Job
{
    protected $attributes;

    public function __construct(array $attributes)
    {
        $this->attributes = $attributes;
    }

    public function handle(CustomerGroupRepository $repository)
    {
        $item = $repository->create($this->attributes);
    }
}
