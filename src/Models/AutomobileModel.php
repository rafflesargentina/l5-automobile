<?php

namespace RafflesArgentina\Automobile\Models;

use Illuminate\Database\Eloquent\Model;

use Laracasts\Presenter\PresentableTrait;

use RafflesArgentina\FilterableSortable\FilterableSortableTrait;

use RafflesArgentina\Automobile\Filters\AutomobileModelFilters;
use RafflesArgentina\Automobile\Sorters\AutomobileModelSorters;
use RafflesArgentina\Automobile\Presenters\AutomobilePresenter;

class AutomobileModel extends Model
{
    use PresentableTrait, FilterableSortableTrait;

    protected $table;

    protected $perPage;

    protected $fillable;

    protected $filters;

    protected $sorters;

    protected $presenter;

    protected $primaryKey = 'model_id';

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->table = config('automobile.table_name') ?: 'automobiles';

        $this->filters = config('automobile.filters') ?: AutomobileModelFilters::class;

        $this->perPage = config('automobile.per_page') ?: '25';

        $this->sorters = config('automobile.sorters') ?: AutomobileModelSorters::class;

        $this->presenter = config('automobile.presenter') ?: AutomobileModelPresenter::class;
    }

    public $incrementing = false;

    public function getRouteKeyName()
    {
        return 'model_id';
    }

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('model_id', function (Builder $builder) {
            $builder->groupBy('model_id');
        });
    }
}
