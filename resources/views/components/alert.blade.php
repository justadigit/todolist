<div>
  @if(session()->has('message'))
  <p class="bg-green-400 text-white p-2 text-center">{{session('message')}}</p>
  @elseif(session()->has('error'))
  <p class="bg-red-500 text-white p-5 text-center">{{session('error')}}</p>
  @endif

  @if ($errors->any())
  <div class="bg-red-500 text-white p-5 text-center ">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif
</div>