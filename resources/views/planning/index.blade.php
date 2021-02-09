<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ouders Planning') }}
        </h2>
    </x-slot>

    <div class="relative py-12">
        <div class="absolute top-20 left-10" title="Kalender">
            <a href="{{ route('planning/create') }}" class="bg-green-700 text-white text-lg py-4 px-5 rounded-full"> &#9638; </a>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white border-gray-500 overflow-hidden">
            @foreach ($appointments as $appointment)
                <a href="{{ route('planning/show', [$appointment->id]) }}">
                    <div class="border border-gray-200 p-3 hover:bg-gray-100 hover:border-4 hover:border-gray-350 hover:shadow-xl">
                        <p>{{ $appointment->title }}</p>
                    </div>
                </a>
            @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
