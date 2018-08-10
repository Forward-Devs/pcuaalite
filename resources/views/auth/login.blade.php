@extends('layouts.auth')

@section('content')
  <div class="m-grid m-grid--hor m-grid--root m-page">
    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--singin m-login--2 m-login-2--skin-1" id="m_login" style="background-image: url({{asset('assets/app/media/img/bg/bg-1.jpg')}});">
      <div class="m-grid__item m-grid__item--fluid	m-login__wrapper">
        <div class="m-login__container">
          <div class="m-login__logo">
            <a href="#">
              <img src="{{asset('images/logo.png')}}">
            </a>
          </div>
          <div class="m-login__signin">
            <div class="m-login__head">
              <h3 class="m-login__title">
                {{__('web.login')}}
              </h3>
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
            </div>
            <form class="m-login__form m-form" method="POST" action="{{ route('login') }}">
              {{ csrf_field() }}
              <div class="form-group m-form__group">
                <input placeholder="{{__('web.email')}}" id="email" type="email" class="form-control  m-input" name="email" value="{{ old('email') }}" required autofocus>
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
              </div>
              <div class="form-group m-form__group">
                <input class="form-control m-input m-login__form-input--last" id="password" type="password" name="password" placeholder="{{__('web.password')}}" required>
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
              </div>
              <div class="row m-login__form-sub">
                <div class="col m--align-left m-login__form-left">
                  <label class="m-checkbox  m-checkbox--light">
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                    {{__('web.recuerdame')}}
                    <span></span>
                  </label>
                </div>
                <div class="col m--align-right m-login__form-right">
                  <a href="javascript:;" id="m_login_forget_password" class="m-link">
                    {{__('web.olvidaste')}}
                  </a>
                </div>
              </div>
              <div class="m-login__form-action">
                <button type="submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air  m-login__btn m-login__btn--primary">
                  {{__('web.login')}}
                </button>
              </div>
            </form>
          </div>
          <div class="m-login__signup">
            <div class="m-login__head">
              <h3 class="m-login__title">
                {{__('web.registro')}}
              </h3>
              <div class="m-login__desc">
                {{__('web.ingresadatos')}}
              </div>
            </div>
            <form class="m-login__form m-form" method="POST" action="{{ route('register') }}">
              {{ csrf_field() }}
              <div class="form-group m-form__group">
                <input id="name" type="text" class="form-control m-input" name="name" value="{{ old('name') }}" placeholder="Nombre de usuario" required autofocus>
                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
              </div>
              <div class="form-group m-form__group">
                <input id="email" type="email" class="form-control m-input" name="email" placeholder="{{__('web.email')}}" value="{{ old('email') }}" required>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
              </div>
              <div class="form-group m-form__group">
                <input id="password" type="password" class="form-control m-input" placeholder="{{__('web.password')}}" name="password" required>
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
              </div>
              <div class="form-group m-form__group">
                <input id="password-confirm" type="password" class="form-control m-input m-login__form-input--last" placeholder="{{__('web.confirmar')}}" name="password_confirmation" required>
              </div>
              <div class="row form-group m-form__group m-login__form-sub">
                <div class="col m--align-left">
                  <label class="m-checkbox m-checkbox--light">
                    <input type="checkbox" name="agree">
                    {!!__('web.leidoterminos')!!}.
                    <span></span>
                  </label>
                  <span class="m-form__help"></span>
                </div>
              </div>
              <div class="m-login__form-action">
                <button type="submit" class="btn m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary">
                  {{__('web.registro')}}
                </button>
                &nbsp;&nbsp;
                <button id="m_login_signup_cancel" class="btn m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn">
                  {{__('web.cancelar')}}
                </button>
              </div>
            </form>
          </div>
          <div class="m-login__forget-password">
            <div class="m-login__head">
              <h3 class="m-login__title">
                {{__('web.olvidaste')}}
              </h3>
              <div class="m-login__desc">
                {{__('web.ingresaemail')}}
              </div>
            </div>
            <form class="m-login__form m-form" method="POST" action="{{ route('password.email') }}">
              {{ csrf_field() }}
              <div class="form-group m-form__group">
                <input id="email" type="email" class="form-control m-input" placeholder="{{__('web.email')}}" name="email" value="{{ old('email') }}" required>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
              </div>
              <div class="m-login__form-action">
                <button type="submit" class="btn m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary">
                  {{__('web.recuperar')}}
                </button>
                &nbsp;&nbsp;
                <button id="m_login_forget_password_cancel" class="btn m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn">
                  {{__('web.cancelar')}}
                </button>
              </div>
            </form>
          </div>
          <div class="m-login__account">
            <span class="m-login__account-msg">
              {{__('web.nocuenta')}}
            </span>
            &nbsp;&nbsp;
            <a href="javascript:;" id="m_login_signup" class="m-link m-link--light m-login__account-link">
              {{__('web.registro')}}
            </a>
          </div>
        </div>
      </div>
    </div>
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
@endsection
