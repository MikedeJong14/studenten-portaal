<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Stel een vraag') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <a href="{{ route('question/create') }}"class='m-3 p-3 flex justify-center text-center bg-blue-500 w-25 rounded shadow text-white'>Klik hier om een vraag te stellen</a>
                @livewire('questions', ['filter' => 'fromUserOnly'])
            </div>
        </div>
    </div>
</x-app-layout>
