<x-app-layout>
	<head>
	@livewireStyles
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
	</head>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Stel een nieuwe vraag') }}
        </h2>
    </x-slot>
    @if ($errors->any())
    <div class="p-4">
        @foreach ($errors->all() as $error)
            <p class="text-red-500">
            {{ $error }}
            </p>
        @endforeach
        </div>
    @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <body>
                    <form method="post" action="{{ route('question/store') }}">
                        <div class="form-group">
                            <label for="question">De vraag</label>
                            <br>
                            <textarea class="typeahead form-control" name="question" id="question" rows="6" placeholder="vul hier een vraag in" type='text' name='question'></textarea>
                            <br>
                            <label for="categories">Categorie</label>
                            <br>
                            <select id='categories' name='category'>
                                @foreach($categories as $category)
                                <option value='{{$category->id}}'>{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        {{ csrf_field() }}
                        <button type="submit" class="p-2 bg-blue-500 w-25 rounded shadow text-white">submit</button>
                    </form>
                </body>
            </div>
        </div>
    </div>
</x-app-layout>
<script type="text/javascript">
</script>
