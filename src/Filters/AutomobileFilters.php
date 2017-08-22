<?php

namespace RafflesArgentina\Automobile\Filters;

use RafflesArgentina\FilterableSortable\QueryFilters;

class AutomobileFilters extends QueryFilters
{
    public function type($query)
    {
        return $this->query->where('type', $query);
    }

    public function brand($query)
    {
        return $this->query->where('brand', $query);
    }

    public function model($query)
    {
        return $this->query->where('model', $query);
    }
}
