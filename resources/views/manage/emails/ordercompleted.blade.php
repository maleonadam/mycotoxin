@component('mail::message')
# Order Completed

The processing of your order, **Order Number:** {{ $order->order_number }} is complete...

You can get further details about your order by logging into our website.

@component('mail::button', ['url' => route('welcome'), 'color' => 'green'])
Go to Website
@endcomponent

Thank you again for choosing us. Please provide us feedback here.

@component('mail::button', ['url' => route('submitfeedback'), 'color' => 'green'])
Give us Feedback
@endcomponent

Regards,<br>
{{ config('app.name') }}
@endcomponent