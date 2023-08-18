<?php

namespace App\Console\Commands;

use App\Mail\OrderCompletedReminderMail;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendServiceReminderEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-service-reminder-email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $now = Carbon::now("+08:00");
        $orders = Order::whereDate('close_at', $now->subMonth(2)->format('Y-m-d'))->get();

        foreach ($orders as $order) {
            $user = $order->user;
            Mail::to($user->email)->send(new OrderCompletedReminderMail($order));
        }
    }
}
