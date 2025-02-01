<?php

namespace Database\Seeders;

use App\Models\BankAccount;
use Illuminate\Database\Seeder;

class BankAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Criar lista de bancos.
        $banks = [
            [
                'bank_name'      => 'Banco Santander',
                'bank_id'        => '033',
                'account_agency' => '2194',
                'account_number' => '130010584',
            ],
            [
                'bank_name'      => 'Banco Santander',
                'bank_id'        => '033',
                'account_agency' => '3832',
                'account_number' => '130000099',
            ],
            [
                'bank_name'      => 'Banco Itaú',
                'bank_id'        => '341',
                'account_agency' => '9182',
                'account_number' => '090317',
            ],

        ];

        // Gerar contas bancárias para cada empresa.
        foreach ($banks as $item) {
            $x = BankAccount::create($item);
        }
    }
}
