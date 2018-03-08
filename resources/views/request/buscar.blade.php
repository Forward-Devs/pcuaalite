@php
  $cuentas = User::where('name', 'like', '%'.$_GET['query'].'%')->get();
@endphp

<div class="m-list-search">
  <div class="m-list-search__results">
    <span class="m-list-search__result-category" >Usuarios</span>
    @foreach ($cuentas as $cuenta)
    <a href="#" class="m-list-search__result-item">
      <span class="m-list-search__result-item-pic">
        <img class="m--img-rounded" src="{{asset($cuenta->avatar)}}" title="">
      </span>
      <span class="m-list-search__result-item-text">
        {{$cuenta->name}}
      </span>
    </a>
    @endforeach
  </div>
</div>
