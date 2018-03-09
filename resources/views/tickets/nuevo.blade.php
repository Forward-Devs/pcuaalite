@extends('layouts.plantilla')
@section('side')
  @include('aside')
@endsection
@section('contenido')
  @php
    $lenguajee = LaravelLocalization::setLocale();
    $problemas = Problema::all();
  @endphp
  <div class="m-portlet m-portlet--tab">
    <div class="m-portlet__head">
      <div class="m-portlet__head-caption">
        <div class="m-portlet__head-title">
          <h3 class="m-portlet__head-text">{{__('web.enviarticket')}}</h3>
        </div>
      </div>
    </div>
    <form class="m-form m-form--fit m-form--label-align-right" action="{{route('tickets.store')}}" method="post">
      {{ csrf_field() }}
      {{ method_field('POST') }}
      <div class="m-portlet__body">
        <div class="form-group m-form__group">
          <label for="problema">{{__('web.seleccioneproblema')}}</label>
          <select class="form-control m-select" name="problema">
            @foreach ($problemas as $problema)
              <option value="{{$problema->id}}">{{$problema->$lenguajee}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group m-form__group">
          <label for="titulo">{{__('web.asuntoticket')}}</label>
          <input class="form-control m-input" type="text" name="titulo" value="">
          <span class="m-form__help">{{__('web.descasuntoticket')}}</span>
        </div>
          <div class="form-group m-form__group">
          <label for="ticket">{{__('web.problematicket')}}</label>
          <textarea class="form-control m-textarea" name="ticket" rows="8" cols="80"></textarea>
          <span class="m-form__help">{{__('web.descproblema')}}</span>
        </div>
      </div>
      <div class="m-portlet__foot m-portlet__foot--fit">
        <div class="m-form__actions">
          <button type="submit" class="btn btn-primary">{{__('web.enviarticket')}}</button>
        </div>
      </div>
    </form>
  </div>
@endsection
