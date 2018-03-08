
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" >

	<head>
		<meta charset="utf-8" />
		<title>
			Servidor
		</title>
		<meta name="description" content="Latest updates and statistic charts">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!--Inicio::Web font -->
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
		<script>
          WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
		</script>
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
		<link rel="shortcut icon" href="{{asset('assets/demo/demo2/media/img/logo/favicon.ico')}}" />
	</head>

	<body class="m-page--wide m-header--fixed m-header--fixed-mobile m-footer--push m-aside--offcanvas-default"  >
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
										<a href="index.html" class="m-brand__logo-wrapper">
											<img alt="" src="{{asset('assets/demo/demo2/media/img/logo/logo.png')}}"/>
										</a>
									</div>
									<div class="m-stack__item m-stack__item--middle m-brand__tools">
										<div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-left m-dropdown--align-push" data-dropdown-toggle="click" aria-expanded="true">
											<a href="#" class="dropdown-toggle m-dropdown__toggle btn btn-outline-metal m-btn  m-btn--icon m-btn--pill">
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
									</div>
								</div>
							</div>
							<!-- begin::Topbar -->
							<div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">
								<div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general">
									<div class="m-stack__item m-topbar__nav-wrapper">
										<ul class="m-topbar__nav m-nav m-nav--inline">
											
                      @auth

                      @include('ext.notificaciones')
                      @include('ext.acciones')
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
										<li class="m-menu__item  m-menu__item--active"  aria-haspopup="true">
											<a  href="{{url('/')}}" class="m-menu__link ">
												<span class="m-menu__item-here"></span>
												<span class="m-menu__link-text">
													{{__('web.inicio')}}
												</span>
											</a>
										</li>
										<li class="m-menu__item  m-menu__item--submenu m-menu__item--rel"  data-menu-submenu-toggle="click" aria-haspopup="true">
											<a  href="#" class="m-menu__link m-menu__toggle">
												<span class="m-menu__item-here"></span>
												<span class="m-menu__link-text">
													Lista
												</span>
												<i class="m-menu__hor-arrow la la-angle-down"></i>
												<i class="m-menu__ver-arrow la la-angle-right"></i>
											</a>
											<div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--left">
												<span class="m-menu__arrow m-menu__arrow--adjust"></span>
												<ul class="m-menu__subnav">
													<li class="m-menu__item "  aria-haspopup="true">
														<a  href="inner.html" class="m-menu__link ">
															<i class="m-menu__link-icon flaticon-diagram"></i>
															<span class="m-menu__link-title">
																<span class="m-menu__link-wrap">
																	<span class="m-menu__link-text">
																		Generate Reports
																	</span>
																	<span class="m-menu__link-badge">
																		<span class="m-badge m-badge--success">
																			2
																		</span>
																	</span>
																</span>
															</span>
														</a>
													</li>
													<li class="m-menu__item  m-menu__item--submenu"  data-menu-submenu-toggle="hover" data-redirect="true" aria-haspopup="true">
														<a  href="#" class="m-menu__link m-menu__toggle">
															<i class="m-menu__link-icon flaticon-business"></i>
															<span class="m-menu__link-text">
																Manage Orders
															</span>
															<i class="m-menu__hor-arrow la la-angle-right"></i>
															<i class="m-menu__ver-arrow la la-angle-right"></i>
														</a>
														<div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--right">
															<span class="m-menu__arrow "></span>
															<ul class="m-menu__subnav">
																<li class="m-menu__item "  data-redirect="true" aria-haspopup="true">
																	<a  href="inner.html" class="m-menu__link ">
																		<span class="m-menu__link-text">
																			Latest Orders
																		</span>
																	</a>
																</li>
																<li class="m-menu__item "  data-redirect="true" aria-haspopup="true">
																	<a  href="inner.html" class="m-menu__link ">
																		<span class="m-menu__link-text">
																			Pending Orders
																		</span>
																	</a>
																</li>
																<li class="m-menu__item "  data-redirect="true" aria-haspopup="true">
																	<a  href="inner.html" class="m-menu__link ">
																		<span class="m-menu__link-text">
																			Processed Orders
																		</span>
																	</a>
																</li>
																<li class="m-menu__item "  data-redirect="true" aria-haspopup="true">
																	<a  href="inner.html" class="m-menu__link ">
																		<span class="m-menu__link-text">
																			Delivery Reports
																		</span>
																	</a>
																</li>
																<li class="m-menu__item "  data-redirect="true" aria-haspopup="true">
																	<a  href="inner.html" class="m-menu__link ">
																		<span class="m-menu__link-text">
																			Payments
																		</span>
																	</a>
																</li>
																<li class="m-menu__item "  data-redirect="true" aria-haspopup="true">
																	<a  href="inner.html" class="m-menu__link ">
																		<span class="m-menu__link-text">
																			Customers
																		</span>
																	</a>
																</li>
															</ul>
														</div>
													</li>
													<li class="m-menu__item  m-menu__item--submenu"  data-menu-submenu-toggle="hover" aria-haspopup="true">
														<a  href="#" class="m-menu__link m-menu__toggle">
															<i class="m-menu__link-icon flaticon-chat-1"></i>
															<span class="m-menu__link-text">
																Customer Feedbacks
															</span>
															<i class="m-menu__hor-arrow la la-angle-right"></i>
															<i class="m-menu__ver-arrow la la-angle-right"></i>
														</a>
														<div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--right">
															<span class="m-menu__arrow "></span>
															<ul class="m-menu__subnav">
																<li class="m-menu__item "  data-redirect="true" aria-haspopup="true">
																	<a  href="inner.html" class="m-menu__link ">
																		<span class="m-menu__link-text">
																			Customer Feedbacks
																		</span>
																	</a>
																</li>
																<li class="m-menu__item "  data-redirect="true" aria-haspopup="true">
																	<a  href="inner.html" class="m-menu__link ">
																		<span class="m-menu__link-text">
																			Supplier Feedbacks
																		</span>
																	</a>
																</li>
																<li class="m-menu__item "  data-redirect="true" aria-haspopup="true">
																	<a  href="inner.html" class="m-menu__link ">
																		<span class="m-menu__link-text">
																			Reviewed Feedbacks
																		</span>
																	</a>
																</li>
																<li class="m-menu__item "  data-redirect="true" aria-haspopup="true">
																	<a  href="inner.html" class="m-menu__link ">
																		<span class="m-menu__link-text">
																			Resolved Feedbacks
																		</span>
																	</a>
																</li>
																<li class="m-menu__item "  data-redirect="true" aria-haspopup="true">
																	<a  href="inner.html" class="m-menu__link ">
																		<span class="m-menu__link-text">
																			Feedback Reports
																		</span>
																	</a>
																</li>
															</ul>
														</div>
													</li>
													<li class="m-menu__item "  data-redirect="true" aria-haspopup="true">
														<a  href="inner.html" class="m-menu__link ">
															<i class="m-menu__link-icon flaticon-users"></i>
															<span class="m-menu__link-text">
																Register Member
															</span>
														</a>
													</li>
												</ul>
											</div>
										</li>
									</ul>
								</div>
							</div>
							<!-- end::Horizontal Menu -->
							<!--begin::Search-->
							<div class="m-stack__item m-stack__item--middle m-dropdown m-dropdown--arrow m-dropdown--large m-dropdown--mobile-full-width m-dropdown--align-right m-dropdown--skin-light m-header-search m-header-search--expandable m-header-search--skin-" id="m_quicksearch" data-search-type="default">
								<!--begin::Search Form -->
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
								<!--end::Search Form -->
								<!--begin::Search Results -->
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
								<!--end::Search Results -->
							</div>

						</div>
					</div>
				</div>
			</header>

			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor-desktop m-grid--desktop m-body">
				<div class="m-grid__item m-grid__item--fluid  m-grid m-grid--ver	m-container m-container--responsive m-container--xxl m-page__container">
					<div class="m-grid__item m-grid__item--fluid m-wrapper">

						<div class="m-content">
							@yield('contenido')
						</div>
					</div>
				</div>
			</div>
			<!-- end::Body -->
			<!-- begin::Footer -->
			<footer class="m-grid__item m-footer ">
				<div class="m-container m-container--responsive m-container--xxl m-container--full-height m-page__container">
					<div class="m-footer__wrapper">
						<div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">
							<div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last">
								<span class="m-footer__copyright">
									2017 &copy; Servidor, desarrollado por
									<a href="http://forwarddevs.com" class="m-link">
										ForwardDevs
									</a>
								</span>
							</div>
							<div class="m-stack__item m-stack__item--right m-stack__item--middle m-stack__item--first">
								<ul class="m-footer__nav m-nav m-nav--inline m--pull-right">
									<li class="m-nav__item">
										<a href="#" class="m-nav__link">
											<span class="m-nav__link-text">
												Nosotros
											</span>
										</a>
									</li>
									<li class="m-nav__item">
										<a href="#"  class="m-nav__link">
											<span class="m-nav__link-text">
												Privacidad
											</span>
										</a>
									</li>
									<li class="m-nav__item">
										<a href="#" class="m-nav__link" data-toggle="modal" data-target="#tyc">
											<span class="m-nav__link-text">
												T&C
											</span>
										</a>
									</li>
									<li class="m-nav__item">
										<a href="#" class="m-nav__link">
											<span class="m-nav__link-text">
												Comprar
											</span>
										</a>
									</li>
									<li class="m-nav__item m-nav__item--last">
										<a href="#" class="m-nav__link" data-toggle="m-tooltip" title="Support Center" data-placement="left">
											<i class="m-nav__link-icon flaticon-info m--icon-font-size-lg3"></i>
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
							<p>
								Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
							</p>
							<p>
								Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
							</p>
							<p>
								Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
							</p>
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

	</body>
	<!-- end::Body -->
</html>
