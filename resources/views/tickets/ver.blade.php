@extends('layouts.plantilla')
@section('side')
  @include('aside')
@endsection
@section('contenido')
  @php
    $lenguaje = LaravelLocalization::setLocale();
    $respuestas = Respuesta::where('ticket_id', $ticket->id)->get();
    $hresp = Respuesta::where('ticket_id', $ticket->id)->count();
  @endphp
  @if (session('message'))
    <div class="m-alert m-alert--icon m-alert--icon-solid m-alert--outline alert alert-brand alert-dismissible fade show" role="alert">
      <div class="m-alert__icon">
        <i class="flaticon-exclamation-1"></i>
        <span></span>
      </div>
      <div class="m-alert__text">
        <strong>{{ session('message') }}</strong>
      </div>
      <div class="m-alert__close">
        <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar"></button>
      </div>
    </div>
  @endif
  <div class="m-portlet m-portlet--full-height ">
    <div class="m-portlet__head">
      <div class="m-portlet__head-caption">
        <div class="m-portlet__head-title">
          <h3 class="m-portlet__head-text">
            Ticket #{{$ticket->id}}@if ($ticket->estado == 0) <span class="m-badge  m-badge--success m-badge--wide">{{__('web.abierto')}}</span> @else <span class="m-badge  m-badge--danger m-badge--wide">{{__('web.cerrado')}}</span> @endif
          </h3>
        </div>
      </div>

    </div>
    <div class="m-portlet__body">
      <div class="m-widget13">
        <div class="m-widget13__item ">
          <span class="m-widget13__desc m--align-right">
            {{__('web.usuario')}}:
          </span>
          <span class="m-widget13__text m-widget13__text-bolder">
            {{$ticket->user->name}} (<a href="{{route('profile', ['usuario' => $ticket->user->name])}}">#{{$ticket->user->id}}</a>)
          </span>
        </div>
        <div class="m-widget13__item">
          <span class="m-widget13__desc m--align-right">
            {{__('web.problema')}}:
          </span>
          <span class="m-widget13__text m-widget13__text-bolder">
            {{$ticket->problema->$lenguaje}}
          </span>
        </div>
        <div class="m-widget13__item">
          <span class="m-widget13__desc m--align-right">
            {{__('web.asunto')}}:
          </span>
          <span class="m-widget13__text m-widget13__text-bolder">
            {{$ticket->titulo}}
          </span>
        </div>
        <div class="m-widget13__item">
          <span class="m-widget13__desc m--align-right">
            {{__('web.dproblema')}}:
          </span>
          <span class="m-widget13__text ">
            {{$ticket->ticket}}
          </span>
        </div>
        @if (Auth::user()->isAdmin() && $ticket->estado == 0)
          <div class="m-widget13__action m--align-right">
            <form action="{{route('tickets.destroy', ['id' => $ticket->id])}}" method="post">
              {{ csrf_field() }}
              {{ method_field('delete') }}
              <button type="submit" class="m-widget__detalis  btn m-btn--pill  btn-danger">
  													{{__('web.cerrar')}}
  												</button>
            </form>
          </div>
        @endif

      </div>
    </div>
  </div>
  <div class="m-portlet m-portlet--full-height">
    <div class="m-portlet__head">
      <div class="m-portlet__head-caption">
        <div class="m-portlet__head-title">
          <h3 class="m-portlet__head-text">
            {{__('web.respuestas')}}
          </h3>
        </div>
      </div>
    </div>
    <div class="m-portlet__body">
      <div class="m-widget3">
        @foreach ($respuestas as $resp)

          <div class="m-widget3__item" >
            <div class="m-widget3__header">
              <div class="m-widget3__user-img">
                <img class="m-widget3__img" src="{{asset($resp->user->avatar)}}" alt="">
              </div>
              <div class="m-widget3__info">
                <span class="m-widget3__username">
                  {{$resp->user->name}}@if ($resp->user->isAdmin()) (Admin) @endif
                </span>
                <br>
                <span class="m-widget3__time">
                  {{Carbon::createFromTimeStamp(strtotime($resp->created_at))->diffForHumans()}}
                </span>

              </div>

            </div>

            <div class="m-widget3__body">
              <p class="m-widget3__text" style="text-align:center; font-size: 1.3rem;">
                {{$resp->respuesta}}
              </p>
            </div>

          </div>
        @endforeach

      </div>

    </div>
  </div>
  @if ($ticket->estado == 0)
    <form class="m-form m-form--fit" action="{{route('responder', ['id' => $ticket->id])}}" method="post">
      {{ csrf_field() }}
      <div class="col-10 pull-left">
        <textarea name="respuesta" class="form-control m-textarea" maxlength="1000"></textarea>
      </div>
      <div class="col-2 pull-right">
        <button type="submit" class="btn btn-accent">
          {{__('web.responder')}}
        </button>
      </div>
    </form>

  @endif

@endsection
