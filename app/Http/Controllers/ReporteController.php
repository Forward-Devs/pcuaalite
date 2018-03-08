<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Respuesta;
use Log;
use Carbon;
use Reporte;
use DB;
use Auth;
use Notification;
use User;
use App\Notifications\CrearReporte;
use App\Notifications\ActualizarReporte;
use App\Notifications\TeReportaron;
use App\Notifications\CerrarReporte;

class ReporteController extends Controller
{
    public function __construct(){
       $this->middleware('Instalado');
       $this->middleware('auth');
    }
    public function dataAjax(Request $request)
    {
    	$data = [];

        if($request->has('q')){
            $search = $request->q;
            $data = DB::table("users")
            		->select("id","name")
            		->where('name','LIKE',"%$search%")
            		->get();
        }

        return response()->json($data);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('reportes.inicio');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reportes.nuevo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $reporte = Reporte::create([
        'user_id' => Auth::user()->id,
        'reportado_id' => $request->reportado_id,
        'razon' => $request->razon,
        'reporte' => $request->reporte,
        'estado' => 0
        ]);
      $log = new Log();
      $log->user_id = Auth::user()->id;
      $log->es = 'ha reportado a '.$reporte->reportado->name;
      $log->en = 'ha reportado a '.$reporte->reportado->name;
      $log->fr = 'ha reportado a '.$reporte->reportado->name;
      $log->created_at = Carbon::now()->toDateTimeString();
      $log->save();
      Notification::send(User::find($reporte->reportado_id) , new TeReportaron($reporte, User::find(Auth::user()->id)));
      $admins = User::where('admin', '1')->get();

      foreach ($admins as $admin) {
        Notification::send($admin , new CrearReporte($reporte));
      }
      return redirect('reporte')->with('message', 'Iniciaste un reporte contra '.$reporte->reportado->name);
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
        $reporte = Reporte::find($id);
        if ($reporte->user_id == Auth::user()->id || Auth::user()->isAdmin() || $reporte->reportado_id == Auth::user()->id) {
          return view('reportes.ver', compact('reporte'));
        }

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
        if (Auth::user()->isAdmin()) {
          $reporte = Reporte::find($id);
          $reporte->estado = 1;
          if ($reporte->save()) {
            Notification::send(User::find($reporte->user_id) , new CerrarReporte($reporte, Auth::user()));
            Notification::send(User::find($reporte->reportado_id) , new CerrarReporte($reporte, Auth::user()));
          }
          return redirect('reporte')->with('message', 'Cerraste el reporte #'.$reporte->id);
        }
        else {
          return back();
        }

    }
    public function responder(Request $request, $id)
    {
        //
        $reporte = Reporte::find($id);

        if ($reporte->user_id == Auth::user()->id || Auth::user()->isAdmin() || $reporte->reportado_id = Auth::user()->id) {
          $respuesta = new Respuesta();
          $respuesta->user_id = Auth::user()->id;
          $respuesta->reporte_id = $reporte->id;
          $respuesta->respuesta = $request->respuesta;
          if ($respuesta->save()) {
            if ($respuesta->user_id == $reporte->user_id ) {
              $admins = User::where('admin', '1')->get();

              foreach ($admins as $admin) {
                Notification::send($admin , new ActualizarReporte($reporte));
              }

                Notification::send(User::find($reporte->reportado_id) , new ActualizarReporte($reporte));
            }
            elseif ($respuesta->user_id == $reporte->reportado_id) {
                Notification::send(User::find($reporte->user_id) , new ActualizarReporte($reporte));
            }
            else {
              Notification::send(User::find($reporte->user_id) , new ActualizarReporte($reporte));
              Notification::send(User::find($reporte->reportado_id) , new ActualizarReporte($reporte));
            }


          }
          return back()->with('message', __('web.respuestaenviada'));

        }
    }
}
