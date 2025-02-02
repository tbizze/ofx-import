@props([
    'columns',
    'records',
    'baseRoute',
    'sort' => null,
    'classCell' => null,
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
    //  'showTableActions' => true,
    //  'showTableSearch' => true,
    //  'showTableFilters' => true,
    //  'showTablePagination' => true,
])

<table class="min-w-full divide-y divide-gray-200 dark:divide-gray-500 dark:text-gray-400 text-gray-900">
    <thead class="bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            @foreach ($columns as $column)
                <th scope="col" class="px-3 py-3 text-left text-xs font-medium uppercase tracking-wider">
                    @if (array_key_exists('sort', $column))
                        @php
                            $per_page = request('per_page') ? 'per_page=' . request('per_page') : '';
                            $sort = 'sort=' . $column['field'];
                            $direction =
                                'direction=' .
                                (request('sort') == $column['field'] && request('direction') == 'asc' ? 'desc' : 'asc');
                        @endphp
                        <a class="flex justify-between"
                            href="?{{ $sort }}&{{ $direction }}{{ $per_page ? '&' . $per_page : '' }}">
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
                        {{-- <a class="flex justify-between"
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
                        </a> --}}
                    @else
                        {{ $column['name'] }}
                    @endif
                </th>
            @endforeach
            <th scope="col" class="relative px-6 py-3">
                <span class="sr-only">Ações</span>
            </th>
        </tr>
    </thead>
    <tbody class="divide-y divide-gray-200 dark:divide-gray-600">
        @foreach ($records as $record)
            <tr class="dark:bg-gray-800 dark:hover:bg-gray-700 hover:bg-gray-100">
                @foreach ($columns as $column)
                    @php
                        $classCell = array_key_exists('classCell', $column) ? $column['classCell'] : '';
                        $classField = array_key_exists('classField', $column) ? $column['classField'] : '';
                        $itensBadge = array_key_exists('itensBadge', $column) ? $column['itensBadge'] : false;
                        $itemBol = array_key_exists('itemBol', $column) ? $column['itemBol'] : false;
                        $itemArray = array_key_exists('itemArray', $column) ? $column['itemArray'] : false;
                        $itemField = array_key_exists('itemField', $column) ? $column['itemField'] : false;

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
                    <td class="px-3 py-2 whitespace-nowrap text-sm  {{ $classCell }}">
                        @if ($itensBadge)
                            <x-my.badge type='' color='{{ $color }}'
                                value="{{ $record->{$column['field']} }}" />
                        @elseif($itemBol)
                            @if ($record->{$column['field']} == 1)
                                <i class='bx bx-check font-bold text-lg text-green-600'></i>
                            @else
                                <i class='bx bx-stop font-bold text-lg text-red-600'></i></i>
                            @endif
                        @elseif($itemArray)
                            @foreach ($record->{$column['field']} as $x)
                                <x-my.badge type='flat' color='purple'>
                                    {{ $x->{$itemField} }}
                                </x-my.badge>
                            @endforeach
                        @else
                            {{ $record->{$column['field']} }}
                        @endif
                    </td>
                @endforeach
                <td class="flex items-center px-2 justify-end">
                    @can($baseRoute . '.edit')
                        <a href="{{ route($baseRoute . '.edit', $record->id) }}"
                            class=" text-gray-500 hover:text-gray-800">
                            <x-icons.edit-icon />
                        </a>
                    @endcan
                    @can($baseRoute . '.destroy')
                        <x-my.modal-delete :itemId="$record->id" deleteRoute="{{ $baseRoute }}.destroy">
                            <button @click="open = true" class=" mt-1.5 text-red-500 hover:text-red-800">
                                <x-icons.delete-icon />
                            </button>
                        </x-my.modal-delete>
                    @endcan

                </td>
            </tr>
        @endforeach
    </tbody>
</table>
