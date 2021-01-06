@extends('todos.layout')
@section('content')
<div class="relative w-1/2 m-auto p-7">
  <div class="border flex justify-between p-4">
    <h1 class="text-2xl">Your Todo Lists</h1>
    <button type="submit" class="text-blue-600 p-2">
      <a href="/todos/create"><i class="fas fa-plus"></i></a>
    </button>
  </div>
  <x-alert />
  <ul class="list-none p-4 mx-auto w-full">
    @forelse($todos as $todo)
    <li class="border p-4 bg-white flex justify-between">
      @include('todos.complete-button')
      @if($todo->completed)
      <p class="line-through"><a href="/todos/{{$todo->id}}">{{$todo->title}}</a></p>
      @else
      <p class=""><a href="/todos/{{$todo->id}}">{{$todo->title}}</a></p>
      @endif
      <div>
        <button class="text-yellow-200 hover:text-yellow-500 p-2 px-2"><a href="/todos/{{$todo->id}}/edit">
            <span class="fas fa-edit"></span></a>
        </button>
        <a class="text-red-500 hover:text-red-700 p-2 px-3" href="">
          <i class="far fa-trash-alt"
            onclick="event.preventDefault();document.getElementById('form-delete-{{$todo->id}}').submit()"></i>
        </a>
        <form action="/todos/{{$todo->id}}" id="{{'form-delete-'.$todo->id}}" method="post" style="display:none">
          @csrf
          @method('delete')
        </form>
      </div>
    </li>
    @empty
    <p class="text-center border p-4">There is no list, Please Add New List!</p>
    @endforelse
  </ul>
</div>
@endsection