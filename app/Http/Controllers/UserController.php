<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use User;
use Shout;
use Notification;
use Actividad;
use Mensaje;
use Validator;
use Hash;
use Response;
use View;
use App\Notifications\CrearShout;
use StreamLab\StreamLabProvider\Facades\StreamLabFacades;
class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function verActividad()
    {
      return view('actividad');
    }

    public function verSoporte()
    {
      return view('soporte');
    }
    public function verMensajes()
    {
      return view('mensajes');
    }
    public function verMensajess()
    {
      return view('mensajess');
    }
    public function vincular()
    {
      return view('vincular');
    }
    public function vincularjugador(Request $request)
    {
      $id = config('jugadores.id');
      $nombre = config('jugadores.nombre');
      $tabla = config('jugadores.tabla');
      $clave = config('jugadores.clave');
      $hash = config('jugadores.hash');
      $existe = DB::table($tabla)->where($nombre, $request->usuario)->count();
      if ($existe) {
        $usuario = DB::table($tabla)->where($nombre, $request->usuario)->first();
        if (config('jugadores.hash')) {
          if ($usuario->$clave == hash($hash, $request->password)) {
            $uuser = User::find(Auth::user()->id);

            $uuser->user_id = $usuario->$id;
            $uuser->save();
            return redirect('user/'.Auth::user()->name)->with('message', 'Vinculación exitosa');
          }
          else {
            return back()->with('message', 'Contraseña incorrecta');
          }
        }
        else {
          if ($usuario->$clave == $request->password) {
            $uuser = User::find(Auth::user()->id);
            $uuser->user_id = $usuario->$id;
            $uuser->save();
            return redirect('user/'.Auth::user()->name)->with('message', 'Vinculación exitosa');
          }
          else {
            return back()->with('message', 'Contraseña incorrecta');
          }
        }

      }
      else {
        return back()->with('message', 'Usuario incorrecto');
      }
    }
    public function verConversacion($id = NULL)
    {
      $usuario = $id;
      $view = view('conversacion', compact('usuario'))->render();
      return response()->json(['html'=>$view]);

    }
    public function index($usuario = NULL)
    {
      if ($usuario == Auth::user()->name) {
        return view('miperfil');
      }
      else {
        $exist = DB::table('users')->where('name', $usuario)->count();
        if ($exist) {
          $user = DB::table('users')->where('name', $usuario)->first();
          return view('perfil', compact('user'));
        }
        else {

          return view('home');
        }
      }

    }
    public function enviarmensaje(Request $request)
    {
      Mensaje::insert([
        'user_id' => Auth::user()->id,
        'to_id' => $request->to,
        'mensaje' => $request->mensaje,
      ]);
      return Response::json(array(
                    'success' => true,
                    'mensaje' => $request->mensaje,
            ));
    }
    public function shoutear(Request $request)
    {
      $shout = new Shout();
      $shout->user_id = Auth::user()->id;
      $shout->shout = $request->shout;
      $shout->created_at = \Carbon::now()->toDateTimeString();
      if ($shout->save()) {
        Actividad::insert([
          'user_id' => Auth::user()->id,
          'es' => 'creó el shout "'.$shout->shout.'".',
          'en' => 'created the shout "'.$shout->shout.'".',
          'fr' => 'créé le shout "'.$shout->shout.'".',
        ]);
        $losigue = DB::table('seguidores')->where('follow_id', Auth::user()->id)->get();
        foreach ($losigue as $seguidor) {
          $user = User::find($seguidor->user_id);
          Notification::send($user , new CrearShout($shout));
          $data = "".auth()->user()->name ." ha shouteado: " . $shout->shout;
          StreamLabFacades::pushMessage('nots' , 'CrearShout' , $data);
        }

      }
      return back()->with('message', 'Shout enviado.');
    }
    public function borrarshout($shout = NULL)
    {
      $shoutd = DB::table('shouts')->where('id', $shout)->first();
      if ($shoutd->user_id == Auth::user()->id) {
        Actividad::insert([
          'user_id' => Auth::user()->id,
          'es' => 'borro el shout "'.$shoutd->shout.'".',
          'en' => 'borro el shout "'.$shoutd->shout.'".',
          'fr' => 'borro el shout "'.$shoutd->shout.'".',
        ]);
        DB::table('shouts')->where('id', $shout)->delete();

        return back()->with('message', 'Borraste un shout');
      }
      else {
        return back();
      }

    }
    public function seguir(Request $request, $id)
    {
      $losigue = DB::table('seguidores')->where('user_id', Auth::user()->id)->where('follow_id', $id)->count();
      if ($losigue) {
        DB::table('seguidores')->where('user_id', Auth::user()->id)->where('follow_id', $id)->delete();
        $seguido = DB::table('users')->where('id', $id)->first();
        Actividad::insert([
          'user_id' => Auth::user()->id,
          'es' => 'dejó de seguir a "'.$seguido->name.'".',
          'en' => 'stopped following "'.$seguido->name.'".',
          'fr' => 'arrêté de suivre "'.$seguido->name.'".',
        ]);
        return Response::json(array(
                      'success' => true,
                      'mensaje' => __('web.seguir'),
              ));
      }
      else {
        DB::table('seguidores')->insert([
          'user_id' => Auth::user()->id,
          'follow_id' => $id
        ]);
        $seguido = DB::table('users')->where('id', $id)->first();
        Actividad::insert([
          'user_id' => Auth::user()->id,
          'es' => 'comenzó a seguir a "'.$seguido->name.'".',
          'en' => 'started to follow "'.$seguido->name.'".',
          'fr' => 'commencé à suivre "'.$seguido->name.'".',
        ]);
        return Response::json(array(
                      'success' => true,
                      'mensaje' => __('web.noseguir'),
              ));
      }
    }

    public function cambiarcontrase(Request $request)
    {

      if(Auth::Check())
      {
        $request_data = $request->All();
        $messages = [
          'current-password.required' => 'Por favor ingrese su contraseña actual',
          'password.required' => 'Por favor ingrese su nueva contraseña',
        ];

        $validator = Validator::make($request_data, [
          'current-password' => 'required',
          'password' => 'required|same:password',
          'password_confirmation' => 'required|same:password',
        ], $messages);

        if($validator->fails())
        {
          return response()->json(array('error' => $validator->getMessageBag()->toArray()), 400);
        }
        else
        {

          $current_password = Auth::User()->password;
          if(Hash::check($request_data['current-password'], $current_password))
          {

            $user_id = Auth::User()->id;
            $obj_user = User::find($user_id);
            $obj_user->password = Hash::make($request_data['password']);;
            $obj_user->save();
            return back()->with('message', 'La configuración se cambió correctamente.');
          }
          else
          {
            return back()->with('message', 'Por favor ingrese una contraseña válida.');
          }
        }
      }
      else
      {
        return redirect()->to('/');
      }
    }
}
