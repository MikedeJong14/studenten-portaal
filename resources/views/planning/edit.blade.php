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
                        <input id="title" class="p-2 bg-green-700 block border rounded-md w-full text-3xl" type="text" name="title" value="{{ $appointment->title }}"/>
                        <select id="school_year" class="font-bold text-gray-50 bg-green-800 p-3 ml-1 rounded-lg" name="school_year">
                            <option value="{{$appointment->school_year}}" selected hidden>{{ ucfirst($appointment->school_year) }}</option>
                            <option value='onderbouw'>Onderbouw</option>
                            <option value='bovenbouw'>Bovenbouw</option>
                        </select>
                        <p class="font-bold text-gray-50 bg-green-800 p-3 ml-1 rounded-lg">{{ substr($appointment->date,0,16) }}</p>
                    </div>
                    <div class="p-5 text-justify">
                        <textarea id="description" class="block p-2 border rounded-md w-full" type='text'name='description' rows="6">{{ $appointment->description }}</textarea>
                    </div>
                    <div class="bg-blue-600 text-white p-5 flex justify-end">
                        <p class="mr-1">Docent:</p>
                        <select id="teacher" class="bg-blue-600 block border rounded-md mr-auto" name="teacher">
                            <option value='{{ $appointment->teacher->id }}' selected hidden>{{ $appointment->teacher->name }}</option>
                            @foreach($teachers as $teacher)
                                <option value='{{ $teacher->id }}'>{{ $teacher->name }}</option>
                            @endforeach
                        </select>
                        <select name="time_period" class="pl-1 bg-blue-600 block border rounded-md inline mr-1">
                            <option value="{{$appointment->time_period}}" selected hidden>{{ $appointment->time_period }} minuten</option>
                            <option value="15">15 minuten</option>
                            <option value="30">30 minuten</option>
                            <option value="45">45 minuten</option>
                            <option value="60">60 minuten</option>
                            <option value="75">75 minuten</option>
                            <option value="90">90 minuten</option>
                        </select>
                    </div>
                    <input id="date" type="hidden" name="date" value="{{ $appointment->date }}"/>
                </div>
                {{ csrf_field() }}
                <button type="submit" class="mt-2 p-2 bg-blue-500 w-25 rounded shadow text-white">Verzend</button>
            </div>
        </form>
    </div>
</x-app-layout>
