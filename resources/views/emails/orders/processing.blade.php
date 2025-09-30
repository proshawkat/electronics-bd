<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $subject ?? 'Order Update' }}</title>
</head>
<body style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Helvetica Neue', Arial, sans-serif; background-color: #f9fbfd; margin: 0; padding: 0;">

<div style="max-width: 650px; margin: 30px auto; padding: 30px; background-color: #ffffff; border: 1px solid #e2e8f0; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.05);">

    <!-- Header -->
    <table width="100%" cellpadding="0" cellspacing="0" style="margin-bottom: 20px;">
        <tr>
            <td style="text-align: left;">
                <img src="{{ $message->embed(public_path($settings->logo)) }}" alt="{{ $settings->name }}" style="max-width: 150px; height: auto;">
            </td>
            <td style="text-align: right;">
                <h1 style="color: #333333; font-size: 24px; font-weight: 600; margin: 0;">
                    {{ $subject ?? 'Order Update' }}
                </h1>
                <p style="font-size: 14px; color: #718096; margin: 5px 0 0 0;">Order #{{ $order->order_code }}</p>
            </td>
        </tr>
    </table>

    <hr style="border: none; border-top: 1px solid #ebf1f6;">

    <!-- Greeting -->
    <p style="font-size: 16px; color: #2d3748;">
        Hello {{ $order->customer_name ?? 'Customer' }},
    </p>

    <!-- Message -->
    <p style="font-size: 14px; color: #4a5568; line-height: 1.6;">
        @if($status === 'processing')
            Your order **#{{ $order->order_code }}** is now being processed. We’ll notify you once it has been shipped.
        @elseif($status === 'shipped')
            Good news! Your order **#{{ $order->order_code }}** has been shipped. You can track it using the link below.
        @endif
    </p>

    @if($status === 'shipped')
    <!-- Track Order Button -->
    <div style="margin: 20px 0;">
        <a href="{{ url('/customer/order/'.$order->order_code) }}" style="background-color: #2b6cb0; color: #ffffff; text-decoration: none; padding: 10px 20px; border-radius: 6px; display: inline-block;">
            Track Your Order
        </a>
    </div>
    @endif

    <!-- Footer -->
    <p style="font-size: 14px; color: #718096; margin-top: 30px;">
        Thanks for choosing {{ $settings->name ?? config('app.name') }}!  
    </p>
    <p style="font-size: 12px; color: #a0aec0;">
        &copy; {{ now()->year }} {{ $settings->name ?? config('app.name') }}. All rights reserved.
    </p>

</div>
</body>
</html>
