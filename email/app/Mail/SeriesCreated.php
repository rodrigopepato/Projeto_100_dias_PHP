<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SeriesCreated extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(
        public string $nomeSerie,
        public int $idSerie,
        public int $qtdTemporadas,
        public int $episodiosPorTemporada,
    )
    {
        $this->subject = "Série $nomeSerie criada";
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("Série {$this->nomeSerie} criada")
                    ->markdown('mail.series-created');
    }

}
