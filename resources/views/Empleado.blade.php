<!-- ordenes.blade.php -->

@extends('layouts.app')
@include('includes.header')
@include('includes.redes')
@include('includes.footer')
@section('content')
    <div class="container">
        <center>
        <h1>Tabla de Órdenes</h1>
        </center>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Descripción</th>
                    <th>Tipo de Servicio</th>
                    <th>Empleado Asignado</th>
                    <th>Estado</th>
                    <th>Fecha de Creación</th>
                    <th>Fecha de Actualización</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ordenes as $orden)
                    <tr>
                        <td>{{ $orden->nombre }}</td>
                        <td>{{ $orden->email }}</td>
                        <td>{{ $orden->descripcion }}</td>
                        <td>{{ $orden->tipo_servicio }}</td>
                        <td>{{ $orden->id_empleado }}</td>
                        <td>{{ $orden->estado }}</td>
                        <td>{{ $orden->created_at }}</td>
                        <td>{{ $orden->updated_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
