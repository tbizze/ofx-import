<?php

namespace App\Http\Controllers;

use App\Models\BankAccount;
use Illuminate\View\View;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BankAccount $bankAccount): View
    {
        // Listar todas as transações, a partir do argumento BankAccount.
        $transactions = $bankAccount->transactions;

        return view('transactions.index', compact('transactions', 'bankAccount'));
    }
}
