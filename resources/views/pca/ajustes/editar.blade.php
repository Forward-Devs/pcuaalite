@extends('layouts.admin')
@section('content')
  <div class="m-portlet m-portlet--tab">
    <div class="m-portlet__head">
      <div class="m-portlet__head-caption">
        <div class="m-portlet__head-title">
          <h3 class="m-portlet__head-text">Editar Ajuste</h3>
        </div>
      </div>
    </div>
    <form class="m-form m-form--fit m-form--label-align-right" action="{{route('ajustes.update', ['id' => $ajuste->id])}}" method="post">
      {{ csrf_field() }}
      {{ method_field('PUT') }}
      <div class="m-portlet__body">

        <div class="form-group m-form__group">
          <label for="slug">Valor ESPAÑOL</label>
          <input class="form-control m-input" type="text" name="es" value="{{$ajuste->es}}">
          <span class="m-form__help">Escribe el nuevo valor de esta variable, recuerda no cambiar nada si no conoces el funcionamiento del sistema.</span>
        </div>
        <div class="form-group m-form__group">
          <label for="slug">Valor INGLÉS</label>
          <input class="form-control m-input" type="text" name="en" value="{{$ajuste->en}}">
          <span class="m-form__help">Escribe el nuevo valor de esta variable, recuerda no cambiar nada si no conoces el funcionamiento del sistema.</span>
        </div>
        <div class="form-group m-form__group">
          <label for="slug">Valor FRANCÉS</label>
          <input class="form-control m-input" type="text" name="fr" value="{{$ajuste->fr}}">
          <span class="m-form__help">Escribe el nuevo valor de esta variable, recuerda no cambiar nada si no conoces el funcionamiento del sistema.</span>
        </div>


      </div>
      <div class="m-portlet__foot m-portlet__foot--fit">
        <div class="m-form__actions">
          <button type="submit" class="btn btn-primary">Guardar</button>

        </div>
      </div>
    </form>
  </div>
@endsection
