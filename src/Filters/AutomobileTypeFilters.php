<?php

namespace RafflesArgentina\Automobile\Filters;

use RafflesArgentina\FilterableSortable\QueryFilters;

class AutomobileTypeFilters extends QueryFilters
{
    public function term($query)
    {
        return $this->builder->where(\DB::raw('CONCAT(type, " ",type_id)'), 'LIKE', '%'.$query.'%');
    }

    public function type($query)
    {
        return $this->builder->where('type', $query);
    }

    public function type_id($query)
    {
        return $this->builder->where('type_id', $query);
    }
}
