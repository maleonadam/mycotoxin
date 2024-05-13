@component('mail::message')
# Order Rejected!

Your order, **Order Number:** {{ $order->order_number }} has been rejected!

**Reason for rejection:** {{ $order->reject_reason }}

You can get further details about your order by logging into our website.

@component('mail::button', ['url' => route('welcome'), 'color' => 'green'])
Go to Website
@endcomponent

Thank you again for choosing us.

Regards,<br>
{{ config('app.name') }}
@endcomponent