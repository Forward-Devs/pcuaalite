@extends('layouts.admin')

@section('content')

  <div class="m-portlet m-portlet--tab">
    <div class="m-portlet__head">
      <div class="m-portlet__head-caption">
        <div class="m-portlet__head-title">
          <h3 class="m-portlet__head-text">Editar Slider</h3>
        </div>
      </div>
    </div>
    <form class="m-form m-form--fit m-form--label-align-right" enctype="multipart/form-data" action="{{route('sliders.update', ['id' => $modelo->id])}}"  method="post">
      {{ csrf_field() }}
      {{ method_field('PUT') }}
      <div class="m-portlet__body">
        <div class="form-group m-form__group">
          <label for="imagen">
            Imagen 1200x400
          </label>
          <div></div>
          <label class="custom-file">
            <input type="file" name="imagen" placeholder="{{$modelo->imagen}}" class="form-control-file">
          </label>
        </div>
        <div class="form-group m-form__group">
          <label for="redireccion">Redirección</label>
          <input class="form-control m-input" type="text" name="redireccion" value="{{$modelo->redireccion}}">
          <span class="m-form__help">En caso de una redirección escriba la URL de destino</span>
        </div>


      </div>
      <div class="m-portlet__foot m-portlet__foot--fit">
        <div class="m-form__actions">
          <button type="submit" class="btn btn-primary">Editar Slider</button>
        </div>
      </div>
    </form>
  </div>
@endsection
