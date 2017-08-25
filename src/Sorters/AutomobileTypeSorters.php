<?php

namespace RafflesArgentina\Automobile\Sorters;

use RafflesArgentina\FilterableSortable\QuerySorters;

class AutomobileTypeSorters extends QuerySorters
{
    protected static $defaultOrder = "asc";

    protected static $defaultOrderByKey = "type";

    public function type()
    {
        return $this->builder->orderBy('type', $this->order());
    }

    public function type_id()
    {
        return $this->builder->orderBy('type_id', $this->order());
    }
}
