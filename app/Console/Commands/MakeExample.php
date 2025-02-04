<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class MakeExample extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:example';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cria dados de exemplo para tesar recursos da aplicação';

    /**
     * Execute the console command.
     * @return void
     */
    public function handle(): void
    {
        $this->info('Make data exemple: seeding...');
        Artisan::call('db:seed', ['--class' => 'BankAccountSeeder']);
        Artisan::call('db:seed', ['--class' => 'TransactionSeeder']);

        $this->info('App make data example successfully!');
    }
}
