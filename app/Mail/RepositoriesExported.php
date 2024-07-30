<?php

namespace App\Mail;

use App\Exports\RepositoriesExport;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Maatwebsite\Excel\Facades\Excel;

class RepositoriesExported extends Mailable
{
    use Queueable, SerializesModels;

    private $fileName = 'repositories-exported.xlsx';

    /**
     * Create a new message instance.
     */
    public function __construct($repositories)
    {
        Excel::store(new RepositoriesExport($repositories), $this->fileName, 'public');
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Repositories Exported',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mails.repositories-exported',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [
            Attachment::fromPath(storage_path("app/public/{$this->fileName}")),
        ];
    }
}
