<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ForgetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;
    public $admin_name;
    public $reset_code;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($admin_name,$reset_code)
    {
        $this->admin_name = $admin_name;
        $this->reset_code = $reset_code;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.auth.forget_password_email')->with([
            'admin_name'=>$this->admin_name,
            'reset_code'=>$this->reset_code,
        ]);
    }
}
