<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    public function habitacion()
    {
        return $this->belongsTo(Habitacion::class);
    }
    protected $fillable = [
        'habitacion_id',
        'fechaInicio',
        'fechaFin',
        'precio',
        'id_cliente',
        'email',
        'estado',
    ];
    use HasFactory;
}
