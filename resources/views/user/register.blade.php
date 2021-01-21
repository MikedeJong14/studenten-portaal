<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registreer een gebruiker') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white border-gray-500 overflow-hidden">
                <form method="post" action="{{ route('user/register') }}">
                    <div class="p-4">
                        <label for="name">Naam</label>
                        <input id="name" class="block p-2 border rounded-md w-full" type="text" name="name" required />
                    </div>
                    <div class="p-4">
                        <label for="email">Email</label>
                        <input id="email" class="block p-2 border rounded-md w-full" type="email" name="email" required />
                    </div>
                    <div class="p-4">
                        <label for="password">Wachtwoord</label>
                        <input id="password" class="block p-2 border rounded-md w-full" type="password" name="password" required />
                    </div>
                    <div class="p-4">
                        <label for="password_confirmation">Wachtwoord confirmatie</label>
                        <input id="password_confirmation" class="block p-2 border rounded-md w-full" type="password" name="password_confirmation" required />
                    </div>
                    {{ csrf_field() }}
                    <button class="bg-blue-600 text-white p-3 rounded-md" type="submit">Registreer</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
