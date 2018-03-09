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
            Páginas
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
            <a href="{{route('paginas.create')}}" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
              <span>
                <i class="la la-cart-plus"></i>
                <span>
                  Crear Pagina
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
            <th title="ID/Orden">
              ID
            </th>
            <th title="Tipo">
              Tipo
            </th>
            <th title="Slug">
              Slug
            </th>
            <th title="Titulo">
              Titulo
            </th>
            <th title="Editar">
              Editar
            </th>
            <th title="Borrar">
              Borrar
            </th>

          </tr>
        </thead>
        <tbody>
          @php
            $paginas = Pagina::all();
          @endphp
          @foreach ($paginas as $pagina)
            <tr>
              <td>
                {{$pagina->id}}
              </td>
              @if ($pagina->tipo == 1)
              <td>
                Redirección
              </td>
              @else
              <td>
                Página
              </td>
              @endif
              <td>
                {{$pagina->slug}}
              </td>
              <td>
                {{$pagina->titulo_es}}
              </td>

              <td>
                <a href="{{route('paginas.edit', ['id' => $pagina->id])}}" class="btn btn-success m-btn m-btn--icon m-btn--icon-only"><i class="flaticon-edit-1"></i></a>

              </td>
              <td><form action="{{route('paginas.destroy', ['id' => $pagina->id])}}" method="post">{{ csrf_field() }}{{ method_field('delete') }}<button type="submit" class="btn btn-danger m-btn m-btn--icon m-btn--icon-only"><i class="flaticon-circle"></i></button></form></td>
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
