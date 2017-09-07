<?php

$alias = config('automobile.alias');
$prefix = config('automobile.prefix');

Route::prefix($prefix)->group(function() use($alias) {

    Route::resource((config('automobile.resource_name') ?: 'automobiles'), 'AutomobilesController', ['as' => $alias]);
    Route::resource((config('automobile.type_resource_name') ?: 'automobile-types'), 'AutomobileTypesController', ['only' => ['index'], 'as' => $alias]);
    Route::resource((config('automobile.brand_resource_name') ?: 'automobile-brands'), 'AutomobileBrandsController', ['only' => ['index'], 'as' => $alias]);
    Route::resource((config('automobile.model_resource_name') ?: 'automobile-models'), 'AutomobileModelsController', ['only' => ['index'], 'as' => $alias]);

    Route::get((config('automobile.resource_name') ?: 'automobiles').'/dropdown/{groupBy}', 'S2DropdownsController', ['as' => $alias]);

});
