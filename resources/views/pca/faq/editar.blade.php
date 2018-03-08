@extends('layouts.admin')

@section('content')
  <div class="m-portlet m-portlet--tab">
    <div class="m-portlet__head">
      <div class="m-portlet__head-caption">
        <div class="m-portlet__head-title">
          <h3 class="m-portlet__head-text">Editar FAQ</h3>
        </div>
      </div>
    </div>
    <form class="m-form m-form--fit m-form--label-align-right" action="{{route('faqs.update', ['id' => $faq->id])}}"  method="post">
      {{ csrf_field() }}
      {{ method_field('PUT') }}
      <div class="m-portlet__body">

        <div class="form-group m-form__group">
          <label for="p_es">Pregunta en Español</label>
          <input class="form-control m-input" type="text" name="p_es" value="{{$faq->p_es}}">
          <span class="m-form__help">Escriba la pregunta en Español</span>
        </div>
        <div class="form-group m-form__group">
          <label for="p_en">Pregunta en Ingles</label>
          <input class="form-control m-input" type="text" name="p_en" value="{{$faq->p_en}}">
          <span class="m-form__help">Escriba la pregunta en Inglés</span>
        </div>
        <div class="form-group m-form__group">
          <label for="p_fr">Pregunta en Francés</label>
          <input class="form-control m-input" type="text" name="p_fr" value="{{$faq->p_fr}}">
          <span class="m-form__help">Escriba la pregunta Francés</span>
        </div>
        <div class="form-group m-form__group">
          <label for="r_es">Respuesta en Español</label>
          <input class="form-control m-input" type="text" name="r_es" value="{{$faq->r_es}}">
          <span class="m-form__help">Escriba la respuesta en Español</span>
        </div>
        <div class="form-group m-form__group">
          <label for="r_en">Respuesta en Ingles</label>
          <input class="form-control m-input" type="text" name="r_en" value="{{$faq->r_en}}">
          <span class="m-form__help">Escriba la respuesta en Inglés</span>
        </div>
        <div class="form-group m-form__group">
          <label for="r_fr">Respuesta en Francés</label>
          <input class="form-control m-input" type="text" name="r_fr" value="{{$faq->r_fr}}">
          <span class="m-form__help">Escriba la respuesta Francés</span>
        </div>
      </div>
      <div class="m-portlet__foot m-portlet__foot--fit">
        <div class="m-form__actions">
          <button type="submit" class="btn btn-primary">Editar FAQ</button>
        </div>
      </div>
    </form>
  </div>
@endsection
