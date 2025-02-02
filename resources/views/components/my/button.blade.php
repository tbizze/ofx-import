@props([
    'style' => 'primary',
    'label' => null,
    'badge' => null,
    'badgeClasses' => null,
    'responsive' => null,
    'href' => null,
    'link' => null,
])
@php
    if (!isset($badgeClasses)) {
        $badgeClasses = ' bg-gray-500';
    }

    $buttonRelative = isset($badge) ? ' relative' : '';

    switch ($style) {
        case 'danger':
            $alignmentClasses =
                'text-white bg-red-600 border-transparent hover:bg-red-700 focus:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2';
            break;
        case 'warning':
            $alignmentClasses =
                'text-gray-900 bg-[#ffbe00] border-transparent hover:bg-[#E7A500] focus:bg-[#E7A500] focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2';
            break;
        case 'secondary':
            $alignmentClasses =
                'text-gray-700 dark:text-gray-200 bg-white dark:bg-gray-800 border-gray-300 dark:border-gray-700 dark:hover:bg-gray-700 hover:bg-gray-100 focus:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2';
            break;
        case 'flat':
            $alignmentClasses =
                'text-gray-700 dark:text-gray-200 bg-gray-100 dark:bg-gray-700 border-transparent dark:hover:bg-gray-600 hover:bg-gray-200 focus:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2';
            break;
        case 'primary':
        default:
            $alignmentClasses =
                'text-white dark:text-gray-200 bg-gray-800 dark:bg-gray-700 border-transparent hover:bg-gray-700 dark:hover:bg-gray-600 focus:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2';
            break;
    }
@endphp

@if ($link)
    <a href="{{ $href }}"
        {{ $attributes->merge([
            'class' => "inline-flex items-center px-4 py-2 gap-2 border rounded-md font-semibold text-sm tracking-widest   
                                                                                                                                    active:bg-gray-900 transition ease-in-out duration-150 $alignmentClasses $buttonRelative",
        ]) }}>
    @else
        <button
            {{ $attributes->merge([
                'type' => 'button',
                'class' => "inline-flex items-center px-4 py-2 gap-2 border rounded-md font-semibold text-sm tracking-widest 
                                                                                                                                                                                            active:bg-gray-900 transition ease-in-out duration-150 $alignmentClasses $buttonRelative",
            ]) }}>
@endif

@if (strlen($badge ?? '') > 0)
    <!-- BADGE -->
    <span class="absolute -top-3 -right-3 px-2.5 py-0.5 rounded-full text-xs {{ $badgeClasses }}">{{ $badge }}
    </span>
@endif

@if ($label)
    <!-- LABEL / SLOT -->
    <span @class(['hidden lg:block' => $responsive])>
        {{ $label }}
    </span>
@else
    {{ $slot }}
@endif

@if ($link)
    </a>
@else
    </button>
@endif

{{-- @if ($attributes->has(['name', 'class']))
    <div>All of the attributes are present</div>
@endif --}}
{{-- 'class' => 'inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150']) }}> --}}
{{-- 'bg-gray-800 text-white' => $hasError --}}
