<?php

namespace RafflesArgentina\Automobile\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

use Laracasts\Presenter\PresentableTrait;

use RafflesArgentina\FilterableSortable\FilterableSortableTrait;

use RafflesArgentina\Automobile\Filters\AutomobileBrandFilters;
use RafflesArgentina\Automobile\Sorters\AutomobileBrandSorters;
use RafflesArgentina\Automobile\Presenters\AutomobilePresenter;

class AutomobileBrand extends Model
{
    use PresentableTrait, FilterableSortableTrait;

    protected $table;

    protected $perPage;

    protected $fillable;

    protected $filters;

    protected $sorters;

    protected $presenter;

    protected $primaryKey = 'brand_id';

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->table = config('automobile.table_name') ?: 'automobiles';

        $this->filters = config('automobile.brand_filters') ?: AutomobileBrandFilters::class;

        $this->perPage = config('automobile.per_page') ?: '25';

        $this->sorters = config('automobile.brand_sorters') ?: AutomobileBrandSorters::class;

        $this->presenter = config('automobile.presenter') ?: AutomobilePresenter::class;
    }

    public $incrementing = false;

    public function getRouteKeyName()
    {
        return 'brand_id';
    }

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('brand_id', function (Builder $builder) {
            $builder->groupBy('brand_id');
        });
    }
}
