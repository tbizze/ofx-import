<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            // Chave estrangeira: Banco.
            $table->foreignId('transaction_header_id')->after('bank_account_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            // Remove o relacionamento com a tabela 'users'.
            $table->dropForeign('transaction_header_id_foreign');
            // Remove a coluna 'tenant_id' da tabela.
            $table->dropColumn('transaction_header_id');
        });
    }
};
