@extends('layouts.app')

@section('title', 'Crear reserva')

@section('content')

<div class="container">
    <h1>Lista de Reservaciones</h1>
    <a href="{{ route('reserva.create') }}" class="btn btn-primary mb-3">Agregar Reservación</a>
    <a href="{{ route('habitaciones.index') }}" class="btn btn-primary mb-3">Habitaciones</a>

    @if(session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
    @endif
    
    @if($reservacion->isEmpty())
        <p>No hay reservaciones.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cliente</th>
                    <th>Habitación</th>
                    <th>Fecha de Inicio</th>
                    <th>Fecha de Fin</th>
                    <th>Estado</th>
                    <th>Precio</th>
                    <th>Fecha de Creación</th>
                    <th>Fecha de Actualización</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reservacion as $reservacion)
                    <tr>
                        <td>{{ $reservacion->id }}</td>
                        <td>{{ $reservacion->id_cliente}}</td>
                        <td>{{ $reservacion->habitacion_id}}</td>
                        <td>{{ $reservacion->fechaInicio }}</td>
                        <td>{{ $reservacion->fechaFin }}</td>
                        <td>{{ $reservacion->estado }}</td>
                        <td>{{ $reservacion->precio }}</td>
                        <td>{{ $reservacion->created_at }}</td>
                        <td>{{ $reservacion->updated_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>

@endsection