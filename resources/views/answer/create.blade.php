<x-app-layout>
	<head>
	@livewireStyles
	</head>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Geef antwoord op een vraag') }}
        </h2>
    </x-slot>
    <div class="py-12">
		<div class="mb-2 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-2 bg-white overflow-hidden shadow-xl sm:rounded-lg">
				"{{$question->question}}"
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-2 bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <body>
                    <form method="post" action="{{ route('answer/store', ['questionId' => $question->id]) }}">
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Het antwoord</label>
                            <br>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="6" placeholder="vul hier een antwoord in" required minlength="10" type='text' name='answer'></textarea>
                        </div>
                        {{ csrf_field() }}
                        <button type="submit" class="p-2 bg-blue-500 w-25 rounded shadow text-white">submit</button>
                    </form>	
                </body>
            </div>
        </div>
    </div>
</x-app-layout>
