<x-guest-layout>
        <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('Q&A') }}
                    </h2>
                </div>
        </header>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <body>
                @livewire('questions', ['filter' => 'answeredOnly'])
                @livewireScripts
                </body>
            </div>
        </div>
    </div>
</x-guest-layout>