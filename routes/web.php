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
    return view('welcome');
});

//criação de rota que pega argumentos e chama uma função do controler 
Route::get('/produtos', 'ProdutoController@lista');

//pegar argumentos que vem na URL
Route::get('/produtos/mostra/{id}', 'ProdutoController@mostra');

//formulario para criar novo produto
Route::get('/produtos/novo', 'ProdutoController@novo');

//local para salvar o conteudo da rota
Route::post('/produtos/adiciona', 'ProdutoController@adiciona');

//remover determinado item
Route::get('/produtos/remove/{id}', 'ProdutoController@remove');

//formulario para acessar aplicação
Route::get('/login', 'Login@login');

//autentica usuario
Route::post('/acesso', 'Login@acesso');