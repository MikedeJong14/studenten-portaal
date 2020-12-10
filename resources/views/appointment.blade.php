<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Afspraak') }}
        </h2>
    </x-slot>

    <div class="relative py-12">
        <div class="absolute top-20 left-40">
            <a href="{{ url('/planning') }}" class="bg-gray-200 p-5 rounded-full">🢀</a>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white divide-y overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-5 flex justify-between">
                    <h1 class="font-bold text-3xl">{{ ucfirst($appointment->title) }}</h1>
                    <p class="font-bold text-gray-500 bg-gray-200 p-3 rounded-lg">{{ substr($appointment->appointment_date,0,16) }}</p>
                </div>
                <div class="p-5 text-justify">
                    <p>{{ $appointment->description }}</p>
                </div>
                <div class="p-5 text-right">
                    <p>Tijd ingepland voor de afspraak: {{ $appointment->appointment_duration }} uur</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
