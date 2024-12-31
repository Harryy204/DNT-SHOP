<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use App\Models\Contact;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactReplyMail extends Mailable
{
    use Queueable, SerializesModels;
    public $contact;
    public $replyMessage;

    /**
     * Create a new message instance.
     */
    public function __construct(Contact $contact, $replyMessage)
    {
        $this->contact = $contact;
        $this->replyMessage = $replyMessage;
    }
    public function build()
    {
        return $this->subject('DNTSHOP')
                    ->view('emails.contact_reply')
                    ->with([
                        'contact' => $this->contact,
                        'replyMessage' => $this->replyMessage,
                    ]);
    }
    /**
     * Get the message envelope.
     */
    
}
