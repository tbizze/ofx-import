@props(['disabled' => false, 'name', 'label' => null, 'value' => ''])

@if ($label)
    <x-my.label for="{{ $name }}" value="{{ $label }}" class="" />
@endif

<div x-data="moneyInput('{{ old($name, $value) }}')" class="relative">
    <span class="absolute left-3 top-2  dark:text-gray-300">R$</span>

    <input x-model="formattedValue" x-on:input="formatInput($event)" x-on:blur="applyFormatting" type="text"
        {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
            'class' =>
                'pl-9 border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm',
        ]) !!} placeholder="0,00" />

    <input type="hidden" name="{{ $name }}" x-model="rawValue">
</div>

<x-my.input-error for="{{ $name }}" class="mt-1" />

@push('scripts')
    <script>
        // Script para mascarar input.
        function moneyInput(initialValue) {
            return {
                rawValue: '',
                formattedValue: '',

                init() {
                    this.setInitialValue(initialValue);
                },

                // A função setInitialValue(value) processa o valor inicial do input monetário, 
                // garantindo que ele seja convertido corretamente para o formato esperado tanto internamente (rawValue)
                // quanto visualmente (formattedValue).
                setInitialValue(value) {

                    /* Explicação:
                    replace(/[^\d,]/g, '') => Remove todos os caracteres que não sejam números (\d) ou vírgula (',').
                    replace(',', '.') => Substitui vírgula por ponto.
                    parseFloat => Converte para número float (decimal).
                    || 0 => Se não for possível converter, retorna 0. 
                    */

                    // Caso valor inicial seja do tipo brasileiro "R$ 1.234,56", processa valor antes de 
                    // chamar a função formatCurrency().

                    // let numericValue = parseFloat(.replace(/[^\d,]/g, '').replace(',', '.')) || 0;
                    //this.rawValue = numericValue.toFixed(2); toFixed(2) => garante que tenha duas casas decimais.


                    // Como valor inicial já está no formato float, não precisa processar.
                    let numericValue = parseFloat(value) || 0;
                    this.rawValue = numericValue.toFixed(2);

                    // Chama a função formatCurrency() para entregar à constante formattedValue valor formatado.
                    this.formattedValue = this.formatCurrency(this.rawValue);
                },

                formatInput(event) {
                    let value = event.target.value.replace(/\D/g, ''); // Remove tudo que não for número
                    this.rawValue = (value / 100).toFixed(2);
                    this.formattedValue = this.formatCurrency(this.rawValue);
                },

                applyFormatting() {
                    this.formattedValue = this.formatCurrency(this.rawValue);
                },

                formatCurrency(value) {
                    return new Intl.NumberFormat('pt-BR', {
                            style: 'currency',
                            currency: 'BRL'
                        })
                        .format(value)
                        .replace('R$', '')
                        .trim();
                }
            };
        }
    </script>
@endpush
