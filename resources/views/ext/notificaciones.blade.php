@php

$lan = App::getLocale();
@endphp
<li class="m-nav__item m-topbar__notifications m-topbar__notifications--img m-dropdown m-dropdown--large m-dropdown--header-bg-fill m-dropdown--arrow m-dropdown--align-center 	m-dropdown--mobile-full-width" data-dropdown-toggle="click" data-dropdown-persistent="true">
  <a href="#" class="m-nav__link m-dropdown__toggle" id="notificaciones">
    @if (count(auth()->user()->unreadNotifications))
      <span class="m-nav__link-badge m-badge m-badge--dot m-badge--dot-small m-badge--danger"></span>
    @endif
    <span class="m-nav__link-icon">
      <span class="m-nav__link-icon-wrapper">
        <i class="flaticon-music-2"></i>
      </span>
    </span>
  </a>
  <div class="m-dropdown__wrapper">
    <span class="m-dropdown__arrow m-dropdown__arrow--center"></span>
    <div class="m-dropdown__inner">
      <div class="m-dropdown__header m--align-center" style="background: url({{asset('assets/app/media/img/misc/notification_bg.jpg')}}); background-size: cover;">
        <span class="m-dropdown__header-title" >
          {!!__('web.nuevas', ['cantidad' => count(auth()->user()->unreadNotifications) ])!!} {{__('web.notificaciones')}}
        </span>
        <a href="#" class="marcarleido m-dropdown__header-title">{{ __('web.marcarleido')}}</a>
      </div>
      <div class="m-dropdown__body">
        <div class="m-dropdown__content">

          <div class="tab-content">

            @if(count(auth()->user()->notifications))
            <div class="tab-pane active" id="topbar_notifications_notifications" role="tabpanel">
              <div class="m-scrollable" data-scrollable="true" data-max-height="250" data-mobile-max-height="200">
                <div class="m-list-timeline m-list-timeline--skin-light">
                  <div class="m-list-timeline__items" id="mostrarNotificaciones">

                    @foreach(auth()->user()->notifications as $notificacion)
                    <div class="m-list-timeline__item">
                      <span class="m-list-timeline__badge {{ $notificacion->read_at == null ? '-m-list-timeline__badge--state-success' : '' }}"></span>
                      <span class="m-list-timeline__text">
                        <a href="{!! $notificacion->data['redire'] !!}">
                        {!! $notificacion->data['data'] !!}
                        </a>
                      </span>
                      <span class="m-list-timeline__time">
                        {{Carbon::createFromTimeStamp(strtotime($notificacion->created_at))->diffForHumans()}}
                      </span>
                    </div>
                  @endforeach

                  </div>
                </div>
              </div>
            </div>
          @else
            <div class="tab-pane" id="topbar_notifications_logs" role="tabpanel">
              <div class="m-stack m-stack--ver m-stack--general" style="min-height: 180px;">
                <div class="m-stack__item m-stack__item--center m-stack__item--middle">
                  <span class="">
                    No tienes notificaciones.
                  </span>
                </div>
              </div>
            </div>
          @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</li>
