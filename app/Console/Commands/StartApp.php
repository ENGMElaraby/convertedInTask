<?php

namespace App\Console\Commands;

use Illuminate\{Console\Command, Support\Facades\Artisan};

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
    public function handle(): void
    {
        $this->info(string: 'Docker finished...');
        $this->info(string: 'Clear & optimize...');
        Artisan::call(command: 'config:clear');
        Artisan::call(command: 'cache:clear');
        Artisan::call(command: 'optimize:clear');

        $this->info(string: 'Migrate Database & Seed...');
        Artisan::call(command: 'migrate');
        Artisan::call(command: 'db:seed --class=UserSeeder');

        $this->info(string: 'Starting the application...');
    }

}
