<?php

namespace App\Http\Controllers;

use App\Models\Orden;
use Illuminate\Http\Request;

class OrdenesController extends Controller
{
    public function store(Request $request)
    {
        $orden = new Orden;
        $orden->nombre = $request['nombre'];
        $orden->email = $request['email'];
        $orden->descripcion = $request['descripcion'];
        $orden->tipo_servicio = $request['tipo_servicio'];
        $orden->estado = 1;
        $orden->save();
        // Obtener los datos del formulario

        // Guardar los datos en la base de datos
        // Aquí deberías agregar tu lógica específica para guardar los datos en la base de datos

        // Redirigir a una página de éxito o mostrar un mensaje de éxito
        return redirect()->back()->with('success', 'Mensaje enviado correctamente');
    }

    public function index()
    {
        $ordenes = Orden::all();
        return view('Empleado',['ordenes' => $ordenes]);
    }
}
