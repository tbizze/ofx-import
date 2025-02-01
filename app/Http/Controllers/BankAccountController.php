<?php

namespace App\Http\Controllers;

use App\Models\BankAccount;
use Illuminate\View\View;

class BankAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        // Pegar as contas bancárias da empresa do usuário autenticado
        $bankAccounts = BankAccount::all();

        return view('transactions.bank-accounts-index', compact('bankAccounts'));
    }
}
