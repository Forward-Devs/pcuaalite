<div id="m_aside_left" class="m-grid__item m-aside-left ">
  <div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-light m-aside-menu--submenu-skin-light " data-menu-vertical="true" data-menu-scrollable="false" data-menu-dropdown-timeout="500">
    <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
      <li class="m-menu__section">
        <h4 class="m-menu__section-text">
          Enlaces
        </h4>
        <i class="m-menu__section-icon flaticon-more-v3"></i>
      </li>

      <li class="m-menu__item " aria-haspopup="true"  data-redirect="true">
        <a  href="{{url('/')}}" class="m-menu__link ">
          <i class="m-menu__link-bullet m-menu__link-bullet--dot">
            <span></span>
          </i>
          <span class="m-menu__link-text">
            {{__('web.inicio')}}
          </span>
        </a>
      </li>

      <li class="m-menu__item " aria-haspopup="true"  data-redirect="true">
        <a  href="{{url('noticias')}}" class="m-menu__link ">
          <i class="m-menu__link-bullet m-menu__link-bullet--dot">
            <span></span>
          </i>
          <span class="m-menu__link-text">
            {{__('web.noticias')}}
          </span>
        </a>
      </li>

      @auth
        <li class="m-menu__section">
          <h4 class="m-menu__section-text">
            {{__('web.cuenta')}}
          </h4>
          <i class="m-menu__section-icon flaticon-more-v3"></i>
        </li>
        <li class="m-menu__item " aria-haspopup="true"  data-redirect="true">
          <a  href="{{url('user/'.Auth::user()->name)}}" class="m-menu__link ">
            <i class="m-menu__link-bullet m-menu__link-bullet--dot">
              <span></span>
            </i>
            <span class="m-menu__link-text">
              {{__('web.perfil')}}
            </span>
          </a>
        </li>
        <li class="m-menu__item " aria-haspopup="true"  data-redirect="true">
          <a  href="{{url('actividad')}}" class="m-menu__link ">
            <i class="m-menu__link-bullet m-menu__link-bullet--dot">
              <span></span>
            </i>
            <span class="m-menu__link-text">
              {{__('web.actividad')}}
            </span>
          </a>
        </li>

        <li class="m-menu__item " aria-haspopup="true"  data-redirect="true">
          <a  href="{{url('tickets')}}" class="m-menu__link ">
            <i class="m-menu__link-bullet m-menu__link-bullet--dot">
              <span></span>
            </i>
            <span class="m-menu__link-text">
              Tickets
            </span>
          </a>
        </li>
      @endauth

    </ul>
  </div>

</div>
