<?php

use App\Http\Controllers\BankAccountController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TransactionImportController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // Verifica se a aplicação está em modo de desenvolvimento = 'local'
    if (app()->isLocal()) {
        // Faz login como usuário de ID = 1.
        auth()->loginUsingId(1);

        // Redireciona para a view 'dashboard'.
        return to_route('dashboard');
    }

    // Quando aplicação está definido 'production' = produção.
    // Retorna a view 'welcome'.
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Add your application routes here...
    Route::resource('bank-accounts', BankAccountController::class)->except('show');

    // Transações -> resource parcial.
    Route::resource('bank-accounts.transactions', TransactionController::class)->except('show');

    Route::get('/transactions/import', [TransactionImportController::class, 'import'])->name('transactions.import');
    Route::post('/transactions/process', [TransactionImportController::class, 'processImport'])->name('transactions.process');
});
