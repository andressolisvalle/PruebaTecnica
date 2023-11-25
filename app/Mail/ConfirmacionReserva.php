<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConfirmacionReserva extends Mailable
{
    use Queueable, SerializesModels;

    public $detallesReserva;

    /**
     * Create a new message instance.
     */
    public function __construct($detallesReserva)
    {
        $this->detallesReserva = $detallesReserva;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('Confirmacion Reserva')
            ->view('emails.confirmacion_reserva');
    }
}
