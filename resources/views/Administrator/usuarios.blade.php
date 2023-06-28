@extends('layouts.app')
@include('includes.header')
@section('content')
<div class="container" style="background: linear-gradient(to bottom, #eeeeee, #dddddd);">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <center>
                    <h1>Lista de Usuarios</h1>
                    <button class="btn btn-primary" data-toggle="modal" data-bs-toggle="modal"
                        data-bs-target="#createUserModal">Crear Usuario</button>
                </center>
                <table class="table mt-4">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Género</th>
                            <th>Edad</th>
                            <th>Estado</th>
                            <th>Rol</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->genero }}</td>
                                <td>{{ $user->edad }}</td>
                                <td>{{ $user->estado ? 'Activo' : 'Inactivo' }}</td>
                                <td> @if($user->rol == 1)
                                        Administrador
                                    @elseif($user->rol == 2)
                                        Empleado
                                    @elseif($user->rol == 3)
                                        Cliente
                                    @endif</td>
                                <td>
                                    <form action="{{ route('user.destroy', $user->id) }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('¿Estás seguro de eliminar este usuario?')">Eliminar</button>
                                    </form>
                                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-bs-toggle="modal"
                                        data-bs-target="#editUserModal-{{ $user->id }}">Actualizar</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

<!-- Modal para crear usuario -->
<div class="modal fade" id="createUserModal" tabindex="-1" role="dialog" aria-labelledby="createUserModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createUserModalLabel">Crear Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('user.create') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" pattern="[A-Za-z\s]+" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Confirmar Contraseña</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                    </div>
                    <div class="form-group">
                        <label for="edad">Edad</label>
                        <input type="number" class="form-control" id="edad" name="edad" min="0" max="116" required>
                    </div>
                    <div class="form-group">
                        <label for="genero">Género</label>
                        <select class="form-control" id="genero" name="genero" required>
                            <option value="masculino">Masculino</option>
                            <option value="femenino">Femenino</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="rol">Rol</label>
                        <select class="form-control" id="rol" name="rol" required>
                            <option value="1">Administrator</option>
                            <option value="2">Empleado</option>
                            <option value="3">Cliente</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Crear</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modales de edición para cada usuario -->
@foreach($users as $user)
    <div class="modal fade" id="editUserModal-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel-{{ $user->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editUserModalLabel-{{ $user->id }}">Editar Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('user.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Confirmar Contraseña</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                        </div>
                        <div class="form-group">
                            <label for="edad">Edad</label>
                            <input type="number" class="form-control" id="edad" name="edad" value="{{ $user->edad }}" required>
                        </div>
                        <div class="form-group">
                            <label for="genero">Género</label>
                            <select class="form-control" id="genero" name="genero" required>
                                <option value="masculino" {{ $user->genero == 'masculino' ? 'selected' : '' }}>Masculino</option>
                                <option value="femenino" {{ $user->genero == 'femenino' ? 'selected' : '' }}>Femenino</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="rol">Rol</label>
                            <select class="form-control" id="rol" name="rol" required>
                                <option value="1" {{ $user->rol == 1 ? 'selected' : '' }}>Administrador</option>
                                <option value="2" {{ $user->rol == 2 ? 'selected' : '' }}>Empleado</option>
                                <option value="3" {{ $user->rol == 3 ? 'selected' : '' }}>Cliente</option>
                            </select>
                        </div>
                        <div class="form-group">
                        <label for="estado">Estado</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="estado" name="estado" {{ $user->estado ? 'checked' : '' }}>
                        </div>
                    </div>

                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach

