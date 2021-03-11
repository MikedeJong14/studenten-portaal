<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kalender | Afspraak inplannen') }}
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
                        <label for="date" class="text-2xl">Afspraak inplannen voor: {{ $date }}</label>
                        <input id="date" class="block p-2 border rounded-md w-full" type="hidden" name="date" value="{{ $date }}" />
                    </div>
                    <div class="p-4">
                        <label for="teacher">Docent:</label>
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
                        <label for="time_period">Hoelang duurt het gesprek?</label><br>
                        <input id="time_period" class="block p-2 border rounded-md inline" type="number" name="time_period" /> minuten.
                    </div>
                    <div class="p-4">
                        <p> Voor welk leerjaar is dit gesprek? </p>
                        <input id="onderbouw" class="block p-2 border rounded-md inline" type="radio" name="school_year" value="onderbouw" checked />
                        <label for="onderbouw">Onderbouw</label><br>
                        <input id="bovenbouw" class="block p-2 border rounded-md inline" type="radio" name="school_year" value="bovenbouw" />
                        <label for="bovenbouw">Bovenbouw</label><br>
                    </div>
                    
                    {{ csrf_field() }}
                    <div class="p-4 flex justify-end">
                        <button class="bg-green-700 text-white p-3 rounded-md" type="submit">Registreer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
