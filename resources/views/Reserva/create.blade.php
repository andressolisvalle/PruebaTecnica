@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Reservación</h1>

        <form action="{{ route('reserva.store') }}" method="post">
            @csrf

            <div class="form-group">
                <label for="habitacion_id">Selecciona una habitación:</label>
                <select name="habitacion_id" id="habitacion_id" class="form-control">
                    @foreach($disponibles as $habitacion)
                        <option value="{{$habitacion->numero }}">{{ $habitacion->numero }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="fecha_inicio">Fecha de inicio:</label>
                <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="fecha_fin">Fecha de fin:</label>
                <input type="date" name="fecha_fin" id="fecha_fin" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="precio">Precio:</label>
                <input type="text" name="precio" id="precio" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="id_cliente">Id CLiente:</label>
                <input type="text" name="id_cliente" id="id_cliente" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="email">Email CLiente:</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>


            
            <button type="submit" class="btn btn-primary">Reservar</button>
        </form>
    </div>
@endsection
