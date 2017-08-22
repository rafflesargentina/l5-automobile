<?php

namespace RafflesArgentina\Automobile\Observers;

use Log;
use RafflesArgentina\Automobile\Models\Automobile;

class AutomobileObserver
{
    /**
     * Listen to the Automobile created event.
     *
     * @param  Automobile  $automobile
     * @return void
     */
    public function created(Automobile $automobile)
    {
        Log::info("Automobile id {$automobile->id} created.");
    }

    /**
     * Listen to the Automobile creating event.
     *
     * @param  Automobile  $automobile
     * @return void
     */
    public function creating(Automobile $automobile)
    {
        //
    }

    /**
     * Listen to the Automobile updated event.
     *
     * @param  Automobile  $automobile
     * @return void
     */
    public function updated(Automobile $automobile)
    {
        Log::info("Automobile id {$automobile->id} updated.");
    }

    /**
     * Listen to the Automobile updating event.
     *
     * @param  Automobile  $automobile
     * @return void
     */
    public function updating(Automobile $automobile)
    {
        //
    }

    /**
     * Listen to the Automobile deleted event.
     *
     * @param  Automobile  $automobile
     * @return void
     */
    public function deleted(Automobile $automobile)
    {
        Log::info("Automobile id {$automobile->id} deleted.");
    }

    /**
     * Listen to the Automobile deleting event.
     *
     * @param  Automobile  $automobile
     * @return void
     */
    public function deleting(Automobile $automobile)
    {
        //
    }
}
