@component('mail::message')
# Inquiry Message

**Name:** {{ $inquiry->name }}
**Email:** {{ $inquiry->email }}
**Message:** {{ $inquiry->message }}

@endcomponent