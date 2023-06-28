<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orden;
use App\Models\User;

class OrdenesController extends Controller
{
    public function index()
    {
        $ordenes = Orden::all();

        return view('ordenes.index', compact('ordenes'));
    }

    public function create()
    {
        $empleados = User::where('rol', '=', 2)->get();

        return view('ordenes.create', compact('empleados'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'descripcion' => 'required|string|max:255',
            'tipo_servicio' => 'required|string|max:255',
            'id_empleado' => 'required|exists:users,id',
            'estado' => 'required|int',
        ]);

        $orden = new Orden();
        $orden->nombre = $request->nombre;
        $orden->email = $request->email;
        $orden->descripcion = $request->descripcion;
        $orden->tipo_servicio = $request->tipo_servicio;
        $orden->id_empleado = $request->id_empleado;
        $orden->estado = $request->estado;
        $orden->save();

        return redirect()->route('ordenes.index')->with('success', 'Orden creada exitosamente');
    }

    public function edit($id)
    {
        $orden = Orden::findOrFail($id);
        $empleados = User::where('rol', '=', 2)->get();

        return view('ordenes.edit', compact('orden', 'empleados'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'descripcion' => 'required|string|max:255',
            'tipo_servicio' => 'required|string|max:255',
            'id_empleado' => 'required|exists:users,id',
            'estado' => 'required|int',
        ]);

        $orden = Orden::findOrFail($id);
        $orden->nombre = $request->nombre;
        $orden->email = $request->email;
        $orden->descripcion = $request->descripcion;
        $orden->tipo_servicio = $request->tipo_servicio;
        $orden->id_empleado = $request->id_empleado;
        $orden->estado = $request->estado;
        $orden->save();

        return redirect()->route('ordenes.index')->with('success', 'Orden actualizada exitosamente');
    }

    public function destroy($id)
    {
        $orden = Orden::findOrFail($id);
        $orden->delete();

        return redirect()->route('ordenes.index')->with('success', 'Orden eliminada exitosamente');
    }
}
