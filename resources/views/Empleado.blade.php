@extends('layouts.app')
@include('includes.header')
@include('includes.redes')
@include('includes.footer')
@section('content')
    <div class="container">
        <center>
            <h1 class="table-title">Tabla de Órdenes</h1>
        </center>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="table-container">
            <table class="table styled-table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Descripción</th>
                        <th>Tipo de Servicio</th>
                        <th>Estado</th>
                        <th>Fecha de Creación</th>
                        <th>Fecha de Actualización</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ordenes as $index => $orden)
                        <tr class="{{ $index % 2 == 0 ? 'even-row' : 'odd-row' }}">
                            <td>{{ $orden->nombre }}</td>
                            <td>{{ $orden->email }}</td>
                            <td>{{ $orden->descripcion }}</td>
                            <td>{{ $orden->tipo_servicio }}</td>
                            <td>{{ $orden->estado }}</td>
                            <td>{{ $orden->created_at }}</td>
                            <td>{{ $orden->updated_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="image-container">
        <img src="{{ asset('images/prin/works.jpg') }}" alt="Quiénes Somos">
    </div>
@endsection

<style>
    .table-container {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        overflow: hidden;
    }

    .styled-table {
        border-collapse: collapse;
        width: 100%;
    }

    .styled-table thead th {
        background-color: #0000FF;
        color: #ffffff;
        text-align: middle;
    }

    .styled-table td {
        padding: 12px 15px;
    }

    .styled-table tbody .even-row {
        background-color: #EAF6FF;
    }

    .styled-table tbody .odd-row {
        background-color: #D5EFFF;
    }

    .image-container {
        margin-top: 20px;
        display: flex;
        justify-content: center;
        opacity: 0.5;
    }

    .image-container img {
        max-width: 100%;
    }
</style>
