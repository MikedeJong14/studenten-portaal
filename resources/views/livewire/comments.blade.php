<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
@if(Auth::check())
  <a href="{{ url('/createQuestion') }}"class='p-3 flex justify-center text-center bg-blue-500 w-25 rounded shadow text-white'>ask a question</a>
@endif
<div class="rounded border shadow p-3 my-2">
<input class="form-control" id="search" type="text" placeholder="Search..">
@foreach($comments as $comment)
  <div class="my-2" id='test2'>
    <div id="test">
      <div class="bg-blue-600 text-white p-5">
        <div class="block">
                    <p class="inline font-bold text-lg">user:tester</p>
                    <p class="inline mx-3 py-1 text-xs text-white-500 font-semibold">
                    10min ago
                    </p>
                    </div>
                </div>
                <br>
                <div class="block" id='questions'>
                    <p class='text-gray-800'>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatem modi ipsam illo asperiores, maiores fugit obcaecati totam dignissimos tempore odio accusantium rem, amet velit molestiae est quae provident, inventore quia?</p>
                    <!-- <button class='p-2 bg-red-700 w-25 rounded shadow text-white'>report</button> -->
                    @if (Auth::check())
                    <!-- <button class='p-2 bg-green-700 w-25 rounded shadow text-white'wire::click="addQuestion">answer</button> -->
                    <!-- <button class='p-2 bg-blue-500 w-25 rounded shadow text-white' href="">edit</button>
                    <button class='p-2 bg-red-700 w-25 rounded shadow text-white'>delete</button> -->
                    @else
                    <!-- <button class='p-2 bg-blue-500 w-25 rounded shadow text-white' visibility="hidden" style='hidden'>beantwoord</button> -->
                    @endif
                </div>
            </div>
        </div>
        @endforeach
        </div>
        <script>
/**
*deze function
*
 */
$(document).ready(function()
{
  $("#search").on("keyup", function()
    {
    var value = $(this).val().toLowerCase();
    $("#questions p").filter(function()
      {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
