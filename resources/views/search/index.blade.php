<x-app-layout>
<head>
@livewireStyles
</head>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('zoeken') }}
        </h2>
    </x-slot>
<div class="container">
        <p> The zoek resultaten<b> </b> voor : {{$q}}</p>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>questions</th>
            </tr>
        </thead>
        @foreach($question as $questions)
        <tbody>
            <tr>
                <td>{{$questions->question}}</td>
            </tr>
            <br>
        </tbody>
        @endforeach
    </table>
</div>
</x-app-layout>
