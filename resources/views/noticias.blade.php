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

  @endphp


    @foreach ($noticias as $noticia)
      @php
      $leng = LaravelLocalization::setLocale();
      $titulo = 'titulo_'.$leng;
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
                  <img class="m-widget19__img" src="{{asset($noticia->user->avatar)}}" alt="">
                </div>
                <div class="m-widget19__info">
                  <span class="m-widget19__username">
                    {{$noticia->user->name}}
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
                {!! Forward::getSubString($noticia->$leng, 200) !!}
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




@endsection
