<?php

namespace App\Console\Commands;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Console\Command;

class ClearOrderCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'order:clear';

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
        $orders = Order::where('paid', 0)
            ->get();
        foreach ($orders as &$order) {
            if (Carbon::create($order->created_at)->addMinutes(10) < Carbon::now()) {
                $order->delete();
            }
        }

    }
}
