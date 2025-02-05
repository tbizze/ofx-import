<?php

namespace App\Http\Controllers;

use App\Imports\BankStatementImport;
use App\Imports\TransactionNewImport;
use App\Services\TransactionService;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function showUploadForm(): View
    {
        return view('statements.report');
    }

    // public function processUpload(Request $request, TransactionService $transactionService): View
    public function processUpload(Request $request): View
    {
        //dump($request->all());

        $request->validate([
            'transactions_file' => 'required|file',
            'statements_file'   => 'required|file',
        ]);

        // Importar dados da planilha de extrato.
        $x = Excel::import(new BankStatementImport(), $request->file('statements_file'));

        // Importar dados da planilha de transações de recebimentos.
        $z = Excel::import(new TransactionNewImport(), $request->file('transactions_file'));

        // Comparar transações e lançamentos
        // $result = $transactionService->compareTransactionsWithStatements(
        //     collect($transactions),
        //     collect($statements)
        // );

        return view('statements.report');
        // return view('report', ['result' => $result]);
    }
}
