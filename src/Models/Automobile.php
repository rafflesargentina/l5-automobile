<?php

namespace RafflesArgentina\Automobile\Models;

use Illuminate\Database\Eloquent\Model;

use Laracasts\Presenter\PresentableTrait;

use RafflesArgentina\FilterableSortable\FilterableSortableTrait;

use RafflesArgentina\Automobile\Filters\AutomobileFilters;
use RafflesArgentina\Automobile\Sorters\AutomobileSorters;
use RafflesArgentina\Automobile\Presenters\AutomobilePresenter;

class Automobile extends Model
{
    use PresentableTrait, FilterableSortableTrait;

    protected $table;

    protected $perPage;

    protected $fillable = [
        'id',
        'type',
        'brand',
        'model',
        'y2017',
        'y2016',
        'y2015',
        'y2014',
        'y2013',
        'y2012',
        'y2011',
        'y2010',
        'y2009',
        'y2008',
        'y2007',
        'y2006',
        'y2005',
        'y2004',
        'y2003',
        'y2002',
        'y2001',
        'y2000',
        'y1999',
        'y1998',
        'y1997',
        'y1996',
        'y1995',
        'y1994',
        'y1993',
        'y1992',
        'source',
        'factory',
        'type_id',
        'brand_id',
        'model_id',
        'factory_id',
        'factory_type',
        'factory_type_id',
    ];

    protected $filters;

    protected $sorters;

    protected $presenter;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->table = config('automobile.table_name') ?: 'automobiles';

        $this->filters = config('automobile.filters') ?: AutomobileFilters::class;

        $this->perPage = config('automobile.per_page') ?: '25';

        $this->sorters = config('automobile.sorters') ?: AutomobileSorters::class;

        $this->presenter = config('automobile.presenter') ?: AutomobilePresenter::class;
    }

    public $incrementing = false;

    public function getRouteKeyName()
    {
        return 'id';
    }
}
