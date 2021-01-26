<x-app-layout>
	<head>
	@livewireStyles
	</head>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Stel een nieuwe vraag') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <body>
                    <form method="post" action="{{ route('question/store') }}">
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">De vraag</label>
                            <br>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="6" placeholder="vul hier een vraag in" required minlength="20" type='text'name='question'></textarea>
                        </div>
                        {{ csrf_field() }}
                        <button type="submit" class="p-2 bg-blue-500 w-25 rounded shadow text-white">submit</button>
                    </form>
                </body>
            </div>
        </div>
    </div>
</x-app-layout>
