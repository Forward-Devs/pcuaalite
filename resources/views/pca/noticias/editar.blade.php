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
          <h3 class="m-portlet__head-text">Editar noticia #{{$noticia->id}}</h3>
        </div>
      </div>
    </div>
    <form class="m-form m-form--fit m-form--label-align-right" action="{{route('noticias.update', ['id' => $noticia->id])}}" enctype="multipart/form-data" method="post">
      {{ csrf_field() }}
      {{ method_field('PUT') }}
      <div class="m-portlet__body">
        <div class="form-group m-form__group">
          <label for="portada">
            Portada 1200x400
          </label>
          <div></div>
          <label class="custom-file">
            <input type="file" name="portada" placeholder="Haga click para seleccionar un archivo" class="form-control-file">
          </label>
        </div>
        <div class="form-group m-form__group">
          <label for="titulo_es">Titulo de la noticia en Español</label>
          <input class="form-control m-input" type="text" name="titulo_es" value="{{$noticia->titulo_es}}">
          <span class="m-form__help">Escriba el titulo de tu noticia en Español</span>
        </div>
        <div class="form-group m-form__group">
          <label for="titulo_en">Titulo de la noticia en Ingles</label>
          <input class="form-control m-input" type="text" name="titulo_en" value="{{$noticia->titulo_en}}">
          <span class="m-form__help">Escriba el titulo de tu noticia en Inglés</span>
        </div>
        <div class="form-group m-form__group">
          <label for="titulo_fr">Titulo de la noticia en Francés</label>
          <input class="form-control m-input" type="text" name="titulo_fr" value="{{$noticia->titulo_fr}}">
          <span class="m-form__help">Escriba el titulo de tu noticia en Francés</span>
        </div>
        <div class="form-group m-form__group">
          <label for="es">Noticia en Español</label>
          <textarea class="form-control m-textarea" name="es" >{{$noticia->es}}</textarea>
          <span class="m-form__help">Escriba el cuerpo de la noticia en Español.</span>
        </div>
        <div class="form-group m-form__group">
          <label for="en">Noticia en Inglés</label>
          <textarea name="en">{{$noticia->en}}</textarea>
          <span class="m-form__help">Escriba el cuerpo de la noticia en Inglés.</span>
        </div>
        <div class="form-group m-form__group">
          <label for="fr">Noticia en Francés</label>
          <textarea class="form-control m-textarea" name="fr" >{{$noticia->fr}}</textarea>
          <span class="m-form__help">Escriba el cuerpo de la noticia en Francés.</span>
        </div>
      </div>
      <div class="m-portlet__foot m-portlet__foot--fit">
        <div class="m-form__actions">
          <button type="submit" class="btn btn-primary">Editar Noticia</button>
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
  </script>
@endsection
