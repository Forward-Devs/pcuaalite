<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use User;
use Notification;
use Actividad;
use Validator;
use Hash;
use Response;
use View;
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
      return view('lite.actividad');
    }

    public function verSoporte()
    {
      return view('lite.tickets');
    }

    public function vincular()
    {
      return view('lite.vincular');
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
            return redirect()->route('cuenta')->with('message', 'La configuración se cambió correctamente.');
          }
          else
          {
            $error = array('current-password' => 'Por favor ingrese una contraseña válida.');
            return response()->json(array('error' => $error), 400);
          }
        }
      }
      else
      {
        return redirect()->to('/');
      }
    }
}
