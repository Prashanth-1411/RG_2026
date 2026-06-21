<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\ContactInquiry;

class ContactInquiryMail extends Mailable
{
    use Queueable, SerializesModels;

    public ContactInquiry $inquiry;

    public function __construct(ContactInquiry $inquiry)
    {
        $this->inquiry = $inquiry;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Contact Inquiry: ' . ($this->inquiry->subject ?? 'No Subject'),
        );
    }

    public function content(): Content
    {
        return new Content(
            html: 'emails.contact-inquiry',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
