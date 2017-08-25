<?php

namespace RafflesArgentina\Automobile\Sorters;

use RafflesArgentina\FilterableSortable\QuerySorters;

class AutomobileBrandSorters extends QuerySorters
{
    protected static $defaultOrder = "asc";

    protected static $defaultOrderByKey = "brand";

    public function brand()
    {
        return $this->builder->orderBy('brand', $this->order());
    }

    public function source()
    {
        return $this->builder->orderBy('source', $this->order());
    }

    public function brand_id()
    {
        return $this->builder->orderBy('brand_id', $this->order());
    }
}
