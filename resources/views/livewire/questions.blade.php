<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
@if(Auth::check())
  <a href="{{ url('/createQuestion') }}"class='p-3 flex justify-center text-center bg-blue-500 w-25 rounded shadow text-white'>ask a question</a>
@endif
<div class="rounded border shadow p-3 my-2">
  <!-- <input class="form-control" id="search" type="text" placeholder="Search.."> -->
  @foreach($questions as $question)
    <div class="my-2">
      <div id="test">
        <div class="bg-blue-600 text-white p-5">
          <div class="block">
            <p class="inline font-bold text-lg">{{$user::find($question->userid)->name}}</p>
            <p class="inline mx-3 py-1 text-xs text-white-500 font-semibold">
            {{$question->updated_at}}
            </p>
          </div>
        </div>
        <br>
        <div class="block"id='questions'>
          <p class='text-gray-800 m-2'>{{$question->question}}</p>
          @if(Auth::id() == $question->userid)
          <a class='p-2 bg-blue-500 w-25 rounded shadow text-white' href="{{url('/updateQuestion',[$question->id])}}">edit</a>
          <a class='p-2 bg-red-700 w-25 rounded shadow text-white' href="{{url('/deleteQuestion',[$question->id])}}">delete</a>
          @endif
          @if (Auth::check())
          @else
          <!-- <button class='p-2 bg-blue-500 w-25 rounded shadow text-white' visibility="hidden" style='hidden'>beantwoord</button> -->
          @endif
          <!-- <button class='p-2 bg-red-700 w-25 rounded shadow text-white'>report</button> -->
        </div>
      </div>
    </div>
  @endforeach
</div>
<script>
/**
*deze function search op de pagina
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
