<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BeneficiaryNotification extends Mailable
{
    use Queueable, SerializesModels;
    public $reuser;
    public $amount;
    public $amoucurrencynt;


    /**
     * Create a new message instance.
     */
    public function __construct($reuser,$amount,$amoucurrencynt)
    {
        $this->reuser = $reuser;
        $this->amount = $amount;
        $this->amoucurrencynt = $amoucurrencynt;

    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Beneficiary Notification',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.beneficiary-notification',
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
