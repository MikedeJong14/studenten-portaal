<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Calender') }}
        </h2>
    </x-slot>

    <div class="relative py-12">
        <div class="absolute top-20 left-10">
            <a href="{{ route('planning/create') }}" class="bg-gray-200 p-5 rounded-full">🢀</a>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white border-gray-500 overflow-hidden">
                <form action="{{ route('planning/store') }}" method="post">
                    <div class="p-4">
                        <label for="date">Datum:</label>
                        <input id="date" class="block p-2 border rounded-md w-full" type="date" name="date" value="{{ $date }}" disabled />
                    </div>
                    <div class="p-4">
                        <select id="teacher" class="block p-2 border rounded-md w-full" name="teacher">
                            @foreach($teachers as $teacher)
                            <option value='{{ $teacher->id }}'>{{ $teacher->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="p-4">
                        <label for="title">Titel:</label>
                        <input id="title" class="block p-2 border rounded-md w-full" type="text" name="title" />
                    </div>
                    <div class="p-4">
                        <label for="description">Beschrijving:</label>
                        <textarea id="description" class="block p-2 border rounded-md w-full" type='text'name='description' rows="6"></textarea>
                    </div>
                    <div class="p-4">
                        <label for="time_period">Hoelang duurt het gesprek?</label>
                        <input id="time_period" class="block p-2 border rounded-md" type="number" name="time_period" />
                    </div>
                    
                    @if ($errors->any())
                    <div class="p-4">
                        @foreach ($errors->all() as $error)
                        <p class="text-red-500">
                        {{ $error }}
                        </p>
                        @endforeach
                    </div>
                    @endif
                    
                    {{ csrf_field() }}
                    <div class="p-4 flex justify-end">
                        <button class="bg-blue-600 text-white p-3 rounded-md" type="submit">Registreer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
