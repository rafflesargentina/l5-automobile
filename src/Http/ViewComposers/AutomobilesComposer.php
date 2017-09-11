<?php

namespace RafflesArgentina\Automobile\Http\ViewComposers;

use Illuminate\Contracts\View\View;

use RafflesArgentina\Automobile\Filters\AutomobileFilters;
use RafflesArgentina\Automobile\Sorters\AutomobileSorters;
use RafflesArgentina\Automobile\Repositories\AutomobileRepository;

class AutomobilesComposer
{
    protected $sorters, $automobile;

    public function __construct(AutomobileSorters $sorters,
                                AutomobileRepository $automobile)
    {
        $this->sorters = $sorters;
        $this->Automobile = $automobile;
    }

    public function composeIndex(View $view)
    {
        $appliedFilters = AutomobileFilters::getAppliedFilters();
        $appliedSorters = $this->sorters->getAppliedSorters();
        $appliedFiltersAndSorters = $appliedFilters;
        $appliedFiltersAndSorters += $appliedSorters;

        $view->with('order', $this->sorters->order())
             ->with('orderBy', $this->sorters->orderBy())
             ->with('sources', $this->Automobile->pluckSources())
             ->with('orderByKeys', AutomobileSorters::listOrderByKeys())
             ->with('appliedFilters', $appliedFilters)
             ->with('appliedSorters', $appliedSorters)
             ->with('factoryTypeIds', $this->Automobile->pluckFactoryTypeIds())
             ->with('appliedFiltersAndSorters', $appliedFiltersAndSorters);
    }

    public function composeCreate(View $view)
    {
        $types = $this->Automobile->findWhere(['type', request()->get('type') ?: old('type')]);
        $types = $types ? $types->pluck('type', 'type') : [];
        $brands = $this->Automobile->findWhere(['brand', request()->get('brand') ?: old('brand')]);
        $brands = $brands ? $brands->pluck('brand', 'brand') : [];
        $view->with('years', $this->Automobile->pluckYears())
             ->with('types', $types)
             ->with('brands', $brands)
             ->with('sources', $this->Automobile->pluckSources())
             ->with('factoryTypeIds', $this->Automobile->pluckFactoryTypeIds());
    }

    public function composeShow(View $view)
    {
        //
    }

    public function composeEdit(View $view)
    {
        $automobile = $this->Automobile->findWhere(['id' => request()->route('automobile')]);
        $types = $automobile ? $automobile->pluck('type', 'type') : [];
        $brands = $automobile ? $automobile->pluck('brand', 'brand') : [];
        $view->with('years', $this->Automobile->pluckYears())
             ->with('types', $types)
             ->with('brands', $brands)
             ->with('sources', $this->Automobile->pluckSources())
             ->with('factoryTypeIds', $this->Automobile->pluckFactoryTypeIds());
    }
}
