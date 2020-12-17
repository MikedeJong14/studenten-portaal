<x-app-layout>
<head>
@livewireStyles
</head>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Stel een vraag') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <body>

            @livewireScripts
            vragen stellen
            <input wire::model="vraag" type="text">
            <br>
            <button class="accordion">vraag 1</button>
            <div class="panel">
            <button>add answer</button>
            <p>Lorem ipsum...</p>
            </div>

            <button class="accordion">vraag 2</button>
            <div class="panel">
            <p>Lorem ipsum...</p>
            </div>

            <button class="accordion">vraag 3</button>
            <div class="panel">
            <p>Lorem ipsum...</p>
            </div>
            </commments>
            </body>
            </div>
        </div>
    </div>
</x-app-layout>
