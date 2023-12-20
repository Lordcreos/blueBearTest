<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class RegisterRecived extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $url;

    public function __construct(User $user)
    {
        $this->user = $user;
        $this->url = url("/email/verify/{$this->user->id}/");
    }
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Validación de usuario'
        );
    }
    
    public function content(): Content
    {
        return new Content(
            view: 'mails.user_validation'
        );
    }
}
