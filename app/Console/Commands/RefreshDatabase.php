<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class RefreshDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:refresh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reseta o banco de dados e executa os seeders específicos';

    /**
     * Execute the console command.
     * @return void
     */
    public function handle(): void
    {
        $this->info('Reseting database...');
        Artisan::call('migrate:fresh');

        $this->info('Seeding user...');
        Artisan::call('db:seed', ['--class' => 'UserSeeder']);

        $this->info('Database reset: seeded roles, permissions and UserRoot successfully!');
    }
}
