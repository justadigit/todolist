@extends('todos.layout')
@section('content')
<div class="m-4 p-4">
  <form action="/todos/{{$todo->id}}" method="post">
    <h1 class="text-blue-500 text-2xl py-4">Edit Form</h1>
    @csrf
    @method('patch')
    <x-alert />
    <div>
      <input type="text" name="title" value="{{$todo->title}}" class="py-2 px-5 border rounded my-2"
        placeholder="title">
    </div>
    <div>
      <textarea name="description" id="description" class="border my-2 px-5 py-2" cols="35" rows="5"
        placeholder="description">{{$todo->description}}</textarea>
    </div>
    <div>
      @livewire('editstep', ['steps' => $todo->steps])
    </div>
    <button class="p-1 px-4 bg-green-400 text-white">Update</button>
  </form>
</div>
@endsection