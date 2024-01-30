<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PinNotification extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $amount;
    public $amoucurrencynt;


    /**
     * Create a new message instance.
     */
    public function __construct($user,$amount,$amoucurrencynt)
    {
        $this->user = $user;
        $this->amount = $amount;
        $this->amoucurrencynt = $amoucurrencynt;

    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Pin Notification',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view:  'emails.pin-notification',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
