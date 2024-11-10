<?php

namespace App\Console\Commands;

use App\Http\Controllers\PaymentController;
use App\Models\User;
use Illuminate\Console\Command;

class AutorenewalCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'payment:autorenewal';

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
        $users = User::where('autorenewal', 1)
            ->where('paid', 0)
            ->get();

        foreach ($users as $user) {
            $payment = new PaymentController();
            $payment->renewal($user);
        }
    }
}
