<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class User_mails extends Mailable
{
    use Queueable, SerializesModels;
    public $employee;
    public $randomPass;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Users $employee,$randomPass)
    {
        $this->employee = $employee;
        $this->randomPass = $randomPass;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.User-mail');
    }
}
