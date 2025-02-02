@props(['title', 'description'])

<div {{ $attributes->merge(['class' => 'mb-10 mt-5']) }}>
    <div class="flex flex-wrap gap-5 justify-between items-center">
        {{-- Título --}}
        <div class="">
            <h1 class="text-4xl font-semibold leading-7 text-gray-800 dark:text-gray-200">{{ $title }}</h1>
            @if (isset($description))
                <p class="mt-1 text-base leading-6 text-gray-500 dark:text-gray-400">{{ $description }}</p>
            @endif
        </div>


        {{-- Center --}}
        {{-- Estava justify-center --}}
        @if (isset($center))
            <div class="flex items-center justify-end gap-3 grow order-last sm:order-none">
                {{ $center }}
            </div>
        @endif

        {{-- Actions --}}
        @if (isset($actions))
            <div class="flex items-center gap-3">
                {{ $actions }}
            </div>
        @endif
    </div>
</div>
