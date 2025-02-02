@props(['title' => '', 'data' => ''])
<div
    class="relative flex flex-grow flex-row items-center rounded-[10px] bg-white bg-clip-border shadow-sm  dark:!bg-gray-800 dark:text-white">
    <div class="ml-[18px] flex h-[90px] w-auto flex-row items-center">
        <div class="rounded-full bg-indigo-50 p-3 dark:bg-slate-900/80">
            <span class="flex items-center text-indigo-600 dark:text-white">
                {{ $slot }}
            </span>
        </div>
    </div>
    <div class="h-50 ml-4 flex w-auto flex-col justify-center">
        <p class="font-dm text-sm font-medium text-gray-400 dark:text-gray-400">
            @if (isset($title))
                {{ $title }}
            @endif
        </p>
        <h4 class="text-xl font-bold text-gray-700 dark:text-gray-200">
            @if (isset($data))
                {{ $data }}
            @endif
        </h4>
    </div>
</div>
