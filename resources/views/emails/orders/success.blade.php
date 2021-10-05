@component('mail::message')
# Thank you for your purchase!

@component('mail::button', ['url' => $url])
Download File
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
