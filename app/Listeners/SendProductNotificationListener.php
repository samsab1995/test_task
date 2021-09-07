<?php

namespace App\Listeners;

use App\Events\ProductCreatedEvent;
use App\Mail\ProductDetailMail;
use Illuminate\Support\Facades\Mail;

class SendProductNotificationListener
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
     * @param ProductCreatedEvent $event
     * @return void
     */
    public function handle(ProductCreatedEvent $event)
    {
        Mail::to($event->product->user->email)->send(new ProductDetailMail($event->product));
    }
}
