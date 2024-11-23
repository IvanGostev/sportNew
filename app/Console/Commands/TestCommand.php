<?php

namespace App\Console\Commands;

use App\Mail\PaymentNotificationMail;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test-command';

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
            'time' => $myTime->toDateTimeString(),
        ];
        $email = '';
        Mail::to($email)->send(new PaymentNotificationMail($data));
    }
}
