<li class="m-nav__item m-topbar__quick-actions m-topbar__quick-actions--img m-dropdown m-dropdown--large m-dropdown--header-bg-fill m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push m-dropdown--mobile-full-width m-dropdown--skin-light"  data-dropdown-toggle="click">
  <a href="#" class="m-nav__link m-dropdown__toggle">
    <span class="m-nav__link-badge m-badge m-badge--dot m-badge--info m--hide"></span>
    <span class="m-nav__link-icon">
      <span class="m-nav__link-icon-wrapper">
        <i class="flaticon-share"></i>
      </span>
    </span>
  </a>
  <div class="m-dropdown__wrapper">
    <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
    <div class="m-dropdown__inner">
      <div class="m-dropdown__header m--align-center" style="background: url({{asset('assets/app/media/img/misc/quick_actions_bg.jpg')}}); background-size: cover;">
        <span class="m-dropdown__header-title">
          {{__('web.accionesrapidas')}}
        </span>
        <span class="m-dropdown__header-subtitle">
          {{__('web.atajos')}}
        </span>
      </div>
      <div class="m-dropdown__body m-dropdown__body--paddingless">
        <div class="m-dropdown__content">
          <div class="m-scrollable" data-scrollable="false" data-max-height="380" data-mobile-max-height="200">
            <div class="m-nav-grid m-nav-grid--skin-light">
              <div class="m-nav-grid__row">
                @if (Auth::user()->user_id != NULL)
                  @php
                  $id = config('jugadores.id');
                  $nombre = config('jugadores.nombre');
                  $tabla = config('jugadores.tabla');
                    $usuario = DB::table($tabla)->where($id, Auth::user()->user_id)->first();
                  @endphp
                  <a href="#" class="m-nav-grid__item">
                    <i class="m-nav-grid__icon flaticon-user-settings"></i>
                    <span class="m-nav-grid__text">
                      {{$usuario->$nombre}}
                    </span>
                  </a>
                @else
                <a href="{{url('vincular')}}" class="m-nav-grid__item">
                  <i class="m-nav-grid__icon flaticon-user-add"></i>
                  <span class="m-nav-grid__text">
                    Vincular Jugador
                  </span>
                </a>
                @endif

                <a href="{{url('reporte/create')}}" class="m-nav-grid__item">
                  <i class="m-nav-grid__icon flaticon-file"></i>
                  <span class="m-nav-grid__text">
                    {{__('web.reporte.generar')}}
                  </span>
                </a>
              </div>
              <div class="m-nav-grid__row">
                <a href="{{url('user/'.Auth::user()->name)}}" class="m-nav-grid__item">
                  <i class="m-nav-grid__icon flaticon-comment"></i>
                  <span class="m-nav-grid__text">
                    Shout
                  </span>
                </a>
                <a href="{{route('tickets.create')}}" class="m-nav-grid__item">
                  <i class="m-nav-grid__icon flaticon-notes"></i>
                  <span class="m-nav-grid__text">
                    {{__('web.enviarticket')}}
                  </span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</li>
