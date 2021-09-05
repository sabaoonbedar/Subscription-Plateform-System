<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Mail\SendEmailTest;
use Mail;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $email_details;
    protected $title;
    protected $description;


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email_details,$title,$description)
    {
     //the parameters are recieved from the post controller

        $this->email_details = $email_details;
        $this->title = $title;
        $this->description = $description;


    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
 //now the parameters are passed to the Mail and it created new instance for every single email
        $email = new SendEmailTest($this->title,$this->description);
        Mail::to($this->email_details)->queue($email);
    }
}
