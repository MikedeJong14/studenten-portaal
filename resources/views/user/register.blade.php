<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registreer een gebruiker') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(Session::has('success'))
            <div class="bg-white p-5 border-gray-500 overflow-hidden">
                <div class="bg-green-300 p-3 border-2 border-green-500 rounded text-green-500 w-full mx-auto">
                    <div id="charge-message">
                        {{ Session::get('success') }}
                    </div>
                </div>
            </div>
            @endif
            <div class="bg-white border-gray-500 overflow-hidden">
                <form method="post" action="{{ route('user/store') }}">
                    <div class="p-4">
                        <label for="name">Naam</label>
                        <input id="name" class="block p-2 border rounded-md w-full" type="text" name="name" />
                    </div>
                    <div class="p-4">
                        <label for="email">Email</label>
                        <input id="email" class="block p-2 border rounded-md w-full" type="email" name="email" />
                    </div>
                    <div class="p-4">
                        <label for="password">Wachtwoord</label>
                        <input id="password" class="block p-2 border rounded-md w-full" type="password" name="password" />
                    </div>
                    <div class="p-4">
                        <label for="password_confirmation">Wachtwoord confirmatie</label>
                        <input id="password_confirmation" class="block p-2 border rounded-md w-full" type="password" name="password_confirmation" />
                    </div>

                    @if ($errors->any())
                    <div class="p-4">
                        @foreach ($errors->all() as $error)
                        <p class="text-red-500">
                        {{ $error == 'Password formaat is ongeldig.' ? $error .= ' Het wachtwoord moet minimaal 1 hoofdletter, 1 kleine en een nummer bevatten.' : $error }}
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
