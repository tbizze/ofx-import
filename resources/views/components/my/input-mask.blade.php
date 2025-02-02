@props([
    'type' => 'text',
    'name',
    'label' => '',
    'mask' => '',
    'placeholder' => '',
])

@if ($label)
    <x-my.label for="{{ $name }}" value="{{ $label }}" class="" />
@endif

<input x-data x-ref="input" x-init="let maskOptions = {
    telefone: {
        mask: [
            '(00) 0000-0000', // Para números com 10 dígitos
            '(00) 00000-0000', // Para números com 11 dígitos
        ]
    },
    cpf_cnpj: {
        mask: [
            '000.000.000-00', // Para números com 11 dígitos
            '00.000.000/0000-00', // Para números com 14 dígitos
        ]
    },
    cpf: { mask: '000.000.000-00' },
    cnpj: { mask: '00.000.000/0000-00' },
    cep: { mask: '00000-000' }
};

IMask($refs.input, maskOptions['{{ $mask }}'] || {});" type="{{ $type }}" name="{{ $name }}"
    id="{{ $name }}" placeholder="{{ $placeholder }}"
    {{ $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm']) }} />
<x-my.input-error for="{{ $name }}" class="mt-1" />


@push('scripts')
    <script src="https://unpkg.com/imask"></script>
@endpush
