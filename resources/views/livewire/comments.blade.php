<input class="w-full rounded border shadow p-2 mr-2 my-2" wire::model="newComment" type="text" placeholder="stel een vraag">
<button class='p-2 bg-blue-500 w-20 rounded shadow text-white'wire::click="addQuestion">ask</button>
<div class="rounded border shadow p-3 my-2">
{{$newComment}}
@foreach($comments as $comment)
        <div class="flex justify-between my-2">
            <div class="flex">
                <p class="font-bold text-lg">user:tester</p>
                <p class="mx-3 py-1 text-xs text-gray-500 font-semibold">
                10min ago
                </p>
                <p class='text-gray-800'>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatem modi ipsam illo asperiores, maiores fugit obcaecati totam dignissimos tempore odio accusantium rem, amet velit molestiae est quae provident, inventore quia?</p>
                <button class='p-2 bg-blue-500 w-25 rounded shadow text-white'wire::click="addQuestion">beantwoord</button>
            </div>
        </div>
        @endforeach
        </div>
