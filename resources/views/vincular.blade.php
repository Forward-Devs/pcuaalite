@extends('layouts.plantilla')
@section('side')
  @include('aside')
@endsection
@section('contenido')
  @if (session('message'))
    <div class="m-alert m-alert--icon m-alert--icon-solid m-alert--outline alert alert-brand alert-dismissible fade show" role="alert">
      <div class="m-alert__icon">
        <i class="flaticon-exclamation-1"></i>
        <span></span>
      </div>
      <div class="m-alert__text">
        <strong>{!! session('message') !!}</strong>
      </div>
      <div class="m-alert__close">
        <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar"></button>
      </div>
    </div>
  @endif
  <div class="m-portlet m-portlet--tab">
    <div class="m-portlet__head">
      <div class="m-portlet__head-caption">
        <div class="m-portlet__head-title">
          <h3 class="m-portlet__head-text">Vincular cuenta de juego</h3>
        </div>
      </div>
    </div>
    @if (config('jugadores.tabla'))


    <form class="m-form m-form--fit m-form--label-align-right" action="{{route('vincularjugador')}}" method="post">
      {{ csrf_field() }}
      {{ method_field('POST') }}
      <div class="m-portlet__body">

        <div class="form-group m-form__group">
          <label for="slug">Usuario</label>
          <input class="form-control m-input" id="usuario" type="text" name="usuario">
          <span class="m-form__help">Escribe tu usuario InGame.</span>
        </div>
        <div class="form-group m-form__group">
          <label for="slug">Contraseña</label>
          <input class="form-control m-input" id="password" type="password" name="password">
          <span class="m-form__help">Escribe tu contraseña.</span>
        </div>
      </div>
      <div class="m-portlet__foot m-portlet__foot--fit">
        <div class="m-form__actions">
          <button type="submit" class="btn btn-primary">Cambiar</button>
        </div>
      </div>
    </form>
    @else
      <div class="m-portlet__body">
        <div class="m-alert m-alert--icon m-alert--icon-solid m-alert--outline alert alert-danger alert-dismissible fade show" role="alert">
          <div class="m-alert__icon">
            <i class="flaticon-exclamation-1"></i>
            <span></span>
          </div>
          <div class="m-alert__text">
            <strong>Migraciones desactivadas</strong>
          </div>
          <div class="m-alert__close">
            <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar"></button>
          </div>
        </div>
    </div>
    @endif
  </div>
@endsection
