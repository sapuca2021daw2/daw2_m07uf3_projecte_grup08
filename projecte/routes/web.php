<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

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

//ROUTING
/*Route::get('/', function () {
    return view('welcome');
});

//PASANDO PARÁMETROS
Route::get('/post/{id}', function ($id) {
    return "hola " . $id;
});*/

//PASANDO PARÁMETROS CON CONDICIONES
/*Route::get('/post/{id}/{num}', function ($id,$post) {
    return "hola " . $id . " " . $post;
})->where('id','[a-zA-Z]+');

// ROUTING CON CONTROLADOR
Route::get('/home','PrimerController@inicio');

// ROUTING CON CONTROLADOR PASANDO PARÁMETROS
Route::get('/home/{id}','SegundoController@index');


Route::get('/','TercerController@index');
Route::get('/inicio','TercerController@index');
Route::get('/quienesSomos','TercerController@quienesSomos');
Route::get('/dondeEstamos','TercerController@dondeEstamos');
Route::get('/foro','TercerController@foro');
*/

//CREA RUTES DE MANERA AUTOMÀTICA php artisan route:list
/*Route::resource("posts","SegundoController");
Route::resource("users","TercerController");
Route::resource("soci","PrimerController");*/


Route::get('/', function () {
    return view('welcome');
});


Auth::routes();
Route::post('/usuaris/password/update','UsuariController@passwordUpdate')->name('usuaris.password.update');
Route::resource("usuaris","UsuariController");
Route::resource("ong","OngController");
Route::resource("professional","ProfessionalController");
Route::resource("voluntari","VoluntariController");
Route::post('/socis/mostraPerOng','SocisController@mostraPerOng')->name('socis.mostraPerOng');
Route::post('/socis/addSociOng','SocisController@addSociOng')->name('socis.addSociOng');
Route::post('/socis/canviAportacio', "SocisController@aportacio")->name('socis.aportacio');
Route::post('/socis/mostra', "SocisController@mostra")->name('socis.mostra');
Route::resource("socis","SocisController");





Route::get('/reset/{id}','UsuariController@reset')->name('reset');
//Route::get('/admin','AdministradorController@index');
