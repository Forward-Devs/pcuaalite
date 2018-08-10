
<li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" data-dropdown-toggle="click">
  <a href="#" class="m-nav__link m-dropdown__toggle">

    <span class="m-topbar__welcome">
      {{__('web.hola')}}
    </span>
    <span class="m-topbar__username">
      {{Auth::user()->name}}
    </span>
  </a>
  <div class="m-dropdown__wrapper">
    <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
    <div class="m-dropdown__inner">
      <div class="m-dropdown__header m--align-center" style="background: url({{asset('assets/app/media/img/misc/user_profile_bg.jpg')}}); background-size: cover;">
        <div class="m-card-user m-card-user--skin-dark">
          <div class="m-card-user__pic">
            <img src="{{asset(Auth::user()->avatar)}}" class="m--img-rounded m--marginless" alt=""/>
          </div>
          <div class="m-card-user__details">
            <a href="{{url('user/'.Auth::user()->name)}}" class="m-card-user__name m--font-weight-500">
              {{Auth::user()->name}}
            </a>
            <a href="" class="m-card-user__email m--font-weight-300 m-link">
              {{Auth::user()->email}}
            </a>
          </div>
        </div>
      </div>
      <div class="m-dropdown__body">
        <div class="m-dropdown__content">
          <ul class="m-nav m-nav--skin-light">
            <li class="m-nav__section m--hide">
              <span class="m-nav__section-text">
                Menú de usuario
              </span>
            </li>
            <li class="m-nav__item">
              <a href="{{url('user/'.Auth::user()->name)}}" class="m-nav__link">
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
              <a href="{{url('mensajes')}}" class="m-nav__link">
                <i class="m-nav__link-icon flaticon-chat-1"></i>
                <span class="m-nav__link-text">
                  {{__('web.mensajes')}}
                </span>
              </a>
            </li>
            @if (Auth::user()->isAdmin())
            <li class="m-nav__separator m-nav__separator--fit"></li>
              <li class="m-nav__item">
                <a href="{{url('pca')}}" class="m-nav__link">
                  <i class="m-nav__link-icon flaticon-profile-1"></i>
                  <span class="m-nav__link-title">
                    <span class="m-nav__link-wrap">
                      <span class="m-nav__link-text">
                        Panel Administrativo
                      </span>

                    </span>
                  </span>
                </a>
              </li>
            @endif

            <li class="m-nav__separator m-nav__separator--fit"></li>
            <li class="m-nav__item">
              <a href="{{url('faq')}}" class="m-nav__link">
                <i class="m-nav__link-icon flaticon-info"></i>
                <span class="m-nav__link-text">
                  FAQ
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
            <li class="m-nav__item">
              <a href="{{url('reporte')}}" class="m-nav__link">
                <i class="m-nav__link-icon flaticon-lifebuoy"></i>
                <span class="m-nav__link-text">
                  {{__('web.reportes')}}
                </span>
              </a>
            </li>
            <li class="m-nav__separator m-nav__separator--fit"></li>
            <li class="m-nav__item">
                <a href="{{ route('logout') }}" class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder"
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                {{__('web.desconectarme')}}
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
              </form>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</li>
