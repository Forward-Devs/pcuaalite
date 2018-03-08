<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Config;
use Artisan;
use Validator;
use Hash;
use User;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('IsAdmin');
    }
    public function index(){ return view('pca.inicio'); }
    public function cuenta(){ return view('pca.cuenta'); }
    public function tablaig(){ return view('pca.ajustes.tabla'); }
    public function camposig(){ return view('pca.ajustes.campos'); }
    public function tickets(){ return view('pca.tickets.inicio'); }
    public function cambiartablaig(Request $request)
    {
      Config::write('jugadores', ['tabla' => $request->tabla]);
      Artisan::call('config:clear');
      return back()->with('message', 'Cambiaste la tabla de los jugadores');
    }
    public function cambiarcamposig(Request $request)
    {
      Config::write('jugadores', [
        'id' => $request->id,
        'nombre' => $request->nombre,
        'clave' => $request->clave,
        'nivel' => $request->nivel,
        'exp' => $request->exp,
        'edad' => $request->edad,
        'sexo' => $request->sexo,
        'dinero' => $request->dinero,
        'banco' => $request->banco,
        'moneda' => $request->moneda,
        'vida' => $request->vida,
        'armadura' => $request->armadura,
        'telefono' => $request->telefono,
        'hash' => $request->hash
      ]);

      Artisan::call('config:clear');
      return back()->with('message', 'Cambiaste los campos de los jugadores');
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
