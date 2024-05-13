@component('mail::message')
# Results Uploaded

The results for your order, **Order Number:** {{ $order->order_number }} have been uploaded...

You can get further details about your order by logging into our website.

@component('mail::button', ['url' => route('welcome'), 'color' => 'green'])
Go to Website
@endcomponent

Thank you again for choosing us. We would like to improve our services. Kindly provide feedback.

@component('mail::button', ['url' => route('submitfeedback'), 'color' => 'green'])
Give us Feedback
@endcomponent

Regards,<br>
{{ config('app.name') }}
@endcomponent