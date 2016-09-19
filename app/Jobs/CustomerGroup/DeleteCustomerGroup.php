<?php

namespace App\Jobs\CustomerGroup;

use App\Jobs\Job;
use App\Contracts\Repositories\CustomerGroupRepository;
use Illuminate\Database\Eloquent\Model;

class DeleteCustomerGroup extends Job
{
    protected $customerGroup;

    public function __construct(Model $customerGroup)
    {
        $this->customerGroup = $customerGroup;
    }
    
    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(CustomerGroupRepository $repository)
    {   
        $repository->delete($this->customerGroup);
    }
}
