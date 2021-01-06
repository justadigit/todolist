<div>
  <div class="flex justify-between w-1/6 my-2">
    <p class="font-bold">Add Step for Tasks</p><i wire:click="increment" class="fas fa-plus p-1 cursor-pointer"></i>
  </div>
  @foreach($steps as $item)
  <div wire:key="{{ $loop->index }}">
    <input type="text" name="stepName[]" class="py-2 px-5 border rounded my-2"
      placeholder="{{'Describe Task '.($loop->index+1)}}" value="{{$item['name']??''}}">
    <input type="hidden" name="stepId[]" value="{{$item['id']??''}}">
    <i class="fas fa-times text-red-400 p-2 cursor-pointer" wire:click="remove({{$loop->index}})"></i>
  </div>
  @endforeach
</div>