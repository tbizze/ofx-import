@props(['activeTab'])

<div x-data="{ activeTab: '{{ $activeTab ?? '' }}' }" {{ $attributes->merge(['class' => 'w-full']) }}>
    <div class="flex space-x-4 border-b-2 dark:border-gray-700 mb-5">
        {{ $tabs }}
    </div>
    <div class="">
        {{ $slot }}
    </div>
</div>
