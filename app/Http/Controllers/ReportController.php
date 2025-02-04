<?php

namespace App\Http\Controllers;

use App\Services\TransactionService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ReportController extends Controller
{
    public function showUploadForm(): View
    {
        return view('statements.report');
    }

    /* public function processUpload(Request $request, TransactionService $transactionService): View
    {
        // dd($request->all());

        // $request->validate([
        //     'transactions_file' => 'required|file|mimes:json,csv',
        //     'statements_file' => 'required|file|mimes:json,csv',
        // ]);

        $x = file_get_contents($request->file('transactions_file'));
        $y = file_get_contents($request->file('statements_file'));
        dump($x, $y);
        dump();

        // Processar arquivos e converter em arrays
        $transactions = json_decode(file_get_contents($request->file('transactions_file')), true);
        $statements = json_decode(file_get_contents($request->file('statements_file')), true);

        dd($transactions, $statements);

        // Comparar transações e lançamentos
        // $result = $transactionService->compareTransactionsWithStatements(
        //     collect($transactions),
        //     collect($statements)
        // );

        return view('report', ['result' => $result]);
    } */
}
