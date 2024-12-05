<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class GeneralHtmlEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $subjectText;
    public $contentText;

    /**
     * Create a new message instance.
     *
     * @param string $subject
     * @param string $content
     */
    public function __construct($subject, $content)
    {
        $this->subjectText = $subject;
        $this->contentText = $content;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->subjectText, // Dynamic subject passed via the constructor
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.general_html', // The view containing the HTML email content
            with: [
                'subject' => $this->subjectText, // Pass the subject to the view
                'content' => $this->contentText, // Pass the content to the view html content
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return []; // No attachments for this email
    }
}
