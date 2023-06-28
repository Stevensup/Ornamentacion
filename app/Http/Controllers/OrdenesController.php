<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrdenesController extends Controller
{
    public function store(Request $request)
    {
        // Obtener los datos del formulario
        $nombre = $request->input('nombre');
        $email = $request->input('email');
        $descripcion = $request->input('descripcion');
        $tipoServicio = $request->input('tipo_servicio');

        // Guardar los datos en la base de datos
        // Aquí deberías agregar tu lógica específica para guardar los datos en la base de datos

        // Redirigir a una página de éxito o mostrar un mensaje de éxito
        return redirect()->back()->with('success', 'Mensaje enviado correctamente');
    }
}
