<?php

namespace App\Mail;

use App\Models\Internship;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Queue\SerializesModels;

class InternshipRequestMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(
        public Internship $internship
    ) {}

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Nouvelle demande de stage - Centre Hospitalier Nganda',
            replyTo: [
                new \Illuminate\Mail\Mailables\Address('reception@centrehospitaliernganda.com', 'Centre Hospitalier Nganda'),
            ],
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.internship',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        $attachments = [];

        if ($this->internship->cv_path) {
            $attachments[] = Attachment::fromPath(storage_path('app/' . $this->internship->cv_path));
        }

        if ($this->internship->motivation_letter_path) {
            $attachments[] = Attachment::fromPath(storage_path('app/' . $this->internship->motivation_letter_path));
        }

        return $attachments;
    }
}
