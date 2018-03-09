@extends('layouts.plantilla')
@section('contenido')
  @php
    $faqs = FAQ::all();
    $lenguaje = LaravelLocalization::setLocale();
    $pregunta = 'p_'.$lenguaje;
    $respuesta = 'r_'.$lenguaje;
  @endphp
  @if (FAQ::count() == 0)
    <h1 style="text-align:center;">{{__('web.noregistros')}}</h1>
  @endif
  @foreach ($faqs as $faq)
    <div class="m-portlet m-portlet--tabs m-portlet--brand m-portlet--head-solid-bg m-portlet--head-sm m-portlet--bordered">
      <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
          <div class="m-portlet__head-title">
            <h3 class="m-portlet__head-text">
              FAQ #{{$faq->id}}
            </h3>
          </div>
        </div>
        <div class="m-portlet__head-tools">
          <ul class="nav nav-tabs m-tabs m-tabs-line m-tabs-line--brand  m-tabs-line--right m-tabs-line-danger" role="tablist">
            <li class="nav-item m-tabs__item">
              <a class="nav-link m-tabs__link active" data-toggle="tab" href="#pregunta" role="tab">
                <i class="flaticon-questions-circular-button"></i>
                {{__('web.pregunta')}}
              </a>
            </li>
            <li class="nav-item m-tabs__item">
              <a class="nav-link m-tabs__link" data-toggle="tab" href="#respuesta" role="tab">
                <i class="flaticon-information"></i>
                {{__('web.respuesta')}}
              </a>
            </li>
          </ul>
        </div>
      </div>
      <div class="m-portlet__body">
        <div class="tab-content">
          <div class="tab-pane active" id="pregunta">
            <h2 style="text-align:center;">{{$faq->$pregunta}}</h2>
          </div>
          <div class="tab-pane " id="respuesta" style="text-align:center;">
            <b style="text-align:center;">{{$faq->$respuesta}}</b>
          </div>

        </div>
      </div>
    </div>
  @endforeach

@endsection
