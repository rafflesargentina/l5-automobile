<?php

namespace RafflesArgentina\Automobile\Http\Requests;

use Illuminate\Validation\Rule;

use RafflesArgentina\ActionBasedFormRequest\ActionBasedFormRequest;

use RafflesArgentina\Automobile\Sorters\AutomobileTypeSorters;
use RafflesArgentina\Automobile\Repositories\AutomobileTypeRepository;

class AutomobileTypeRequest extends ActionBasedFormRequest
{
    public static function index()
    {
        return [
            'show' => 'numeric|min:1|max:400',
            'order' => 'in:asc,desc',
            'orderBy' => Rule::in(array_keys(AutomobileTypeSorters::listOrderByKeys())),
            'source' => 'max:50',
            'brand' => 'max:50',
        ];
    }

    public static function store()
    {
        return [];
    }

    public static function update()
    {
        return [];
    }
}
