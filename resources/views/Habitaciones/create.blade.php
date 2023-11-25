@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Habitación</h1>

        @if(session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <form method="post" action="{{ route('habitaciones.store') }}">
            @csrf

            <div class="form-group">
                <label for="tipo">Tipo:</label>
                <input type="text" name="tipo" id="tipo" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="numero">Número:</label>
                <input type="number" name="numero" id="numero" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="precio">Precio:</label>
                <input type="text" name="precio" id="precio" class="form-control" required>
            </div>

            <!-- Agrega otros campos según tus necesidades -->

            <button type="submit" class="btn btn-primary">Crear Habitación</button>
        </form>
    </div>
@endsection
