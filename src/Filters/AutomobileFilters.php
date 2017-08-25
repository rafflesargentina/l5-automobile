<?php

namespace RafflesArgentina\Automobile\Filters;

use RafflesArgentina\FilterableSortable\QueryFilters;

class AutomobileFilters extends QueryFilters
{
    public function term($query)
    {
        return $this->builder->where(\DB::raw('CONCAT(brand, " ",type, " ",model)'), 'LIKE', '%'.$query.'%');
    }

    public function type($query)
    {
        return $this->builder->where('type', $query);
    }

    public function brand($query)
    {
        return $this->builder->where('brand', $query);
    }

    public function model($query)
    {
        return $this->builder->where('model', $query);
    }

    public function type_id($query)
    {
        return $this->builder->where('type_id', $query);
    }

    public function brand_id($query)
    {
        return $this->builder->where('brand_id', $query);
    }

    public function model_id($query)
    {
        return $this->builder->where('model_id', $query);
    }
}
