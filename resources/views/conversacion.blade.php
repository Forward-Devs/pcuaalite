
  @php
$conver = User::find($usuario);
  $mensajes = Mensaje::where('user_id', Auth::user()->id)->where('to_id', $conver->id)->orwhere('user_id', $conver->id)->where('to_id', Auth::user()->id)->orderBy('id', 'desc')->orderBy('id', 'desc')->take(20)->get();
  $mensajeees = $mensajes->reverse();

  @endphp
    <div class="contact-profile">
      <img src="{{asset($conver->avatar)}}" alt="" />
      <p>{{$conver->name}}</p>
      <div class="social-media">
        <i class="fa fa-facebook" aria-hidden="true"></i>
        <i class="fa fa-twitter" aria-hidden="true"></i>
         <i class="fa fa-instagram" aria-hidden="true"></i>
      </div>
    </div>
    <div class="messages" id="mensajeeeees">
      <ul>
        @foreach ($mensajeees as $mensaje)

          @if ($mensaje->user_id == Auth::user()->id)
            <li class="replies">
              <img src="{{asset(Auth::user()->avatar)}}" alt="" />
              <p>{{$mensaje->mensaje}}</p>
            </li>
          @else
            @php
              $remitente = User::find($mensaje->user_id);
            @endphp
            <li class="sent">
              <img src="{{asset($remitente->avatar)}}" alt="" />
              <p>{{$mensaje->mensaje}}</p>
            </li>
          @endif

        @endforeach
        <span id="final"></span>
      </ul>
    </div>
    <div class="message-input">
      <div class="wrap">
        <form class="" id="formChat" action="{{url('enviarmensaje')}}" method="post">
          {{ csrf_field() }}
          {{ method_field('POST') }}
          <input type="hidden" id="hash" name="to" value="{{$conver->id}}">
          <input type="text" id="mensaje" name="mensaje" placeholder="Escribe un mensaje..." />

          <button class="submit" type="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
        </form>

      </div>
    </div>
    <script type="text/javascript">
    $(function(){
      $("#hash").val("{{$conver->id}}");
      message = $("#mensaje").val();
  $('#formChat').submit(function(e) {
    e.preventDefault();
    $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),

            // Mostramos un mensaje con la respuesta de PHP
            success: function(data) {
              $('<li class="replies"><img src="{{asset(Auth::user()->avatar)}}" alt="" /><p>' + data.mensaje + '</p></li>').appendTo($('.messages ul'));
              $('#mensaje').val(null);
              $('.contact.active .preview').html('<span>Tu: </span>' + message);
              $("#mensajeeeees").animate({ scrollTop: "90000" });
              document.getElementById('final').scrollIntoView(true);
              console.log('Mensaje enviado');
              return false;
            }
        });
        return false;
  });
  })
    </script>
