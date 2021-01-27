<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Docent Beheer') }}
        </h2>
    </x-slot>

    <div class="min-h-200 sm:flex">
        <div class="flex-none w-full sm:max-w-xs bg-white shadow">
            <x-jet-responsive-nav-link href="{{ route('docent') }}" :active="request()->routeIs('docent')">
                {{ __('Overzicht') }}
            </x-jet-responsive-nav-link>
            <x-jet-responsive-nav-link href="{{ route('docent/vragen') }}" :active="request()->routeIs('docent/vragen')">
                {{ __('Gestelde Vragen') }}
            </x-jet-responsive-nav-link>
            <x-jet-responsive-nav-link href="{{ route('docent/gesprekken') }}" :active="request()->routeIs('docent/gesprekken')">
                {{ __('Gesprek Uitnodiginen') }}
            </x-jet-responsive-nav-link>
        </div>
        <div class="flex-1 bg-white shadow">
            <div class="overflow-hidden p-5">
                {{ $slot }}
            </div>
        </div>
    </div>
</x-app-layout>