<?php
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\UserController;
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



Route::get('/tareas', function () {
    return view('administrator/tareas');
});

Route::get('/pedidos', function () {
    return view('administrator/pedidos');
});

Route::get('productos', [InventarioController::class, 'index']);
Route::post('insertarProductos', [InventarioController::class, 'create'])->name('insertarProductos');
Route::get('inactive', [InventarioController::class, 'inactiveProduct'])->name('inactivarProducto');

Auth::routes(
    
);
Route::get('usuarios', [UserController::class, 'showUsers']);
Route::get('/users/create', [RegisterController::class, 'create'])->name('user.create');
Route::get('/users', [UserController::class, 'users'])->name('users');
Route::post('/users', [UserController::class, 'create'])->name('user.create');
Route::delete('/usuarios/{id}', [UserController::class, 'destroy'])->name('user.destroy');
Route::get('/usuarios/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::put('/usuarios/{id}', [UserController::class, 'update'])->name('user.update');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
