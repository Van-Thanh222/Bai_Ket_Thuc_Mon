<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderSuccessMail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;

    public function __construct($order)
    {
        $this->order = $order; // truyền thông tin đơn hàng
    }

    public function build()
{
    return $this->subject('Đặt hàng thành công!')
                ->view('emails.order_success')
                ->with([
                    'order' => $this->order
                ]);
}

}
