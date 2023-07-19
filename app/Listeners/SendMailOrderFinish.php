<?php

namespace App\Listeners;

use App\Events\OrderUpdated;
use App\Mail\OrderFinish;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendMailOrderFinish
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(OrderUpdated $event): void
    {
        $order = $event->order;
        $user = $order->user;
        Log::info('send email');
        if ($order->status_order == 'Selesai') {
            Mail::to($user->email)->send(new OrderFinish($order));
        }
    }
}
