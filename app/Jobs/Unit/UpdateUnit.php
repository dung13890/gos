<?php

namespace App\Jobs\Unit;

use App\Jobs\Job;
use Illuminate\Database\Eloquent\Model;

class UpdateUnit extends Job
{
    protected $attributes;

    protected $entity;

    public function __construct(Model $entity, array $attributes)
    {
        $this->attributes = $attributes;
        $this->entity = $entity;
    }

    public function handle()
    {
        $this->entity->update($this->attributes);
    }
}
