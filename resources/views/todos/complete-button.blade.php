@if($todo->completed)
<span class="fas fa-check text-green-400 px-2 text-2xl cursor-pointer"
  onclick="event.preventDefault();document.getElementById('form-incomplete-{{$todo->id}}').submit()"></span>
<form action="/todos/{{$todo->id}}/incomplete" id="{{'form-incomplete-'.$todo->id}}" method="post" style="display:none">
  @csrf
  @method('delete')
</form>
@else

<form action="/todos/{{$todo->id}}/complete" id="{{'form-complete-'.$todo->id}}" method="post" style="display:none">
  @csrf
  @method('put')
</form>
<span class="fas fa-check px-2 py-2 text-xl text-gray-200 cursor-pointer"
  onclick="event.preventDefault();document.getElementById('form-complete-{{$todo->id}}').submit()"></span>
@endif