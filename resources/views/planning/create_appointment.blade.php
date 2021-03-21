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
                    @if ($errors->any())
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li class="text-red-600 ml-4">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
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
                        <label for="time">Hoe laat wilt u het gesprek hebben?</label><br>
                        <div class="inline-flex text-lg border rounded-md p-2">
                            <select name="timeHour" id="time" class="px-2 outline-none appearance-none bg-transparent">
                                <option value="08">08</option>
                                <option value="09">09</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                            </select>
                            <span class="px-2">:</span>
                            <select name="timeMinute" class="px-2 outline-none appearance-none bg-transparent">
                                <option value="00">00</option>
                                <option value="15">15</option>
                                <option value="30">30</option>
                                <option value="45">45</option>
                            </select>
                        </div>
                    </div>
                    <div class="p-4">
                        <p>Hoe lang duurt het gesprek?</p>
                        <div class="inline-flex text-lg border rounded-md p-2 pr-3">
                            <select name="time_period" class="px-2 outline-none appearance-none bg-transparent">
                                <option value="15">15 minuten</option>
                                <option value="30">30 minuten</option>
                                <option value="45">45 minuten</option>
                                <option value="60">60 minuten</option>
                                <option value="75">75 minuten</option>
                                <option value="90">90 minuten</option>
                            </select>
                        </div>
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
