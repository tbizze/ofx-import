<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Transações') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class=" text-gray-900 dark:text-gray-100">

                    {{-- Chama compomente para exibir flesh message --}}
                    {{-- <x-flash-message /> --}}

                    <!-- Aqui o conteúdo -->
                    <div class="p-5">
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class=" text-red-500">{{ $error }}</div>
                            @endforeach
                        @endif
                    </div>

                    <x-my.form action="{{ route('transactions.process') }}" method="POST" enctype="multipart/form-data"
                        class="">

                        <x-my.input-drag-drop name="file_import"
                            label="Escolha arquivo Excel com eventos para importar" />

                        <x-slot:actions>
                            <x-my.button type="submit">Salvar</x-my.button>
                            <x-my.button link style="secondary"
                                href="{{ route('bank-accounts.index') }}">Cancelar</x-my.button>
                        </x-slot:actions>
                    </x-my.form>



                </div>
            </div>
        </div>
    </div>
</x-app-layout>
