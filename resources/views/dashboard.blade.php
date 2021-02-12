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
                <div class="p-5 my-3">
                    <p class="text-xl p-5">Eerstvolgende afspraak:</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
