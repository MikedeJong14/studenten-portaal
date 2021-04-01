<x-app-layout>
    <head>
    @livewireStyles
    </head>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bewerk een vraag') }}
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
                    <form method="post" action="{{ route('question/update', $questionId) }}">
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Vraag</label>
                            <br>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="6" placeholder="een vraag?" type='text' name='question'>{{$question->question}}</textarea>
                            <br>
                            <label for="categories">Categorie</label>
                            <br>
                            <select id='categories' name='category'>
                                @foreach($categories as $category)
                                    @if($category->id == $questionCategory->id)
                                        <option value='{{$category->id}}' selected>{{$category->name}}</option>
                                    @else
                                        <option value='{{$category->id}}'>{{$category->name}}</option>
                                    @endif
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
