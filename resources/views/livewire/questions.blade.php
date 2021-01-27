<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<div class="rounded border shadow p-3 my-2">
	<!-- <input class="form-control" id="search" type="text" placeholder="Search.."> -->
	@foreach($questions as $question)
		<div class="bg-blue-600 text-white p-5">
			<div class="block">
				<p class="inline font-bold text-lg">{{$user::find($question->user_id)->name}}</p>
				<p class="inline mx-3 py-1 text-xs text-white-500 font-semibold">
            <p class="inline font-bold text-lg bg-blue-700 p-1">{{$Category::find($question->category_id)->name}}</p>
					{{$question->updated_at}}
				</p>
			</div>
		</div>
		<div class="block" id='questions'>
			<p class='text-gray-800 ml-3 my-5'>{{$question->question}}</p>
			@foreach($answers as $answer)
				@if($answer->question_id == $question->id)
					<div class="rounded border p-3 my-2">
						<p class='text-gray-800 m-2'>"{{$answer->answer}}"</p>
					</div>
				@endif
			@endforeach
			<div class="flex">
				@if(Auth::id() == $question->user_id && empty($question->answer_id))
					<a class='mr-2 p-2 bg-blue-500 w-25 rounded shadow text-white' href="{{route('question/edit', $question->id)}}">Bewerk</a>
					<a class='mr-2 p-2 bg-red-700 w-25 rounded shadow text-white' href="{{route('question/delete', $question->id)}}">Verwijder</a>	
				@endif
				<!-- Vergeet hier geen check voor docent accounts toe te voegen -->
				@if (empty($question->answer_id))
					<a class='mr-2 p-2 bg-green-700 w-25 rounded shadow text-white' href="{{route('answer/create', $question->id)}}">Antwoord</a>
					<!-- <button class='p-2 bg-red-700 w-25 rounded shadow text-white'>report</button> -->
				@endif
			</div>
		</div>
		<br>
	@endforeach
</div>
<script>
function myFunction() {
   return confirm("Weetje het zeker!");
}
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
<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
</style>
