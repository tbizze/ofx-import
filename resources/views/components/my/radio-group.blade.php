@props(['label' => '', 'type' => 'col'])

@php
    $alignmentClasse = $type == 'col' ? ' flex-col gap-1' : ' flex-row gap-4';
@endphp

<div
    {{ $attributes->merge(['class' => 'flex border rounded-lg p-3 shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300' . $alignmentClasse]) }}>
    @if ($label)
        <div class="font-medium text-sm text-gray-500 dark:text-gray-400">{{ $label }}</div>
    @endif

    <div class="flex flex-wrap gap-2">
        {{ $slot }}
    </div>
</div>
