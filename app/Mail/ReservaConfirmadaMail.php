<?php

namespace App\Mail;

use App\Models\Reserva;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReservaConfirmadaMail extends Mailable
{
    use Queueable, SerializesModels;

    public $reserva;

    public function __construct(Reserva $reserva)
    {
        $this->reserva = $reserva;
    }

    public function build()
    {
        return $this->subject('Confirmación de reserva - PROFENOW')
                    ->view('emails.reserva-confirmada')
                    ->with([
                        'reserva' => $this->reserva,
                    ]);
    }
}
