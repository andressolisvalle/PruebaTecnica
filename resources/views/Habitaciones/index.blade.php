@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Listado de Habitaciones</h1>
        <a href="{{ route('reserva.index') }}" class="btn btn-primary mb-3">Volver</a>
        <a href="{{ route('habitaciones.create') }}" class="btn btn-primary mb-3">Agregar Habitacion</a>

        @if(session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tipo</th>
                    <th>Número</th>
                    <th>Precio</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($habitaciones as $habitacion)
                    <tr>
                        <td>{{ $habitacion->id }}</td>
                        <td>{{ $habitacion->tipo }}</td>
                        <td>{{ $habitacion->numero }}</td>
                        <td>{{ $habitacion->precio }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">No hay habitaciones disponibles.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{ $habitaciones->links() }} 
    </div>
@endsection
