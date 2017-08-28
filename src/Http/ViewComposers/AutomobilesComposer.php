<?php

namespace RafflesArgentina\Automobile\Http\ViewComposers;

use Illuminate\Contracts\View\View;

use RafflesArgentina\Automobile\Repositories\AutomobileRepository;

class AutomobilesComposer
{
    protected $automobile;

    public function __construct(AutomobileRepository $automobile)
    {
        $this->Automobile = $automobile;
    }

    public function composeIndex(View $view)
    {
        //
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
        $view->with('brands', $this->Automobile->findBy('id', request()->route('automobile'))->pluck('brand', 'brand'))
             ->with('types', $this->Automobile->findBy('id', request()->route('automobile'))->pluck('type', 'type'))
             ->with('sources', $this->Automobile->pluckSources());
    }
}
