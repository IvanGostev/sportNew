<?php

namespace App\Console\Commands;

use App\Mail\PaymentNotificationMail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class CheckSubscriptionCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'subscription:check';

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
        $users = User::where('paid', 1)->get();
        foreach ($users as &$user) {
            if (Carbon::create($user->day_pay)->addDays($user->subscription_days) < Carbon::now()) {
                $user->paid = 0;
                $user->update();
            }
        }
    }
}
