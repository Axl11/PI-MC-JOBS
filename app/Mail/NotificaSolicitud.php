<?php

namespace App\Mail;

use App\Models\Solicitude;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotificaSolicitud extends Mailable
{
    use Queueable, SerializesModels;
    public $solicitude;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Solicitude $solicitude)
    {
        $this->solicitude = $solicitude;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('correos.notificaSolicitude');
    }
}
