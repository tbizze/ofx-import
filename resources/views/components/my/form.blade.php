{{-- @props(['submit']) --}}

<form {{ $attributes->whereDoesntStartWith('class') }}>
    <div {{ $attributes->merge(['class' => 'px-5 mt-5']) }}>
        @csrf
        {{-- Form --}}
        {{ $slot }}
    </div>


    {{-- Actions --}}
    @if (isset($actions))
        <hr class="mt-5 dark:border-gray-700/30" />

        <div class="flex justify-end items-center gap-3 p-3 bg-gray-50 dark:bg-gray-700/15 rounded-b-lg">
            {{ $actions }}
        </div>
    @endif
</form>
