@props(['disabled' => false, 'name', 'label' => null])
{{-- @props(['disabled' => false, 'name', 'label' => null]) --}}

@if ($label)
    <x-my.label for="{{ $name }}" value="{{ $label }}" class="" />
@endif

<input name="{{ $name }}" {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' =>
        'border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm',
]) !!}>

<x-my.input-error for="{{ $name }}" class="mt-1" />
