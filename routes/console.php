<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Artisan::command('fresh', function () {
    $this->info('Clearing cache...');
    Artisan::call('cache:clear');
    $this->info('Cache cleared');

    $this->info('Clearing views...');
    Artisan::call('view:clear');
    $this->info('Views cleared');

    $this->info('Clearing routes...');
    Artisan::call('route:clear');
    $this->info('Routes cleared');

    $this->info('Clearing config...');
    Artisan::call('config:clear');
    $this->info('Config cleared');

    // $this->info('Making config cache...');
    // Artisan::call('config:cache');
    // $this->info('Config cache made');

    $this->info('Migrating fresh...');
    Artisan::call('migrate:fresh --seed');
    $this->info('Migration fresh complete');

    $this->info('All done!');
});
