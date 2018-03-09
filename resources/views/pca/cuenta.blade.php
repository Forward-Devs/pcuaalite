@extends('layouts.admin')

@section('content')
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
          <h3 class="m-portlet__head-text">Cuenta - Cambiar Contraseña</h3>
        </div>
      </div>
    </div>
    <form class="m-form m-form--fit m-form--label-align-right" action="{{route('cambiarpass')}}" method="post">
      {{ csrf_field() }}
      {{ method_field('POST') }}
      <div class="m-portlet__body">

        <div class="form-group m-form__group">
          <label for="slug">Contraseña Actual</label>
          <input class="form-control m-input" id="current-password" type="password" name="current-password">
          <span class="m-form__help">Escribe la contraseña que utilizas ahora mismo.</span>
        </div>
        <div class="form-group m-form__group">
          <label for="slug">Nueva Contraseña</label>
          <input class="form-control m-input" id="password" type="password" name="password">
          <span class="m-form__help">Escribe nueva contraseña que deseas para tu cuenta.</span>
        </div>
        <div class="form-group m-form__group">
          <label for="slug">Confirmar Contraseña</label>
          <input class="form-control m-input" id="password_confirmation" type="password" name="password_confirmation">
          <span class="m-form__help">Escribe la nueva contraseña de nuevo.</span>
        </div>
      </div>
      <div class="m-portlet__foot m-portlet__foot--fit">
        <div class="m-form__actions">
          <button type="submit" class="btn btn-primary">Cambiar</button>
        </div>
      </div>
    </form> 
  </div>
@endsection
