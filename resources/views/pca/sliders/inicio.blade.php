@extends('layouts.admin')
@section('content')
  @php
    $modelo = Slider::all();
    $columnas = Schema::getColumnListing('sliders');
    $nombres = array();
    
$nombres = array_add($nombres, 'id', 'ID');
$nombres = array_add($nombres, 'imagen', 'Imagen');
$nombres = array_add($nombres, 'redireccion', 'Redireccion');
$nombres = array_add($nombres, 'created_at', 'Creado');
$nombres = array_add($nombres, 'updated_at', 'Actualizado');
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

  <div class="m-portlet m-portlet--mobile">
    <div class="m-portlet__head">
      <div class="m-portlet__head-caption">
        <div class="m-portlet__head-title">
          <h3 class="m-portlet__head-text">
            Slider
          </h3>
        </div>
      </div>

    </div>
    <div class="m-portlet__body">
      <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
        <div class="row align-items-center">
          <div class="col-xl-8 order-2 order-xl-1">

          </div>
          <div class="col-xl-4 order-1 order-xl-2 m--align-right">
            <a href="{{route('sliders.create')}}" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
              <span>
                <i class="la la-plus"></i>
                <span>
                  Crear Slider
                </span>
              </span>
            </a>
            <div class="m-separator m-separator--dashed d-xl-none"></div>
          </div>
        </div>
      </div>
      <table class="m-datatable" id="html_table" width="100%">
        <thead>
          <tr>

            @foreach ($columnas as $columna)
              <th title="{{$nombres[$columna]}}">
                {{$nombres[$columna]}}
              </th>

            @endforeach
            <th title="Editar">
              Editar
            </th>
            <th title="Borrar">
              Borrar
            </th>

          </tr>
        </thead>
        <tbody>
          @foreach ($modelo as $mod)
            <tr>
              @foreach ($columnas as $columna)
                <td>
                  {{$mod->$columna}}
                </td>
              @endforeach

              <td>
                <a href="{{route('sliders.edit', ['id' => $mod->id])}}" class="btn btn-success m-btn m-btn--icon m-btn--icon-only"><i class="flaticon-edit-1"></i></a>
              </td>
              <td><form action="{{route('sliders.destroy', ['id' => $mod->id])}}" method="post">{{ csrf_field() }}{{ method_field('delete') }}<button type="submit" class="btn btn-danger m-btn m-btn--icon m-btn--icon-only"><i class="flaticon-circle"></i></button></form></td>

            </tr>

          @endforeach

          </tbody>
        </table>

      </div>
    </div>
    @endsection
    @section('scripts')
    <script src="{{asset('admin/assets/demo/default/custom/components/datatables/base/html-table.js')}}" type="text/javascript"></script>
    @endsection
