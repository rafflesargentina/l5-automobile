<?php

namespace RafflesArgentina\Automobile\Sorters;

use RafflesArgentina\FilterableSortable\QuerySorters;

class AutomobileSorters extends QuerySorters
{
    protected static $defaultOrder = "asc";

    protected static $defaultOrderByKey = "id";

    public function id()
    {
        return $this->builder->orderBy('id', $this->order());
    }
}
