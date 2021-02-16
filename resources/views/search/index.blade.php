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
        @if(count($questions) > 0)
        @foreach($questions as $question)
        <div class="text-black p-5">
			<div class="block">
                <div class="bg-blue-600 flex justify-between text-white p-5">
                    <p class="inline font-bold text-lg ">{{ $question->question }}</p>
                    <div class="inline ml-3 font-bold text-lg bg-blue-800 p-2 rounded-lg">{{ $category::find($question->category_id)->name }}</div>
                    <div class="inline ml-3 py-1 text-xs text-white-500 font-semibold">{{ $question->updated_at }}</div>
                </div>
                @if($question->answer_id)
                <p class="text-lg text-gray-800 m-2">"{{ $answer::find($question->answer_id)->answer }}"</p>
                @endif
            </div>
        </div>
        @endforeach
        @else
        <div class="text-black p-5">
            Geen vragen gevonden.
        </div>
        @endif
    </div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class='text-xl'>Afspraken:</th>
                </tr>
            </thead>
        </table>
        @if(count($appointments) > 0)
        @foreach($appointments as $appointment)
        <div class="text-black p-5">
			<div class="block">
                <div class="bg-blue-600 flex justify-between text-white p-5">
                    <p class="inline font-bold text-lg ">{{ $appointment->title }}</p>
                    <div class="inline ml-3 font-bold text-lg bg-blue-800 p-2 rounded-lg">Docent: {{ $teacher::find($appointment->teacher_id)->name }}</div>
                    <div class="inline ml-3 py-1 text-xs text-white-500 font-semibold">{{ $appointment->date }}</div>
                </div>
            </div>
        </div>
        @endforeach
        @else
        <div class="text-black p-5">
            Geen afspraken gevonden.
        </div>
        @endif
    </div>
    @else
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Uw zoekresultaat heeft niks opgeleverd.')}}
        </h2>
    </x-slot>
    @endif
</x-app-layout>
