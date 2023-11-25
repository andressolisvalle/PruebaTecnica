<?php

namespace App\Http\Controllers;

use App\Models\Habitacion;
use Illuminate\Http\Request;

class HabitacionController extends Controller
{
    public function index()
    {
        $habitaciones = Habitacion::paginate(10);
        return view('habitaciones.index', compact('habitaciones'));
    }

    public function create()
    {
        return view('habitaciones.create');
    }

    public function store(Request $request)
    {
        // Validación de los datos del formulario
        $request->validate([
            'tipo' => 'required|string|max:255',
            'numero' => 'required|integer',
            'precio' => 'required|numeric',
        ]);

        $habitacion = new Habitacion([
            'tipo' => $request->input('tipo'),
            'numero' => $request->input('numero'),
            'precio' => $request->input('precio'),
        ]);

        $habitacion->save();

        return redirect()->route('habitaciones.index')->with('message', 'Habitación creada exitosamente.');
    }

}
