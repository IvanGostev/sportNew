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
        $myTime = Carbon::now();
        $data = [
            'start' => 'subscription:check',
            'time' => $myTime->toDateTimeString(),
        ];
        Mail::to('ivangostev07@gmail.com')->send(new PaymentNotificationMail($data));
        $users = User::where('paid', 1)->get();
        foreach ($users as &$user) {
            if (Carbon::create($user->day_pay)->addDays($user->subscription_days) < Carbon::now()) {
                $user->paid = 0;
                $user->update();
            }
        }
        $myTime = Carbon::now();
        $data = [
            'finish' => 'subscription:check',
            'time' => $myTime->toDateTimeString(),
        ];
        Mail::to('ivangostev07@gmail.com')->send(new PaymentNotificationMail($data));
    }
}
