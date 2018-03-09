@extends('layouts.auth')

@section('content')
  <div class="m-grid m-grid--hor m-grid--root m-page">
    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--singin m-login--2 m-login-2--skin-1" id="m_login" style="background-image: url({{asset('assets/app/media/img/bg/bg-1.jpg')}});">
      <div class="m-grid__item m-grid__item--fluid	m-login__wrapper">
        <div class="m-login__container">
          <div class="m-login__logo">
            <a href="#">
              <img src="{{asset('assets/app/media/img//logos/logo-1.png')}}">
            </a>
          </div>
          <div class="m-login__signin">
            <div class="m-login__head">
              <h3 class="m-login__title">
                Identificate
              </h3>
            </div>
            <form class="m-login__form m-form" method="POST" action="{{ route('login') }}">
              {{ csrf_field() }}
              <div class="form-group m-form__group">
                <input placeholder="Correo Electrónico" id="email" type="email" class="form-control  m-input" name="email" value="{{ old('email') }}" required autofocus>
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
              </div>
              <div class="form-group m-form__group">
                <input class="form-control m-input m-login__form-input--last" id="password" type="password" name="password" placeholder="Contraseña" required>
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
                    Recuerdame
                    <span></span>
                  </label>
                </div>
                <div class="col m--align-right m-login__form-right">
                  <a href="javascript:;" id="m_login_forget_password" class="m-link">
                    ¿Olvidaste tu contraseña?
                  </a>
                </div>
              </div>
              <div class="m-login__form-action">
                <button id="m_login_signin_submit" type="submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air  m-login__btn m-login__btn--primary">
                  Ingresar
                </button>
              </div>
            </form>
          </div>
          <div class="m-login__signup">
            <div class="m-login__head">
              <h3 class="m-login__title">
                Registrarme
              </h3>
              <div class="m-login__desc">
                Ingresa tus datos para completar el registro:
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
                <input id="email" type="email" class="form-control m-input" name="email" placeholder="Email" value="{{ old('email') }}" required>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
              </div>
              <div class="form-group m-form__group">
                <input class="form-control m-input" type="password" placeholder="Password" name="password">
                <input id="password" type="password" class="form-control m-input" placeholder="Contraseña" name="password" required>

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
              </div>
              <div class="form-group m-form__group">
                <input id="password-confirm" type="password" class="form-control m-input m-login__form-input--last" placeholder="Confirmar contraseña" name="password_confirmation" required>
              </div>
              <div class="row form-group m-form__group m-login__form-sub">
                <div class="col m--align-left">
                  <label class="m-checkbox m-checkbox--light">
                    <input type="checkbox" name="agree">
                    He leido y acepto los
                    <a href="#" class="m-link m-link--focus">
                      terminos y condiciones
                    </a>
                    .
                    <span></span>
                  </label>
                  <span class="m-form__help"></span>
                </div>
              </div>
              <div class="m-login__form-action">
                <button id="m_login_signup_submit" type="submit" class="btn m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary">
                  Registrar
                </button>
                &nbsp;&nbsp;
                <button id="m_login_signup_cancel" class="btn m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn">
                  Cancelar
                </button>
              </div>
            </form>
          </div>
          <div class="m-login__forget-password">
            <div class="m-login__head">
              <h3 class="m-login__title">
                ¿Olvidaste tu contraseña?
              </h3>
              <div class="m-login__desc">
                Ingresa tu email para recuperar la contraseña
              </div>
            </div>
            <form class="m-login__form m-form" method="POST" action="{{ route('password.email') }}">
              {{ csrf_field() }}
              <div class="form-group m-form__group">
                <input id="email" type="email" class="form-control m-input" placeholder="Email" name="email" value="{{ old('email') }}" required>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
              </div>
              <div class="m-login__form-action">
                <button id="m_login_forget_password_submit" type="submit" class="btn m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary">
                  Recuperar
                </button>
                &nbsp;&nbsp;
                <button id="m_login_forget_password_cancel" class="btn m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn">
                  Cancelar
                </button>
              </div>
            </form>
          </div>
          <div class="m-login__account">
            <span class="m-login__account-msg">
              ¿No tienes cuenta?
            </span>
            &nbsp;&nbsp;
            <a href="javascript:;" id="m_login_signup" class="m-link m-link--light m-login__account-link">
              Registrate
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
