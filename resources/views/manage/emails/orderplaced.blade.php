@component('mail::message')
# Order Received

Thank you for your order.

**Order Number:** {{ $order->order_number }}

**Order Contact Email:** {{ $order->email }}

**Order Contact Phone:** {{ $order->phone }}

**Organization:** {{ $order->organization }}

**Order Note:** {{ $order->message }}

**Items Ordered**

@foreach ($order->products as $product)
| Name | Details | No. of samples |
| :----- | :----: | -----: |
| {{ $product->name }} | {{ $product->details }} | {{ $product->pivot->quantity }} |
@endforeach

**Amount Payable:** $ {{ $order->order_total }}


You can get further details about your order by logging into our website.

@component('mail::button', ['url' => route('welcome'), 'color' => 'green'])
Go to Website
@endcomponent

Thank you again for choosing us.

Regards,<br>
{{ config('app.name') }}
@endcomponent