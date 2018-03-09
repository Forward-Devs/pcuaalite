@extends('layouts.admin')
@section('content')
  @php
  $leng = LaravelLocalization::setLocale();
  $titulo = 'titulo_'.$leng;
  $usern = User::find($noticia->user_id);
  @endphp
  <div class="row">

    <div class="col-md-8">
      <div class="m-alert m-alert--icon m-alert--air m-alert--square alert alert-dismissible m--margin-bottom-30" role="info">
        <div class="m-alert__icon">
          <i class="flaticon-info m--font-brand"></i>
        </div>
        <div class="m-alert__text">
          Esta noticia ya es visible por los usuarios.
        </div>
      </div>
    </div>
    <div class="col-md-2">
      <div class="m-separator m-separator--dashed d-xl-none"></div><br>
      <a href="{{route('noticias.edit', ['id' => $noticia->id])}}" class="btn btn-accent m-btn m-btn--custom m-btn--icon m--align-right m-btn--air m-btn--pill">Editar noticia</a>
    </div>
    <div class="col-md-2">
      <div class="m-separator m-separator--dashed d-xl-none"></div><br>
      <div class="m-widget13__action m--align-right">
        <form action="{{route('noticias.destroy', ['id' => $noticia->id])}}" method="post">
          {{ csrf_field() }}
          {{ method_field('delete') }}
          <button type="submit" class="m-widget__detalis  btn m-btn--pill  btn-danger">
                        Borrar Noticia
                      </button>
        </form>
      </div>
    </div>
  </div>
<div class="row">
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
            {!!$noticia->$leng!!}
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
@endsection
