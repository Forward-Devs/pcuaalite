<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use FAQ;
use Log;
use Auth;
use Carbon;

class FAQSAdmin extends Controller
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
        return view('pca.faq.inicio');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pca.faq.nuevo');
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
        FAQ::create($request->all());
        $log = new Log();
        $log->user_id = Auth::user()->id;
        $log->es = 'Ha creado la pregunta '.$request->p_es;
        $log->en = 'Ha creado la pregunta '.$request->p_en;
        $log->fr = 'Ha creado la pregunta '.$request->p_fr;
        $log->created_at = Carbon::now()->toDateTimeString();
        $log->save();
        return redirect('pca/faqs')->with('message', 'Create una pregunta nueva.');
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
        return view('pca.faq.ver', compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $faq = FAQ::find($id);
        return view('pca.faq.editar', compact('faq'));
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
        $faq = FAQ::find($id);
        $faq->p_es = $request->p_es;
        $faq->p_en = $request->p_en;
        $faq->p_fr = $request->p_fr;
        $faq->r_fr = $request->r_fr;
        $faq->r_en = $request->r_en;
        $faq->r_es = $request->r_es;
        if ($faq->save()) {
          $log = new Log();
          $log->user_id = Auth::user()->id;
          $log->es = 'Ha editado la pregunta '.$faq->p_es;
          $log->en = 'Ha editado la pregunta '.$faq->p_es;
          $log->fr = 'Ha editado la pregunta '.$faq->p_es;
          $log->created_at = Carbon::now()->toDateTimeString();
          $log->save();
        }
        return redirect('pca/faqs')->with('message', 'Editaste la pregunta: '.$faq->p_es.'.');
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
        $faq = FAQ::find($id);
        $p = $faq->p_es;
        if ($faq->delete()) {
          $log = new Log();
          $log->user_id = Auth::user()->id;
          $log->es = 'Ha borrado la pregunta '.$p;
          $log->en = 'Ha borrado la pregunta '.$p;
          $log->fr = 'Ha borrado la pregunta '.$p;
          $log->created_at = Carbon::now()->toDateTimeString();
          $log->save();
        }
        return redirect('pca/faqs')->with('message', 'Borraste la pregunta: '.$p.'.');
    }
}
