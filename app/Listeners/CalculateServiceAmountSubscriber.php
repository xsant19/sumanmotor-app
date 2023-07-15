<?php

namespace App\Listeners;

use App\Events\ServiceCreated;
use App\Events\ServiceDeleted;
use App\Events\ServiceUpdated;
use Illuminate\Events\Dispatcher;

class CalculateServiceAmountSubscriber
{
    public function recalculate($event)
    {
        $service = $event->service;
        $order = $service->order;

        $grandtotal = $order->services->sum('harga_service');

        $order->total_harga = $grandtotal;
        $order->save();

    }

    /**
     * Register the listeners for the subscriber.
     */
    public function subscribe(Dispatcher $events): void
    {
        $events->listen(
            ServiceCreated::class,
            [CalculateServiceAmountSubscriber::class, 'recalculate']
        );

        $events->listen(
            ServiceUpdated::class,
            [CalculateServiceAmountSubscriber::class, 'recalculate']
        );

        $events->listen(
            ServiceDeleted::class,
            [CalculateServiceAmountSubscriber::class, 'recalculate']
        );
    }
}
