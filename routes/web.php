<?php
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\FacturacionController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\OrdenesController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();
Route::get('/', function () {
    return view('welcome');
});

Route::get('/Contacto', function () {
    return view('Contacto');
});
Route::get('/Servicios', function () {
    return view('Servicios');
});
Route::get('/facturacion', function () {
    return view('facturacion');
});

Route::get('indexCart', [ShoppingCartController::class, 'index']);
Route::post('addProduct',[ShoppingCartController::class, 'agregarProducto'])->name('addProduct');

Route::get('indexFacturacion', [FacturacionController::class, 'index']);

Route::post('/contacto', [OrdenesController::class, 'store'])->name('safemessage');


Route::get('/tareas', function () {
    return view('administrator/tareas');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/pedidos', function () {
    return view('administrator/pedidos');
});

Route::get('productos', [InventarioController::class, 'index']);
Route::post('insertarProductos', [InventarioController::class, 'create'])->name('insertarProductos');
Route::get('inactive/{id}', [InventarioController::class, 'inactiveProduct']);
Route::post('actualizar', [InventarioController::class, 'updateProducto'])->name('actualizarProducto');
Route::get('usuarios', [UserController::class, 'showUsers']);
Route::get('/users/create', [UserController::class, 'create'])->name('user.create');
Route::get('/users', [UserController::class, 'users'])->name('users');
Route::post('/users', [UserController::class, 'create'])->name('user.create');
Route::delete('/usuarios/{id}', [UserController::class, 'destroy'])->name('user.destroy');
Route::get('/usuarios/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::put('/usuarios/{id}', [UserController::class, 'update'])->name('user.update');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
