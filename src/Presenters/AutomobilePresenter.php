<?php

namespace RafflesArgentina\Automobile\Presenters;

use Laracasts\Presenter\Presenter;

class AutomobilePresenter extends Presenter 
{
    public function type()
    {
        return ucfirst(strtolower($this->entity->type));
    }

    public function brand()
    {
        return ucwords(strtolower($this->entity->brand));
    }

    public function source()
    {
        switch($this->entity->source)
        {
            case 'I':
                return 'Importado';
                break;
            case 'N':
                return 'Nacional';
                break;
            default:
                return $this->entity->source;
        }
    }
}
