<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(
[
	'prefix' => LaravelLocalization::setLocale(),
	'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
],
function()
{
Carbon::setLocale(LaravelLocalization::setLocale());

Route::get('/', function () { return view('lite.inicio'); })->name('inicio')->middleware('Instalado');
Route::get('/noticias', function () { return view('noticias'); })->name('noticias')->middleware('Instalado');
Route::get('/buscar', function (Request $request) {
		return view('request.buscar');
});
Route::get('/noticia/{id}', function ($id = NULL) {
  $noticias = Noticia::where('id', $id)->count();
  if ($noticias) {
    $noticia = Noticia::where('id', $id)->first();
    return view('noticia', compact('noticia'));
  }
  else {
      return redirect('404');
  }

})->name('noticia');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/actividad', 'UserController@verActividad')->name('actividad');
Route::get('/vincular', 'UserController@vincular')->name('vincular');
Route::get('/user/{usuario?}', 'UserController@index')->name('profile');
Route::get('/verifyemail/{token}', 'Auth\RegisterController@verify');
Route::get('MarkAllSeen' ,'HomeController@AllSeen');
Route::resource('tickets', 'TicketController');
Route::post('/responder/{id}', 'TicketController@responder')->name('responder');

Route::prefix('pca')->group(function () {
    Route::get('/', 'AdminController@index')->name('pca');
		Route::get('/tickets', 'AdminController@tickets')->name('tickets');
		Route::resource('noticias', 'AdminNoticias');
		Route::get('/cuenta', 'AdminController@cuenta')->name('cuenta');
		Route::resource('ajustes', 'AjustesController');
		Route::post('/cambiarpass', 'AdminController@cambiarcontrase')->name('cambiarpass');
		Route::resource('users', 'usersController');
		Route::resource('paginas', 'paginasController');
		Route::get('/tablaig', 'AdminController@tablaig')->name('tablaig');
		Route::post('/cambiartablaig', 'AdminController@cambiartablaig')->name('cambiartablaig');
		Route::get('/camposig', 'AdminController@camposig')->name('camposig');
		Route::post('/cambiarcamposig', 'AdminController@cambiarcamposig')->name('cambiarcamposig');
});
Route::post('/vincularjugador', 'UserController@vincularjugador')->name('vincularjugador');
Route::post('/cambiarpassuser', 'UserController@cambiarcontrase')->name('cambiarpassuser');
Route::get('/vista', 'PageController@vista')->name('vista');
Route::get('/{slug}', array('as' => 'page.show', 'uses' => 'PageController@show'));
});
