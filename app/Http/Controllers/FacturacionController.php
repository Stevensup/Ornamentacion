<?php

namespace App\Http\Controllers;

use App\Models\Despacho;
use App\Models\Inventario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use PDF;

class FacturacionController extends Controller
{
    function index(){

        $despachos = Despacho::where('user_id', Auth::user()->id)->get();

        $total = 0;

        foreach ($despachos as $despacho) {
            $inventario = Inventario::find($despacho->id_inventarios);
            $despacho->nombre = $inventario->nombre;
            $despacho->precio_unitario = $inventario->precio_unitario;
            $despacho->total_producto = $inventario->precio_unitario * $despacho->cantidad_despacho;
            $total += $despacho->total_producto;
        }

        return view('facturacion', ['productos' => $despachos, 'total_productos'=> $total]);
    }

    function imprimir(){


    }
}
