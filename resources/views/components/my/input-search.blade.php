@props(['action' => ''])

<form method="GET" action="{{ $action }}" class="flex gap-1">
    <x-my.input name="search" placeholder="Pesquisar" value="{{ old('search', request('search')) }}" />
    <x-my.button type="submit" class="w-full justify-center font-medium sm:text-sm">
        <i class='bx bx-search-alt-2  '></i>
    </x-my.button>
</form>
