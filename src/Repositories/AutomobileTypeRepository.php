<?php

namespace RafflesArgentina\Automobile\Repositories;

use Caffeinated\Repository\Repositories\EloquentRepository;

use RafflesArgentina\Automobile\Models\AutomobileType;

class AutomobileTypeRepository extends EloquentRepository
{
    public $model = AutomobileType::class;

    protected $tag = 'AutomobileType';
}
