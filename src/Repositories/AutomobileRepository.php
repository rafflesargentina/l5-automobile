<?php

namespace RafflesArgentina\Automobile\Repositories;

use Caffeinated\Repository\Repositories\EloquentRepository;

use RafflesArgentina\Automobile\Models\Automobile;

class AutomobileRepository extends EloquentRepository
{
    public $model = Automobile::class;

    protected $tag = [
        'created'  => 'AutomobileCreated',
        'updated'  => 'AutomobileUpdated',
        'deleted'  => 'AutomobileDeleted',
    ];

    public function pluckSources()
    {
        return [
            'I' => 'Importado',
            'N' => 'Nacional',
        ]; 
    }
}
