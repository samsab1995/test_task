<?php

namespace App\Listeners;

use App\Events\ProductCreatedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendProductNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ProductCreatedEvent  $event
     * @return void
     */
    public function handle(ProductCreatedEvent $event)
    {
        //
    }
}
