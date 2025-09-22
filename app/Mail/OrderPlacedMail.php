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

class OrderPlacedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $settings;

    public function __construct(Order $order)
    {
        $this->order = $order;
        $this->settings = GeneralSetting::first();
    }

    public function build()
    {
        return $this->subject('Your Order has been placed')
                    ->view('emails.orders.placed')
                    ->with([
                        'order'    => $this->order,
                        'customer' => $this->order->customer ?? $this->order->billingAddress,
                        'items'    => $this->order->items,
                        'settings' => $this->settings,
                    ]);
    }
}
