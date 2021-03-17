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
                <div class="bg-green-700 text-white p-5 flex justify-left">
                    <h1 class="font-bold text-3xl">Weet u zeker dat u de afspraak wilt verwijderen?</h1>
                </div>
                <div class="p-5 text-justify">
                    <label for="title"></label>
                    <p>Title: {{ ucfirst($appointment->title) }}</p>
                    <label for="description"></label>
                    <p>Beschrijving: {{ $appointment->description }}</p>
                    <label for="teacher"></label>
                    <p>Docent: {{ $appointment->teacher->name }}</p>
                    <label for="school_year"></label>
                    <p>Schooljaar: {{ ucfirst($appointment->school_year) }}</p>
                    <label for="date"></label>
                    <p>Datum: {{ substr($appointment->date,0,16) }}</p>
                    <label for="time_period"></label>
                    <p>Ingeplande tijd voor de afspraak: {{ $appointment->time_period }} minuten</p>
                </div>
                <div class="bg-blue-600 text-white p-5 flex justify-left">
                    <p>Als u de afspraak verwijdert kunt u het niet terugkrijgen.</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
