@props([
    'align' => 'right',
    'width' => 'w-48',
])

<x-my.dropdown align="{{ $align }}" width="{{ $width }}"
    label="{{ request('per_page') ? request('per_page') : '10' }}">
    <x-slot name="content">
        <div class="px-2">
            <x-my.dropdown-link href="?per_page=10">
                10
            </x-my.dropdown-link>
            <x-my.dropdown-link href="?per_page=25">
                25
            </x-my.dropdown-link>
            <x-my.dropdown-link href="?per_page=50">
                50
            </x-my.dropdown-link>
            <x-my.dropdown-link href="?per_page=100">
                100
            </x-my.dropdown-link>
        </div>
    </x-slot>
</x-my.dropdown>
