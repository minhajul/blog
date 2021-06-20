@component('mail::message')
# Hello!

Please click the button below to verify your email address.

@component('mail::button', ['url' => $url])
    Verify Email Address
@endcomponent

If you did not subscribe this newsletter, no further action is required.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
