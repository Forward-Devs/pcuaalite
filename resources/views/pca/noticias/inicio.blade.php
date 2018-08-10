@extends('layouts.admin')
@section('content')
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
  @if (session('message'))
    <div class="m-alert m-alert--icon m-alert--icon-solid m-alert--outline alert alert-brand alert-dismissible fade show" role="alert">
      <div class="m-alert__icon">
        <i class="flaticon-exclamation-1"></i>
        <span></span>
      </div>
      <div class="m-alert__text">
        <strong>{!! session('message') !!}</strong>
      </div>
      <div class="m-alert__close">
        <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar"></button>
      </div>
    </div>
  @endif
  <div class="row">

    <div class="col-md-10">
      <div class="m-alert m-alert--icon m-alert--air m-alert--square alert alert-dismissible m--margin-bottom-30" role="alert">
        <div class="m-alert__icon">
          <i class="flaticon-exclamation m--font-brand"></i>
        </div>
        <div class="m-alert__text">
          Asegurese de completar todos los campos para no generar errores en la web.
        </div>
      </div>
    </div>
    <div class="col-md-2">
      <div class="m-separator m-separator--dashed d-xl-none"></div><br>
      <a href="{{url('pca/noticias/create')}}" class="btn btn-accent m-btn m-btn--custom m-btn--icon m--align-right m-btn--air m-btn--pill">Crear noticia</a>
    </div>
  </div>
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
                <a href="{{url('pca/noticias/'.$noticia->id)}}" class="btn m-btn--pill btn-secondary m-btn m-btn--hover-brand m-btn--custom">
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



@endsection
