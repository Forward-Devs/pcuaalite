@php
	$lenguaje = LaravelLocalization::setLocale();
@endphp
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" >
	<head>
		<meta charset="utf-8" />
		<title>
			{{Ajuste::where('clave', 'nombre')->first()->$lenguaje}} - PCA
		</title>
    <meta name="description" content="{{Ajuste::where('clave', 'descripcion')->first()->$lenguaje}}">
		<meta name="keywords" content="{{Ajuste::where('clave', 'palabrasclave')->first()->$lenguaje}}">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		{{-- Fuente de la web --}}
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
		<script>
          WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
		</script>
		{{-- Fin:Fuente de la web --}}
    {{-- Estilos --}}
    {{-- Pagina --}}

		{{-- Base --}}
		<link href="{{asset('assets/vendors/base/vendors.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/demo/default/base/style.bundle.css')}}" rel="stylesheet" type="text/css" />
		@yield('styles')
    {{-- Icono --}}
		<link rel="shortcut icon" href="{{asset('favicon.ico')}}" />
	</head>

	<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >

		<div class="m-grid m-grid--hor m-grid--root m-page">

			<header class="m-grid__item    m-header "  data-minimize-offset="200" data-minimize-mobile-offset="200" >
				<div class="m-container m-container--fluid m-container--full-height">
					<div class="m-stack m-stack--ver m-stack--desktop">
						<!-- BEGIN: Brand -->
						<div class="m-stack__item m-brand  m-brand--skin-dark ">
							<div class="m-stack m-stack--ver m-stack--general">
								<div class="m-stack__item m-stack__item--middle m-brand__logo">
									<a href="index.html" class="m-brand__logo-wrapper">
										<img alt="" src="{{asset(Ajuste::where('clave', 'logodark')->first()->$lenguaje)}}"/>
									</a>
								</div>
								<div class="m-stack__item m-stack__item--middle m-brand__tools">

									<a href="javascript:;" id="m_aside_left_minimize_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-desktop-inline-block
					 ">
										<span></span>
									</a>

									<a href="javascript:;" id="m_aside_left_offcanvas_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block">
										<span></span>
									</a>

									<a id="m_aside_header_menu_mobile_toggle" href="javascript:;" class="m-brand__icon m-brand__toggler m--visible-tablet-and-mobile-inline-block">
										<span></span>
									</a>

									<a id="m_aside_header_topbar_mobile_toggle" href="javascript:;" class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
										<i class="flaticon-more"></i>
									</a>

								</div>
							</div>
						</div>
						<!-- END: Brand -->
						<div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">
							<!-- BEGIN: Horizontal Menu -->
							<button class="m-aside-header-menu-mobile-close  m-aside-header-menu-mobile-close--skin-dark " id="m_aside_header_menu_mobile_close_btn">
								<i class="la la-close"></i>
							</button>

							<div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general">
								<div class="m-stack__item m-topbar__nav-wrapper">
									<ul class="m-topbar__nav m-nav m-nav--inline">

										@include('pca.ext.notificaciones')
										@include('pca.ext.buscar')
										@include('pca.ext.perfil')

									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</header>
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
				<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
					<i class="la la-close"></i>
				</button>
				<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">
	<div
		id="m_ver_menu"
		class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark "
		data-menu-vertical="true"
		 data-menu-scrollable="false" data-menu-dropdown-timeout="500"
		>
						<ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
							<li class="m-menu__item  m-menu__item--active" aria-haspopup="true" >
								<a  href="{{url('/pca')}}" class="m-menu__link ">
									<i class="m-menu__link-icon flaticon-line-graph"></i>
									<span class="m-menu__link-title">
										<span class="m-menu__link-wrap">
											<span class="m-menu__link-text">
												Resumen
											</span>
										</span>
									</span>
								</a>
							</li>
							<li class="m-menu__section">
								<h4 class="m-menu__section-text">
									Modulos
								</h4>
								<i class="m-menu__section-icon flaticon-more-v3"></i>
							</li>
							<li class="m-menu__item" aria-haspopup="true" >
								<a  href="{{url('/pca/noticias')}}" class="m-menu__link ">
									<i class="m-menu__link-icon flaticon-interface-1"></i>
									<span class="m-menu__link-title">
										<span class="m-menu__link-wrap">
											<span class="m-menu__link-text">
												Noticias
											</span>
										</span>
									</span>
								</a>
							</li>

							<li class="m-menu__item" aria-haspopup="true" >
								<a  href="{{url('/pca/users')}}" class="m-menu__link ">
									<i class="m-menu__link-icon flaticon-user-add"></i>
									<span class="m-menu__link-title">
										<span class="m-menu__link-wrap">
											<span class="m-menu__link-text">
												Usuarios
											</span>
										</span>
									</span>
								</a>
							</li>

							<li class="m-menu__item" aria-haspopup="true" >
								<a  href="{{url('/pca/tickets')}}" class="m-menu__link ">
									<i class="m-menu__link-icon flaticon-danger"></i>
									<span class="m-menu__link-title">
										<span class="m-menu__link-wrap">
											<span class="m-menu__link-text">
												Tickets
											</span>
										</span>
									</span>
								</a>
							</li>
							<li class="m-menu__item" aria-haspopup="true" >
								<a  href="{{url('/pca/paginas')}}" class="m-menu__link ">
									<i class="m-menu__link-icon flaticon-web"></i>
									<span class="m-menu__link-title">
										<span class="m-menu__link-wrap">
											<span class="m-menu__link-text">
												Páginas
											</span>
										</span>
									</span>
								</a>
							</li>

							<li class="m-menu__section">
								<h4 class="m-menu__section-text">
									Web
								</h4>
								<i class="m-menu__section-icon flaticon-more-v3"></i>
							</li>

							<li class="m-menu__item" aria-haspopup="true" >
								<a  href="{{url('/pca/ajustes')}}" class="m-menu__link ">
									<i class="m-menu__link-icon flaticon-cogwheel-2"></i>
									<span class="m-menu__link-title">
										<span class="m-menu__link-wrap">
											<span class="m-menu__link-text">
												SEO y Ajustes
											</span>
										</span>
									</span>
								</a>
							</li>
							<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
								<a  href="#" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-layers"></i>
									<span class="m-menu__link-text">
										Jugadores
									</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item " aria-haspopup="true" >
											<a  href="{{route('tablaig')}}" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Tabla
												</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true" >
											<a  href="{{route('camposig')}}" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Campos
												</span>
											</a>
										</li>


									</ul>
								</div>
							</li>



						</ul>
					</div>
				</div>
				<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<div class="m-subheader ">
						<div class="d-flex align-items-center">
							<div class="mr-auto">
								<h3 class="m-subheader__title ">
									Panel Administrativo
								</h3>
							</div>

						</div>
					</div>
					<div class="m-content">
						@yield('content')
					</div>
				</div>
			</div>
			@include('pca.ext.footer')
		</div>

		<div class="m-scroll-top m-scroll-top--skin-top" data-toggle="m-scroll-top" data-scroll-offset="500" data-scroll-speed="300">
			<i class="la la-arrow-up"></i>
		</div>
		<script src="{{asset('assets/vendors/base/vendors.bundle.js')}}" type="text/javascript"></script>
		<script src="{{asset('assets/demo/default/base/scripts.bundle.js')}}" type="text/javascript"></script>

		@yield('scripts')
	</body>
</html>
