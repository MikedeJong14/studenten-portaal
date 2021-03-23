<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kalender') }}
        </h2>
    </x-slot>

    <div class="relative py-12">
        <div class="absolute top-20 left-10">
            <a href="{{ route('planning/index') }}" class="bg-blue-600 text-white p-5 rounded-full">🢀</a>
        </div>
        <div class="h-screen flex flex-col max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-between place-self-center p-3 overflow-hidden shadow-xl sm:rounded-lg">
                    <div>
                        <div class="inline-block bg-green-700 py-1 px-3 rounded-l-lg text-white font-black">
                            <a href="{{ route('planning/create/navigate', [$calendar->prev]) }}"><</a>
                        </div>
                        <div class="inline-block bg-green-700 py-1 px-3 rounded-r-lg text-white font-black">
                            <a href="{{ route('planning/create/navigate', [$calendar->next]) }}">></a>
                        </div>
                    </div>
                    <div>
                        <h1 class="text-xl">{{ $calendar->title }}</h1>
                    </div>
                    <div>
                        <h1 class="text-xl">Today: {{ $calendar->today }}</h1>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <table>
                        <thead>
                            <tr>
                                <th class="px-10 text-center">Zondag</th>
                                <th class="px-10 text-center">Maandag</th>
                                <th class="px-10 text-center">Dinsdag</th>
                                <th class="px-10 text-center">Woensdag</th>
                                <th class="px-10 text-center">Donderdag</th>
                                <th class="px-10 text-center">Vrijdag</th>
                                <th class="px-10 text-center">Zaterdag</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($calendar->weeks as $week)
                            <tr>
                                @foreach ($week as $day)
                                    @if (!empty($day['day']))                               
                                        @if ($day['date'] > $calendar->today)
                                            <td class="text-right border border-grey-400">
                                                <a href="{{ route('planning/create_appointment', [$day['date']]) }}" class="block w-full bg-white px-3 py-5">{{ $day['day'] }}</a>
                                            </td>
                                        @else
                                            <td class="text-right bg-gray-200 px-3 py-5 border border-grey-600">{{ $day['day'] }}  </td>
                                        @endif                                
                                    @else
                                        <td class="bg-gray-200 px-3 py-5 border border-grey-600"></td>
                                    @endif
                                @endforeach
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>