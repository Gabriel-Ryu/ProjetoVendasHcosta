<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\api\ProductsController;

Route::get('/', [UserController::class, 'telaLogin']);

Route::post('/in',[UserController::class, 'login']);

Route::get('/home', function () {
    return view('home');
});

// Rotas de usuários
Route::get('/users',function(){
    return view('users/register');
});
Route::get('/users/createScreen',function(){
    return view('users/create');
});
Route::get('/users/select',[UserController::class, 'index']);
Route::post('/users/create',[UserController::class, 'create']);
Route::post('/users/register',[UserController::class, 'storeRegister']);
Route::post('/users/update',[UserController::class,'update']);
Route::post('/users/delete',[UserController::class,'delete']);
Route::post('/users/checkAdm',[UserController::class, 'checkAdm']);


//Rota de pedidos
Route::get('/pedidos/createTela',[ProductsController::class, 'index']);
Route::post('/pedidos/create',[PedidoController::class,'create']);
Route::get('/pedidos/select',[PedidoController::class, 'select']);
Route::post('/pedidos/delete',[PedidoController::class,'delete']);
Route::post('/pedidos/update',[PedidoController::class,'update']);
