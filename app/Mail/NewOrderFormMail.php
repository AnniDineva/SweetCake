<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewOrderFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $phone;
    public $cart;
    public $order;
    public $address;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $phone, $cart, $order, $address)
    {
        $this->name=$name;
        $this->phone=$phone;
        $this->cart=$cart;
        $this->order=$order;
        $this->address=$address;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('newOrderEmailNotification');
    }
}
