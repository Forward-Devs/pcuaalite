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
          <h3 class="m-portlet__head-text">Configurar Campos</h3>
        </div>
      </div>
    </div>
    <form class="m-form m-form--fit m-form--label-align-right" action="{{route('cambiarcamposig')}}" method="post">
      {{ csrf_field() }}
      {{ method_field('POST') }}
      @if (config('jugadores.tabla'))
        @php
          $columnas = Schema::getColumnListing(config('jugadores.tabla'));
        @endphp

      <div class="m-portlet__body">
        <div class="form-group m-form__group">
          <label for="problema">ID (Numero de Identificación)</label>
          <select class="form-control m-select" name="id">
            @foreach ($columnas as $columna)
              <option value="{{$columna}}" @if (config('jugadores.id') == $columna) selected @endif>{{$columna}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group m-form__group">
          <label for="nombre">Nombre de Usuario (username/usuario)</label>
          <select class="form-control m-select" name="nombre">
            <option value="">Deshabilitado</option>
            @foreach ($columnas as $columna)
              <option value="{{$columna}}" @if (config('jugadores.nombre') == $columna) selected @endif>{{$columna}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group m-form__group">
          <label for="clave">Contraseña</label>
          <select class="form-control m-select" name="clave">
            <option value="">Deshabilitado</option>
            @foreach ($columnas as $columna)
              <option value="{{$columna}}" @if (config('jugadores.clave') == $columna) selected @endif>{{$columna}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group m-form__group">
          <label for="hash">Encriptación de la contraseña</label>
          <select class="form-control m-select" name="hash">
            <option value="">Deshabilitado</option>
            <option value="md5" @if (config('jugadores.hash') == 'md5') selected @endif>MD5</option>
            <option value="sha1" @if (config('jugadores.hash') == 'sha1') selected @endif>SHA1</option>
            <option value="sha256" @if (config('jugadores.hash') == 'sha256') selected @endif>SHA256</option>
            <option value="sha512" @if (config('jugadores.hash') == 'sha512') selected @endif>SHA512</option>
            <option value="whirlpool" @if (config('jugadores.hash') == 'whirlpool') selected @endif>Whirlpool</option>
          </select>
        </div>
        <div class="form-group m-form__group">
          <label for="problema">Nivel</label>
          <select class="form-control m-select" name="nivel">
            <option value="">Deshabilitado</option>
            @foreach ($columnas as $columna)
              <option value="{{$columna}}" @if (config('jugadores.nivel') == $columna) selected @endif>{{$columna}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group m-form__group">
          <label for="problema">Experiencia</label>
          <select class="form-control m-select" name="exp">
            <option value="">Deshabilitado</option>
            @foreach ($columnas as $columna)
              <option value="{{$columna}}" @if (config('jugadores.exp') == $columna) selected @endif>{{$columna}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group m-form__group">
          <label for="problema">Edad</label>
          <select class="form-control m-select" name="edad">
            <option value="">Deshabilitado</option>
            @foreach ($columnas as $columna)
              <option value="{{$columna}}" @if (config('jugadores.edad') == $columna) selected @endif>{{$columna}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group m-form__group">
          <label for="problema">Sexo (Boolean 0-1)</label>
          <select class="form-control m-select" name="sexo">
            <option value="">Deshabilitado</option>
            @foreach ($columnas as $columna)
              <option value="{{$columna}}" @if (config('jugadores.sexo') == $columna) selected @endif>{{$columna}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group m-form__group">
          <label for="problema">Dinero en mano</label>
          <select class="form-control m-select" name="dinero">
            <option value="">Deshabilitado</option>
            @foreach ($columnas as $columna)
              <option value="{{$columna}}" @if (config('jugadores.dinero') == $columna) selected @endif>{{$columna}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group m-form__group">
          <label for="problema">Banco (Dinero en banco)</label>
          <select class="form-control m-select" name="banco">
            <option value="">Deshabilitado</option>
            @foreach ($columnas as $columna)
              <option value="{{$columna}}" @if (config('jugadores.banco') == $columna) selected @endif>{{$columna}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group m-form__group">
          <label for="problema">Moneda Premium</label>
          <select class="form-control m-select" name="moneda">
            <option value="">Deshabilitado</option>
            @foreach ($columnas as $columna)
              <option value="{{$columna}}" @if (config('jugadores.moneda') == $columna) selected @endif>{{$columna}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group m-form__group">
          <label for="problema">Vida</label>
          <select class="form-control m-select" name="vida">
            <option value="">Deshabilitado</option>
            @foreach ($columnas as $columna)
              <option value="{{$columna}}" @if (config('jugadores.vida') == $columna) selected @endif>{{$columna}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group m-form__group">
          <label for="problema">Chaleco</label>
          <select class="form-control m-select" name="armadura">
            <option value="">Deshabilitado</option>
            @foreach ($columnas as $columna)
              <option value="{{$columna}}" @if (config('jugadores.armadura') == $columna) selected @endif>{{$columna}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group m-form__group">
          <label for="problema">Telefono</label>
          <select class="form-control m-select" name="telefono">
            <option value="">Deshabilitado</option>
            @foreach ($columnas as $columna)
              <option value="{{$columna}}" @if (config('jugadores.telefono') == $columna) selected @endif>{{$columna}}</option>
            @endforeach
          </select>
        </div>

      </div>
      <div class="m-portlet__foot m-portlet__foot--fit">
        <div class="m-form__actions">
          <button type="submit" class="btn btn-primary">Cambiar</button>
        </div>
      </div>
      @else
        <div class="m-portlet__body">
          <div class="m-alert m-alert--icon m-alert--icon-solid m-alert--outline alert alert-danger alert-dismissible fade show" role="alert">
            <div class="m-alert__icon">
              <i class="flaticon-exclamation-1"></i>
              <span></span>
            </div>
            <div class="m-alert__text">
              <strong>Selecciona la tabla primero</strong>
            </div>
            <div class="m-alert__close">
              <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar"></button>
            </div>
          </div>
      </div>
      @endif
    </form>
  </div>
@endsection
