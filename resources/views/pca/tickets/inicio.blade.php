@extends('layouts.admin')
@section('content')
  @php
    $modelo = Ticket::orderBy('id', 'desc')->get();
    $columnas = Schema::getColumnListing('reportes');
    $lenguaje = LaravelLocalization::setLocale();
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
            Tickets
          </h3>
        </div>
      </div>

    </div>
    <div class="m-portlet__body">

      <table class="m-datatable" id="html_table" width="100%">
        <thead>
          <tr>
            <th title="ID">
              ID
            </th>
            <th title="Usuario">
              Usuario
            </th>
            <th title="Problema">
              Problema
            </th>
            <th title="Estado">
              Estado
            </th>
            <th title="Ver">
              Ver
            </th>


          </tr>
        </thead>
        <tbody>
          @foreach ($modelo as $mod)
            <tr>
              <td>
                {{$mod->id}}
              </td>
              <td>
                {{$mod->user->name}}
              </td>
              <td>
                {{$mod->problema->$lenguaje}}
              </td>
              <td>
                @if ($mod->estado == 0)
                  <span class="m--font-bold m--font-accent">Abierto</span>
                @else
                  <span class="m--font-bold m--font-danger">Cerrado</span>
                @endif
              </td>
              <td>
                <a href="{{route('tickets.show', ['id' => $mod->id])}}" class="btn btn-success m-btn m-btn--icon m-btn--icon-only"><i class="flaticon-visible"></i></a>
              </td>


            </tr>

          @endforeach

          </tbody>
        </table>

      </div>
    </div>
    @endsection
    @section('scripts')
    <script src="{{asset('assets/demo/default/custom/components/datatables/base/html-table.js')}}" type="text/javascript"></script>
    @endsection
