<?php

namespace App\Http\Controllers;

use App\Models\BankAccount;
use App\Models\Transaction;
use Illuminate\View\View;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BankAccount $bankAccount): View
    {
        // Obtêm query strings da URL para ordenar a lista.
        $sortField     = request('sort', 'id');
        $sortDirection = request('direction', 'asc');
        $perPage       = request('per_page', 10);

        // Traduz o nome do campo de ordenação para o nome real do banco de dados.
        if ($sortField == 'dateBr') {
            $sortField = 'date';
        }

        // Listar todas as transações, a partir do argumento BankAccount.
        $dados = Transaction::query()
            ->where('bank_account_id', $bankAccount->id)
            ->orderBy($sortField, $sortDirection)
            ->paginate($perPage);

        // Anexa o argumento sort, nos links de paginação.
        if ($sortField) {
            $dados->appends(['sort' => $sortField]);
        }

        // Anexa o argumento direction, nos links de paginação.
        if ($sortDirection) {
            $dados->appends(['direction' => $sortDirection]);
        }

        // Anexa o argumento per_page, nos links de paginação.
        if ($perPage) {
            $dados->appends(['per_page' => $perPage]);
        }

        return view('transactions.index', compact('dados', 'bankAccount'));
    }
}
