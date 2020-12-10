<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ouders Planning') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white border-gray-500 overflow-hidden">
            @foreach ($appointments as $appointment)
                <a href="{{ url('/planning/appointment', [$appointment->id]) }}">
                    <div class="border border-gray-200 p-3 hover:bg-gray-100 hover:border-4 hover:border-gray-350 hover:shadow-xl">
                        <p>{{ $appointment->title }}</p>
                    </div>
                </a>
            @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
