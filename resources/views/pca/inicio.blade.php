@extends('layouts.admin')
@section('content')
  <div class="m-portlet ">
    <div class="m-portlet__body  m-portlet__body--no-padding">
      <div class="row m-row--no-padding m-row--col-separator-xl">
        <div class="col-md-12 col-lg-6 col-xl-3">
          @include('pca.ext.estadisticas', ['nombre' => "Usuarios", 'cantidad' => User::all()->count(), 'modelo' => User::all(), 'color' => 'brand']);
        </div>
        <div class="col-md-12 col-lg-6 col-xl-3">
          @include('pca.ext.estadisticas', ['nombre' => "Tickets", 'cantidad' => Ticket::all()->count(), 'modelo' => Ticket::all(), 'color' => 'info']);
        </div>
        <div class="col-md-12 col-lg-6 col-xl-3">
          @include('pca.ext.estadisticas', ['nombre' => "Shouts", 'cantidad' => Shout::all()->count(), 'modelo' => Shout::all(), 'color' => 'success']);
        </div>
        <div class="col-md-12 col-lg-6 col-xl-3">
          @include('pca.ext.estadisticas', ['nombre' => "Reportes", 'cantidad' => Reporte::all()->count(), 'modelo' => Reporte::all(), 'color' => 'danger']);
        </div>
      </div>
    </div>
  </div>
  <div class="row">

    <div class="col-xl-6">

      <div class="m-portlet m-portlet--full-height ">
        <div class="m-portlet__head">
          <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
              <h3 class="m-portlet__head-text">
                Ultimos Tickets
              </h3>
            </div>
          </div>

        </div>
        <div class="m-portlet__body">
          <div class="m-widget3">
            @php
              $tickets = Ticket::take(3)->get();
            @endphp
            @foreach ($tickets as $ticket)
              <div class="m-widget3__item">
                <div class="m-widget3__header">
                  <div class="m-widget3__user-img">
                    <img class="m-widget3__img" src="{{asset($ticket->user->avatar)}}" alt="">
                  </div>
                  <div class="m-widget3__info">
                    <span class="m-widget3__username">
                      {{$ticket->user->name}}
                    </span>
                    <br>
                    <span class="m-widget3__time">
                      {{Carbon::createFromTimeStamp(strtotime($ticket->created_at))->diffForHumans()}}
                    </span>
                  </div>
                  @if ($ticket->estado == 0)
                    <span class="m-widget3__status m--font-success"><a href="{{route('tickets.show', ['id' => $ticket->id])}}" style="text-decoration:none;">{{__('web.abierto')}}</a></span>
                  @else
                    <span class="m-widget3__status m--font-danger"><a href="{{route('tickets.show', ['id' => $ticket->id])}}" style="text-decoration:none;">{{__('web.cerrado')}}</a></span>
                  @endif
                </div>
                <div class="m-widget3__body">
                  <p class="m-widget3__text">
                    {{$ticket->ticket}}
                  </p>
                </div>
              </div>
            @endforeach



          </div>
        </div>
      </div>

    </div>
    <div class="col-xl-6">
      <div class="m-portlet m-portlet--full-height ">
        <div class="m-portlet__head">
          <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
              <h3 class="m-portlet__head-text">
                Nuevos Usuarios
              </h3>
            </div>
          </div>

        </div>
        <div class="m-portlet__body">
          <div class="tab-content">
            <div class="tab-pane active" id="m_widget4_tab1_content">
              <div class="m-widget4">
                @php
                  $usuarios = DB::table('users')->where('id', '!=', Auth::user()->id)->orderBy('id', 'desc')->take(5)->get();
                @endphp
                @foreach($usuarios as $usuario)
                <div class="m-widget4__item">
                  <div class="m-widget4__img m-widget4__img--pic">
                    <img src="{{asset($usuario->avatar)}}" alt="">
                  </div>
                  <div class="m-widget4__info">
                    <span class="m-widget4__title">
                      <a href="{{url($usuario->name)}}" class="m-widget4__title">{{$usuario->name}}</a>
                    </span>
                    <br>
                    <span class="m-widget4__sub">
                      {{Carbon::createFromTimeStamp(strtotime($usuario->created_at))->diffForHumans()}}
                    </span>
                  </div>
                  <div class="m-widget4__ext">
                    @auth
                    @php
                      $losigue = DB::table('seguidores')->where('user_id', auth()->user()->id)->where('follow_id', $usuario->id)->count();
                    @endphp
                    @if ($losigue)
                      <form action="{{action('UserController@seguir', ['id' => $usuario->id])}}" id="formseguir" method="post">
                        <input type="hidden" id="usuario" name="usuario" value="{{$usuario->id}}">
                        {{ csrf_field() }}
                        {{ method_field('POST') }}
                        <button type="submit" id="seguir" class="m-btn m-btn--pill m-btn--hover-brand btn btn-sm btn-secondary">
                          <div id="sigue">
                            {{__('web.noseguir')}}
                          </div>
                        </button>
                      </form>
                    @else
                      <form action="{{action('UserController@seguir', ['id' => $usuario->id])}}" id="formseguir" method="post">
                        <input type="hidden" id="usuario" name="usuario" value="{{$usuario->id}}">
                        {{ csrf_field() }}
                        {{ method_field('POST') }}
                        <button type="submit" id="seguir" class="m-btn m-btn--pill m-btn--hover-brand btn btn-sm btn-secondary">
                          <div id="sigue">
                            {{__('web.seguir')}}
                          </div>
                        </button>
                      </form>
                  @endif
                    @endauth

                  </div>
                </div>
                @endforeach


              </div>

            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

@endsection
@section('scripts')
  <script type="text/javascript">
  $(function () {
    $('#formseguir').submit(function(e) {
      e.preventDefault();
      $.ajax({
              type: 'POST',
              url: $(this).attr('action'),
              data: $(this).serialize(),

              // Mostramos un mensaje con la respuesta de PHP
              success: function(data) {

                $('#sigue').empty().append(data.mensaje);
                return false;
              }
          });
          return false;
    });
  })
  </script>
@endsection
