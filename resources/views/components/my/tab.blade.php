@props(['tab'])

<button type="button" @click="activeTab = '{{ $tab }}'"
    :class="{ 'border-t-4 text-gray-700 dark:text-gray-400 bg-gray-100 dark:bg-gray-700/40': activeTab === '{{ $tab }}', 'text-gray-500 dark:text-gray-400': activeTab !== '{{ $tab }}' }"
    class="text-sm font-semibold rounded-t-md border-b-transparent dark:border-b-transparent border dark:border-gray-700 px-4 py-2 focus:outline-none">
    {{ $slot }}
</button>
