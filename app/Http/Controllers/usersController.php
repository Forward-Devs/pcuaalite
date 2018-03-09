<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use User;
use Log;
use Auth;
use Carbon;
use Ticket;
use Noticia;
use Respuesta;

class usersController extends Controller
{
    public function __construct()
    {
        $this->middleware('IsAdmin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('pca.users.inicio');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pca.users.nuevo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $usuario = User::create($request->all());
        $usuario->password = bcrypt($request->password);
        $usuario->admin = $request->admin;
        $usuario->save();

        $log = new Log();
        $log->user_id = Auth::user()->id;
        $log->es = 'Ha creado un User';
        $log->en = 'Ha creado un User ';
        $log->fr = 'Ha creado un User';
        $log->created_at = Carbon::now()->toDateTimeString();
        $log->save();
        return redirect('pca/users')->with('message', 'Create un User.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $modelo = User::find($id);
        return view('pca.users.ver', compact('modelo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $modelo = User::find($id);
        return view('pca.users.editar', compact('modelo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $modelo = User::find($id);
        $columnas = Schema::getColumnListing('users');
        foreach ($columnas as $columna){
          if ($columna != 'id' && $columna != 'created_at'&& $columna != 'updated_at' && $columna != 'password') {
            if ($modelo->$columna != $request->$columna) {
              $modelo->$columna = $request->$columna;
            }
          }
        }
        if ($modelo->password != $request->password) {
          $modelo->password = bcrypt($request->password);
        }
        $modelo->updated_at = Carbon::now()->toDateTimeString();
        if ($modelo->save()) {
          $log = new Log();
          $log->user_id = Auth::user()->id;
          $log->es = 'Ha editado un User #'.$modelo->id;
          $log->en = 'Ha editado un User #'.$modelo->id;
          $log->fr = 'Ha editado un User #'.$modelo->id;
          $log->created_at = Carbon::now()->toDateTimeString();
          $log->save();
        }
        return redirect('pca/users')->with('message', 'Editaste un User #'.$modelo->id.'.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $modelo = User::find($id);
        $tickets = Ticket::where('user_id', $modelo->id)->delete();
        $noticias = Noticia::where('user_id', $modelo->id)->delete();
        $logs = Log::where('user_id', $modelo->id)->delete();
        $respuestas = Respuesta::where('user_id', $modelo->id)->delete();
        if ($modelo->delete()) {
          $log = new Log();
          $log->user_id = Auth::user()->id;
          $log->es = 'Ha borrado el User #'.$id;
          $log->en = 'Ha borrado el User #'.$id;
          $log->fr = 'Ha borrado el User #'.$id;
          $log->created_at = Carbon::now()->toDateTimeString();
          $log->save();
        }
        return redirect('pca/users')->with('message', 'Borraste el User #'.$id.'.');
    }
}
