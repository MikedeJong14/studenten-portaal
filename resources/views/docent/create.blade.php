<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kalender | Afspraak inplannen') }}
        </h2>
    </x-slot>

    <div class="relative py-12">
        <div class="absolute top-20 left-10">
            <a href="{{ route('docent/gesprekken') }}" class="bg-blue-600 text-white p-5 rounded-full">🢀</a>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white border-gray-500 overflow-hidden">
                <form action="{{ route('docent/store') }}" method="post">
                    @if ($errors->any())
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li class="text-red-600 ml-4">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="p-4">
                        <label for="date" class="text-2xl">Date:</label>
                        <input id="date" class="block p-2 border rounded-md w-full" type="date" name="date" value="{{ old('date') }}" />
                    </div>
                    <div class="p-4">
                        <label for="teacher">Docent:</label>
                        <select id="teacher" class="block p-2 border rounded-md w-full" name="teacher">
                            @foreach($teachers as $teacher)
                                @if (old('teacher') == $teacher->id)
                                    <option value="{{ $teacher->id }}" selected>{{ $teacher->name }}</option>
                                @else
                                    <option value="{{ $teacher->id }}" {{ $appointment->teacher->name == $teacher->name ? 'selected' : '' }}>{{ $teacher->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="p-4">
                        <label for="title">Titel:</label>
                        <input id="title" class="block p-2 border rounded-md w-full" type="text" name="title" value="{{ old('title') ? old('title') : 'Vervolggesprek voor: ' . $appointment->title }}" />
                    </div>
                    <div class="p-4">
                        <label for="description">Beschrijving:</label>
                        <textarea id="description" class="block p-2 border rounded-md w-full" type="text" name="description" rows="6">{{ old('description') ? old('description') : "Onderwerp laatste afspraak: " . $appointment->description }}</textarea>
                    </div>
                    <div class="p-4">
                        <label for="time">Hoe laat wilt u het gesprek hebben?</label><br>
                        <div class="inline-flex p-2 border rounded-md">
                            <select id="time" class="px-2 outline-none appearance-none bg-transparent" name="timeHour">
                                @if (old('time_period'))
                                    <option value="{{ old('timeHour') }}" selected hidden>{{ old('timeHour') }}</option>
                                @endif
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
                            <select class="px-2 outline-none appearance-none bg-transparent" name="timeMinute">
                                @if (old('time_period'))
                                    <option value="{{ old('timeMinute') }}" selected hidden>{{ old('timeMinute') }}</option>
                                @endif
                                <option value="00">00</option>
                                <option value="15">15</option>
                                <option value="30">30</option>
                                <option value="45">45</option>
                            </select>
                        </div>
                    </div>
                    <div class="p-4">
                        <p>Hoe lang duurt het gesprek?</p>
                        <div class="inline-flex p-2 border rounded-md">
                            <select name="time_period" class="px-2 outline-none appearance-none bg-transparent">
                                @if (old('time_period'))
                                    <option value="{{ old('time_period') }}" selected hidden>{{ old('time_period') }} minuten</option>
                                @endif
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
                        <label for="school_year">Voor welk leerjaar is dit gesprek?</label><br>
                        @if (old('school_year') == 'onderbouw')
                            <input id="onderbouw" class="block p-2 border rounded-md inline" type="radio" name="school_year" value="onderbouw" checked />
                            <label for="onderbouw">Onderbouw</label><br>
                            <input id="bovenbouw" class="block p-2 border rounded-md inline" type="radio" name="school_year" value="bovenbouw"/>
                            <label for="bovenbouw">Bovenbouw</label><br>
                        @else
                            <input id="onderbouw" class="block p-2 border rounded-md inline" type="radio" name="school_year" value="onderbouw"/>
                            <label for="onderbouw">Onderbouw</label><br>
                            <input id="bovenbouw" class="block p-2 border rounded-md inline" type="radio" name="school_year" value="bovenbouw" checked />
                            <label for="bovenbouw">Bovenbouw</label><br>
                        @endif
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
