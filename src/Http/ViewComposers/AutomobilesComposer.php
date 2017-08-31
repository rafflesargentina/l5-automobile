<?php

namespace RafflesArgentina\Automobile\Http\ViewComposers;

use Illuminate\Contracts\View\View;

use RafflesArgentina\Automobile\Sorters\AutomobileSorters;
use RafflesArgentina\Automobile\Repositories\AutomobileRepository;

class AutomobilesComposer
{
    protected $sorters, $automobile;

    public function __construct(AutomobileSorters $sorters, AutomobileRepository $automobile)
    {
        $this->sorters = $sorters;
        $this->Automobile = $automobile;
    }

    public function composeIndex(View $view)
    {
        $view->with('order', $this->sorters->order())
             ->with('orderBy', $this->sorters->orderBy())
             ->with('sources', $this->Automobile->pluckSources())
             ->with('orderByKeys', AutomobileSorters::listOrderByKeys());
    }

    public function composeCreate(View $view)
    {
        $view->with('sources', $this->Automobile->pluckSources());
    }

    public function composeShow(View $view)
    {
        //
    }

    public function composeEdit(View $view)
    {
        $view->with('years', $this->Automobile->pluckYears())
             ->with('types', $this->Automobile->findBy('id', request()->route('automobile'))->pluck('type', 'type'))
             ->with('brands', $this->Automobile->findBy('id', request()->route('automobile'))->pluck('brand', 'brand'))
             ->with('sources', $this->Automobile->pluckSources());
    }
}
