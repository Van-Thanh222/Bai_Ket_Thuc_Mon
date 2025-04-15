<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;
    public $sentData;


    /**
     * Create a new message instance.
     */
    public function __construct($sentData)
    {
        $this->sentData = $sentData;
    }


    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('levanthanhdz001@gmail.com', 'From Thành Đẹp Zai'),
            replyTo: [
                new Address('levanthanhdz001@gmail.com', 'To Thành Đẹp Zai'),
            ],
            subject: 'yêu cầu cấp lại mật khẩu từ shop bán hàng',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.contact_email',  // Đảm bảo bạn lưu HTML này vào `resources/views/emails/contact_email.blade.php`
            with: [
                'sentData' => $this->sentData,
            ],
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
