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

    public function brand($query)
    {
        return $this->builder->where('brand', $query);
    }

    public function type_id($query)
    {
        return $this->builder->where('type_id', $query);
    }

    public function factory_type($query)
    {
        return $this->builder->where('factory_type', $query);
    }

    public function factory_type_id($query)
    {
        return $this->builder->where('factory_type_id', $query);
    }
}
