<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMailFailed extends Mailable
{
    use Queueable, SerializesModels;
    public $items;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($items)
    {
        $this->items = $items;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('aristofotografi7@gmail.com')
            ->subject('Pemesanan Gagal Aristo Fotografi')
            ->view('user.pages.email.email-failed')
            ->with('data', $this->items);
    }
}
