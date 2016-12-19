<?php

namespace App\Listeners;

use App\Events\PurchasedProduct;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendUserNotification implements ShouldQueue{

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
     * @param  purchasedProduct  $event
     * @return void
     */
    public function handle(PurchasedProduct $event)
    {
        //
    }

}