<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailQueue extends Mailable
{
    use Queueable, SerializesModels;

    public $details = [];

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('noreply@larapay.lk', env("APP_NAME"))
        ->subject($this->details['subject'])
        ->view('emails.'.$this->details['template']);
    }
}
