@extends('layouts.plantilla')
@section('css')
  <style media="screen">

.perfil{
background: -webkit-radial-gradient(center, ellipse cover, #41CACD 0%,#323e4c 100%);
background: -moz-radial-gradient(center, ellipse cover, #41CACD 0%,#323e4c 100%);
background: -o-radial-gradient(center, ellipse cover, #41CACD 0%,#323e4c 100%);

font-weight: 300;
font-size: 15px;
-moz-border-radius: 4px;
-webkit-border-radius: 4px;
border-radius: 4px;
}
.box {
width: 400px;
height: 60px;
-moz-border-radius: 30px;
-webkit-border-radius: 30px;
border-radius: 30px;
-moz-background-clip: padding;
-webkit-background-clip: padding-box;
background-clip: padding-box;
-moz-box-shadow: 0 1px 3px rgba(0,0,0,.3);
-webkit-box-shadow: 0 1px 3px rgba(0,0,0,.3);
box-shadow: 0 1px 3px rgba(0,0,0,.3);
background-image: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDQwMCA2MCIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+PGxpbmVhckdyYWRpZW50IGlkPSJoYXQwIiBncmFkaWVudFVuaXRzPSJvYmplY3RCb3VuZGluZ0JveCIgeDE9IjUwJSIgeTE9IjEwMCUiIHgyPSI1MCUiIHkyPSItMS40MjEwODU0NzE1MjAyZS0xNCUiPgo8c3RvcCBvZmZzZXQ9IjAlIiBzdG9wLWNvbG9yPSIjZGZkZmRmIiBzdG9wLW9wYWNpdHk9IjEiLz4KPHN0b3Agb2Zmc2V0PSIxMDAlIiBzdG9wLWNvbG9yPSIjZTllOWU5IiBzdG9wLW9wYWNpdHk9IjEiLz4KICAgPC9saW5lYXJHcmFkaWVudD4KCjxyZWN0IHg9IjAiIHk9IjAiIHdpZHRoPSI0MDAiIGhlaWdodD0iNjAiIGZpbGw9InVybCgjaGF0MCkiIC8+Cjwvc3ZnPg==);
background-image: -moz-linear-gradient(90deg, #dfdfdf 0%, #e9e9e9 100%);
background-image: -o-linear-gradient(90deg, #dfdfdf 0%, #e9e9e9 100%);
background-image: -webkit-linear-gradient(90deg, #dfdfdf 0%, #e9e9e9 100%);
background-image: linear-gradient(90deg, #dfdfdf 0%, #e9e9e9 100%);
position: relative;
top: 100px;
display: table-cell;
vertical-align: middle;
text-align: center;

}
.power {
width: 28px;
height: 28px;
-moz-border-radius: 14px;
-webkit-border-radius: 14px;
border-radius: 14px;
-moz-background-clip: padding;
-webkit-background-clip: padding-box;
background-clip: padding-box;
-moz-box-shadow: 0 1px 3px rgba(0,0,0,.25);
-webkit-box-shadow: 0 1px 3px rgba(0,0,0,.25);
box-shadow: 0 1px 3px rgba(0,0,0,.25);
background: -webkit-radial-gradient(center, ellipse cover, #41CACD 0%,#323e4c 100%);
background: -moz-radial-gradient(center, ellipse cover, #41CACD 0%,#323e4c 100%);
background: -o-radial-gradient(center, ellipse cover, #41CACD 0%,#323e4c 100%);
position: relative;
top: 9px;
left: 12px;
}
.box p {
color: #999;
display: inline;
position: relative;
bottom: 13px;
left: 20px;
}
.user {
color: #000;
}

.userbox {
width: 70px;
height: 70px;
background-color: #00ff00;
position: absolute;
transform: rotate(45deg);
-ms-transform: rotate(45deg);
-webkit-transform: rotate(45deg);
-o-transform: rotate(45deg);
-moz-transform: rotate(45deg);
left: 60px;
top: -2px;
-moz-border-radius: 4px;
-webkit-border-radius: 4px;
border-radius: 4px;
-moz-background-clip: padding;
-webkit-background-clip: padding-box;
background-clip: padding-box;
-moz-box-shadow: 0 1px 3px rgba(0,0,0,.2);
-webkit-box-shadow: 0 1px 3px rgba(0,0,0,.2);
box-shadow: 0 1px 3px rgba(0,0,0,.2);
background-image: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDgxIDgxIiBwcmVzZXJ2ZUFzcGVjdFJhdGlvPSJub25lIj48bGluZWFyR3JhZGllbnQgaWQ9ImhhdDAiIGdyYWRpZW50VW5pdHM9Im9iamVjdEJvdW5kaW5nQm94IiB4MT0iNTAlIiB5MT0iMTAwJSIgeDI9IjUwJSIgeTI9Ii0xLjQyMTA4NTQ3MTUyMDJlLTE0JSI+CjxzdG9wIG9mZnNldD0iMCUiIHN0b3AtY29sb3I9IiNkZmRmZGYiIHN0b3Atb3BhY2l0eT0iMSIvPgo8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiNlOWU5ZTkiIHN0b3Atb3BhY2l0eT0iMSIvPgogICA8L2xpbmVhckdyYWRpZW50PgoKPHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjgxIiBoZWlnaHQ9IjgxIiBmaWxsPSJ1cmwoI2hhdDApIiAvPgo8L3N2Zz4=);
background-image: -moz-linear-gradient(90deg, #dfdfdf 0%, #e9e9e9 100%);
background-image: -o-linear-gradient(90deg, #dfdfdf 0%, #e9e9e9 100%);
background-image: -webkit-linear-gradient(90deg, #dfdfdf 0%, #e9e9e9 100%);
background-image: linear-gradient(90deg, #dfdfdf 0%, #e9e9e9 100%);
}
  </style>
@endsection
@section('contenido')
  <div class="perfil" style="height: 300px;">
    <center>
      <div class="box">

        <div class="m-dropdown  m-dropdown--small m-dropdown--arrow m-dropdown--align-left"  data-dropdown-toggle="click" aria-expanded="true">
          <a href="#" class=" m-dropdown__toggle">
            <div class="power"></div>
          </a>
          <div class="m-dropdown__wrapper" style="left: -165px;">
            <span class="m-dropdown__arrow m-dropdown__arrow--right"></span>
            <div class="m-dropdown__inner">
              <div class="m-dropdown__body">
                <div class="m-dropdown__content">
                  <ul class="m-nav">
                    <li class="m-nav__section m-nav__section--first">
                      <span class="m-nav__section-text">
                        Section
                      </span>
                    </li>
                    <li class="m-nav__item">
                      <a href="" class="m-nav__link">
                        <i class="m-nav__link-icon flaticon-share"></i>
                        <span class="m-nav__link-text">
                          Activity
                        </span>
                      </a>
                    </li>
                    <li class="m-nav__item">
                      <a href="" class="m-nav__link">
                        <i class="m-nav__link-icon flaticon-chat-1"></i>
                        <span class="m-nav__link-text">
                          Messages
                        </span>
                      </a>
                    </li>
                    <li class="m-nav__item">
                      <a href="" class="m-nav__link">
                        <i class="m-nav__link-icon flaticon-info"></i>
                        <span class="m-nav__link-text">
                          FAQ
                        </span>
                      </a>
                    </li>
                    <li class="m-nav__item">
                      <a href="" class="m-nav__link">
                        <i class="m-nav__link-icon flaticon-lifebuoy"></i>
                        <span class="m-nav__link-text">
                        	Support
                        </span>
                      </a>
                    </li>
                    <li class="m-nav__separator m-nav__separator--fit"></li>
                    <li class="m-nav__item">
                      <a href="#" class="btn btn-outline-danger m-btn m-btn--pill m-btn--wide btn-sm">
                        Logout
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <img class="userbox" src="{{asset(Auth::user()->avatar)}}" alt=""/>

        <p><span class="user"> <b>Jim_Street</b> </span></p>

      </div>
    </center>

  </div>
  


@endsection
