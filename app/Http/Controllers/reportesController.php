<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Reporte;
use Log;
use Auth;
use Carbon;

class reportesController extends Controller
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
        return view('pca.reportes.inicio');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pca.reportes.nuevo');
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
        Reporte::create($request->all());
        $log = new Log();
        $log->user_id = Auth::user()->id;
        $log->es = 'Ha creado un Reporte';
        $log->en = 'Ha creado un Reporte ';
        $log->fr = 'Ha creado un Reporte';
        $log->created_at = Carbon::now()->toDateTimeString();
        $log->save();
        return redirect('pca/reportes')->with('message', 'Create un Reporte.');
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
        $modelo = Reporte::find($id);
        return view('pca.reportes.ver', compact('modelo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $modelo = Reporte::find($id);
        return view('pca.reportes.editar', compact('modelo'));
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
        $modelo = Reporte::find($id);
        $modelo->updated_at = Carbon::now()->toDateTimeString();
        $modelo->save();
        if ($modelo->update($request->all())) {
          $log = new Log();
          $log->user_id = Auth::user()->id;
          $log->es = 'Ha editado un Reporte #'.$modelo->id;
          $log->en = 'Ha editado un Reporte #'.$modelo->id;
          $log->fr = 'Ha editado un Reporte #'.$modelo->id;
          $log->created_at = Carbon::now()->toDateTimeString();
          $log->save();
        }
        return redirect('pca/reportes')->with('message', 'Editaste un Reporte #'.$modelo->id.'.');
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
        $modelo = Reporte::find($id);

        if ($modelo->delete()) {
          $log = new Log();
          $log->user_id = Auth::user()->id;
          $log->es = 'Ha borrado el Reporte #'.$id;
          $log->en = 'Ha borrado el Reporte #'.$id;
          $log->fr = 'Ha borrado el Reporte #'.$id;
          $log->created_at = Carbon::now()->toDateTimeString();
          $log->save();
        }
        return redirect('pca/reportes')->with('message', 'Borraste el Reporte #'.$id.'.');
    }
}
