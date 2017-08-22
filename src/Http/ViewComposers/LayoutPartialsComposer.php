<?php

namespace RafflesArgentina\Automobile\Http\ViewComposers;

use Illuminate\Contracts\View\View;

use RafflesArgentina\Automobile\Repositories\AutomobileRepository;
use RafflesArgentina\Automobile\Repositories\AutomobileTypeRepository;
use RafflesArgentina\Automobile\Repositories\AutomobileBrandRepository;
use RafflesArgentina\Automobile\Repositories\AutomobileModelRepository;

class LayoutPartialsComposer
{
    protected $brand, $automotible;

    public function __construct(AutomobileRepository $automobile,
                                AutomobileTypeRepository $type,
                                AutomobileBrandRepository $brand,
                                AutomobileModelRepository $model)
    {
        $this->Automobile = $automobile;
        $this->AutomobileType = $type;
        $this->AutomobileBrand = $brand;
        $this->AutomobileModel = $model;
    }

    public function composeHeader(View $view)
    {
        $automobilesCount = $this->Automobile->count();
        $automobileTypes = $this->AutomobileType->count();
        $automobileBrandsCount = $this->AutomobileBrand->get()->count();
        $view->with('automobilesCount', $automobilesCount)
             ->with('automobileTypesCount', $automobileTypes)
             ->with('automobileBrandsCount', $automobileBrandsCount);
    }
}
