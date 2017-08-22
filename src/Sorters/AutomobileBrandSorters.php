<?php

namespace RafflesArgentina\Automobile\Sorters;

use RafflesArgentina\FilterableSortable\QuerySorters;

class AutomobileBrandSorters extends QuerySorters
{
    protected static $defaultOrder = "asc";

    protected static $defaultOrderByKey = "brand_id";

    public function brand_id()
    {
        return $this->builder->orderBy('brand_id', $this->order());
    }
}
