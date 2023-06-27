<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InventarioController extends Controller
{
    function index(){

        $inventarios = Inventario::all();

        return view('productos', ['inventarios' => $inventarios]);
    }


    function create(Request $request){


        $location = 'public/productosImagenes';

        $path = Storage::put($location, $request->file('formFile'));

        $inventario = new Inventario;

        $inventario->nombre = $request['nombreProducto'];
        $inventario->despcripcion = $request['descripcion'];
        $inventario->url_imagen = Storage::url($path);
        $inventario->cantidad = $request['cantidad'];
        $inventario->precio_unitario = $request['precio_unitario'];
        $inventario->estado = 1;
        $inventario->save();

        if($inventario){
           return redirect('productos');
        }

    }

    function inactiveProduct($id){
        dd($id);
    }
}
