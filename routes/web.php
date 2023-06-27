<?php

use App\Http\Controllers\InventarioController;
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

Route::get('/inventario', function () {
    return view('productos');
});

Route::get('productos', [InventarioController::class, 'index']);
Route::post('insertarProductos', [InventarioController::class, 'create'])->name('insertarProductos');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
