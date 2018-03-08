@extends('layouts.plantilla')
@section('side')
  @include('aside')
@endsection
@section('contenido')
  @php
    $actividades = Actividad::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->simplePaginate(20);
  @endphp
<h1 style="text-align:center;">Actividad reciente</h1>
<br>
<ul>
  @foreach ($actividades as $actividad)
  <li>[{{$actividad->created_at}}] {{User::where('id', $actividad->user_id)->first()->name}} {{$actividad->es}}</li>
  @endforeach
</ul>

@endsection
