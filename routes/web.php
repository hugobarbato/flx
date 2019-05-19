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

Route::get('/', function () {
    // return view('header/header');
    return redirect('/login');
});

Route::get('viacep/{cep}', 'HomeController@viacep');

Route::get('/alugar', function () {
    return view('content/cadastro');
});

Route::group(['prefix'=>'imovel'],function(){
    
    Route::get('listar', 'ImovelController@getImoveis');
    
    
    Route::get('adicionar', 'ImovelController@add_view');
    Route::post('adicionar', 'ImovelController@add_action');
    
    Route::get('editar/{id}', 'ImovelController@edit_view');
    Route::post('editar/{id}', 'ImovelController@edit_action');
    Route::get('fotos/{id}/anunciante', 'ImovelController@remover_logo_anunciante');
    Route::get('fotos/{id}/remover/{imagem}', 'ImovelController@remover_imagem');
    Route::post('fotos/{id}', 'ImovelController@adicionar_fotos');
    
});

Route::group(['prefix'=>'areas'],function(){
    Route::get('obter_html/{id}', 'AreasController@areas_html');
});

Route::get('/initial', 'HomeController@index')->name('initial');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/resultadoBuscar', 'HomeController@resultadoBuscar')->name('buscar');
Route::get('/resultadoDetalhes', 'HomeController@resultadoDetalhes')->name('detalhes');

Auth::routes();

Route::get('/login', function () {
    return view('content/login');
})->name('login');
