<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Transações') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    {{-- Chama compomente para exibir flesh message --}}
                    {{-- <x-flash-message /> --}}

                    <div class="flex justify-between items-center">
                        <h1 class="py-5 text-xl">Gerenciar Transações:
                            <span class=" text-md">
                                {{ $bankAccount->bank_name }}
                            </span>
                        </h1>
                        <a href="{{ route('bank-accounts.index') }}"
                            class="rounded border-slate-700 bg-slate-700 py-3 px-4">Listar Contas
                        </a>
                    </div>

                    <!-- Aqui o conteúdo -->
                    <x-my.table :records="$dados" baseRoute="categories" showHeading="" :columns="[
                        ['name' => '#', 'field' => 'id', 'sort' => 'true'],
                        ['name' => 'Data', 'field' => 'dateBr', 'sort' => 'true'],
                        ['name' => 'Histórico', 'field' => 'description', 'sort' => 'true'],
                        ['name' => 'Valor', 'field' => 'amountBr', 'sort' => 'true', 'classCell' => 'flex justify-end'],
                        ['name' => 'Tipo', 'field' => 'typeBr', 'sort' => 'true'],
                    ]" />

                    {{-- Paginação --}}
                    <div class="px-4 py-3 text-right sm:px-6">
                        {{ $dados->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
