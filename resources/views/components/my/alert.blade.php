{{-- @if ($errors->any()) --}}
{{-- <div {{ $attributes }}>
        <div class="font-medium text-red-600 dark:text-red-400">{{ __('Whoops! Something went wrong.') }}</div>

        <ul class="mt-3 list-disc list-inside text-sm text-red-600 dark:text-red-400">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div> --}}

<div class="shadow-md p-4 flex flex-row rounded-lg">
    <div class="bg-red-500 inline-block rounded-lg p-1 mr-1"></div>
    <b class="p-1">Erro</b>
    <p class="p-1">Não foi possível salvar o registro! </p>
    <a class="h-5 w-5 text-gray-500 inline-block p-1">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd"
                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                clip-rule="evenodd" />
        </svg>
    </a>
</div>
<div class="shadow-md p-4 flex flex-row rounded-lg">
    <div class="bg-yellow-500 inline-block rounded-lg p-1 mr-1"></div>
    <b class="p-1">Atenção</b>
    <p class="p-1">Ouve uma falha, tente novamente ou contate o desenvolvedor!</p>
    <a class="h-5 w-5 text-gray-500 inline-block p-1">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd"
                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                clip-rule="evenodd" />
        </svg>
    </a>
</div>
<div class="shadow-md p-4 flex flex-row rounded-lg">
    <div class="bg-green-500 inline-block rounded-lg p-1 mr-1"></div>
    <b class="p-1">Sucesso</b>
    <p class="p-1">O registro foi salvo com sucesso!</p>
    <a class="h-5 w-5 text-gray-500 inline-block p-1">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd"
                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                clip-rule="evenodd" />
        </svg>
    </a>
</div>
<div class="shadow-md p-4 flex flex-row rounded-lg">
    <div class="bg-blue-500 inline-block rounded-lg p-1 mr-1"></div>
    <b class="p-1">Informação</b>
    <p class="p-1">O sistema está operando normalmente!</p>
    <a class="h-5 w-5 text-gray-500 inline-block p-1">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd"
                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                clip-rule="evenodd" />
        </svg>
    </a>
</div>
{{-- @endif --}}
