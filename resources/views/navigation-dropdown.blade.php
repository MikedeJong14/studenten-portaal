<nav x-data="{ open: false }" class="bg-blue-400 border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                        <img src="{{ URL::to('img/da_corporate_logo_rgb_MyDavinciHeader.png') }}" class="block h-9 w-auto" alt="Davinci Logo" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-jet-nav-link href="{{ route('docent') }}" class="nav-link {{ request()->routeIs('docent', 'docent/vragen', 'docent/gesprekken') ? 'active-nav-link' : '' }}">
                        {{ __('Docent') }}
                    </x-jet-nav-link>
                    <x-jet-nav-link href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active-nav-link' : '' }}">
                        {{ __('Dashboard') }}
                    </x-jet-nav-link>
                    <x-jet-nav-link href="{{ route('planning/index') }}" :active="request()->routeIs('planning/index')">
                        {{ __('Planning') }}
                    </x-jet-nav-link>
                    <x-jet-nav-link href="{{ route('question/index') }}" class="nav-link {{ request()->routeIs('question/index') ? 'active-nav-link' : '' }}">
                        {{ __('Stel een vraag') }}
                    </x-jet-nav-link>
                    <x-jet-nav-link href="{{ route('user/register') }}" class="nav-link {{ request()->routeIs('user/register') ? 'active-nav-link' : '' }}">
                        {{ __('Gebruiker registreren') }}
                    </x-jet-nav-link>
                    <x-jet-nav-link class="nav-link {{ request()->routeIs('search/index') ? 'active-nav-link' : '' }}">
                        <form action="{{ route('search/index') }}" method="post">
                            <div class="bg-white flex justify-between rounded">
                                <input type="text" class="w-full p-1 rounded-l text-black" name="q" placeholder="Zoeken">
                                {{ csrf_field() }}
                                <button type="submit" class="bg-blue-600 p-1 rounded-r">Zoeken</button>
                            </div>
                        </form>
                    </x-jet-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-jet-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                            <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                                <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                            </button>
                        @else
                            <button class="flex items-center text-sm font-medium text-white hover:font-semibold hover:border-gray-300 focus:outline-none focus:text-white focus:font-semibold focus:border-gray-300 transition duration-150 ease-in-out">
                                <div>{{ Auth::user()->name }}</div>

                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        @endif
                    </x-slot>

                    <x-slot name="content">
                        <!-- Account Management -->
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Manage Account') }}
                        </div>

                        <x-jet-dropdown-link href="{{ route('profile.show') }}">
                            {{ __('Profiel') }}
                        </x-jet-dropdown-link>

                        @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                            <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                {{ __('API Tokens') }}
                            </x-jet-dropdown-link>
                        @endif

                        <div class="border-t border-gray-100"></div>

                        <!-- Team Management -->
                        @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Team') }}
                            </div>

                            <!-- Team Settings -->
                            <x-jet-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                {{ __('Team Settings') }}
                            </x-jet-dropdown-link>

                            @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                <x-jet-dropdown-link href="{{ route('teams.create') }}">
                                    {{ __('Create New Team') }}
                                </x-jet-dropdown-link>
                            @endcan

                            <div class="border-t border-gray-100"></div>

                            <!-- Team Switcher -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Switch Teams') }}
                            </div>

                            @foreach (Auth::user()->allTeams() as $team)
                                <x-jet-switchable-team :team="$team" />
                            @endforeach

                            <div class="border-t border-gray-100"></div>
                        @endif

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-jet-dropdown-link href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                {{ __('Logout') }}
                            </x-jet-dropdown-link>
                        </form>
                    </x-slot>
                </x-jet-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-white hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
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
        <div class="pt-2 pb-3 space-y-1">
            <x-jet-responsive-nav-link href="{{ route('docent') }}" class="responsive-nav-link {{ request()->routeIs('docent', 'docent/vragen', 'docent/gesprekken') ? 'active-responsive-nav-link' : '' }}">
                {{ __('Docent') }}
            </x-jet-responsive-nav-link>
            <x-jet-responsive-nav-link href="{{ route('dashboard') }}" class="responsive-nav-link {{ request()->routeIs('dashboard') ? 'active-responsive-nav-link' : '' }}">
                {{ __('Dashboard') }}
            </x-jet-responsive-nav-link>
            <x-jet-responsive-nav-link href="{{ route('planning/index') }}" :active="request()->routeIs('planning/index')">
                {{ __('Planning') }}
            </x-jet-responsive-nav-link>
            <x-jet-responsive-nav-link href="{{ route('question/index') }}" class="responsive-nav-link {{ request()->routeIs('question/index') ? 'active-responsive-nav-link' : '' }}">
                {{ __('Stel een vraag') }}
            </x-jet-responsive-nav-link>
            <x-jet-responsive-nav-link href="{{ route('user/register') }}" class="responsive-nav-link {{ request()->routeIs('user/register') ? 'active-responsive-nav-link' : '' }}">
                {{ __('Gebruiker registreren') }}
            </x-jet-responsive-nav-link>
            <x-jet-responsive-nav-link class="responsive-search-link {{ request()->routeIs('search/index') ? 'active-responsive-search-link' : '' }}">
                <form action="{{ route('search/index') }}" method="post">
                    <div class="bg-white flex justify-between rounded">
                        <input type="text" class="w-full p-1 rounded-l text-black" name="q" placeholder="Zoeken">
                        {{ csrf_field() }}
                        <button type="submit" class="bg-blue-600 p-1 rounded-r">Zoeken</button>
                    </div>
                </form>
            </x-jet-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-white">
            <div class="flex items-center px-4">
                <div class="flex-shrink-0">
                    <img class="h-10 w-10 rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                </div>

                <div class="ml-3">
                    <div class="font-medium text-base text-white">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-white">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Account Management -->
                <x-jet-responsive-nav-link href="{{ route('profile.show') }}" class="responsive-nav-link {{ request()->routeIs('profile.show') ? 'active-responsive-nav-link' : '' }}">
                    {{ __('Profiel') }}
                </x-jet-responsive-nav-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-jet-responsive-nav-link href="{{ route('api-tokens.index') }}" class="responsive-nav-link {{ request()->routeIs('api-tokens.index') ? 'active-responsive-nav-link' : '' }}">
                        {{ __('API Tokens') }}
                    </x-jet-responsive-nav-link>
                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-jet-responsive-nav-link href="{{ route('logout') }}" class="responsive-nav-link {{ request()->routeIs('logout') ? 'active-responsive-nav-link' : '' }}"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                        {{ __('Logout') }}
                    </x-jet-responsive-nav-link>
                </form>

                <!-- Team Management -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="border-t border-gray-200"></div>

                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Manage Team') }}
                    </div>

                    <!-- Team Settings -->
                    <x-jet-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">
                        {{ __('Team Settings') }}
                    </x-jet-responsive-nav-link>

                    <x-jet-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                        {{ __('Create New Team') }}
                    </x-jet-responsive-nav-link>

                    <div class="border-t border-gray-200"></div>

                    <!-- Team Switcher -->
                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Switch Teams') }}
                    </div>

                    @foreach (Auth::user()->allTeams() as $team)
                        <x-jet-switchable-team :team="$team" component="jet-responsive-nav-link" />
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</nav>
