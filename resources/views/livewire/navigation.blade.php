<nav x-data="{ open: false }" class="bg-blue-400 border-b border-gray-100">
    @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
        @auth
            <a href="{{ url('/dashboard') }}" class="text-sm text-white underline">Dashboard</a>
        @else
            <a href="{{ route('login') }}" class="text-sm text-white underline">Login</a>
        @endauth
        </div>
    @endif

    <div class="flex h-16 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex-shrink-0 flex items-center">
            <a href="{{ route('home') }}">
                <img src="{{ URL::to('img/da_corporate_logo_rgb_MyDavinciHeader.png') }}" class="block h-9 w-auto" alt="Davinci Logo" />
            </a>
        </div>

        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <x-jet-nav-link href="{{ route('home') }}" class="nav-link" :active="request()->routeIs('home')">
                {{ __('Home') }}
            </x-jet-nav-link>
            <x-jet-nav-link href="{{ url('/Q&A') }}" class="nav-link" :active="request()->is('Q&A')">
                {{ __('Q&A') }}
            </x-jet-nav-link>
            <!-- <x-jet-nav-link class="nav-link">
                <form action="{{ route('search/index') }}" method="post">
                    <div class="bg-white rounded">
                        <input type="text" class="p-1 rounded-l text-black" name="q" placeholder="Search">
                        {{ csrf_field() }}
                        <button type="submit" class="bg-blue-600 p-1 rounded-r">Zoeken</button>
                    </div>
                </form>
            </x-jet-nav-link> -->
        </div>
    </div>
</nav>
