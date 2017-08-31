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

    public function y1992()
    {
        return '$ '.number_format($this->entity->y1992,2,',','.');
    }

    public function y1993()
    {
        return '$ '.number_format($this->entity->y1993,2,',','.');
    }

    public function y1994()
    {
        return '$ '.number_format($this->entity->y1994,2,',','.');
    }

    public function y1995()
    {
        return '$ '.number_format($this->entity->y1995,2,',','.');
    }

    public function y1996()
    {
        return '$ '.number_format($this->entity->y1996,2,',','.');
    }

    public function y1997()
    {
        return '$ '.number_format($this->entity->y1997,2,',','.');
    }

    public function y1998()
    {
        return '$ '.number_format($this->entity->y1998,2,',','.');
    }

    public function y1999()
    {
        return '$ '.number_format($this->entity->y1999,2,',','.');
    }

    public function y2000()
    {
        return '$ '.number_format($this->entity->y2000,2,',','.');
    }

    public function y2001()
    {
        return '$ '.number_format($this->entity->y2001,2,',','.');
    }

    public function y2002()
    {
        return '$ '.number_format($this->entity->y2002,2,',','.');
    }

    public function y2003()
    {
        return '$ '.number_format($this->entity->y2003,2,',','.');
    }

    public function y2004()
    {
        return '$ '.number_format($this->entity->y2004,2,',','.');
    }

    public function y2005()
    {
        return '$ '.number_format($this->entity->y2005,2,',','.');
    }

    public function y2006()
    {
        return '$ '.number_format($this->entity->y2006,2,',','.');
    }

    public function y2007()
    {
        return '$ '.number_format($this->entity->y2007,2,',','.');
    }

    public function y2008()
    {
        return '$ '.number_format($this->entity->y2008,2,',','.');
    }

    public function y2009()
    {
        return '$ '.number_format($this->entity->y2009,2,',','.');
    }

    public function y2010()
    {
        return '$ '.number_format($this->entity->y2010,2,',','.');
    }

    public function y2011()
    {
        return '$ '.number_format($this->entity->y2011,2,',','.');
    }

    public function y2012()
    {
        return '$ '.number_format($this->entity->y2012,2,',','.');
    }

    public function y2013()
    {
        return '$ '.number_format($this->entity->y2013,2,',','.');
    }

    public function y2014()
    {
        return '$ '.number_format($this->entity->y2014,2,',','.');
    }

    public function y2015()
    {
        return '$ '.number_format($this->entity->y2015,2,',','.');
    }

    public function y2016()
    {
        return '$ '.number_format($this->entity->y2016,2,',','.');
    }

    public function y2017()
    {
        return '$ '.number_format($this->entity->y2017,2,',','.');
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
