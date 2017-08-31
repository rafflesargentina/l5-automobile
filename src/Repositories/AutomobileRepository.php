<?php

namespace RafflesArgentina\Automobile\Repositories;

use Caffeinated\Repository\Repositories\EloquentRepository;

use RafflesArgentina\Automobile\Models\Automobile;

class AutomobileRepository extends EloquentRepository
{
    public $model = Automobile::class;

    protected $tag = ['Automobile'];

    public function pluckYears()
    {
        $years = [];
        for ($i = \Carbon\Carbon::today()->format('Y'); $i > '1991'; $i--)
        {
            $years[$i] = $i;
        }
        $years = collect($years);
        return $years;
    }

    public function pluckSources()
    {
        $sources = collect([
            'I' => 'Importado',
            'N' => 'Nacional',
        ]); 
        return $sources;
    }

    public function pluckFactoryTypeIds()
    {
        $types = collect([
            'A' => 'Autos, camiones, camionetas, chasis, cuatricilos, todo terreno, tractores, transporte de pasajeros, utilitarios',
            'C' => 'Camiones, chasis, tractores, transportes de pasajeros, utilitarios',
            'M' => 'Motos, ciclomotores, cuatriciclos',
            'Q' => 'Cuatriciclos, camiones, ciclomotores, todo terreno, tractores',
        ]);
        return $types;
    }

    public function s2Dropdown($groupBy, string $pageName = null, $perPage = 25)
    {
        $columns = [$groupBy.' as id', $groupBy.' as text'];

        $cacheKey = $this->generateKey([$columns, null]);

        return $this->cacheResults(get_called_class(), __FUNCTION__, $cacheKey, function () use ($columns, $groupBy, $pageName, $perPage) {

            $page = request()->{$pageName ?: 'page'} ?: 1;
            $offset = ($page - 1) * $perPage;

            $items = $this->withoutGlobalScopes()
                          ->groupBy($groupBy)
                          ->filter()
                          ->sorter()
                          ->select($columns)
                          ->skip($offset)
                          ->take($perPage)
                          ->get()
                          ->toArray();

            $count = count($items);
            $endCount = $offset + $perPage;
            $more = $count > $endCount;

            $results = [
                'results' => $items,
                'pagination' => [
                    'more' => $more
                ],
            ];

            return $results;
        });
    }
}
