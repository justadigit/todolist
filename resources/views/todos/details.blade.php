@extends('todos.layout')
@section('content')
<div class="m-4 p-4">
  <h1 class="text-blue-500 text-2xl py-4">Details</h1>
  <div class="p-3">
    <h1 class="text-3xl">{{$todo->title}}</h1>
  </div>
  <div class="p-3 w-1/2">
    <p>
      {{$todo->description}}
    </p>
  </div>
  <div class="p-3  w-1/2">
    <h1>Steps</h1>
    <ol class="list-decimal px-5">
      @foreach($todo->steps as $step)
      <li>{{$step['name']}}</li>
      @endforeach
    </ol>
  </div>
  <button class="px-4 py-2 mr-2 mx-auto border w-50 bg-blue-50 inline-block"><a href="/todos/">back</a></button>
</div>
@endsection