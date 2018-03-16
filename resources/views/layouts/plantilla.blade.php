@php
	$lenguaje = LaravelLocalization::setLocale();
	$titulo = 'titulo_'.$lenguaje;
@endphp
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" >

	<head>
		<meta charset="utf-8" />
		<title>
			{{Ajuste::where('clave', 'nombre')->first()->$lenguaje}}
		</title>
		<meta name="description" content="{{Ajuste::where('clave', 'descripcion')->first()->$lenguaje}}">
		<meta name="keywords" content="{{Ajuste::where('clave', 'palabrasclave')->first()->$lenguaje}}">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!--Inicio::Web font -->
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<style>
		.mySlides {display:none}
		.w3-left, .w3-right, .w3-badge {cursor:pointer}
		.w3-badge {height:13px;width:13px;padding:0}
		</style>
		<script>
          WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
		</script>
	 @yield('css')
		<script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
		<!--Fin::Web font -->
		<!--Inicio::Estilos de base -->
		<link href="{{asset('assets/vendors/base/vendors.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/demo/demo2/base/style.bundle.css')}}" rel="stylesheet" type="text/css" />
    <!--Fin::Estilos de base -->
		<link rel="shortcut icon" href="{{asset('favicon.ico')}}" />
		<style media="screen">
		.m-header-search .m-header-search__wrapper { background-color: #{{Ajuste::where('clave', 'colorbarlight')->first()->$lenguaje}}; }
		.m-header .m-header__top { background: #{{Ajuste::where('clave', 'colorbarlight')->first()->$lenguaje}}; }
		.m-brand { background: #{{Ajuste::where('clave', 'colorbarlight')->first()->$lenguaje}}; }
		.m-header .m-header__bottom { background: #{{Ajuste::where('clave', 'colorbardark')->first()->$lenguaje}}; }
		.m-header-search .m-header-search__input {color:#BCC0CD;}
		body.m--skin-dark { background-color: #{{Ajuste::where('clave', 'colorfondo')->first()->$lenguaje}}; }
		</style>
	</head>

	<body class="m-page--wide m--skin-dark m-header--fixed m-header--fixed-mobile m-footer--push m-aside--offcanvas-default"  >
		<!-- begin:: Page -->
		<div class="m-grid m-grid--hor m-grid--root m-page">
			<!-- begin::Header -->
			<header class="m-grid__item		m-header "  data-minimize-mobile="hide" data-minimize-offset="200" data-minimize-mobile-offset="200" data-minimize="minimize" >
				<div class="m-header__top">
					<div class="m-container m-container--responsive m-container--xxl m-container--full-height m-page__container">
						<div class="m-stack m-stack--ver m-stack--desktop">
              <div class="m-stack__item m-brand">
								<div class="m-stack m-stack--ver m-stack--general m-stack--inline">
									<div class="m-stack__item m-stack__item--middle m-brand__logo">
										<a href="{{url('/')}}" class="m-brand__logo-wrapper">
											<img alt="" src="{{asset(Ajuste::where('clave', 'logo')->first()->$lenguaje)}}"/>
										</a>
									</div>
									<div class="m-stack__item m-stack__item--middle m-brand__tools">
										<div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-left m-dropdown--align-push" data-dropdown-toggle="click" aria-expanded="true">
											<a href="#" class="dropdown-toggle m-dropdown__toggle btn btn-outline-danger m-btn  m-btn--icon m-btn--pill">
												<span>
													{{ LaravelLocalization::getCurrentLocaleName() }}
												</span>
											</a>
											<div class="m-dropdown__wrapper">
												<span class="m-dropdown__arrow m-dropdown__arrow--left m-dropdown__arrow--adjust"></span>
												<div class="m-dropdown__inner">
													<div class="m-dropdown__body">
														<div class="m-dropdown__content">
															<ul class="m-nav">
                                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                    <li class="m-nav__item">
    																	<a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" class="m-nav__link">

    																		<span class="m-nav__link-text">
    																			{{ $properties['native'] }}
    																		</span>
    																	</a>
    																</li>
                                @endforeach
															</ul>
														</div>
													</div>
												</div>
											</div>
										</div>
										<a id="m_aside_header_menu_mobile_toggle" href="javascript:;" class="m-brand__icon m-brand__toggler m--visible-tablet-and-mobile-inline-block">
											<span></span>
										</a>

										<a id="m_aside_header_topbar_mobile_toggle" href="javascript:;" class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
											<i class="flaticon-more"></i>
										</a>
									</div>
								</div>
							</div>
							<!-- begin::Topbar -->
							<div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">
								<div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general">
									<div class="m-stack__item m-topbar__nav-wrapper">
										<ul class="m-topbar__nav m-nav m-nav--inline">
											<li class="m-nav__item m-topbar__user-profile" >
												<a  href="{{url('/')}}" class="m-nav__link">
													<span class="m-menu__item-here"></span>
													<span class="m-topbar__username">
														{{__('web.inicio')}}
													</span>
												</a>
											</li>
                      @auth

                      @include('ext.notificaciones')

                      @include('ext.perfil')
                      @else
                        <li class="m-nav__item m-topbar__user-profile"><a href="{{route('login')}}" class="m-nav__link"><span class="m-topbar__username">{{__('web.login')}}</span></a></li>
                      @endauth

										</ul>
									</div>
								</div>
							</div>
							<!-- end::Topbar -->
						</div>
					</div>
				</div>
				<div class="m-header__bottom">
					<div class="m-container m-container--responsive m-container--xxl m-container--full-height m-page__container">
						<div class="m-stack m-stack--ver m-stack--desktop">
							<!-- begin::Horizontal Menu -->
							<div class="m-stack__item m-stack__item--middle m-stack__item--fluid">
								<div id="m_header_menu" class="m-header-menu m-aside-header-menu-mobile m-aside-header-menu-mobile--offcanvas  m-header-menu--skin-dark m-header-menu--submenu-skin-light m-aside-header-menu-mobile--skin-dark m-aside-header-menu-mobile--submenu-skin-dark "  >
									<ul class="m-menu__nav  m-menu__nav--submenu-arrow ">
										<li class="m-menu__item   @if(Route::currentRouteName() == 'inicio') m-menu__item--active @endif"  aria-haspopup="true">
											<a  href="{{url('/')}}" class="m-menu__link ">
												<span class="m-menu__item-here"></span>
												<span class="m-menu__link-text">
													{{__('web.inicio')}}
												</span>
											</a>
										</li>

										<li class="m-menu__item @if(Route::currentRouteName() == 'noticias') m-menu__item--active @endif"  aria-haspopup="true">
											<a  href="{{url('/noticias')}}" class="m-menu__link ">
												<span class="m-menu__item-here"></span>
												<span class="m-menu__link-text">
													{{__('web.noticias')}}
												</span>
											</a>
										</li>
										@php
					            $uri = Request::path();
					            $paginas = Pagina::all();
					          @endphp
										@foreach ($paginas as $pagina)
											@if ($pagina->tipo == "1")
											<li class="m-menu__item @if($uri == $pagina->slug) m-menu__item--active @endif"  aria-haspopup="true">
												<a  href="{{$pagina->href}}" class="m-menu__link ">
													<span class="m-menu__item-here"></span>
													<span class="m-menu__link-text">
														{{$pagina->$titulo}}
													</span>
												</a>
											</li>
											@else
												<li class="m-menu__item @if($uri == $pagina->slug) m-menu__item--active @endif"  aria-haspopup="true">
													<a  href="{{route('page.show', ['slug' => $pagina->slug])}}" class="m-menu__link ">
														<span class="m-menu__item-here"></span>
														<span class="m-menu__link-text">
															{{$pagina->$titulo}}
														</span>
													</a>
												</li>
											@endif

				            @endforeach

									</ul>
								</div>
							</div>

							<div class="m-stack__item m-stack__item--middle m-dropdown m-dropdown--arrow m-dropdown--large m-dropdown--mobile-full-width m-dropdown--align-right m-dropdown--skin-light m-header-search m-header-search--expandable m-header-search--skin-" id="m_quicksearch" data-search-type="default">

								<form class="m-header-search__form">
									<div class="m-header-search__wrapper">
										<span class="m-header-search__icon-search" id="m_quicksearch_search">
											<i class="la la-search"></i>
										</span>
										<span class="m-header-search__input-wrapper">
											<input autocomplete="off" type="text" name="q" class="m-header-search__input" value="" placeholder="{{__('web.buscar')}}..." id="m_quicksearch_input">
										</span>
										<span class="m-header-search__icon-close" id="m_quicksearch_close">
											<i class="la la-remove"></i>
										</span>
										<span class="m-header-search__icon-cancel" id="m_quicksearch_cancel">
											<i class="la la-times"></i>
										</span>
									</div>
								</form>

								<div class="m-dropdown__wrapper">
									<div class="m-dropdown__arrow m-dropdown__arrow--center"></div>
									<div class="m-dropdown__inner">
										<div class="m-dropdown__body">
											<div class="m-dropdown__scrollable m-scrollable" data-scrollable="true" data-max-height="300" data-mobile-max-height="200">
												<div class="m-dropdown__content m-list-search m-list-search--skin-light"></div>
											</div>
										</div>
									</div>
								</div>

							</div>

						</div>
					</div>
				</div>
			</header>

			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor-desktop m-grid--desktop m-body">
				<div class="m-grid__item m-grid__item--fluid  m-grid m-grid--ver	m-container m-container--responsive m-container--xxl m-page__container">
					@yield('side')
					<div class="m-grid__item m-grid__item--fluid m-wrapper m--skin-dark">

						<div class="m-content">
							@yield('contenido')
						</div>
					</div>
				</div>
			</div>

			<footer class="m-grid__item m-footer ">
				<div class="m-container m-container--responsive m-container--xxl m-container--full-height m-page__container">
					<div class="m-footer__wrapper">
						<div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">
							<div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last">
								<span class="m-footer__copyright">
									<a href="http://forwarddevs.com" class="m-link">
										PCUAA Lite v.1.0.10
									</a> | {{Carbon::now()->year}} &copy; {{Ajuste::where('clave', 'nombre')->first()->$lenguaje}}, {{__('web.desarrollado')}}
									<a href="http://forwarddevs.com" class="m-link">
										ForwardDevs
									</a>
								</span>
							</div>
							<div class="m-stack__item m-stack__item--right m-stack__item--middle m-stack__item--first">
								<ul class="m-footer__nav m-nav m-nav--inline m--pull-right">
									<li class="m-nav__item">
										<a href="#" class="m-nav__link" data-toggle="modal" data-target="#tyc">
											<span class="m-nav__link-text">
												T&C
											</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</footer>

		</div>

		<div class="modal fade" id="tyc" tabindex="-1" role="dialog" aria-labelledby="tyc" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="tyc">
							{{__('web.tyc')}}
						</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">
								&times;
							</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-max-height="200">
							@include('terminos')
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary" data-dismiss="modal">
	            {{__('web.aceptar')}}
	          </button>

					</div>
				</div>
			</div>
		</div>
		<div class="m-scroll-top m-scroll-top--skin-top" data-toggle="m-scroll-top" data-scroll-offset="500" data-scroll-speed="300">
			<i class="la la-arrow-up"></i>
		</div>

		<script src="{{asset('assets/vendors/base/vendors.bundle.js')}}" type="text/javascript"></script>
		<script src="{{asset('assets/demo/demo2/base/scripts.bundle.js')}}" type="text/javascript"></script>
		<script src="{{asset('assets/demo/default/custom/components/base/toastr.js')}}" type="text/javascript"></script>

			<script type="text/javascript">
			var qs = $('#m_quicksearch');

			qs.mQuicksearch({
					type: qs.data('search-type'), // quick search type
					source: '{{url('buscar')}}',
					spinner: 'm-loader m-loader--skin-light m-loader--right',

					input: '#m_quicksearch_input',
					iconClose: '#m_quicksearch_close',
					iconCancel: '#m_quicksearch_cancel',
					iconSearch: '#m_quicksearch_search',

					hasResultClass: 'm-list-search--has-result',
					minLength: 1,
					templates: {
							error: function(qs) {
									return '<div class="m-search-results m-search-results--skin-light"><span class="m-search-result__message">Algo anda mal</div></div>';
							}
					}
			});
			</script>
			<script src="{{asset('StreamLab/StreamLab.js')}}"></script>

			<script>
					var message, ShowDiv = $('#mostrarNotificaciones'), count = $('#cuenta'), c;
					var slh = new StreamLabHtml();
					var sls = new StreamLabSocket({
							appId:"{{ config('stream_lab.app_id') }}",
							channelName:"nots",
							event:"*"
					});
					sls.socket.onmessage = function(res){
							slh.setData(res);
							if(slh.getSource() === 'messages'){
									c = parseInt(count.html());
									count.html(c+1);
									message  = slh.getMessage();
									ShowDiv.prepend('<div class="m-list-timeline__item"><span class="m-list-timeline__badge -m-list-timeline__badge--state-success"></span><span class="m-list-timeline__text">'+message+'</span><span class="m-list-timeline__time">Justo ahora</span></div>');
							}
					}
					$('#notificaciones').on('click' , function(){
							setTimeout( function(){
									count.html(0);
									$('.m-list-timeline__badge -m-list-timeline__badge--state-success').each(function(){
											$(this).removeClass('-m-list-timeline__badge--state-success');
									});
							}, 5000);
							$.get('{{url('MarkAllSeen')}}' , function(){});
					});

			</script>
		<script src="{{asset('assets/app/js/dashboard.js')}}" type="text/javascript"></script>
			@yield('scripts')
	</body>
	<!-- end::Body -->
</html>
