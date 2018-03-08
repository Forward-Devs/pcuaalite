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

Route::get('/', function () { return view('inicio'); })->name('inicio')->middleware('Instalado');
Route::get('/PCA/jugadores', function () {
    return view('tablas');
});
Route::get('/shouts', function () { return view('shouts'); })->name('shouts')->middleware('Instalado');
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
Route::get('/faq', 'SoporteController@verFAQ')->name('faq');
Route::get('/soporte', 'UserController@verSoporte')->name('soporte');
Route::get('/mensajes', 'UserController@verMensajes')->name('mensajes');
Route::get('/vincular', 'UserController@vincular')->name('vincular');

Route::get('/conversacion/{id}', 'UserController@verConversacion')->name('conversacion');
Route::get('/user/{usuario?}', 'UserController@index')->name('profile');
Route::post('/shoutear', 'UserController@shoutear')->name('shoutear');


Route::get('/borrarshout/{shout}', 'UserController@borrarshout')->name('borrarshout');
Route::get('/seguir/{id?}', 'UserController@seguir')->name('seguir');
Route::get('/noseguir/{id?}', 'UserController@noseguir')->name('noseguir');
Route::get('/verifyemail/{token}', 'Auth\RegisterController@verify');
Route::get('MarkAllSeen' ,'HomeController@AllSeen');
Route::resource('tickets', 'TicketController');
Route::resource('reporte', 'ReporteController');
Route::post('/responder/{id}', 'TicketController@responder')->name('responder');
Route::post('/responderreporte/{id}', 'ReporteController@responder')->name('responderreporte');
Route::prefix('pca')->group(function () {
    Route::get('/', 'AdminController@index')->name('pca');
		Route::get('/tickets', 'AdminController@tickets')->name('tickets');
		Route::resource('noticias', 'AdminNoticias');
		Route::resource('faqs', 'FAQSAdmin');
		Route::get('/cuenta', 'AdminController@cuenta')->name('cuenta');
		Route::resource('ajustes', 'AjustesController');
		Route::post('/cambiarpass', 'AdminController@cambiarcontrase')->name('cambiarpass');
		Route::resource('sliders', 'slidersController');
		Route::resource('reportes', 'reportesController');
		Route::resource('users', 'usersController');
		Route::get('/tablaig', 'AdminController@tablaig')->name('tablaig');
		Route::post('/cambiartablaig', 'AdminController@cambiartablaig')->name('cambiartablaig');
		Route::get('/camposig', 'AdminController@camposig')->name('camposig');
		Route::post('/cambiarcamposig', 'AdminController@cambiarcamposig')->name('cambiarcamposig');
});
});
Route::post('/enviarmensaje', 'UserController@enviarmensaje')->name('enviarmensaje');
Route::post('/vincularjugador', 'UserController@vincularjugador')->name('vincularjugador');
Route::post('/conversacion', 'UserController@verConversacion')->name('conversacion');
Route::get('autocomplete', 'ReporteController@dataAjax');
Route::post('/cambiarpassuser', 'UserController@cambiarcontrase')->name('cambiarpassuser');
