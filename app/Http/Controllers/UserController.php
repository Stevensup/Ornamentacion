<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function showUsers()
    {
        $users = User::all(); // Obtener todos los usuarios desde el modelo User

        // dd($users);
         return view('Administrator.usuarios', ['users' => $users]);
    }

    public function users()
    {
        return $this->showUsers();
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id); // Buscar el usuario por su ID

        // Eliminar el usuario
        $user->delete();

        return redirect()->route('users')->with('success', 'Usuario eliminado exitosamente');
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id); // Obtener el usuario por su ID


        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'edad' => 'required',
            'genero' => 'required',
            'rol' => 'required'
        ]);


        $user->name = $request->name;
        $user->email = $request->email;
        $user->edad = $request->edad;
        $user->genero = $request->genero;
        $user->rol = $request->rol;
        $user->estado = $request->estado == null ? false : true;
        $user->save();

        return redirect()->route('users')->with('success', 'Usuario actualizado exitosamente');
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'edad' => 'required|integer',
            'genero' => 'required|in:masculino,femenino',
            'rol' => 'required|in:1,2,3',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'edad' => $request->edad,
            'genero' => $request->genero,
            'rol' => $request->rol,
            'estado' => 1,
        ]);

        return redirect()->route('users')->with('success', 'Usuario creado exitosamente');
    }
}
