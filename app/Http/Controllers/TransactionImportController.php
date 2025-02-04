<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionHeader;
use App\Services\OfxService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TransactionImportController extends Controller
{
    // Método que renderiza a view para upload do arquivo OFX
    public function import(): View
    {
        return view('transactions.import');
    }

    // Método que processa o arquivo OFX
    public function processImport(Request $request): RedirectResponse
    {
        $request->validate([
            'file_import' => 'required|file|mimetypes:application/octet-stream,application/vnd.ms-office,application/x-ofx,text/plain,application/xml,text/xml',
        ]);

        // Checar a extensão do arquivo
        if ($request->file('file_import')->getClientOriginalExtension() !== 'ofx') {
            return redirect()->back()->withErrors(['file_import' => 'O arquivo deve ser um arquivo do tipo: ofx']);
        }

        // Recupera o arquivo enviado na variável $file.
        $file = $request->file('file_import');

        // Usando o OfxService para parsear o arquivo OFX e recuperar os dados
        $service  = new OfxService();
        $dadosOfx = $service->parseOfx($file->getRealPath());

        // Percorre os dados obtidos.
        foreach ($dadosOfx as $account) {

            // Verifica se a conta já foi importada.
            $verifyAccount = $service->hasBeenImported($account['account_number'], $account['account_balance_date']);

            if (!$verifyAccount) {
                // Cria o cabeçalho de transação no banco de dados.
                $transactionHeader = [
                    'account_number'       => $account['account_number'],
                    'bank_number'          => $account['bank_number'],
                    'account_balance'      => $account['account_balance'],
                    'account_balance_date' => $account['account_balance_date'],
                    'number_transactions'  => $account['number_transactions'],
                ];
                $transactionDb = TransactionHeader::create($transactionHeader);

                // Percorre as transações da conta.
                foreach ($account['items'] as $item) {

                    // Cria as transações no banco de dados.
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
                    Transaction::create($item);
                }
            } else {
                return redirect()->route('transactions.import')->with('warning', 'Já existe um extrato importado para esta conta e período: ' . $account['account_number']);
            }
        }

        return redirect()->route('transactions.import')->with('success', 'Extrato importado com sucesso!');
    }
}
