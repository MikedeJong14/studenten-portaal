<nav x-data="{ open: false }" class="bg-blue-400 border-b border-gray-100">
    @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
        @auth
            <a href="{{ route('dashboard') }}" class="text-sm text-white underline">naar Dashboard</a>
        @else
            <a href="{{ route('login') }}" class="text-sm text-white underline">Login</a>
        @endauth
        </div>
    @endif

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                        <img src="{{ URL::to('img/da_corporate_logo_rgb_MyDavinciHeader.png') }}" class="block h-9 w-auto" alt="Davinci Logo" />
                    </a>
                </div>
                <div class="flex-shrink-0 flex items-center">
                    <x-jet-nav-link class="nav-link">
                        @if(Auth::check())
                            {{ __('Gast') }}
                        @endif
                    </x-jet-nav-link>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-jet-nav-link href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active-nav-link' : '' }}">
                        {{ __('Home') }}
                    </x-jet-nav-link>
                    <x-jet-nav-link href="{{ url('/Q&A') }}" class="nav-link {{ request()->routeIs('Q&A') ? 'active-nav-link' : '' }}">
                    {{ __('Q&A') }}
                </x-jet-nav-link>
                <!-- <x-jet-nav-link class="nav-link {{ request()->routeIs('search/index') ? 'active-nav-link' : '' }}">
                        <form action="{{ route('search/index') }}" method="post">
                            <div class="bg-white flex justify-between rounded">
                                <input type="text" class="w-full p-1 rounded-l text-black" name="q" placeholder="Zoeken">
                                {{ csrf_field() }}
                                <button type="submit" class="bg-blue-600 p-1 rounded-r">Zoeken</button>
                            </div>
                        </form>
                    </x-jet-nav-link> -->
            </div>
        </div>

        @if (Route::has('login'))
            <div class="block px-6 py-4 sm:hidden">
            @auth
                <a href="{{ route('dashboard') }}" class="text-sm text-white underline">naar Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="text-sm text-white underline">Login</a>
            @endauth
            </div>
        @endif
        <div class="-mr-2 flex items-center sm:hidden">
            <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-white hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-jet-responsive-nav-link href="{{ route('home') }}" class="responsive-nav-link {{ request()->routeIs('home') ? 'active-responsive-nav-link' : '' }}">
                {{ __('Home') }}
            </x-jet-responsive-nav-link>
            <x-jet-responsive-nav-link href="{{ url('/Q&A') }}" class="responsive-nav-link {{ request()->routeIs('Q&A') ? 'active-responsive-nav-link' : '' }}">
                {{ __('Q&A') }}
            </x-jet-responsive-nav-link>
            <!-- <x-jet-responsive-nav-link class="responsive-search-link {{ request()->routeIs('search/index') ? 'active-responsive-search-link' : '' }}">
                <form action="{{ route('search/index') }}" method="post">
                    <div class="bg-white flex justify-between rounded">
                        <input type="text" class="w-full p-1 rounded-l text-black" name="q" placeholder="Zoeken">
                        {{ csrf_field() }}
                        <button type="submit" class="bg-blue-600 p-1 rounded-r">Zoeken</button>
                    </div>
                </form>
            </x-jet-responsive-nav-link> -->
        </div>
    </div>
</nav>
