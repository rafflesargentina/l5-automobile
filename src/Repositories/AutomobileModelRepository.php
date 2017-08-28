<?php

namespace RafflesArgentina\Automobile\Repositories;

use Caffeinated\Repository\Repositories\EloquentRepository;

use RafflesArgentina\Automobile\Models\AutomobileModel;

class AutomobileModelRepository extends EloquentRepository
{
    public $model = AutomobileModel::class;

    protected $tag = 'AutomobileModel';
}
