@extends('layouts.admin')

@section('content')
  @php
    $tables = Schema::getConnection()->getDoctrineSchemaManager()->listTableNames();
  @endphp
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
          <h3 class="m-portlet__head-text">Configurar Tabla</h3>
        </div>
      </div>
    </div>
    <form class="m-form m-form--fit m-form--label-align-right" action="{{route('cambiartablaig')}}" method="post">
      {{ csrf_field() }}
      {{ method_field('POST') }}
      <div class="m-portlet__body">
        <div class="form-group m-form__group">
          <label for="problema">Seleccione la tabla de los usuarios del GM</label>
          <select class="form-control m-select" name="tabla">
            <option value="">Deshabilitado</option>
            @foreach ($tables as $tabla)

              <option @if ($tabla == config('jugadores.tabla')) selected @endif value="{{$tabla}}" >{{$tabla}}</option>
            @endforeach
          </select>
        </div>

      </div>
      <div class="m-portlet__foot m-portlet__foot--fit">
        <div class="m-form__actions">
          <button type="submit" class="btn btn-primary">Seleccionar</button>
        </div>
      </div>
    </form>
  </div>
@endsection
