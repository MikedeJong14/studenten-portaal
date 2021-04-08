<x-docent-layout>

    <p>Dit is de GESPREKKEN pagina</p>

    <div>
    @foreach ($appointments as $appointment)
        <div class="grid grid-cols-9">
            <div class="col-span-7 grid grid-cols-2 p-3 rounded-l-lg border border-gray-200 hover:bg-gray-100 hover:border-4 hover:border-gray-350 hover:shadow-xl">
                <p class="text-left">{{ strlen($appointment->title) > 50 ? substr($appointment->title, 0, 50). '...': $appointment->title }}</p>
                <p class="text-right">{{ $appointment->date }}</p>
            </div>
            <div class="col-span-2 bg-blue-600 text-center text-white rounded-r-lg border border-gray-200 p-3 hover:bg-blue-700 hover:border-4 hover:border-gray-350 hover:shadow-xl">
                <a href="{{ route('docent/create', [$appointment->id]) }}">Vervolggesprek</a>
            </div>
        </div>
    @endforeach
    </div>

</x-docent-layout>
