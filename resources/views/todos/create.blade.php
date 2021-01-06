@extends('todos.layout')
@section('content')
<div class="flex items-center justify-center">
  <div class="w-full max-w-md">
    <h1 class="text-2xl">What next you need To-Do</h1>
    <form action="/todos " method="post" class="bg-white shadow-lg rounded px-12 pt-6 pb-8 mb-4">
      <x-alert />
      @csrf
      <div>
        <input type="text" name="title" class="py-2 px-5 border rounded my-2" placeholder="title">
      </div>
      <div>
        <textarea name="description" id="description" class="border my-2 px-5 py-2" cols="35" rows="5"
          placeholder="description"></textarea>
      </div>
      <livewire:step />
      <input type="submit" value="Create"
        class="px-4 py-2  mr-3 rounded text-white inline-block w-1/3 shadow-lg bg-blue-500 hover:bg-blue-600 focus:bg-blue-700"><button
        class="px-4 py-2 mr-2 mx-auto border w-1/3 bg-blue-50 inline-block"><a href="/todos">back</a></button>
    </form>
  </div>
</div>
@endsection