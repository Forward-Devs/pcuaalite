@extends('layouts.plantilla')
@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.5.1/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.5.1/css/froala_style.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('side')
  @include('aside')
@endsection
@section('contenido')
  @php
    $lenguajee = LaravelLocalization::setLocale();

  @endphp
  <div class="m-portlet m-portlet--tab">
    <div class="m-portlet__head">
      <div class="m-portlet__head-caption">
        <div class="m-portlet__head-title">
          <h3 class="m-portlet__head-text">{{__('web.reporte.generar')}}</h3>
        </div>
      </div>
    </div>
    <form class="m-form m-form--fit m-form--label-align-right" action="{{route('reporte.store')}}" method="post">
      {{ csrf_field() }}
      {{ method_field('POST') }}
      <div class="m-portlet__body">
        <div class="form-group m-form__group">
          <label for="problema">{{__('web.reporte.buscaruser')}}</label>
          <select class="buscarUser form-control m-select" name="reportado_id"></select>
        </div>
        <div class="form-group m-form__group">
          <label for="titulo">{{__('web.reporte.razon')}}</label>
          <input class="form-control m-input" type="text" name="razon" value="">
          <span class="m-form__help">{{__('web.reporte.razonexp')}}</span>
        </div>
          <div class="form-group m-form__group">
          <label for="ticket">{{__('web.reporte.reporte')}}</label>
          <textarea class="form-control m-textarea" name="reporte" rows="8" cols="80"></textarea>
          <span class="m-form__help">{{__('web.reporte.reporteexp')}}</span>
        </div>
      </div>
      <div class="m-portlet__foot m-portlet__foot--fit">
        <div class="m-form__actions">
          <button type="submit" class="btn btn-primary">{{__('web.reporte.enviar')}}</button>
        </div>
      </div>
    </form>
  </div>
@endsection
@section('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
  <script type="text/javascript">

        $('.buscarUser').select2({
          placeholder: 'Seleccione un usuario',
          ajax: {
            url: '{{url('autocomplete')}}',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
              return {
                results:  $.map(data, function (item) {
                      return {
                          text: item.name,
                          id: item.id
                      }
                  })
              };
            },
            cache: true
          }
        });

  </script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.5.1//js/froala_editor.pkgd.min.js"></script>
  <script>
  $(function() {
    $('textarea').froalaEditor()
  });
  </script>
@endsection
