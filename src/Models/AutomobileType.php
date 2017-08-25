<?php

namespace RafflesArgentina\Automobile\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

use Laracasts\Presenter\PresentableTrait;

use RafflesArgentina\FilterableSortable\FilterableSortableTrait;

use RafflesArgentina\Automobile\Filters\AutomobileTypeFilters;
use RafflesArgentina\Automobile\Sorters\AutomobileTypeSorters;
use RafflesArgentina\Automobile\Presenters\AutomobilePresenter;

class AutomobileType extends Model
{
    use PresentableTrait, FilterableSortableTrait;

    protected $table;

    protected $perPage;

    protected $fillable;

    protected $filters;

    protected $sorters;

    protected $presenter;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->table = config('automobile.table_name') ?: 'automobiles';

        $this->filters = config('automobile.type_filters') ?: AutomobileTypeFilters::class;

        $this->perPage = config('automobile.per_page') ?: '25';

        $this->sorters = config('automobile.type_sorters') ?: AutomobileTypeSorters::class;

        $this->presenter = config('automobile.presenter') ?: AutomobilePresenter::class;
    }

    public function getRouteKeyName()
    {
        return 'type_id';
    }

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('type_id', function (Builder $builder) {
            $builder->groupBy('type_id');
        });
    }
}
