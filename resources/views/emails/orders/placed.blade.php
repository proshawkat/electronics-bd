<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
</head>
<body style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Helvetica Neue', Arial, sans-serif; background-color: #f9fbfd; margin: 0; padding: 0;">

    <div style="max-width: 650px; margin: 30px auto; padding: 30px; background-color: #ffffff; border: 1px solid #e2e8f0; border-radius: 10px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);">

        <!-- Header and Branding -->
        <table width="100%" cellpadding="0" cellspacing="0" style="margin-bottom: 20px;">
            <tr>
                <td style="text-align: left;">
                    <img src="{{ $message->embed(public_path($settings->logo)) }}" alt="{{ $settings->name }}" style="max-width: 150px; height: auto;">
                </td>
                <td style="text-align: right;">
                    <h1 style="color: #333333; font-size: 28px; font-weight: 600; margin: 0;">INVOICE</h1>
                    <p style="font-size: 14px; color: #718096; margin: 5px 0 0 0;"># {{ $order->order_code }}</p>
                </td>
            </tr>
        </table>

        <hr style="border: none; border-top: 1px solid #ebf1f6;">

        <!-- Company and Client Details -->
        <table width="100%" cellpadding="0" cellspacing="0" style="margin-top: 25px;">
            <tr>
                <td style="width: 50%; vertical-align: top; padding-right: 15px;">
                    <p style="font-size: 14px; color: #718096; font-weight: 500; margin: 0 0 5px 0;">INVOICED FROM:</p>
                    <p style="font-size: 16px; color: #2d3748; font-weight: 600; margin: 0;">{{ $settings->name }}</p>
                    <p style="font-size: 14px; color: #4a5568; margin: 5px 0 0 0;">{{ $settings->address }}</p>
                    <p style="font-size: 14px; color: #4a5568; margin: 0;">{{ $settings->phone }}</p>
                </td>
                <td style="width: 50%; vertical-align: top; text-align: right; padding-left: 15px;">
                    <p style="font-size: 14px; color: #718096; font-weight: 500; margin: 0 0 5px 0;">INVOICED TO:</p>
                    <p style="font-size: 16px; color: #2d3748; font-weight: 600; margin: 0;">
                        {{ $customer->first_name ?? $order->billingAddress->first_name }}
                    </p>
                    <p style="font-size: 14px; color: #4a5568; margin: 5px 0 0 0;">
                        {{ $order->billingAddress->address_1 ?? '' }}
                    </p>
                    <p style="font-size: 14px; color: #4a5568; margin: 0;">
                        {{ $order->billingAddress->city ?? '' }}, {{ $order->billingAddress?->region?->name }}
                    </p>
                </td>
            </tr>
        </table>
        
        <table width="100%" cellpadding="0" cellspacing="0" style="margin-top: 25px;">
            <tr>
                <td style="width: 50%; vertical-align: top; padding-right: 15px;">
                    <p style="font-size: 14px; color: #718096; font-weight: 500; margin: 0 0 5px 0;">ISSUE DATE:</p>
                    <p style="font-size: 14px; color: #4a5568; margin: 0;">{{ $order->created_at->format('d M, Y') }}</p>
                </td>
                <td style="width: 50%; vertical-align: top; text-align: right; padding-left: 15px;">
                    <p style="font-size: 14px; color: #718096; font-weight: 500; margin: 0 0 5px 0;">DUE DATE:</p>
                    <p style="font-size: 14px; color: #4a5568; margin: 0;">{{ now()->addDays(7)->format('d M, Y') }}</p>
                </td>
            </tr>
        </table>

        <!-- Invoice Items Table -->
        <table width="100%" cellpadding="12" cellspacing="0" style="border-collapse: collapse; margin-top: 30px; border-radius: 8px; overflow: hidden; border: 1px solid #e2e8f0;">
            <tr style="background-color: #f1f6fa;">
                <th style="text-align: left; padding: 12px; font-size: 14px; color: #4a5568; font-weight: 600;">Description</th>
                <th style="text-align: center; padding: 12px; font-size: 14px; color: #4a5568; font-weight: 600;">Qty</th>
                <th style="text-align: right; padding: 12px; font-size: 14px; color: #4a5568; font-weight: 600;">Unit Price</th>
                <th style="text-align: right; padding: 12px; font-size: 14px; color: #4a5568; font-weight: 600;">Amount</th>
            </tr>
            @php
                $subtotal = 0;
            @endphp

            @foreach($items as $item)
            @php
                $lineTotal = $item->quantity * $item->price;
                $subtotal += $lineTotal;
            @endphp
            <tr style="border-bottom: 1px solid #ebf1f6;">
                <td style="text-align: left; padding: 12px; font-size: 14px; color: #4a5568;">{{ $item->product->name }}</td>
                <td style="text-align: center; padding: 12px; font-size: 14px; color: #4a5568;">{{ $item->quantity }}</td>
                <td style="text-align: right; padding: 12px; font-size: 14px; color: #4a5568;">{{ number_format($item->price, 2) }}</td>
                <td style="text-align: right; padding: 12px; font-size: 14px; color: #4a5568;">{{ number_format($item->quantity * $item->price, 2) }}</td>
            </tr>
            @endforeach
        </table>

        <!-- Totals Section -->
        <table width="100%" cellpadding="12" cellspacing="0" style="margin-top: 20px; border-collapse: collapse;">
            <tr>
                <td colspan="3" style="text-align: right; font-size: 16px; font-weight: 500; color: #555555;">Subtotal:</td>
                <td style="text-align: right; font-size: 16px; font-weight: 500; color: #555555;">{{ number_format($subtotal, 2) }}</td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: right; font-size: 16px; font-weight: 500; color: #555555;">Tax:</td>
                <td style="text-align: right; font-size: 16px; font-weight: 500; color: #555555;">{{ number_format($order->tax, 2) }}</td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: right; font-size: 20px; font-weight: 700; color: #ffffff; background-color: #2b6cb0; padding: 15px; border-radius: 0 0 0 8px;">TOTAL DUE:</td>
                <td style="text-align: right; font-size: 20px; font-weight: 700; color: #ffffff; background-color: #2b6cb0; padding: 15px; border-radius: 0 0 8px 0;">
                    {{ number_format($order->total, 2) }}
                </td>
            </tr>
        </table>

        <!-- Payment Instructions & Notes -->
        <div style="margin-top: 30px;">
            <p style="font-size: 14px; color: #555555; margin: 0;">**Note:** Please complete payment by the due date. For questions, contact us at {{ $settings->email ?? $settings->phone }}.</p>
        </div>

        <!-- Footer -->
        <div style="margin-top: 40px; text-align: center; color: #a0aec0; font-size: 12px;">
            <p style="margin: 0;">Thank you for your business!</p>
            <p style="margin: 5px 0 0 0;">&copy; {{ now()->year }} {{ $settings->name }}. All rights reserved.</p>
        </div>
    </div>
</body>

</html>
