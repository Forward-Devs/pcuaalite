@extends('layouts.plantilla')
@section('side')
  @include('aside')
@endsection
@section('contenido')
  @php
  $shouts = Shout::orderBy('id', 'desc')->simplePaginate(10);
  $hshouts = Shout::orderBy('id', 'desc')->count();
  @endphp
<div class="row">
  <div class="col-md-8">
    <div class="m-portlet m-portlet--full-height">
      <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
          <div class="m-portlet__head-title">
            <h3 class="m-portlet__head-text">
              {{$hshouts}} Shouts
            </h3>
          </div>
        </div>
      </div>
      <div class="m-portlet__body">
        <div class="m-widget3">
          @auth
            <form class="m-form m-form--fit" action="{{route('shoutear')}}" method="post">
              {{ csrf_field() }}
              {{ method_field('POST') }}
              <div class="col-10 pull-left">
                <textarea name="shout" class="form-control m-input" maxlength="78"></textarea>
              </div>
              <div class="col-2 pull-right">
                <button type="submit" class="btn btn-accent">
                  Shout
                </button>
              </div>
            </form>
          @endauth

          @foreach ($shouts as $shout)
            @php
              $usershout = User::find($shout->user_id);
            @endphp
            <div class="m-widget3__item" >
              <div class="m-widget3__header">
                <div class="m-widget3__user-img">
                  <img class="m-widget3__img" src="{{asset($usershout->avatar)}}" alt="">
                </div>
                <div class="m-widget3__info">
                  <span class="m-widget3__username">
                    {{$usershout->name}}
                  </span>
                  <br>
                  <span class="m-widget3__time">
                    {{Carbon::createFromTimeStamp(strtotime($shout->created_at))->diffForHumans()}}
                  </span>

                </div>
                <span class="m-widget3__status m--font-success">
                @auth
                  @if($shout->user_id == Auth::user()->id)
                  <a href="{{url('borrarshout/'.$shout->id)}}" class="m-widget4__sub">
                    <i class="la la-trash-o"></i>
                  </a>
                @endif
                @endauth
                </span>
              </div>
              <div class="m-widget3__body">
                <p class="m-widget3__text" style="text-align:center; font-size: 2rem;">
                  {{$shout->shout}}
                </p>
              </div>

            </div>
          @endforeach
        </div>
      </div>
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
  </div>
</div>

{{$shouts->links()}}
@endsection
