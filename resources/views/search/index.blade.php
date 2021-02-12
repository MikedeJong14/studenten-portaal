<x-app-layout>
    <head>
    @livewireStyles
    </head>
    @if(isset($q))
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Zoekresultaten voor: ') . $q }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class='text-xl'>Vragen:</th>
                </tr>
            </thead>
        </table>
        <div class="rounded border shadow p-3 my-2">
        @foreach($question as $questions)
        <div class="text-black p-5">
			<div class="block">
                <div class="bg-blue-600 text-white p-5">
                    <p class="inline font-bold text-lg ">{{$questions->question}}</p>
                </div>
                @if($questions->answer_id)
                <p class="text-lg text-gray-800 m-2">"{{$answer::find($questions->answer_id)->answer}}"</p>
                @endif
            </div>
        </div>
        @endforeach
    </div>
    @else
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Uw zoekresultaat heeft niks opgeleverd.')}}
        </h2>
    </x-slot>
    @endif
</x-app-layout>
