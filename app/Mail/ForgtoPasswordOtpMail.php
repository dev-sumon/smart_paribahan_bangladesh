<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ForgtoPasswordOtpMail extends Mailable
{
    use Queueable, SerializesModels;


    public $otp;
    public $role;

    /**
     * Create a new message instance.
     */
    public function __construct($otp, $role)
    {
        $this->otp = $otp;
        $this->role = $role;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: "Your OTP for {$this->role} Password Reset",
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            // view: 'view.name',
            view: 'mail.forgot_password',
            with: [
                'otp' => $this->otp,
                'role' => $this->role,
            ],
        );
        // $subject = "Your OTP for $this->role Password Reset";

        // return $this->subject($subject)->view('mails.forgot_password');
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
