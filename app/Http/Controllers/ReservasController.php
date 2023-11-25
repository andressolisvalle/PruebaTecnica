<?php

namespace App\Http\Controllers;

use App\Mail\ConfirmacionReserva;
use App\Models\Habitacion;
use App\Models\Reserva;
use App\Models\Reservacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ReservasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $reservacion = Reserva::all();
        return view('Reserva.index', compact('reservacion'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $disponibles = Habitacion::whereDoesntHave('reservas', function ($query) {
            $query->where('estado', 'confirmada')
                ->whereDate('fechaFin', '>', now());
        })->get();

        return view('Reserva.create', compact('disponibles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    
    public function store(Request $request)
    {
        $request->validate([
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after:fecha_inicio',
            'precio' => 'required|numeric',
            'id_cliente' => 'required|string',
            'email' => 'required|email',
        ]);
    
        $reserva = new Reserva([
            'habitacion_id' => $request->input('habitacion_id'),
            'fechaInicio' => $request->input('fecha_inicio'),
            'fechaFin' => $request->input('fecha_fin'),
            'precio' => $request->input('precio'),
            'id_cliente' => $request->input('id_cliente'),
            'email' => $request->input('email'),
            'estado' => 'pendiente',
        ]);

        $reserva->save();

        $detallesReserva = [
            'enlace_confirmacion' => route('confirmacion.reserva', $reserva->id), // Ajusta la ruta según tu aplicación
        ];
    
        Mail::to($request->input('email'))->send(new ConfirmacionReserva($detallesReserva));
       // return redirect()->route('reserva.index');
        return redirect()->route('reserva.index')->with('message', 'Reserva creada exitosamente. Verifica tu bandeja de entrada de Gmail y confirma la reservación');

    }

    public function confirmacion($id)
    {
        $reserva = Reserva::find($id);

        if (!$reserva) {
            abort(404); 
        }
        $reserva->update(['estado' => 'confirmado']);

        return redirect()->route('reserva.index');
    }

    
}
