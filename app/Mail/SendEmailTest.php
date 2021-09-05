<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmailTest extends Mailable
{
    use Queueable, SerializesModels;


 public $title;
 public $description;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($title,$description)
    {
        //the parameters are recieved from the job class
            $this->title=$title;
            $this->description=$description;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //this is the blade template which all emails will get.
        return $this->subject('Post Notification !')
        ->view('mail');
    }
}
