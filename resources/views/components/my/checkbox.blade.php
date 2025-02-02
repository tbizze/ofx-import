@props(['label' => null, 'right' => false, 'tight' => false, 'is_check' => false])

<label class="flex gap-1 items-center cursor-pointer  text-md text-gray-700 dark:text-gray-300">
    @if ($right)
        <span @class(['flex-1' => !$tight])>
            {{ $label }}
        </span>
    @endif

    <input type="checkbox" {{ $attributes->whereDoesntStartWith('class') }}
        {{ $attributes->class(['w-5 h-5 rounded dark:bg-gray-800 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800']) }}
        {{ $is_check ? 'checked' : '' }} />

    @if (!$right)
        {{ $label }}
    @endif
</label>
