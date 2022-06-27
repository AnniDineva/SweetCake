<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $msg;
    public $phone;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user,$phone,$msg )
    {
        $this->user = $user;     
        $this->phone=$phone;
        $this->msg = $msg;
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('contactFormRequest');
    }
}
