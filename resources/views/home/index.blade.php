<x-guest-layout>
    <div class="flex h-16 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex-shrink-0 flex items-center">
            <a href="{{ route('home') }}">
                <x-jet-application-mark class="block h-9 w-auto" />
            </a>
        </div>

        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <x-jet-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                {{ __('Home') }}
            </x-jet-nav-link>
            <x-jet-nav-link href="{{ url('/Q&A') }}" :active="request()->is('/Q&A')">
                {{ __('Q&A') }}
            </x-jet-nav-link>
        </div>
    </div>
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Home') }}
            </h2>
        </div>
    </header>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
                <p>Welkom bij de studenten portaal applicatie</p>
                <br>
                <p>Dit is de index pagina</p>
            </div>
        </div>
    </div>
</x-guest-layout>
