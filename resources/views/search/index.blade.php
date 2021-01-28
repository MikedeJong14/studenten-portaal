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
    @if(isset($q))
        <p> The zoek resultaten voor : {{$q}}</p>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Vragen:</th>
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
    @else
        <p>Uw zoekresultaat heeft niks opgeleverd.</p>
    @endif
        
    </div>
</x-app-layout>
