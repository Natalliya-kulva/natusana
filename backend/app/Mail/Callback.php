<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Callback extends Mailable
{
    use Queueable, SerializesModels;

    protected $telephone;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($telephone)
    {
        $this->telephone = $telephone;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->markdown('emails.callback');
        $this->subject('Новый запрос из формы обратной связи');

        return $this->view('emails.callback', [ 'telephone' => $this->telephone ]);
    }
}
