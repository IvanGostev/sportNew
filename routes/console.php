<?php

use App\Console\Commands\AutorenewalCommand;
use App\Console\Commands\CheckSubscriptionCommand;
use App\Console\Commands\ClearOrderCommand;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();



Schedule::command('subscription:check')->hourly();
Schedule::command('payment:autorenewal')->hourly();
Schedule::command('order:clear')->everyTenMinutes();
//Schedule::command('app:test-command')->hourly();

