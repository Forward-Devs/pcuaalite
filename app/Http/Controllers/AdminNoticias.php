<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use Auth;
use Carbon;
use Noticia;
use DB;
use User;
use Notification;
use App\Notifications\CrearNoticia;
use Log;

class AdminNoticias extends Controller
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
        return view('pca.noticias.inicio');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pca.noticias.nuevo');
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
        $path= $request->file('portada')->store('noticias', 'public');
        $url = Storage::url($path);
        $noticia = new Noticia();
        $noticia->user_id = Auth::user()->id;
        $noticia->es = $request->es;
        $noticia->en = $request->en;
        $noticia->fr = $request->fr;
        $noticia->titulo_es = $request->titulo_es;
        $noticia->titulo_en = $request->titulo_en;
        $noticia->titulo_fr = $request->titulo_fr;
        $noticia->portada = $url;
        $noticia->created_at = Carbon::now()->toDateTimeString();
        if ($noticia->save()) {
          $users = User::all();
          foreach ($users as $user) {
            Notification::send($user , new CrearNoticia($noticia));
            $log = new Log();
            $log->user_id = Auth::user()->id;
            $log->es = 'Ha creado la noticia #'.$noticia->id;
            $log->en = 'Ha creado la noticia #'.$noticia->id;
            $log->fr = 'Ha creado la noticia #'.$noticia->id;
            $log->created_at = Carbon::now()->toDateTimeString();
            $log->save();
          }
        }
        return redirect('pca/noticias')->with('message', 'Se ha creado la noticia correctamente haga <a href="'.url("pca/noticias/".$noticia->id).'">click aquí</a> para verla');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $noticia = Noticia::find($id);
        return view('pca.noticias.ver', compact('noticia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $noticia = Noticia::find($id);
        return view('pca.noticias.editar', compact('noticia'));
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
        $noticia = Noticia::find($id);
        if ($request->portada) {
          $path= $request->file('portada')->store('noticias', 'public');
          $url = Storage::url($path);
          $noticia->portada = $url;
        }
        $noticia->es = $request->es;
        $noticia->en = $request->en;
        $noticia->fr = $request->fr;
        $noticia->titulo_es = $request->titulo_es;
        $noticia->titulo_en = $request->titulo_en;
        $noticia->titulo_fr = $request->titulo_fr;
        $noticia->updated_at = Carbon::now()->toDateTimeString();
        if ($noticia->save()) {
          $log = new Log();
          $log->user_id = Auth::user()->id;
          $log->es = 'Ha editado la noticia #'.$noticia->id;
          $log->en = 'Ha editado la noticia #'.$noticia->id;
          $log->fr = 'Ha editado la noticia #'.$noticia->id;
          $log->created_at = Carbon::now()->toDateTimeString();
          $log->save();
        }
        return redirect('pca/noticias')->with('message', 'Se ha editado la noticia correctamente haga <a href="'.url("pca/noticias/".$noticia->id).'">click aquí</a> para verla');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $noticia = Noticia::find($id);

        if ($noticia->delete()) {
          $log = new Log();
          $log->user_id = Auth::user()->id;
          $log->es = 'Ha borrado la noticia #'.$id;
          $log->en = 'Ha borrado la noticia #'.$id;
          $log->fr = 'Ha borrado la noticia #'.$id;
          $log->created_at = Carbon::now()->toDateTimeString();
          $log->save();
        }
        return redirect('pca/noticias')->with('message', 'Borraste la noticia #'.$id.' y ya no está disponible su visualización.');
    }
}
