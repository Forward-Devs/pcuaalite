<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Pagina;
use Log;
use Auth;
use Carbon;

class paginasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('pca.paginas.inicio');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pca.paginas.nuevo');
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
        Pagina::create($request->all());
        $log = new Log();
        $log->user_id = Auth::user()->id;
        $log->es = 'Ha creado un Pagina';
        $log->en = 'Ha creado un Pagina ';
        $log->fr = 'Ha creado un Pagina';
        $log->created_at = Carbon::now()->toDateTimeString();
        $log->save();
        return redirect('pca/paginas')->with('message', 'Create un Pagina.');
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
        $modelo = Pagina::find($id);
        return view('pca.paginas.ver', compact('modelo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $modelo = Pagina::find($id);
        return view('pca.paginas.editar', compact('modelo'));
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
        $modelo = Pagina::find($id);
        $modelo->updated_at = Carbon::now()->toDateTimeString();
        $modelo->save();
        if ($modelo->update($request->all())) {
          $log = new Log();
          $log->user_id = Auth::user()->id;
          $log->es = 'Ha editado un Pagina #'.$modelo->id;
          $log->en = 'Ha editado un Pagina #'.$modelo->id;
          $log->fr = 'Ha editado un Pagina #'.$modelo->id;
          $log->created_at = Carbon::now()->toDateTimeString();
          $log->save();
        }
        return redirect('pca/paginas')->with('message', 'Editaste un Pagina #'.$modelo->id.'.');
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
        $modelo = Pagina::find($id);

        if ($modelo->delete()) {
          $log = new Log();
          $log->user_id = Auth::user()->id;
          $log->es = 'Ha borrado el Pagina #'.$id;
          $log->en = 'Ha borrado el Pagina #'.$id;
          $log->fr = 'Ha borrado el Pagina #'.$id;
          $log->created_at = Carbon::now()->toDateTimeString();
          $log->save();
        }
        return redirect('pca/paginas')->with('message', 'Borraste el Pagina #'.$id.'.');
    }
}
