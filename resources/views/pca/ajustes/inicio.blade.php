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
  <div class="m-portlet m-portlet--mobile">
    <div class="m-portlet__head">
      <div class="m-portlet__head-caption">
        <div class="m-portlet__head-title">
          <h3 class="m-portlet__head-text">
            Ajustes
          </h3>
        </div>
      </div>

    </div>
    <div class="m-portlet__body">

      <table class="m-datatable" id="html_table" width="100%">
        <thead>
          <tr>
            <th title="ID/Orden">
              ID
            </th>
            <th title="Clave">
              Clave
            </th>
            <th title="Valor">
              Valor
            </th>
            <th title="Editar">
              Editar
            </th>
          </tr>
        </thead>
        <tbody>
          @php
            $ajustes = Ajuste::all();
          @endphp
          @foreach ($ajustes as $ajuste)
            <tr>
              <td>
                {{$ajuste->id}}
              </td>
              <td>
                {{$ajuste->clave}}
              </td>
              <td>
                {{$ajuste->es}}
              </td>
              <td>
                <a href="{{route('ajustes.edit', ['id' => $ajuste->id])}}" class="btn btn-success m-btn m-btn--icon m-btn--icon-only"><i class="flaticon-edit-1"></i></a>
              </td>

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
