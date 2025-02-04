<?php

namespace App\Services;

use App\Models\BankAccount;
use App\Models\TransactionHeader;
use Illuminate\Support\Collection;
use OfxParser\Parser as OfxParser;

class OfxService
{
    public function __construct()
    {
        //
    }

    /**
     * Processa o conteúdo OFX e retorna uma coleção de transações.
     *
     * @param mixed $ofxContent Conteúdo OFX a ser processado.
     * @return \Illuminate\Support\Collection<int, array{
     *     account_number: string,
     *     bank_number: string,
     *     account_balance: float,
     *     account_balance_date: mixed,
     *     number_transactions: int,
     *     items: array<int, array{
     *         bank_account_id: int|null,
     *         date: mixed,
     *         type: string,
     *         amount: mixed,
     *         description: string,
     *         fitid: mixed,
     *         checknum: string
     *     }>
     * }>
     */
    public function parseOfx(mixed $ofxContent): Collection
    {
        // Instancia o pacote OfxParser e carrega o conteúdo do Ofx enviado.
        $ofxParser = new OfxParser();
        $ofx       = $ofxParser->loadFromFile($ofxContent);

        // Inicializa o array para armazenar as contas com suas transações.
        $transactions = [];

        // Faz loop nas constas do ofx.
        foreach ($ofx->BankAccounts as $account) {

            // Busca um BankAccount no BD, conforme a conta informada no ofx.
            $account_id = $this->getBankAccount($account->accountNumber);

            // Inicializa o array para armazenar as transações de um $account.
            $items = [];
            $i     = 0;

            // Faz loop nas transações deste $account.
            foreach ($account->Statement->transactions as $transaction) {

                // Verifica o tipo de transação, conforme o valor.
                if ($transaction->amount <= 0) {
                    $transaction->type = 'debit';
                } else {
                    $transaction->type = 'credit';
                }

                // Incrementa o contador de transações.
                $i++;

                // Adiciona no array $item os dados da transação.
                $items[] = [
                    'bank_account_id' => $account_id,
                    'date'            => $transaction->date,
                    'type'            => $transaction->type,
                    'amount'          => $transaction->amount,
                    'description'     => $this->cleanDuplicateSpaces($transaction->memo),
                    'fitid'           => $transaction->uniqueId,
                    'checknum'        => (string)$transaction->checkNumber,
                ];
            }

            // Adiciona no array $transactions os dados do $account e suas transações.
            $transactions[] = [
                'account_number'       => (string)$account->accountNumber,
                'bank_number'          => substr((string)$account->routingNumber, -3),
                'account_balance'      => (float)$account->balance,
                'account_balance_date' => $account->balanceDate,
                'number_transactions'  => $i,
                'items'                => $items,
            ];
        }

        return collect($transactions);
    }

    // Método checa se o ofx já foi importando, a partir de argumentos
    public function hasBeenImported(string $bankAccountNumber, mixed $balance_date): bool
    {
        $balance_date = $balance_date->format('Y-m-d');

        dump($bankAccountNumber . ' // ' . $balance_date);

        // Verificação aqui usando seu modelo de banco de dados.
        // O método exists() retorna true quando encontrado algum item, ou false quando não encontrado.
        return TransactionHeader::query()
            ->where('account_number', $bankAccountNumber)
            ->where('account_balance_date', '>=', $balance_date)
            ->exists();
    }

    // Método busca um BankAccount no BD, conforme a conta informada no ofx.
    private function getBankAccount(string $accountNumber): ?int
    {
        $accountNumber = substr($accountNumber, 4);

        return BankAccount::where('account_number', 'like', '%' . $accountNumber . '%')
            ->value('id');
    }

    // Método substitui múltiplos espaços em branco por um único espaço.
    private function cleanDuplicateSpaces(string $string): string
    {
        return preg_replace('/\s+/', ' ', $string);
    }
}
