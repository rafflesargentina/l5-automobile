<?php

namespace RafflesArgentina\Automobile\Filters;

use RafflesArgentina\FilterableSortable\QueryFilters;

class AutomobileBrandFilters extends QueryFilters
{
    public function term($query)
    {
        return $this->builder->where(\DB::raw('CONCAT(brand, " ",brand_id)'), 'LIKE', '%'.$query.'%');
    }

    public function brand($query)
    {
        return $this->builder->where('brand', $query);
    }

    public function source($query)
    {
        return $this->builder->where('source', $query);
    }

    public function brand_id($query)
    {
        return $this->builder->where('brand_id', $query);
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
