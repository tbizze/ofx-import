<?php

namespace Database\Seeders;

use App\Models\BankAccount;
use App\Models\Transaction;
use App\Models\TransactionHeader;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $dados = $this->makeTransactions(15);

        foreach ($dados as $account) {

            // Adiciona no array $transactionHeader os dados da transação.
            $transactionHeader = [
                'account_number'       => $account['account_number'],
                'bank_number'          => $account['bank_number'],
                'account_balance'      => $account['account_balance'],
                'account_balance_date' => $account['account_balance_date'],
                'number_transactions'  => $account['number_transactions'],
            ];
            // Salva no BD o cabeçalho da transação.
            // Obtém o ID do novo cabeçalho de transação para relacionar com as transações.
            $transactionDb = TransactionHeader::create($transactionHeader);

            foreach ($account['items'] as $item) {

                // Adiciona no array $item os dados da transação.
                $item = [
                    'transaction_header_id' => $transactionDb['id'],
                    'bank_account_id'       => $item['bank_account_id'],
                    'date'                  => $item['date'],
                    'type'                  => $item['type'],
                    'amount'                => $item['amount'],
                    'description'           => $item['description'],
                    'fitid'                 => $item['fitid'],
                    'checknum'              => $item['checknum'],
                ];
                // Salva no BD transação criada.
                Transaction::create($item);
            }
        }
    }

    public function makeTransactions(int $qdeTransactions = 1, $startDate = '-1 month', $endDate = '-1 days')
    {
        // Inicia o gerador de dados fake.
        $faker = Faker::create('pt_BR');

        // Recuperar todas as empresas cadastradas.
        $bankAccounts = BankAccount::all();

        // Inicializa o array para armazenar as transações.
        $transactions = [];

        // Faz loop nas contas.
        foreach ($bankAccounts as $item) {

            // Inicializa o array para armazenar as transações de um $account.
            $items = [];

            // Faz loop nas transações.
            for ($count = 1; $count <= $qdeTransactions; $count++) {
                // Adiciona no array $item os dados da transação.
                $items[] = [
                    'bank_account_id' => $item->id,
                    'description'     => $faker->sentence(3),
                    'type'            => $faker->randomElement(['credit', 'debit']),
                    'amount'          => $faker->randomFloat(2, 17.45, 862.13),
                    'date'            => $faker->dateTimeBetween($startDate, $endDate),
                    'fitid'           => $faker->bothify('########'),
                    'checknum'        => $faker->bothify('########'),
                ];
            }
            // Adiciona no array $transactions os dados da transação.
            $transactions[] = [
                'account_number'       => $item->account_number,
                'bank_number'          => $item->bank_id,
                'account_balance'      => $faker->randomFloat(2, 17.45, 862.13),
                'account_balance_date' => $faker->dateTimeBetween($startDate, $endDate),
                'number_transactions'  => $qdeTransactions,
                'items'                => $items,
            ];
        }

        return collect($transactions);
    }
}
