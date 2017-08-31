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

    public function type()
    {
        return $this->builder->orderBy('type', $this->order());
    }

    public function brand()
    {
        return $this->builder->orderBy('brand', $this->order());
    }

    public function model()
    {
        return $this->builder->orderBy('model', $this->order());
    }

    public function source()
    {
        return $this->builder->orderBy('source', $this->order());
    }
}
