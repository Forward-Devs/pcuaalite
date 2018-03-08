@extends('layouts.admin')

@section('content')
  @php
    $columnas = Schema::getColumnListing('sliders');
    $nombres = array();
    
$nombres = array_add($nombres, 'id', 'ID');
$nombres = array_add($nombres, 'imagen', 'Imagen');
$nombres = array_add($nombres, 'redireccion', 'Redireccion');
$nombres = array_add($nombres, 'created_at', 'Creado');
$nombres = array_add($nombres, 'updated_at', 'Actualizado');
  @endphp
  <div class="m-portlet m-portlet--tab">
    <div class="m-portlet__head">
      <div class="m-portlet__head-caption">
        <div class="m-portlet__head-title">
          <h3 class="m-portlet__head-text">Nuevo Slider</h3>
        </div>
      </div>
    </div>
    <form class="m-form m-form--fit m-form--label-align-right" action="{{route('sliders.store')}}"  method="post">
      {{ csrf_field() }}
      {{ method_field('POST') }}
      <div class="m-portlet__body">
        @foreach ($columnas as $columna)
          @if ($columna != 'id' && $columna != 'created_at'&& $columna != 'updated_at')
            <div class="form-group m-form__group">
              <label for="{{$columna}}">{{$nombres[$columna]}}</label>
              <input class="form-control m-input" type="text" name="{{$columna}}" value="">
              <span class="m-form__help">Escriba el valor de: {{$nombres[$columna]}}</span>
            </div>
          @endif

        @endforeach

      </div>
      <div class="m-portlet__foot m-portlet__foot--fit">
        <div class="m-form__actions">
          <button type="submit" class="btn btn-primary">Crear Slider</button>
        </div>
      </div>
    </form>
  </div>
@endsection
