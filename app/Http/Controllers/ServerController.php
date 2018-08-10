<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ServerController extends Controller
{
    public function index(Request $request)
    {
      if ($request->action == 'session') {
        if ($request->info == '::1') {
          $request->info = '127.0.0.1';
        }
        $exist = DB::table('sessions')->where('ip_address', $request->info)->count();
        $result = DB::table('sessions')->where('ip_address', $request->info)->get();
        if ($exist) {
          return response()->json(['data' => $result->toArray()], 200);
        }
        else {
          return response()->json(['data' => $request->info], 200);
        }
      }
      else {
        return view('response');
      }
    }
}
