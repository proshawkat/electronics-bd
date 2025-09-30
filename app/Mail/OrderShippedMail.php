<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Order;
use App\Models\GeneralSetting;

class OrderShippedMail extends Mailable
{
    use Queueable, SerializesModels;
    public $order;
    public $settings;
    public $status;
    public $logo_cid;

    public function __construct(Order $order, string $status)
    {
        $this->order = $order;
        $this->status = $status;
        $this->settings = GeneralSetting::first();
    }

    public function build()
    {
        return $this->subject('Your Order Has Been Shipped')
                    ->view('emails.orders.shipped')
                    ->with([
                        'order' => $this->order,
                        'settings' => $this->settings,
                        'status' => $this->status,
                    ]);
    }
}
