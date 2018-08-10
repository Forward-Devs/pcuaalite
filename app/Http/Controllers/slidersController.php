<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Slider;
use Log;
use Auth;
use Carbon;
use Storage;

class slidersController extends Controller
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
        return view('pca.sliders.inicio');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pca.sliders.nuevo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->imagen) {
          $slider = new Slider();
          $path= $request->file('imagen')->store('slider', 'public');
          $url = Storage::url($path);
          $slider->imagen = $url;
          $slider->redireccion = $request->redireccion;
          if ($slider->save()) {
            $log = new Log();
            $log->user_id = Auth::user()->id;
            $log->es = 'Ha creado un Slider';
            $log->en = 'Ha creado un Slider ';
            $log->fr = 'Ha creado un Slider';
            $log->created_at = Carbon::now()->toDateTimeString();
            $log->save();
          }
          return redirect('pca/sliders')->with('message', 'Create un Slider.');
        }
        else {
          return back()->with('message', 'Error: Necesitas subir una imagen como mínimo');
        }
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
        $modelo = Slider::find($id);
        return view('pca.sliders.ver', compact('modelo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $modelo = Slider::find($id);
        return view('pca.sliders.editar', compact('modelo'));
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
        $slider = Slider::find($id);
        if ($request->imagen) {
          $path= $request->file('imagen')->store('slider', 'public');
          $url = Storage::url($path);
          $slider->imagen = $url;
        }
        $slider->updated_at = Carbon::now()->toDateTimeString();
        $slider->redireccion = $request->redireccion;
        if ($slider->save()) {
          $log = new Log();
          $log->user_id = Auth::user()->id;
          $log->es = 'Ha editado un Slider #'.$slider->id;
          $log->en = 'Ha editado un Slider #'.$slider->id;
          $log->fr = 'Ha editado un Slider #'.$slider->id;
          $log->created_at = Carbon::now()->toDateTimeString();
          $log->save();
        }
        return redirect('pca/sliders')->with('message', 'Editaste un Slider #'.$slider->id.'.');


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
        $modelo = Slider::find($id);

        if ($modelo->delete()) {
          $log = new Log();
          $log->user_id = Auth::user()->id;
          $log->es = 'Ha borrado el Slider #'.$id;
          $log->en = 'Ha borrado el Slider #'.$id;
          $log->fr = 'Ha borrado el Slider #'.$id;
          $log->created_at = Carbon::now()->toDateTimeString();
          $log->save();
        }
        return redirect('pca/sliders')->with('message', 'Borraste el Slider #'.$id.'.');
    }
}
