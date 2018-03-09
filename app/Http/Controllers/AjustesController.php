<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ajuste;
use Log;
use Carbon;
use Auth;

class AjustesController extends Controller
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
        return view('pca.ajustes.inicio');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ajuste = Ajuste::find($id);
        return view('pca.ajustes.editar', compact('ajuste'));
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
        $ajuste = Ajuste::find($id);
        $ajuste->es = $request->es;
        $ajuste->en = $request->en;
        $ajuste->fr = $request->fr;
        if ($ajuste->save()) {
          $log = new Log();
          $log->user_id = Auth::user()->id;
          $log->es = 'Ha hecho ajustes en la clave '.$ajuste->clave;
          $log->en = 'Ha hecho ajustes en la clave '.$ajuste->clave;
          $log->fr = 'Ha hecho ajustes en la clave '.$ajuste->clave;
          $log->created_at = Carbon::now()->toDateTimeString();
          $log->save();
        }
        return redirect('pca/ajustes')->with('message', 'Editaste el ajuste con clave: '.$ajuste->clave.'.');
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
    }
}
