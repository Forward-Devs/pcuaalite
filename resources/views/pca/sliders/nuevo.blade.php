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
          <h3 class="m-portlet__head-text">Nuevo Slider</h3>
        </div>
      </div>
    </div>
    <form class="m-form m-form--fit m-form--label-align-right" enctype="multipart/form-data" action="{{route('sliders.store')}}"  method="post">
      {{ csrf_field() }}
      {{ method_field('POST') }}
      <div class="m-portlet__body">
        <div class="form-group m-form__group">
          <label for="imagen">
            Imagen 1200x400
          </label>
          <div></div>
          <label class="custom-file">
            <input type="file" name="imagen" placeholder="Haga click para seleccionar un archivo" class="form-control-file">
          </label>
        </div>
        <div class="form-group m-form__group">
          <label for="redireccion">Redirección</label>
          <input class="form-control m-input" type="text" name="redireccion" value="#">
          <span class="m-form__help">En caso de una redirección escriba la URL de destino</span>
        </div>

      </div>
      <div class="m-portlet__foot m-portlet__foot--fit">
        <div class="m-form__actions">
          <button type="submit" class="btn btn-primary">Crear Slider</button>
        </div>
      </div>
    </form>
  </div>
@endsection
