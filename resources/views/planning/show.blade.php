<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Afspraak') }}
        </h2>
    </x-slot>

    <div class="relative py-12">
        <div class="absolute top-20 left-10">
            <a href="{{ route('planning/index') }}" class="bg-gray-200 p-5 rounded-full">🢀</a>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white divide-y overflow-hidden shadow-xl sm:rounded-lg">
                <div class="bg-green-700 text-white p-5 grid grid-cols-3">
                    <div class="col-span-2 overflow-y-auto">
                        <h1 class="font-bold text-3xl">{{ ucfirst($appointment->title) }}</h1>
                    </div>
                    <div class="mt-3 col-span-1 text-right">
                        <p class="font-bold text-gray-50 bg-green-800 p-3 rounded-lg inline">{{ ucfirst($appointment->school_year) }}</p>
                        <p class="font-bold text-gray-50 bg-green-800 p-3 rounded-lg inline">{{ substr($appointment->date,0,16) }}</p>
                    </div>
                </div>
                <div class="p-5 text-justify">
                    <p>{{ $appointment->description }}</p>
                </div>
                <div class="bg-blue-600 text-white p-5 flex justify-between">
                    @if(isset($appointment->teacher))
                      <p>Docent: {{ $appointment->teacher->name }}</p>
                    @endif
                    <p>Tijd ingepland voor de afspraak: {{ $appointment->time_period }} minuten</p>
                </div>
            </div>
            <a class='flex mt-2 mx-auto p-2 bg-blue-500 w-48 rounded shadow text-white text-center' href="{{route('planning/edit', $appointment)}}">Bewerk deze afspraak</a>
        </div>
    </div>
</x-app-layout>
