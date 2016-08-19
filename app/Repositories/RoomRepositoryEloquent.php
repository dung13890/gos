<?php

namespace App\Repositories;

use App\Model\Room;
use App\Contracts\Repositories\RoomRepository;

class RoomRepositoryEloquent extends AbstractRepositoryEloquent implements RoomRepository
{
    public function __construct(Room $model)
    {
        parent::__construct($model);
    }
}
