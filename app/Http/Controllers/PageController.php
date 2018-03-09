<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Pagina;
use View;
use Input;

class PageController extends Controller
{
    //
    public function show($slug = 'home')
    {
        $page = Pagina::whereSlug($slug)->first();
        return View::make('lite.paginas')->with('page', $page);
    }
    public function vista()
    {
        $page = [
          'slug' => Input::get('slug', 'default'),
          'title' => Input::get('title', 'Sin titulo'),
          'page_content' => Input::get('page_content', false),
        ];


        return View::make('lite.vistaprevia')->with('page', $page);
    }
}
