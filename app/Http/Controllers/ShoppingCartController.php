<?php

namespace App\Http\Controllers;

use App\Models\Despacho;
use App\Models\Inventario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShoppingCartController extends Controller
{
    function index()
    {
        dd('carrito de compras');
    }

    function agregarProducto(Request $request)
    {

        $despacho = Despacho::where('user_id', Auth::user()->id)->where('id_inventarios', $request->inventario_id)->get();
        $totalInventario = Inventario::find($request->inventario_id);

        if ($totalInventario->cantidad >= $request->cantidad) {
            if (count($despacho) > 0) {
                $despacho[0]->cantidad_despacho = $request->cantidad;
                $despacho[0]->update();
            } else {
                $nuevoDespacho = new Despacho;
                $nuevoDespacho->user_id = Auth::user()->id;
                $nuevoDespacho->id_inventarios = $request->inventario_id;
                $nuevoDespacho->cantidad_despacho = $request->cantidad;
                $nuevoDespacho->save();
            }
        } else {

            $mensaje = 'La cantidad agregada al producto ' . $totalInventario->nombre . ' no existe en el inventario, por favor ingresar una cantidad menor';

            return redirect('productos')->with('alert',$mensaje);
        }

        return redirect('productos')->with('alertSucces', 'Se agrego el producto correctamente al carrito');;
    }
}
