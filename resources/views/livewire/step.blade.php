<div>
  <div class="flex justify-between w-3/4 my-2">
    <p class="font-bold">Add Step for Tasks</p><i wire:click="increment" class="fas fa-plus p-1 cursor-pointer"></i>
  </div>
  @foreach($steps as $item)
  <div wire:key="{{ $item }}">
    <input type="text" name="steps[]" class="py-2 px-5 border rounded my-2"
      placeholder="{{'Describe Task '.($item+1)}}">
    <i class="fas fa-times text-red-400 p-2 cursor-pointer" wire:click="remove({{$item}})"></i>
  </div>
  @endforeach
</div>