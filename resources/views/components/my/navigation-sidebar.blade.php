<div class="flex flex-col h-full">

    <div class="px-2 py-4 flex justify-between items-center w-full">

        <a href="{{ route('profile.show') }}" class="flex items-center">
            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                {{-- Se ativado ativado --}}
                <img class="rounded-full mx-1 h-10 w-10 object-cover" src="{{ Auth::user()->profile_photo_url }}"
                    alt="{{ Auth::user()->name }}" />

                <div class="flex flex-col leading-4">
                    <span
                        class="text-sm font-medium leading-5 text-gray-800 dark:text-gray-100 truncate w-40">{{ Auth::user()->name }}</span>
                    <span
                        class="text-xs leading-3 text-gray-800 dark:text-gray-400 truncate w-40">{{ Auth::user()->email }}</span>
                </div>
            @else
                {{-- Se Profile Photos desativado --}}
                <div class="flex flex-col leading-4 py-1 pl-4">
                    <span
                        class="text-sm font-medium leading-5 text-gray-800 dark:text-gray-100 truncate w-40">{{ Auth::user()->name }}</span>
                    <span
                        class="text-xs leading-3 text-gray-800 dark:text-gray-400 truncate w-40">{{ Auth::user()->email }}</span>
                </div>
            @endif
        </a>
    </div>

    {{-- Divisor --}}
    <hr class=" border-gray-200 dark:border-gray-700" />

    <!-- Sidebar links -->
    <nav class="flex-1 px-2 py-4 space-y-2 overflow-y-hidden hover:overflow-y-auto">

        <!-- links -->
        <x-my.nav-bar href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
            <x-icons.dashboard-icon />
            <span class="mx-2 font-medium">Dashboard</span>
        </x-my.nav-bar>
        <x-my.nav-bar href="{{ route('events.index') }}" :active="request()->routeIs('events.index')">
            <x-icons.caixas-icon />
            <span class="mx-4 font-medium">Eventos</span>
        </x-my.nav-bar>

        {{-- <x-my.nav-bar href="{{ route('home.index') }}">
            <x-icons.tickets-icon />
            <span class="mx-4 font-medium">Tests</span>
        </x-my.nav-bar> --}}


        <x-my.nav-bar href="#">
            <x-icons.accounts-icon />
            <span class="mx-2 font-medium">Accounts</span>
        </x-my.nav-bar>


        {{-- Divisor --}}
        <hr class="my-6 border-gray-200 dark:border-gray-700" />

        <div class="flex items-center justify-between px-4 py-2 mt-5 text-gray-700">
            <div class="flex items-center">
                <x-icons.tickets-icon />
                <span class="mx-2 font-medium">Grupos</span>
            </div>
            <x-icons.chevron-icon />
        </div>

        {{-- Grupo categorias --}}
        <div class="pb-2 pl-4">
            <x-my.nav-bar href="{{ route('levels.index') }}" :active="request()->routeIs('levels.index')">
                <span class="mx-3 -my-1 font-medium">Níveis</span>
            </x-my.nav-bar>
            <x-my.nav-bar href="{{ route('categories.index') }}" :active="request()->routeIs('categories.index')">
                <span class="mx-3 -my-1 font-medium">Categorias</span>
            </x-my.nav-bar>
            <x-my.nav-bar href="{{ route('locations.index') }}" :active="request()->routeIs('locations.index')">
                <span class="mx-3 -my-1 font-medium">Locais</span>
            </x-my.nav-bar>
            <x-my.nav-bar href="{{ route('responsibles.index') }}" :active="request()->routeIs('responsibles.index')">
                <span class="mx-3 -my-1 font-medium">Responsáveis</span>
            </x-my.nav-bar>
            <x-my.nav-bar href="{{ route('event-statuses.index') }}" :active="request()->routeIs('event-statuses.index')">
                <span class="mx-3 -my-1 font-medium">Estados</span>
            </x-my.nav-bar>
        </div>

        {{-- Divisor --}}
        <hr class="my-6 border-gray-200 dark:border-gray-700" />

        <div class="flex items-center justify-between px-4 py-2 mt-5 text-gray-700">
            <div class="flex items-center">
                <x-icons.tickets-icon />
                <span class="mx-2 font-medium">Campanha</span>
            </div>
            <x-icons.chevron-icon />
        </div>

        {{-- Grupo categorias --}}
        <div class="pb-2 pl-4">
            <x-my.nav-bar href="{{ route('campaigns.index') }}" :active="request()->routeIs('campaigns.index')">
                <span class="mx-3 -my-1 font-medium">Campanhas</span>
            </x-my.nav-bar>
            <x-my.nav-bar href="{{ route('people.index') }}" :active="request()->routeIs('people.index')">
                <span class="mx-3 -my-1 font-medium">Doadores</span>
            </x-my.nav-bar>
            <x-my.nav-bar href="{{ route('contribution-status.index') }}" :active="request()->routeIs('contribution-status.index')">
                <span class="mx-3 -my-1 font-medium">Status</span>
            </x-my.nav-bar>
        </div>

        {{-- Divisor --}}
        <hr class="my-6 border-gray-200 dark:border-gray-700" />

        <div class="flex items-center justify-between px-4 py-2 mt-5 text-gray-700">
            <div class="flex items-center">
                <x-icons.tickets-icon />
                <span class="mx-2 font-medium">Permissões</span>
            </div>
            <x-icons.chevron-icon />
        </div>

        {{-- Grupo categorias --}}
        <div class="pb-2 pl-4">
            <x-my.nav-bar href="{{ route('permissions.index') }}" :active="request()->routeIs('permissions.index')">
                <span class="mx-3 -my-1 font-medium">Permissões</span>
            </x-my.nav-bar>
            <x-my.nav-bar href="{{ route('roles.index') }}" :active="request()->routeIs('roles.index')">
                <span class="mx-3 -my-1 font-medium">Funções</span>
            </x-my.nav-bar>
            <x-my.nav-bar href="{{ route('tenants.index') }}" :active="request()->routeIs('tenants.index')">
                <span class="mx-3 -my-1 font-medium">Inquilinos</span>
            </x-my.nav-bar>
        </div>


        {{-- Divisor --}}
        <hr class="my-6 border-gray-200 dark:border-gray-700" />

        <div class="flex items-center justify-between px-4 py-2 mt-5 text-gray-700">
            <div class="flex items-center">
                <x-icons.settings-icon />
                <span class="mx-2 font-medium">Settings</span>
            </div>
            <x-icons.chevron-icon />
        </div>

        {{-- Links 2 --}}
        <div class="pb-2 pl-4">
            @can('user-activity-log.index')
                <x-my.nav-bar href="{{ route('user-activity-log.index') }}" :active="request()->routeIs('user-activity-log.index')">
                    <span class="mx-3 -my-1 font-medium">Logs</span>
                </x-my.nav-bar>
            @endcan
            @can('tenants.edit')
                <x-my.nav-bar href="{{ route('user-has-roles.index') }}" :active="request()->routeIs('user-has-roles.index')">
                    <span class="mx-3 -my-1 font-medium">Funções de usuário</span>
                </x-my.nav-bar>
                <x-my.nav-bar href="{{ route('tenants.edit', session('tenant_id')) }}" :active="request()->routeIs('tenants.edit')">
                    <span class="mx-3 -my-1 font-medium">Dados conta</span>
                </x-my.nav-bar>
            @endcan
        </div>

    </nav>

    <!-- Sidebar footer -->
    <div class="px-8 border-t border-gray-200 dark:border-gray-700">
        <ul class="w-full flex items-center justify-between">
            <li class="py-3">
                <button aria-label="show notifications"
                    class="text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none focus:ring-2 rounded focus:ring-gray-300">
                    <i class='bx bx-bell text-xl '></i>
                </button>
            </li>
            <li class="py-3">
                <button aria-label="open chats"
                    class="text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none focus:ring-2 rounded focus:ring-gray-300">
                    <i class='bx bx-cog text-xl'></i>
                </button>
            </li>
            <li class="py-3">
                <button id="theme-toggle"
                    class="text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none focus:ring-2 rounded focus:ring-gray-300">
                    <i class='bx bx-moon text-xl'></i>
                </button>
            </li>
            <li class="py-3">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none focus:ring-2 rounded focus:ring-gray-300 flex items-center">
                        <i class='bx bx-log-out text-xl '></i>
                    </button>
                </form>
            </li>
        </ul>
    </div>
</div>

@push('scripts')
    <!-- Script para alternar entre Dark Mode e modo normal -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const themeToggleBtn = document.getElementById('theme-toggle');
            const htmlElement = document.documentElement;

            // Verificar se o usuário já tem uma preferência de tema armazenada
            const storedTheme = localStorage.getItem('theme');
            if (storedTheme === 'dark') {
                htmlElement.classList.add('dark');
            } else if (storedTheme === 'light') {
                htmlElement.classList.remove('dark');
            }

            // Alternar o tema e salvar a preferência no localStorage
            themeToggleBtn.addEventListener('click', function() {
                if (htmlElement.classList.contains('dark')) {
                    htmlElement.classList.remove('dark');
                    localStorage.setItem('theme', 'light');
                } else {
                    htmlElement.classList.add('dark');
                    localStorage.setItem('theme', 'dark');
                }
            });
        });
    </script>
@endpush
