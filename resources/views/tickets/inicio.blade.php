@extends('layouts.plantilla')
@section('contenido')
  @php
  $tickets = Ticket::where('user_id', Auth::user()->id)->orderBy('id','desc')->get();
  $abiertos = Ticket::where('user_id', Auth::user()->id)->where('estado', '0')->orderBy('id','desc')->get();
  $cerrados = Ticket::where('user_id', Auth::user()->id)->where('estado', '1')->orderBy('id','desc')->get();
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

  <div class="m-content">
    <div class="row">
      <div class="col-md-8">
        <div class="m-alert m-alert--icon m-alert--air m-alert--square alert alert-dismissible m--margin-bottom-30" role="alert">
          <div class="m-alert__icon">
            <i class="flaticon-exclamation m--font-brand"></i>
          </div>
          <div class="m-alert__text">
            {{__('web.ticketsenviados')}}
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="m--align-right">
          <a href="{{url('tickets/create')}}" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
            <span>
              <i class="la la-plus"></i>
              <span>
                {{__('web.enviarticket')}}
              </span>
            </span>
          </a>
          <div class="m-separator m-separator--dashed d-xl-none"></div>
        </div>
      </div>
    </div>
    <div class="m-portlet m-portlet--full-height ">
      <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
          <div class="m-portlet__head-title">
            <h3 class="m-portlet__head-text">
              Tickets
            </h3>

          </div>
        </div>
        <div class="m-portlet__head-tools">
          <ul class="nav nav-pills nav-pills--brand m-nav-pills--align-right m-nav-pills--btn-pill m-nav-pills--btn-sm" role="tablist">
            <li class="nav-item m-tabs__item">
              <a class="nav-link m-tabs__link active" data-toggle="tab" href="#tickets" role="tab">
                {{__('web.todo')}}
              </a>
            </li>
            <li class="nav-item m-tabs__item">
              <a class="nav-link m-tabs__link" data-toggle="tab" href="#abiertos" role="tab">
                {{__('web.abierto')}}
              </a>
            </li>
            <li class="nav-item m-tabs__item">
              <a class="nav-link m-tabs__link" data-toggle="tab" href="#cerrados" role="tab">
                {{__('web.cerrado')}}
              </a>
            </li>
          </ul>
        </div>
      </div>
      <div class="m-portlet__body">
        <div class="tab-content">
          <div class="tab-pane active" id="tickets">
            <div class="m-widget2">
              @foreach (auth()->user()->getTickets as $ticket)
                @php
                  if ($ticket->estado == 0) {
                    $estado = 'success';
                  }
                  else {
                    $estado = 'danger';
                  }
                @endphp
                <div class="m-widget2__item m-widget2__item--{{$estado}}">
                  <div class="m-widget2__checkbox">
                  </div>
                  <div class="m-widget2__desc">
                    <span class="m-widget2__text">
                      <a href="{{route('tickets.show', ['id' => $ticket->id])}}" style="text-decoration:none">{{$ticket->titulo}}</a>
                    </span>
                    <br>
                    <span class="m-widget2__user-name">

                        {{Carbon::createFromTimeStamp(strtotime($ticket->created_at))->diffForHumans()}}

                    </span>
                  </div>
                  <div class="m-widget2__actions">
                    @if ($ticket->estado == 0)
                      <span class="m-badge  m-badge--success m-badge--wide">{{__('web.abierto')}}</span>
                    @else
                      <span class="m-badge  m-badge--danger m-badge--wide">{{__('web.cerrado')}}</span>
                    @endif
                  </div>
                </div>
              @endforeach
            </div>
          </div>
          <div class="tab-pane" id="abiertos">
            <div class="m-widget2">
              @foreach ($abiertos as $ticket)
                @php
                  if ($ticket->estado == 0) {
                    $estado = 'success';
                  }
                  else {
                    $estado = 'danger';
                  }
                @endphp
                <div class="m-widget2__item m-widget2__item--{{$estado}}">
                  <div class="m-widget2__checkbox">
                  </div>
                  <div class="m-widget2__desc">
                    <span class="m-widget2__text">
                      <a href="#" style="text-decoration:none">{{$ticket->titulo}}</a>
                    </span>
                    <br>
                    <span class="m-widget2__user-name">
                      <a href="#" class="m-widget2__link">
                        {{Carbon::createFromTimeStamp(strtotime($ticket->created_at))->diffForHumans()}}
                      </a>
                    </span>
                  </div>
                  <div class="m-widget2__actions">
                    @if ($ticket->estado == 0)
                      <span class="m-badge  m-badge--success m-badge--wide">{{__('web.abierto')}}</span>
                    @else
                      <span class="m-badge  m-badge--danger m-badge--wide">{{__('web.cerrado')}}</span>
                    @endif
                  </div>
                </div>
              @endforeach
            </div></div>
          <div class="tab-pane" id="cerrados">
            <div class="m-widget2">
              @foreach ($cerrados as $ticket)
                @php
                  if ($ticket->estado == 0) {
                    $estado = 'success';
                  }
                  else {
                    $estado = 'danger';
                  }
                @endphp
                <div class="m-widget2__item m-widget2__item--{{$estado}}">
                  <div class="m-widget2__checkbox">
                  </div>
                  <div class="m-widget2__desc">
                    <span class="m-widget2__text">
                      <a href="#" style="text-decoration:none">{{$ticket->titulo}}</a>
                    </span>
                    <br>
                    <span class="m-widget2__user-name">
                      <a href="#" class="m-widget2__link">
                        {{Carbon::createFromTimeStamp(strtotime($ticket->created_at))->diffForHumans()}}
                      </a>
                    </span>
                  </div>
                  <div class="m-widget2__actions">
                    @if ($ticket->estado == 0)
                      <span class="m-badge  m-badge--success m-badge--wide">{{__('web.abierto')}}</span>
                    @else
                      <span class="m-badge  m-badge--danger m-badge--wide">{{__('web.cerrado')}}</span>
                    @endif
                  </div>
                </div>
              @endforeach
            </div></div>
        </div>
      </div>
    </div>
  </div>


@endsection
@section('scripts')

@endsection
