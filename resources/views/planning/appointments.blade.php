<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Planning') }}
        </h2>
    </x-slot>

    <div class="relative py-8">
        <div class="absolute top-20 left-10" title="Kalender">
            <a href="{{ route('planning/create') }}" class="bg-green-700 text-white text-lg py-4 px-5 rounded-full"> Nieuw &#9638; </a>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			<a class="p-2 bg-green-500 w-25 rounded shadow text-white" href="{{route('planning/index')}}">Ga naar gemaakte afspraken</a>
            <p class="mt-4 mb-2 text-lg">Inkomende afspraken: </p>
            <div class="bg-white border-gray-500 overflow-hidden">
            @if(count($appointments) > 0)
                @foreach ($appointments as $appointment)
                    <a href="{{ route('planning/show', [$appointment->id]) }}">
                        <div class=" flex justify-between border border-gray-200 p-3 hover:bg-gray-100 hover:border-4 hover:border-gray-350 hover:shadow-xl">
                            <p>{{ $appointment->title }}</p>
                            <p class="bg-green-700 p-2 text-white rounded">{{ $appointment->date }}</p>
                        </div>
                    </a>
                @endforeach
            @else
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5 my-3">
                    <div class="p-5">
                        <p class="text-xl">Er zijn nog geen afspraken met u gemaakt</p>
                    </div>
                </div>
            @endif
            </div>
        </div>
    </div>
</x-app-layout>
