<?php

namespace App\Observers;

use App\Request;

class RequestObserver
{
    /**
     * Handle the request "created" event.
     *
     * @param  \App\Request  $request
     * @return void
     */
    public function created(Request $request)
    {
        //
    }

    /**
     * Handle the request "updated" event.
     *
     * @param  \App\Request  $request
     * @return void
     */
    public function updated(Request $request)
    {
        //
    }

    /**
     * Handle the request "deleted" event.
     *
     * @param  \App\Request  $request
     * @return void
     */
    public function deleted(Request $request)
    {
        //
    }

    /**
     * Handle the request "restored" event.
     *
     * @param  \App\Request  $request
     * @return void
     */
    public function restored(Request $request)
    {
        //
    }

    /**
     * Handle the request "force deleted" event.
     *
     * @param  \App\Request  $request
     * @return void
     */
    public function forceDeleted(Request $request)
    {
        //
    }
}
