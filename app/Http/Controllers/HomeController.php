<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use StreamLab\StreamLabProvider\Facades\StreamLabFacades;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('inicio');
    }
    public function AllSeen(){
        foreach(auth()->user()->unreadNotifications as $note){
            $note->markAsRead();
        }
    }
}
