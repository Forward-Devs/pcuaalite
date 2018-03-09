@extends('layouts.plantilla')
@section('contenido')
  @php
  $leng = LaravelLocalization::setLocale();
  $contenido = 'contenido_'.$leng;
  @endphp
<div class="m-portlet m-portlet--full-height ">
  <div class="m-portlet__body">

    {!! $page->$contenido !!}
  </div>
</div>

@endsection
