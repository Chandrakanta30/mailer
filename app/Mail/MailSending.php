<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailSending extends Mailable
{
    use Queueable, SerializesModels;
    public $subject;
    public $attachments;
    public $body;
    public $name;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject,$attachments,$body,$name)
    {
        $this->subject = $subject;
        $this->attachments = $attachments;
        $this->body = $body;
        $this->name = $name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        if($this->attachments){

            return $this->subject($this->subject)
            ->view('mail.create',['body'=>$this->body,'name'=>$this->name])
            ->attach($this->attachments);

        }else{
            
            return $this->subject($this->subject)
            ->view('mail.create',['body'=>$this->body,'name'=>$this->name]);
        }
       
        

            // foreach($this->attachments as $attachment){
            //     $this->attach($attachment);
            // }

            // return $this;
    }
}
