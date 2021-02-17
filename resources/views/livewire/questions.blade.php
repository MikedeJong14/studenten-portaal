<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <x-slot name="header">
    </x-slot>
<div class="rounded border shadow p-3 my-2">
	<div id="myBtnContainer">
		<button class="btn active bg-blue-600 text-white p-3  my-2 rounded-lg" onclick="showAll()"> Show all</button>
		@foreach($categories as $category)
			<button class="btn bg-blue-600 text-white p-3 my-2 rounded-lg" onclick="showOnly('{{$category->name}}')">{{$category->name}}</button>
		@endforeach
		<button class="btn active bg-blue-600 text-white p-3  my-2 rounded-lg" onclick="sortList('newest')">Sorteer op nieuwste</button>
		<button class="btn active bg-blue-600 text-white p-3  my-2 rounded-lg" onclick="sortList('oldest')">Sorteer op oudste</button>
	</div>
	<div id="questions_list">
		@foreach($questions as $question)
			<div class="question {{$category::find($question->category_id)->name}}">
				<div class="bg-blue-600 text-white p-5">
					<div class="block">
						<div class="inline font-bold text-lg">{{$user::find($question->user_id)->name}}</div>
						<div class="inline ml-3 font-bold text-lg bg-blue-800 p-1">{{$category::find($question->category_id)->name}}</div>
						<div id="updated_at" class="inline ml-3 py-1 text-xs text-white-500 font-semibold">{{$question->updated_at}}</div>
					</div>
				</div>
				<div class="block" id='questions'>
					<p class='text-lg text-gray-800 ml-3 my-5'>{{$question->question}}</p>
					@foreach($answers as $answer)
						@if($answer->question_id == $question->id)
							<div class="rounded border p-3 my-2">
								<p class='text-lg text-gray-800 m-2'>"{{$answer->answer}}"</p>
							</div>
						@endif
					@endforeach
					<div class="flex">
						@if(Auth::id() == $question->user_id && empty($question->answer_id))
							<a class='mr-2 p-2 bg-blue-500 w-25 rounded shadow text-white' href="{{route('question/edit', $question->id)}}">Bewerk</a>
							<a onclick='return confirmPrompt()' class='mr-2 p-2 bg-red-700 w-25 rounded shadow text-white' href="{{route('question/delete', $question->id)}}">Verwijder</a>
						@endif
						<!-- Vergeet hier geen check voor docent accounts toe te voegen -->
						@if (empty($question->answer_id))
							<a class='mr-2 p-2 bg-green-700 w-25 rounded shadow text-white' href="{{route('answer/create', $question->id)}}">Antwoord</a>
							<!-- <button class='p-2 bg-red-700 w-25 rounded shadow text-white'>report</button> -->
						@endif
					</div>
				</div>
			</div>
		@endforeach
	</div>
</div>
<script>
function confirmPrompt() {
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

function sortList(order) {
	var list = document.getElementById('questions_list');
	var elements = list.getElementsByClassName('question'); //get questions from list
	var new_list = list.cloneNode(false); //empty clone of old list
	var elementArray = [];

	//all elements are put in an array for sorting
	for (var i = 0; i < elements.length; i++) {
		elementArray[i] = elements[i];
	}

	elementArray.sort(function (a, b) {
		elemA = a.querySelector("#updated_at").innerHTML; //get the text of the element with id 'updated_at'
		elemB = b.querySelector("#updated_at").innerHTML;
		if (order == 'newest') {
			if (elemA > elemB) {
				return -1;
			} else {
				return 1;
			}
		} else if (order == 'oldest') {
			if (elemA < elemB) {
				return -1;
			} else {
				return 1;
			}
		}
    });

	for (var i = 0; i < elementArray.length; i++) {
		new_list.appendChild(elementArray[i]); //put the sorted elements into the new list
	}

	list.parentNode.replaceChild(new_list, list); //replace old list
}

function showAll()
{
	var elements = document.getElementsByClassName("question");
	for (var test = 0; test < elements.length; test++) {
		elements[test].style.display = 'block';
	}
}

function showOnly(category)
{
	var elements = document.getElementsByClassName("question");
	for (var test = 0; test < elements.length; test++) {
		elements[test].style.display = 'block';
	}

	for (var test = 0; test < elements.length; test++) {
		//console.log(elements[test]);
		//console.log(elements[test].classList.contains(category));
		if(!elements[test].classList.contains(category)){
			elements[test].style.display = 'none';
		}
	}
}
</script>
