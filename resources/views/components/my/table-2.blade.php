@props([
    'columns',
    'records',
    'baseRoute',
    'sort' => null,
    'classCell' => null,
    'showHeading' => true,
    'showColumnsHeading' => true,
    'showTableActions' => false,
    'title' => '',
    //  'showTableFilters' => true,
    //  'showTablePagination' => true,
    //  'search' => null,
    //  'searchPlaceholder' => 'Pesquisar...',
    //  'perPage' => 10,
    //  'currentPage' => 1,
    //  'totalRecords' => null,
    //  'actions' => null,
    //  'paginationStyle' => 'simple',
    //  'paginationLinks' => 5,
    //  'showPerPageSelect' => true,
    //  'showTotalRecords' => true,
    //  'showPaginationInfo' => true,
    //  'showTableSearch' => true,
])

<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
    @if ($showHeading == true)
        <div class="p-5 flex justify-between items-center">
            <div class="text-lg font-bold dark:text-gray-300">
                {{ $title }}
            </div>
            <x-my.button style="flat" class=" rounded-xl">Ver</x-my.button>
        </div>
    @endif

    <div
        class="px-2 pt-2 pb-5 bg-gradient-to-b from-gray-200/30 dark:from-gray-700/30 via-10% via-gray-50/10 to-white dark:to-gray-800">
        <table class="min-w-full dark:text-gray-400 text-gray-700">

            @if ($showColumnsHeading == true)
                <thead class="text-gray-400 dark:text-gray-500">
                    <tr>
                        @foreach ($columns as $column)
                            <th scope="col" class="px-3 py-2 text-left text-xs font-black uppercase tracking-wider">
                                @if (array_key_exists('sort', $column))
                                    <a class="flex justify-between"
                                        href="?sort={{ $column['field'] }}&direction={{ request('sort') == $column['field'] && request('direction') == 'asc' ? 'desc' : 'asc' }}">
                                        <span>{{ $column['name'] }}</span>
                                        @if (request('sort') == $column['field'])
                                            <span>
                                                @if (request('direction') == 'asc')
                                                    &uarr;
                                                @else
                                                    &darr;
                                                @endif
                                            </span>
                                        @else
                                            &#8597;
                                        @endif
                                    </a>
                                @else
                                    {{ $column['name'] }}
                                @endif
                            </th>
                        @endforeach
                        @if ($showTableActions == true)
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Ações</span>
                            </th>
                        @endif
                    </tr>
                </thead>
            @endif
            <tbody class="">
                @foreach ($records as $record)
                    <tr class="dark:hover:bg-gray-700 hover:bg-gray-100">
                        @foreach ($columns as $column)
                            @php
                                $classCell = array_key_exists('classCell', $column) ? $column['classCell'] : '';
                                $classField = array_key_exists('classField', $column) ? $column['classField'] : '';
                                $itensBadge = array_key_exists('itensBadge', $column) ? $column['itensBadge'] : false;

                                if (!isset($fields)) {
                                    $fields = [];
                                }

                                if (!isset($listColors)) {
                                    $listColors = [];
                                }

                                if (array_key_exists('badgeColors', $column)) {
                                    // Quando está iniciando, listColors vazio
                                    if (count($listColors) == 0) {
                                        // Inicializamos um array para armazenar as associações de status com cores
                                        $statusColorMap = [];

                                        // Variável para controlar o índice da cor atual
                                        $colorIndex = 0;

                                        // Obtemos as cores disponíveis
                                        $listColors = $column['badgeColors'];
                                    }

                                    // Obtemos o valor do campo do item
                                    $itemField = $record->{$column['field']};

                                    // Verificamos se o status já está associado a uma cor
                                    if (isset($statusColorMap[$itemField])) {
                                        // Se já estiver associado, usamos a mesma cor
                                        $color = $statusColorMap[$itemField];
                                    } else {
                                        // Caso contrário, associamos o status à próxima cor na lista
                                        $color = $listColors[$colorIndex];

                                        // Armazenamos a associação no mapa
                                        $statusColorMap[$itemField] = $color;

                                        // Incrementamos o índice, reiniciando se atingirmos o fim da lista
                                        $colorIndex = ($colorIndex + 1) % count($listColors);
                                    }
                                }
                            @endphp
                            <td class="px-3 py-3 whitespace-nowrap text-sm  {{ $classCell }}">
                                @if ($itensBadge)
                                    <x-my.badge type='' color='{{ $color }}'
                                        value="{{ $record->{$column['field']} }}" />
                                @else
                                    {{ $record->{$column['field']} }}
                                @endif
                            </td>
                        @endforeach
                        @if ($showTableActions == true)
                            <td class="flex items-center">
                                {{-- <span class="">1</span>
                    <span class="">2</span> --}}
                                <a href="{{ route($baseRoute . '.edit', $record->id) }}"
                                    class=" text-gray-500 hover:text-gray-800">
                                    <x-icons.edit-icon />
                                </a>

                                <x-my.modal-delete :itemId="$record->id" deleteRoute="{{ $baseRoute }}.destroy">
                                    <button @click="open = true" class=" mt-1.5 text-red-500 hover:text-red-800">
                                        <x-icons.delete-icon />
                                    </button>
                                </x-my.modal-delete>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
