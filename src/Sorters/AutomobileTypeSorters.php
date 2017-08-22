<?php

namespace RafflesArgentina\Automobile\Sorters;

use RafflesArgentina\FilterableSortable\QuerySorters;

class AutomobileTypeSorters extends QuerySorters
{
    protected static $defaultOrder = "asc";

    protected static $defaultOrderByKey = "type_id";

    public function type_id()
    {
        return $this->builder->orderBy('type_id', $this->order());
    }
}
