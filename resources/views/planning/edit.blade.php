<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Afspraak') }}
        </h2>
    </x-slot>

    <div class="relative py-12">
        <div class="absolute top-20 left-10">
            <a href="{{ route('planning/index') }}" class="bg-gray-200 p-5 rounded-full">🢀</a>
        </div>
        <form action="{{ route('planning/update', $appointment->id) }}" method="post">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white divide-y overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="bg-green-700 text-white p-5 flex justify-between">
                        <input id="title" class="p-2 bg-green-700 block border rounded-md w-full text-3xl" type="text" name="title" value="{{ ucfirst($appointment->title) }}"/>
                        <p class="font-bold text-gray-50 bg-green-800 p-3 rounded-lg">{{ substr($appointment->date,0,16) }}</p>
                    </div>
                    <div class="p-5 text-justify">
                        <textarea id="description" class="block p-2 border rounded-md w-full" type='text'name='description' rows="6">{{ $appointment->description }}</textarea>
                    </div>
                    <div class="bg-blue-600 text-white p-5 flex justify-end">
                        <p class="mr-1">Docent:</p>
                        <select id="teacher" class="bg-blue-600 block border rounded-md mr-auto" name="teacher">
                            @foreach($teachers as $teacher)
                                @if($appointment->teacher->id == $teacher->id)
                                    <option value='{{ $teacher->id }}' selected>{{ $teacher->name }}</option>
                                @else
                                    <option value='{{ $teacher->id }}'>{{ $teacher->name }}</option>
                                @endif
                            @endforeach
                        </select>
                        <input id="time_period" class="pl-1 w-20 bg-blue-600 block border rounded-md inline mr-1" type="number" name="time_period" value="{{ $appointment->time_period }}"/> minuten.
                    </div>
                    <input id="date" type="hidden" name="date" value="{{ $appointment->date }}"/>
                </div>
                {{ csrf_field() }}
                <button type="submit" class="mt-2 p-2 bg-blue-500 w-25 rounded shadow text-white">Verzend</button>
            </div>
        </form>
    </div>
</x-app-layout>
