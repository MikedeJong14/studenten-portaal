<x-app-layout>
<head>
@livewireStyles
</head>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('createQuestion') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <body>
            <form action=''>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">question</label>
    <br>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="6" placeholder="een vraag?" required minlength="20"></textarea>
  </div>
  <button type="submit" class="p-2 bg-blue-500 w-25 rounded shadow text-white">ask a question</button>
</form>
            </body>
</x-app-layout>
