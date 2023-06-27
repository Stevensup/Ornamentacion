<!-- tasks.blade.php -->

<!-- Aquí comienza la estructura de la vista -->
@extends('layouts.app') <!-- Suponiendo que tienes un layout principal llamado 'app.blade.php' -->

@section('content') <!-- Aquí comienza el contenido de la página -->

  <h1 style="color: #FF0000;">Lista de Tareas</h1> <!-- Color rojo para soldadores -->

  <a href="{{ route('tareas.create') }}" class="btn btn-primary">Crear Tarea</a> <!-- Botón para crear una nueva tarea -->

  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Descripción</th>
        <th>Empleado</th>
        <th>Estado</th>
        <th>Creado en</th>
        <th>Actualizado en</th>
        <th>Usuario</th>
        <th>Correo electrónico</th>
        <th>Género</th>
        <th>Edad</th>
        <th>Pedido ID</th>
        <th>Cantidad</th>
      </tr>
    </thead>
    <tbody>
      @foreach($tareas as $tarea)
        <tr>
          <td>{{ $tarea->id }}</td>
          <td>{{ $tarea->descripcion }}</td>
          <td>{{ $tarea->empleado->nombre }}</td> <!-- Suponiendo que tienes un modelo 'Empleado' relacionado con la tabla 'usuarios' -->
          <td>{{ $tarea->estado }}</td>
          <td>{{ $tarea->created_at }}</td>
          <td>{{ $tarea->updated_at }}</td>
          <td>{{ $tarea->empleado->usuario->name }}</td> <!-- Suponiendo que tienes un modelo 'Usuario' relacionado con la tabla 'users' -->
          <td>{{ $tarea->empleado->usuario->email }}</td>
          <td>{{ $tarea->empleado->usuario->genero }}</td>
          <td>{{ $tarea->empleado->usuario->edad }}</td>
          <td>{{ $tarea->pedido->id }}</td> <!-- Suponiendo que tienes un modelo 'Pedido' relacionado con la tabla 'detalle_producto' -->
          <td>{{ $tarea->pedido->cantidad }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>

@endsection
