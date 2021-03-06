<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5 my-3">
                <div class="bg-white p-5 my-3">
                    <p class="text-5xl font-semibold">Welkom {{ $user->name }}</p>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5 my-3">
                <div class="p-5">
                    <p class="text-xl">Eerstvolgende afspraak:</p>
                </div>
                @if (isset($user->appointment))
                <div class="bg-green-700 text-white p-5 flex justify-between">
                    <h1 class="font-bold text-3xl">{{ ucfirst($user->appointment->title) }}</h1>
                    <p class="font-bold text-3xl">Docent: {{ $user->appointment->teacher->name }}</p>
                    <div class="mt-3">
                        <p class="font-bold text-gray-50 bg-green-800 p-3 rounded-lg inline">{{ ucfirst($user->appointment->school_year) }}</p>
                        <p class="font-bold text-gray-50 bg-green-800 p-3 rounded-lg inline">{{ substr($user->appointment->date,0,16) }}</p>
                    </div>
                </div>
                @else
                <div class="bg-white text-black py-2 px-5">
                    <p class="font-semibold text-2xl">Geen afspraak</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
