@extends('layouts.plantilla')
@section('contenido')
  @php
    if (Auth::user()->user_id) {
      if (config('jugadores.tabla')) {
        if (config('jugadores.id')) {
          $jugador = DB::table(config('jugadores.tabla'))->where(config('jugadores.id'), Auth::user()->user_id)->first();
          $haypj = DB::table(config('jugadores.tabla'))->where(config('jugadores.id'), Auth::user()->user_id)->count();
          $moneda = config('jugadores.moneda');
          $dinero = config('jugadores.dinero');
          $banco = config('jugadores.banco');
        }
      }
    }
  @endphp
  <div class="row">
    <div class="col-lg-4">
      <div class="m-portlet m-portlet--full-height ">
        <div class="m-portlet__body">
          <div class="m-card-profile">
            <div class="m-card-profile__title m--hide">
              Tu perfil
            </div>
            <div class="m-card-profile__pic">
              <div class="m-card-profile__pic-wrapper">
                <img src="{{asset(Auth::user()->avatar)}}" alt=""/>
              </div>
            </div>
            <div class="m-card-profile__details">
              <span class="m-card-profile__name">
                {{Auth::user()->name}}
              </span>
              <a href="" class="m-card-profile__email m-link">
                {{Auth::user()->email}}
              </a>
            </div>
          </div>
          <ul class="m-nav m-nav--hover-bg m-portlet-fit--sides">
            <li class="m-nav__separator m-nav__separator--fit"></li>
            <li class="m-nav__section m--hide">
              <span class="m-nav__section-text">
                Menu
              </span>
            </li>
            <li class="m-nav__item">
              <a href="#" class="m-nav__link">
                <i class="m-nav__link-icon flaticon-profile-1"></i>
                <span class="m-nav__link-title">
                  <span class="m-nav__link-wrap">
                    <span class="m-nav__link-text">
                      {{__('web.perfil')}}
                    </span>
                  </span>
                </span>
              </a>
            </li>
            <li class="m-nav__item">
              <a href="{{url('actividad')}}" class="m-nav__link">
                <i class="m-nav__link-icon flaticon-share"></i>
                <span class="m-nav__link-text">
                  {{__('web.actividad')}}
                </span>
              </a>
            </li>
            <li class="m-nav__item">
              <a href="{{url('tickets')}}" class="m-nav__link">
                <i class="m-nav__link-icon flaticon-lifebuoy"></i>
                <span class="m-nav__link-text">
                  Tickets
                </span>
              </a>
            </li>
          </ul>
          @if (Auth::user()->user_id != NULL && config('jugadores.tabla') && config('jugadores.id') && $haypj)
            <div class="m-portlet__body-separator"></div>
            <div class="m-widget1 m-widget1--paddingless">
              @if (config('jugadores.moneda'))
              <div class="m-widget1__item">
                <div class="row m-row--no-padding align-items-center">
                  <div class="col">
                    <h3 class="m-widget1__title">
                      Moneda Premium
                    </h3>
                    <span class="m-widget1__desc">
                      Moneda VIP
                    </span>
                  </div>
                  <div class="col m--align-right">
                    <span class="m-widget1__number m--font-info">
                      ${{$jugador->$moneda}}
                    </span>
                  </div>
                </div>
              </div>
              @endif
              @if (config('jugadores.dinero') && config('jugadores.banco'))
                <div class="m-widget1__item">
                  <div class="row m-row--no-padding align-items-center">
                    <div class="col">
                      <h3 class="m-widget1__title">
                        Dinero total
                      </h3>
                      <span class="m-widget1__desc">
                        Banco + Billetera
                      </span>
                    </div>
                    <div class="col m--align-right">
                      <span class="m-widget1__number m--font-brand">
                        ${{$jugador->$dinero+$jugador->$banco}}
                      </span>
                    </div>
                  </div>
                </div>
              @endif
              @if (config('jugadores.dinero'))
              <div class="m-widget1__item">
                <div class="row m-row--no-padding align-items-center">
                  <div class="col">
                    <h3 class="m-widget1__title">
                      Billetera
                    </h3>
                    <span class="m-widget1__desc">
                      Tu dinero en mano
                    </span>
                  </div>
                  <div class="col m--align-right">
                    <span class="m-widget1__number m--font-danger">
                      ${{$jugador->$dinero}}
                    </span>
                  </div>
                </div>
              </div>
              @endif
              @if (config('jugadores.banco'))
                <div class="m-widget1__item">
                  <div class="row m-row--no-padding align-items-center">
                    <div class="col">
                      <h3 class="m-widget1__title">
                        Caja de ahorro
                      </h3>
                      <span class="m-widget1__desc">
                        Tu dinero en el Banco
                      </span>
                    </div>
                    <div class="col m--align-right">
                      <span class="m-widget1__number m--font-success">
                        ${{$jugador->$banco}}
                      </span>
                    </div>
                  </div>
                </div>
              @endif

            </div>
          @endif


        </div>
      </div>
    </div>
    <div class="col-lg-8">
      <div class="m-portlet m-portlet--full-height m-portlet--tabs ">
        <div class="m-portlet__head">
          <div class="m-portlet__head-tools">
            <ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">
              <li class="nav-item m-tabs__item active">
                <a class="nav-link m-tabs__link" data-toggle="tab" href="#ajustes" role="tab">
                  {{__('web.ajustes')}}
                </a>
              </li>
              @if (Auth::user()->user_id != NULL)
                <li class="nav-item m-tabs__item">
                  <a class="nav-link m-tabs__link" data-toggle="tab" href="#estadisticas" role="tab">
                    {{__('web.estadisticas')}}
                  </a>
                </li>
              @endif

            </ul>
          </div>

        </div>
        <div class="tab-content">

          @if (Auth::user()->user_id != NULL)
            <div class="tab-pane active" id="estadisticas">
              <div class="m-portlet__body">
                <div class="row">

                </div>

              </div>
            </div>
          @endif
          <div class="tab-pane active" id="ajustes">
            <form class="m-form m-form--fit m-form--label-align-right" action="{{route('cambiarpassuser')}}" method="post">
              {{ csrf_field() }}
              {{ method_field('POST') }}
              <div class="m-portlet__body">

                <div class="form-group m-form__group">
                  <label for="slug">Contraseña Actual</label>
                  <input class="form-control m-input" id="current-password" type="password" name="current-password">
                  <span class="m-form__help">Escribe la contraseña que utilizas ahora mismo.</span>
                </div>
                <div class="form-group m-form__group">
                  <label for="slug">Nueva Contraseña</label>
                  <input class="form-control m-input" id="password" type="password" name="password">
                  <span class="m-form__help">Escribe nueva contraseña que deseas para tu cuenta.</span>
                </div>
                <div class="form-group m-form__group">
                  <label for="slug">Confirmar Contraseña</label>
                  <input class="form-control m-input" id="password_confirmation" type="password" name="password_confirmation">
                  <span class="m-form__help">Escribe la nueva contraseña de nuevo.</span>
                </div>
              </div>
              <div class="m-portlet__foot m-portlet__foot--fit">
                <div class="m-form__actions">
                  <button type="submit" class="btn btn-primary">Cambiar</button>
                </div>
              </div>
            </form>
          </div>

        </div>
      </div>
    </div>
  </div>



@endsection
