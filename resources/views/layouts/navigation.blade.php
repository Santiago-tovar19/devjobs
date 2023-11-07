<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    </a>
                </div>

                @auth
                <!-- Navigation Links -->
                @can("create", App\Models\Vacante::class)
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('vacantes.index')" :active="request()->routeIs('vacantes.index')">
                        {{ __('Mis Vacantes') }}
                    </x-nav-link>
                    <x-nav-link :href="route('vacantes.create')" :active="request()->routeIs('vacantes.create')">
                        {{ __('Crear Vacantes') }}
                    </x-nav-link>
                    </div>
                @endcan

                 @endauth

            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                @auth
                 @if(auth()->user()->rol === 2)
                <a class="mr-2 w-7 h-7 bg-indigo-600 hover:bg-indigo-800 rounded-full flex flex-col justify-center items-center text-white text-sm" href="{{route('notificaciones')}}">
                    {{ Auth::user()->unreadNotifications->count() }}
                </a>
                @endif

                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Cerrar sesión') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
                 @endauth
                 @guest


                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('login')">
                        {{ __('Iniciar sesión') }}
                    </x-nav-link>
                    <x-nav-link :href="route('register')" >
                        {{ __('Registrarse') }}
                    </x-nav-link>
                </div>
                 @endguest
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        @auth


                <div class="pt-2 pb-3 space-y-1">
                    <x-responsive-nav-link :href="route('vacantes.index')" :active="request()->routeIs('vacantes.index')">
                        {{ __('Mis vacantes') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('vacantes.create')" :active="request()->routeIs('vacantes.create')">
                        {{ __('Crear vacantes') }}
                    </x-responsive-nav-link>
                    @if(auth()->user()->rol === 2)
                    <div class="flex gap-2 items-center p-3">
                    <a class=" w-7 h-7 bg-indigo-600 hover:bg-indigo-800 rounded-full flex flex-col justify-center items-center text-white text-sm" href="{{route('notificaciones')}}">
                        {{ Auth::user()->unreadNotifications->count() }}
                    </a>
                    <p class="text-gray-600 font-medium text-base">
                        @choice('Notificacion|Notificaciones', Auth::user()->unreadNotifications->count())
                    </p>
                    </div>
            @endif
                </div>

                <!-- Responsive Settings Options -->
                <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
                    <div class="px-4">
                        <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                    </div>

                    <div class="mt-3 space-y-1">
                        <x-responsive-nav-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-responsive-nav-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-responsive-nav-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Cerrar sesión') }}
                            </x-responsive-nav-link>
                        </form>
                    </div>
                </div>
                @endauth
                @guest
                <div class="pt-2 pb-3 space-y-1">
                    <x-responsive-nav-link :href="route('login')" >
                        {{ __('Iniciar sesión') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('register')" >
                        {{ __('Registrarse') }}
                    </x-responsive-nav-link>
                </div>

                @endguest
    </div>
</nav>
