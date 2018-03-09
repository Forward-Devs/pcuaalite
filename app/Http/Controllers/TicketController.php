<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ticket;
use Auth;
use Notification;
use User;
use App\Notifications\CrearTicket;
use App\Notifications\CrearRespuesta;
use App\Notifications\CerrarTicket;
use Respuesta;
use Log;
use Carbon;
use Reporte;



class TicketController extends Controller
{

    public function __construct(){
       $this->middleware('Instalado');
       $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tickets.inicio');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('tickets.nuevo');
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
        $ticket = new Ticket();
        $ticket->user_id = Auth::user()->id;
        $ticket->problema_id = $request->problema;
        $ticket->titulo = $request->titulo;
        $ticket->ticket = $request->ticket;
        if ($ticket->save()) {
          $admins = User::where('admin', '1')->get();
          foreach ($admins as $admin) {
            Notification::send($admin , new CrearTicket($ticket));
          }

        }
        return redirect('tickets')->with('message', __('web.ticketgenerado'));
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
        $ticket = Ticket::find($id);
        if ($ticket->user_id == Auth::user()->id || Auth::user()->isAdmin()) {
          return view('tickets.ver', compact('ticket'));
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

    public function responder(Request $request, $id)
    {
        //
        $ticket = Ticket::find($id);

        if ($ticket->user_id == Auth::user()->id || Auth::user()->isAdmin()) {
          $respuesta = new Respuesta();
          $respuesta->user_id = Auth::user()->id;
          $respuesta->ticket_id = $ticket->id;
          $respuesta->respuesta = $request->respuesta;
          if ($respuesta->save()) {
            if ($respuesta->user_id == $ticket->user_id) {
              $admins = User::where('admin', '1')->get();
              foreach ($admins as $admin) {
                Notification::send($admin , new CrearRespuesta($ticket));
              }
            }
            else {
              Notification::send($ticket->user , new CrearRespuesta($ticket));
            }


          }
          return back()->with('message', __('web.respuestaenviada'));

        }
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
          $ticket = Ticket::find($id);
          $ticket->estado = 1;
          if ($ticket->save()) {
            Notification::send($ticket->user , new CerrarTicket($ticket));
          }
          return back()->with('message', __('web.cerroticket'));
        }

    }
}
