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
        <th>Acciones</th>
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
          <td>
            <a href="{{ route('tareas.show', $tarea->id) }}" class="btn btn-info">Ver</a> <!-- Botón para ver detalles de la tarea -->
            <a href="{{ route('tareas.edit', $tarea->id) }}" class="btn btn-warning">Editar</a> <!-- Botón para editar la tarea -->
            <form action="{{ route('tareas.destroy', $tarea->id) }}" method="POST" style="display: inline;">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger">Eliminar</button> <!-- Botón para eliminar la tarea -->
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>

@endsection
