<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/login', function () {
    return view('usuarios.login');
});

Route::get('/actualizarpass', function () {
    return view('usuarios.actualizarpass');
});


Route::get('/categorias', function () {
    return view('categorias.categorias');
});

Route::get('/clientes', function () {
    return view('clientes.clientes');
});

Route::get('/productos', function () {
    return view('productos.productos');
});

Route::get('/ingredientes', function () {
    return view('ingredientes.ingredientes');
});

Route::get('/usuarios', function () {
    return view('usuarios.usuarios');
});

Route::get('/entradas', function () {
    return view('entradas.entradas');
});

Route::get('/pedidos', function () {
    return view('pedidos.pedidos');
});

Route::get('/pagos', function () {
    return view('pagos.pagos');
});

Route::get('/reporteventas', function () {
    return view('reportes.reporteventas');
});

Route::get('/reporteentradas', function () {
    return view('reportes.reporteentradas');
});

Route::get('/reportestocks', function () {
    return view('reportes.reportestocks');
});


