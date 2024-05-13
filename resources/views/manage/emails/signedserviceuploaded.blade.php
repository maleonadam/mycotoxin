@component('mail::message')
# Signed Service Specification

The Signed Service Specification for order, **Order Number:** {{ $order->order_number }} has been uploaded...

You can get further details about your order by logging into our website.

@component('mail::button', ['url' => route('welcome'), 'color' => 'green'])
Go to Website
@endcomponent

Thank you again for choosing us.

Regards,<br>
{{ config('app.name') }}
@endcomponent