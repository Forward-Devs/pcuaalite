@extends('layouts.admin')
@section('styles')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.5.1/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.5.1/css/froala_style.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')

  <div class="m-portlet m-portlet--tab">
    <div class="m-portlet__head">
      <div class="m-portlet__head-caption">
        <div class="m-portlet__head-title">
          <h3 class="m-portlet__head-text">Nuevo Pagina</h3>
        </div>
      </div>
    </div>
    <div id="vistaprevia">

    </div>
    <form class="m-form m-form--fit m-form--label-align-right" action="{{route('paginas.store')}}"  method="post">
      {{ csrf_field() }}
      {{ method_field('POST') }}
      <div class="m-portlet__body">
        <div class="form-group m-form__group">
          <label for="tipo">Tipo</label>
          <select class="form-control m-select" name="tipo">
              <option value="1">Redirección</option>
              <option value="2">Contenido</option>
          </select>
          <span class="m-form__help">Selecciona el tipo de página.</span>
        </div>
        <div class="form-group m-form__group">
          <label for="href">Redirección</label>
          <input class="form-control m-input" id="href" type="text" name="href" >
          <span class="m-form__help">(Redirección) Si eligió una página de tipo REDIRECCIÓN, ingrese el enlace.</span>
        </div>
        <div class="form-group m-form__group">
          <label for="slug">Slug/Clave</label>
          <input class="form-control m-input" id="slug" type="text" name="slug" >
          <span class="m-form__help">(Contenido) Escribe un slug en minusculas, ejemplo: info.</span>
        </div>
        <div class="form-group m-form__group">
          <label for="titulo_es">Titulo de la Página en Español</label>
          <input class="form-control m-input" id="titulo_es" type="text" name="titulo_es">
          <span class="m-form__help">(Contenido/Redirección) El titulo que se mostrará en la barra de navegación.</span>
        </div>
        <div class="form-group m-form__group">
          <label for="titulo_en">Titulo de la Página en Inglés</label>
          <input class="form-control m-input" id="titulo_en" type="text" name="titulo_en" >
          <span class="m-form__help">(Contenido/Redirección) El titulo que se mostrará en la barra de navegación.</span>
        </div>
        <div class="form-group m-form__group">
          <label for="titulo_fr">Titulo de la Página en Francés</label>
          <input class="form-control m-input" id="titulo_fr" type="text" name="titulo_fr" >
          <span class="m-form__help">(Contenido/Redirección) El titulo que se mostrará en la barra de navegación.</span>
        </div>
        <div class="form-group m-form__group">
          <label for="contenido_es">Contenido de la página en Español</label>
          <textarea class="form-control m-textarea" id="contenido_es" name="contenido_es" rows="8" cols="80">{</textarea>
          <span class="m-form__help">(Contenido) Escriba y diseñe el contenido a mostrar en la página.</span>
        </div>
        <div class="form-group m-form__group">
          <label for="contenido_en">Contenido de la página en Inglés</label>
          <textarea class="form-control m-textarea" id="contenido_en" name="contenido_en" rows="8" cols="80"></textarea>
          <span class="m-form__help">(Contenido) Escriba y diseñe el contenido a mostrar en la página.</span>
        </div>
        <div class="form-group m-form__group">
          <label for="contenido_fr">Contenido de la página en Francés</label>
          <textarea class="form-control m-textarea" id="contenido_fr" name="contenido_fr" rows="8" cols="80"></textarea>
          <span class="m-form__help">(Contenido) Escriba y diseñe el contenido a mostrar en la página.</span>
        </div>

      </div>
      <div class="m-portlet__foot m-portlet__foot--fit">
        <div class="m-form__actions">
          <button type="submit" class="btn btn-primary">Crear Pagina</button>
          <button type="button" id="ver" class="btn btn-primary">Vista previa</button>
        </div>
      </div>
    </form>
  </div>
@endsection
@section('scripts')
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.5.1//js/froala_editor.pkgd.min.js"></script>
  <script>
  $(function() {
    $('textarea').froalaEditor()
  });
  $("#ver").click(function(){
    var slug = $("#slug").val();
    var titulo = $("#titulo_es").val();
    var contenido = $("#contenido_es").val();
    $("#vistaprevia").html("<div align='center'><iframe src='{{url('vista')}}?slug="+slug+"&title="+titulo+"&page_content="+contenido+"'width=100% height=450 frameborder=1 scrolling=auto></iframe></div>");

  });
  </script>
@endsection
