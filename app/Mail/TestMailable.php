<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TestMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $dataEmail;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
    
        $this->dataEmail = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('email.TestMail.MessageMail')->with('message',$this->dataEmail);
    }
}
