<?php

namespace Database\Seeders;

use App\Models\BankAccount;
use App\Models\Transaction;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $dados = $this->makeTransactions(2);
        //dd($dados);

        foreach ($dados as $item) {
            // Salva no BD documento criado.
            $x = Transaction::create($item);
        }
        dd($x);

        if (count($documentos) > 0) {
            // Abre uma transaction para salvar no BC os dados fake criado
            DB::transaction(function () use ($documentos) {

                // Limpar a tabela de contas bancárias para garantir um novo estado inicial.
                Transaction::query()->delete();

                foreach ($documentos as $item) {
                    // Salva no BD documento criado.
                    Transaction::create($item);
                }
            });
            //dd('Documentos criados com sucesso!');
        } else {
            dump('Nenhum documento criado');
        }
    }

    public function makeTransactions(int $qdeTransactions = 1, $startDate = '-1 month', $endDate = '-1 days')
    {
        // Inicia o gerador de dados fake.
        $faker = Faker::create('pt_BR');

        // Recuperar todas as empresas cadastradas.
        $bankAccounts = BankAccount::all()->pluck('id');

        $documentos = [];

        foreach ($bankAccounts as $item) {
            for ($count = 1; $count <= $qdeTransactions; $count++) {
                $documentos[] = [
                    'bank_account_id' => $item,
                    'description'     => $faker->sentence(3),
                    'type'            => $faker->randomElement(['credit', 'debit']),
                    'amount'          => $faker->randomFloat(2, 17.45, 862.13),
                    'date'            => $faker->dateTimeBetween($startDate, $endDate),
                    'fitid'           => $faker->bothify('########'),
                    'checknum'        => $faker->bothify('########'),
                ];
            }
        }

        return collect($documentos);
    }
}
