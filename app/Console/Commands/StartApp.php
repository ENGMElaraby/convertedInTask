<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class StartApp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:start-app';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Start the application with necessary setup';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Clear config and cache
        Artisan::call('config:clear');
        Artisan::call('cache:clear');

        // Migrate database
        Artisan::call('migrate');

        // Seed database
        Artisan::call('db:seed --class=UserSeeder');

        // Run the application
        $this->info('Starting the application...');
        Artisan::call('serve');
    }

}
