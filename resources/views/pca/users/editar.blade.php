@extends('layouts.admin')

@section('content')
  @php
    $columnas = Schema::getColumnListing('users');
    $nombres = array();

$nombres = array_add($nombres, 'id', 'ID');
$nombres = array_add($nombres, 'name', 'Usuario');
$nombres = array_add($nombres, 'email', 'Email');
$nombres = array_add($nombres, 'password', 'Contraseña');
$nombres = array_add($nombres, 'verified', 'Verificado');
$nombres = array_add($nombres, 'email_token', 'Email Token');
$nombres = array_add($nombres, 'avatar', 'Avatar');
$nombres = array_add($nombres, 'admin', 'Admin');
$nombres = array_add($nombres, 'user_id', 'Jugador ID');
$nombres = array_add($nombres, 'remember_token', 'Token');
$nombres = array_add($nombres, 'created_at', 'Creado');
$nombres = array_add($nombres, 'updated_at', 'Actualizado');
$nombres = array_add($nombres, 'developer', 'Desarrollador');
  @endphp
  <div class="m-portlet m-portlet--tab">
    <div class="m-portlet__head">
      <div class="m-portlet__head-caption">
        <div class="m-portlet__head-title">
          <h3 class="m-portlet__head-text">Editar User</h3>
        </div>
      </div>
    </div>
    <form class="m-form m-form--fit m-form--label-align-right" action="{{route('users.update', ['id' => $modelo->id])}}"  method="post">
      {{ csrf_field() }}
      {{ method_field('PUT') }}
      <div class="m-portlet__body">
        @foreach ($columnas as $columna)
          @if ($columna != 'id' && $columna != 'created_at'&& $columna != 'updated_at')
            <div class="form-group m-form__group">
              <label for="p_es">{{$nombres[$columna]}}</label>
              <input class="form-control m-input" type="text" name="{{$columna}}" value="{{$modelo->$columna}}" @if ($columna == 'name' || $columna == 'email' || $columna == 'password') required @endif >
              <span class="m-form__help">Escriba el valor de: {{$nombres[$columna]}}</span>
            </div>
          @endif
        @endforeach


      </div>
      <div class="m-portlet__foot m-portlet__foot--fit">
        <div class="m-form__actions">
          <button type="submit" class="btn btn-primary">Editar User</button>
        </div>
      </div>
    </form>
  </div>
@endsection
