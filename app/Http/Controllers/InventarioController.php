<?php

namespace App\Http\Controllers;

use App\Models\Despacho;
use App\Models\Inventario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class InventarioController extends Controller
{
    function index(){

        $inventarios = Inventario::where('estado', 1)->get();

        if(Auth::user() !== null){
            foreach ($inventarios as $inventario) {
                $despacho = Despacho::where('id_inventarios', $inventario->id, )->where('user_id', Auth::user()->id)->get();

                if(count($despacho) > 0){
                    $inventario->cantidad_despacho = $despacho[0]->cantidad_despacho;
                }
                //dd($despacho, $inventario);
            }
        }


        return view('productos', ['inventarios' => $inventarios]);
    }


    function create(Request $request){


        $location = 'public/productosImagenes';

        $path = Storage::put($location, $request->file('formFile'));

        $inventario = new Inventario;

        $inventario->nombre = $request['nombreProducto'];
        $inventario->descripcion = $request['descripcion'];
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
        $producto = Inventario::find($id);
        $producto->estado = 0;
        $producto->save();

        if($producto) return redirect(('productos'));
    }

    function updateProducto(Request $request){

        $location = 'public/productosImagenes';

        $path = Storage::put($location, $request->file('formFile'));

        $inventario = Inventario::find($request->inventario_id);
        $inventario->nombre = $request['nombreProducto'];
        $inventario->descripcion = $request['descripcion'];
        $inventario->url_imagen = Storage::url($path);
        $inventario->cantidad = $request['cantidad'];
        $inventario->precio_unitario = $request['precio_unitario'];
        $inventario->update();

        if($inventario) return redirect(('productos'));
    }
}
