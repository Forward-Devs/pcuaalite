@extends('layouts.plantilla')
@section('contenido')
  @php
    $columnas = Schema::getColumnListing(config('jugadores.tabla'));
    $tables = DB::connection()->getDoctrineSchemaManager()->listTableNames();
  @endphp

  <select class="" name="">
    @foreach ($columnas as $columna)
      <option value="">Deshabilitado</option>
      <option value="{{$columna}}">{{$columna}}</option>
    @endforeach

  </select>
@endsection
