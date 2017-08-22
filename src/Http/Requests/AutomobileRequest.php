<?php

namespace RafflesArgentina\Automobile\Http\Requests;

use Illuminate\Validation\Rule;

use RafflesArgentina\ActionBasedFormRequest\ActionBasedFormRequest;

use RafflesArgentina\Automobile\Sorters\AutomobileSorters;
use RafflesArgentina\Automobile\Repositories\AutomobileRepository;

class AutomobileRequest extends ActionBasedFormRequest
{
    public static function index()
    {
        return [
            'show' => 'numeric|min:1|max:400',
            'order' => 'in:asc,desc',
            'orderBy' => Rule::in(array_keys(AutomobileSorters::listOrderByKeys())),
            'brand' => 'max:50',
            'type' => 'max:50',
            'model' => 'max:50',
        ];
    }

    public static function store()
    {
        return [
            'id' => 'required|alpha_num|min:7|max:8',
            'type' => 'required|min:3|max:50',
            'brand' => 'required|min:3|max:50',
            'model' => 'required|min:3|max:50',
            'y1992' => 'nullable|numeric',
            'y1993' => 'nullable|numeric',
            'y1994' => 'nullable|numeric',
            'y1995' => 'nullable|numeric',
            'y1996' => 'nullable|numeric',
            'y1997' => 'nullable|numeric',
            'y1998' => 'nullable|numeric',
            'y1999' => 'nullable|numeric',
            'y2000' => 'nullable|numeric',
            'y2001' => 'nullable|numeric',
            'y2002' => 'nullable|numeric',
            'y2003' => 'nullable|numeric',
            'y2004' => 'nullable|numeric',
            'y2005' => 'nullable|numeric',
            'y2006' => 'nullable|numeric',
            'y2007' => 'nullable|numeric',
            'y2008' => 'nullable|numeric',
            'y2009' => 'nullable|numeric',
            'y2010' => 'nullable|numeric',
            'y2011' => 'nullable|numeric',
            'y2012' => 'nullable|numeric',
            'y2013' => 'nullable|numeric',
            'y2014' => 'nullable|numeric',
            'y2015' => 'nullable|numeric',
            'y2016' => 'nullable|numeric',
            'y2017' => 'nullable|numeric',
            'source' => 'required|min:3|max:25',
            'type_id' => 'required|numeric|digits:2',
            'brand_id' => 'required|alpha_num|min:2|max:3',
            'factory_id' => 'nullable|numeric|digits:3',
        ];
    }

    public static function update()
    {
        return static::store();
    }
}
