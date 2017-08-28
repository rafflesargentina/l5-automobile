<?php

namespace RafflesArgentina\Automobile\Repositories;

use Caffeinated\Repository\Repositories\EloquentRepository;

use RafflesArgentina\Automobile\Models\AutomobileBrand;

class AutomobileBrandRepository extends EloquentRepository
{
    public $model = AutomobileBrand::class;

    protected $tag = 'AutomobileBrand';
}
