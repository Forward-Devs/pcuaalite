@extends('layouts.plantilla')
@section('side')
  @include('aside')
@endsection
@section('contenido')
  @php
  $noticias = Noticia::orderBy('id', 'desc')->simplePaginate(10);
  $hnoticias = Noticia::orderBy('id', 'desc')->count();
  $shout = Shout::orderBy('id', 'desc')->first();
  $hshouts = Shout::orderBy('id', 'desc')->count();
  if ($hshouts) {
    $usershout = User::find($shout->user_id);
  }
  function getSubStrings($string, $length=NULL)
{
  if ($length == NULL)
      $length = 50;
  $stringDisplay = substr(strip_tags($string), 0, $length);
  if (strlen(strip_tags($string)) > $length)
      $stringDisplay .= ' ...';
  return $stringDisplay;
}
  @endphp
<div class="row">
  <div class="col-md-8">

    <div class="row">

    @foreach ($noticias as $noticia)
      @php
      $leng = LaravelLocalization::setLocale();
      $titulo = 'titulo_'.$leng;
      $usern = User::find($noticia->user_id);
      @endphp
    <div class="col-md-6">
      <div class="m-portlet m-portlet--bordered-semi m-portlet--full-height">
        <div class="m-portlet__head m-portlet__head--fit">
          <div class="m-portlet__head-caption">
            <div class="m-portlet__head-action">
              <button type="button" class="btn btn-sm m-btn--pill  btn-brand">
                {{__('web.noticias')}}
              </button>
            </div>
          </div>
        </div>
        <div class="m-portlet__body">
          <div class="m-widget19">
            <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" style1="height: 280px">
              <img src="{{asset($noticia->portada)}}" alt="">
              <h3 class="m-widget19__title m--font-light">
                {{$noticia->$titulo}}
              </h3>
              <div class="m-widget19__shadow"></div>
            </div>
            <div class="m-widget19__content">
              <div class="m-widget19__header">
                <div class="m-widget19__user-img">
                  <img class="m-widget19__img" src="{{asset($usern->avatar)}}" alt="">
                </div>
                <div class="m-widget19__info">
                  <span class="m-widget19__username">
                    {{$usern->name}}
                  </span>
                  <br>
                  <span class="m-widget19__time">
                    {{Carbon::createFromTimeStamp(strtotime($noticia->created_at))->diffForHumans()}}
                  </span>
                </div>
                <div class="m-widget19__stats">
                  <span class="m-widget19__number m--font-brand">
                    0
                  </span>
                  <span class="m-widget19__comment">
                    {{__('web.comentarios')}}
                  </span>
                </div>
              </div>
              <div class="m-widget19__body">
                {!!getSubStrings($noticia->$leng, 200)!!}
              </div>
              <div class="m-widget19__action">
                <a href="{{url('noticia/'.$noticia->id)}}" class="btn m-btn--pill btn-secondary m-btn m-btn--hover-brand m-btn--custom">
                  {{__('web.leermas')}}
                </a>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
    @endforeach
    {{$noticias->links()}}
  </div>

  </div>
  <div class="col-md-4">
    <div class="m-portlet">
      <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
          <div class="m-portlet__head-title">
            <h3 class="m-portlet__head-text">
              {{__('web.nuevosusers')}}
            </h3>
          </div>
        </div>
      </div>
      <div class="m-portlet__body">
        <div class="tab-content">
          <div class="tab-pane active" id="m_widget4_tab1_content">

            <div class="m-widget4">
              @auth
              @php
              $usuarios = DB::table('users')->where('id', '!=', Auth::user()->id)->orderBy('id', 'desc')->take(5)->get();
              @endphp
              @else
                @php
                $usuarios = DB::table('users')->orderBy('id', 'desc')->take(5)->get();
                @endphp
              @endauth
              @foreach($usuarios as $usuario)
              <div class="m-widget4__item">
                <div class="m-widget4__img m-widget4__img--pic">
                  <img src="{{asset($usuario->avatar)}}" alt="">
                </div>
                <div class="m-widget4__info">
                  <span class="m-widget4__title">
                    <a href="{{url($usuario->name)}}" class="m-widget4__title">{{$usuario->name}}</a>
                  </span>
                  <br>
                  <span class="m-widget4__sub">
                    {{Carbon::createFromTimeStamp(strtotime($usuario->created_at))->diffForHumans()}}
                  </span>
                </div>
                <div class="m-widget4__ext">
                  @auth
                  @php
                    $losigue = DB::table('seguidores')->where('user_id', auth()->user()->id)->where('follow_id', $usuario->id)->count();
                  @endphp
                  @if ($losigue)
                    <a href="{{action('UserController@noseguir', ['id' => $usuario->id])}}"  class="m-btn m-btn--pill m-btn--hover-brand btn btn-sm btn-secondary">
                      {{__('web.noseguir')}}
                    </a>
                  @else
                  <a href="{{action('UserController@seguir', ['id' => $usuario->id])}}"  class="m-btn m-btn--pill m-btn--hover-brand btn btn-sm btn-secondary">
                    {{__('web.seguir')}}
                  </a>
                @endif
                  @endauth

                </div>
              </div>
              @endforeach


            </div>
            <!--end::Widget 14-->
          </div>

        </div>
      </div>
    </div>
    @if ($hshouts)
    <div class="m-portlet m--bg-accent m-portlet--bordered-semi m-portlet--skin-dark ">
      <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
          <div class="m-portlet__head-title">
            <h3 class="m-portlet__head-text">
              Shouts
            </h3>
          </div>
        </div>
        <div class="m-portlet__head-tools">
          <ul class="m-portlet__nav">
            <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" data-dropdown-toggle="hover">
              <a href="#" class="m-portlet__nav-link m-portlet__nav-link--icon m-portlet__nav-link--icon-xl">
                <i class="la la-ellipsis-h m--font-light"></i>
              </a>
              <div class="m-dropdown__wrapper">
                <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                <div class="m-dropdown__inner">
                  <div class="m-dropdown__body">
                    <div class="m-dropdown__content">
                      <ul class="m-nav">
                        <li class="m-nav__section m-nav__section--first">
                          <span class="m-nav__section-text">
                            {{__('web.accionesrapidas')}}
                          </span>
                        </li>
                        <li class="m-nav__item">
                          <a href="{{url('user/'.$usershout->name)}}" class="m-nav__link">
                            <i class="m-nav__link-icon flaticon-share"></i>
                            <span class="m-nav__link-text">
                              Visitar perfil
                            </span>
                          </a>
                        </li>
                        <li class="m-nav__item">
                          <a href="" class="m-nav__link">
                            <i class="m-nav__link-icon flaticon-chat-1"></i>
                            <span class="m-nav__link-text">
                              Enviar mensaje
                            </span>
                          </a>
                        </li>
                        <li class="m-nav__separator m-nav__separator--fit"></li>
                        <li class="m-nav__item">
                          <a href="#" class="btn btn-outline-danger m-btn m-btn--pill m-btn--wide btn-sm">
                            {{__('web.reportar')}} shout
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
      <div class="m-portlet__body">
        <!--begin::Widget 7-->
        <div class="m-widget7 m-widget7--skin-dark">
          <div class="m-widget7__desc">
            {{$shout->shout}}
          </div>
          <div class="m-widget7__user">
            <div class="m-widget7__user-img">
              <img class="m-widget7__img" src="{{asset($usershout->avatar)}}" alt="">
            </div>
            <div class="m-widget7__info">
              <span class="m-widget7__username">
                {{$usershout->name}}
              </span>
              <br>
              <span class="m-widget7__time">
                {{Carbon::createFromTimeStamp(strtotime($shout->created_at))->diffForHumans()}}
              </span>
            </div>
          </div>
          <div class="m-widget7__button">
            <a class="m-btn m-btn--pill btn btn-danger" href="{{url('shouts')}}" role="button">
              {{__('web.todoslosshots')}}
            </a>
          </div>
        </div>
        <!--end::Widget 7-->
      </div>

    </div>
  @endif
  </div>
</div>


@endsection
